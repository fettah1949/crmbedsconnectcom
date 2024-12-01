<?php

namespace App\Http\Controllers;

use App\Models\Bank;
use App\Models\Currency;
use App\Models\Transaction;
use Illuminate\Http\Request;

class BanksController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $banks = Bank::All();
        return view('admin.banks.index',['banks'=>$banks]) ;  

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.banks.create') ;  
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $request->validate([

            'Code_du_compte' => 'required',
            'Nom_du_compte' => 'required',
            'Nom_de_la_banque' => 'required',
            'Devise' => 'required',
            'Numero_de_compte' => 'required',
            'SWIFT' => 'required',
            'Description' => 'nullable',
            'Balance' => 'required'
        ]);
    
        Bank::create($request->all());
     
        return redirect()->route('banks.index')
                        ->with('success','Bank created successfully.');   
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
    public function edit($bank_id)
    {

        $banks = Bank::find($bank_id);
        return view('admin.banks.edit',compact('banks'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$bank_id)
    {
        $banks = Bank::find($bank_id);

        $request->validate([

            'Code_du_compte' => 'required',
            'Nom_du_compte' => 'required',
            'Nom_de_la_banque' => 'required',
            'Devise' => 'required',
            'Numero_de_compte' => 'required',
            'SWIFT' => 'required',
            'Description' => 'nullable',
            'Balance' => 'required'
        ]);
    
        $banks->update($request->all());
     
        return redirect()->route('banks.index')
                        ->with('success','Bank Updated successfully.');  
                      
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    //Transactions   ////////////////////////////////////////////

    public function statistics($transactions){

        // Statistics ///////////////////////////////////////////////////////////////////////////////////////////
        $debit = 0;
        $credit = 0;

        $transaction_count_debit = 0;
        $transaction_count_credit = 0;
        
        
           foreach ($transactions as $transaction) {
               
               if($transaction->Debit > 0){
                $transaction_count_debit = $transaction_count_debit + 1 ;
                $debit = $debit + $transaction->Debit;
            }

            if($transaction->Credit > 0){
                $transaction_count_credit = $transaction_count_credit + 1 ;
                $credit = $credit + $transaction->Credit;
            }

           }
   
        
           
           $total = array(
               'debit' => round($debit, 2) ,
               'credit' => round($credit, 2) ,
               'transaction_count_debit' => $transaction_count_debit ,
               'transaction_count_credit' => $transaction_count_credit 
           );
           
           return $total;
       
        
       
           // End Statistics ///////////////////////////////////////////////////////////////////////////////////////////
       
       }
    
    public function filter(Request $request, $bank_id)
    {
        
        $request->validate([

            'start_date' => 'required',
            'end_date' => 'required'
                ]);

        
        $start_date = $request->input('start_date');
        $end_date = $request->input('end_date');
        
        $bank = Bank::find($bank_id);
        $transactions = Transaction::where('Bank_id',$bank_id)->whereBetween('Date', [$start_date, $end_date])->get();

        $filter = [
            'start_date' => $start_date,
            'end_date' => $end_date,
        ];
        
        $total = BanksController::statistics($transactions);


        return view('admin.banks.transactions',compact('bank','transactions','filter','total'));
    
    }


   
    public function bankTransactions($bank_id)
    {
        $bank = Bank::find($bank_id);
        $transactions = Transaction::where('Bank_id',$bank_id)->get();


        $filter = [
            'start_date' => "",
            'end_date' => "",
        ];
        
        $total = BanksController::statistics($transactions);


        return view('admin.banks.transactions',compact('bank','transactions','filter','total'));
    
    }
    
    public function newTransactions($bank_id,$type)
    {
        $bank = Bank::find($bank_id);
        return view('admin.banks.transactions.create',compact('bank','type'));
    
    }

    
    
    public function currencies()
    {
        $currency = Currency::find(1);
        
        return view('admin.banks.currencies',compact('currency'));
    
    }

      
    public function update_currencies($request)
    {
        $request->validate([

            'EurToUsd' => 'required',
            'EurToMad' => 'required',
            'UsdToMad' => 'required'
        ]);
        $currency = Currency::find(1);

        $currency -> EurToUsd = $request -> EurToUsd ;
        $currency -> EurToMad = $request -> EurToMad ;
        $currency -> UsdToMad = $request -> UsdToMad ;

        $currency -> save();

        return redirect()->route('banks.index')
                        ->with('success','Currencies Updated successfully.');       
    }

    
}
