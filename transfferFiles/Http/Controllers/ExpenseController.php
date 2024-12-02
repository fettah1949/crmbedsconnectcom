<?php

namespace App\Http\Controllers;

use App\Models\Bank;
use App\Models\Expense;
use App\Models\ExpenseCategory;
use App\Models\Transaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ExpenseController extends Controller
{
   

    public function filter(Request $request){

        
    
        
        $start_date = $request->input('start_date');
        $end_date = $request->input('end_date');
        $category = $request->input('Category');
        
        if($start_date != "" OR $end_date != ""){
        
            $request->validate([

                'start_date' => 'required',
                'end_date' => 'required',
                'Category' => 'nullable'
            ]);
            if($category != ""){
                $expenses = Expense::where('Category' , '=', $category)->whereBetween('Expense_Date', [$start_date, $end_date])->get();
            }else{
                $expenses = Expense::whereBetween('Expense_Date', [$start_date, $end_date])->get();
            }
        }else{
                    $request->validate([
            
                        'start_date' => 'nullable',
                        'end_date' => 'nullable',
                        'Category' => 'nullable'
                    ]);
                    $expenses = Expense::where('Category' , '=', $category)->get();


        }



        $filter = [
            'start_date' => $start_date,
            'end_date' => $end_date,
            'Category' => $category
        ];
        
        $total = ExpenseController::statistics($expenses);

      //  dd($expenses);
      return view('admin.expense.index',['expenses'=>$expenses,'total'=>$total,'filter'=>$filter]) ;  

    }

    public function statistics($expenses){

        // Statistics ///////////////////////////////////////////////////////////////////////////////////////////
        $eur = 0;
        $usd = 0;
        $mad = 0;
        $united_amount = 0;

        $expense_count_eur = 0;
        $expense_count_usd = 0;
        $expense_count_mad = 0;
        $expense_count_all = 0;
        
        
           foreach ($expenses as $expense) {
               $expense_count_all = $expense_count_all + 1 ;
               
               if($expense->Currency == 'EUR'){
                $expense_count_eur = $expense_count_eur + 1 ;
                $eur = $eur + $expense->Amount;
            }

            if($expense->Currency == 'USD'){
                $expense_count_usd = $expense_count_usd + 1 ;
                $usd = $usd + $expense->Amount;
            }

            if($expense->Currency == 'MAD'){
                $expense_count_mad = $expense_count_mad + 1 ;
                $mad = $mad + $expense->Amount;
            }
   
           }
   
           $mad_united_amount = $mad * 0.0952380952380952380952380952 ;
           $usd_united_amount = $usd * 0.8285690612312536249896428867 ;
           $united_amount = $eur + $mad_united_amount + $usd_united_amount ;

           
           $total = array(
               'eur' => $eur ,
               'usd' => $usd ,
               'mad' => $mad ,
               'united_amount' => round($united_amount, 2) ,
               'expense_count_eur' => $expense_count_eur ,
               'expense_count_usd' => $expense_count_usd ,
               'expense_count_mad' => $expense_count_mad ,
               'expense_count_all' => $expense_count_all 
           );
           
           return $total;
       
        
       
           // End Statistics ///////////////////////////////////////////////////////////////////////////////////////////
       
       }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $expenses = Expense::All();

        $total = ExpenseController::statistics($expenses);

           $filter = [
            'start_date' =>"",
            'end_date' =>"",
            'Category' =>""
        ];

        return view('admin.expense.index',['expenses'=>$expenses,'total'=>$total,'filter'=>$filter]) ;  
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $staf_name = Auth::user()->name;
        
        return view('admin.expense.create',['staf_name'=>$staf_name]) ;  
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       // ExpenseCategory::where('Category_Name',$request -> Category)->first();

        if (ExpenseCategory::where('Category_Name',$request -> Category)->first()){
           // dd('exist');
        }else{
            $categories = new ExpenseCategory();
            $categories -> Category_Name = $request -> Category;
            $categories->save();
        }
      // dd($request);
        $request->validate([

            'Expense_Date' => 'required',
            'Payment_Mode' => 'required',
            'Amount' => 'nullable',
            'Currency' => 'nullable',
            'Category' => 'required',
            'description' => 'nullable',
            'Paid_Through' => 'nullable',
            'Bank' => 'required',
            'Staf_Name' => 'nullable'
        ]);

        // get bank
        $bank = Bank::find($request->Paid_Through);
        $bank -> Balance = $bank->Balance - $request->Amount ;
        $bank->save();

    // transaction record

    $transaction = new Transaction();
                        
    $transaction -> Date = $request -> Expense_Date;
    $transaction -> Payee =  $bank -> Nom_du_compte;
    $transaction -> Description = $request -> Category;
   // $fileName .= 'EXPS_' . md5(); // a unique file name

    $transaction -> Reference_Number =  'EXPS_' . substr(md5(uniqid(rand(0,9))), 0, 6);; // a unique reference number
    $transaction -> Type = "EXPENSE";
    $transaction -> Bank_id = $request -> Paid_Through;
    $transaction -> Debit = $request -> Amount; 
    $transaction -> Credit = 0;
    $transaction->save();
  //  dd($transaction);

    
    


      $expense = new Expense();
      $expense -> Expense_Date = $request ->Expense_Date;
      $expense -> Payment_Mode = $request ->Payment_Mode;
      $expense -> Amount = $request ->Amount;
      $expense -> Currency = $request ->Currency;
      $expense -> Category = $request ->Category;
      $expense -> description = $request ->description;

      $expense -> Paid_Through = $bank -> Nom_du_compte;
      
      $expense -> Staf_Name = Auth::user()->name;
      $expense -> Transaction_id = $transaction->id;
      $expense -> Bank_id = $bank -> id;

      $expense->save();
     // dd($expense);
      
     // $bank_idtest = $expense->id ;
     
        return redirect()->route('expense.index')
                        ->with('success','Expense created successfully.');   
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function deleteExpense($expense_id)
    {
        $expense = Expense::find($expense_id);
        
        $transaction = Transaction::find($expense->Transaction_id);
        $bank = Bank::find($expense->Bank_id);
        
       // dd($expense,$transaction, $bank);
        $bank->Balance = $bank->Balance + $expense->Amount ;
        $bank->save();

        $transaction->delete();
        $expense->delete();

            return redirect()->route('expense.index')

            ->with('success','EXPENSE Deleted Successfully.'); 
    }
}
