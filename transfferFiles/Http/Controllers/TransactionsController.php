<?php

namespace App\Http\Controllers;

use App\Models\Bank;
use App\Models\Transaction;
use Illuminate\Http\Request;

class TransactionsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $transactions = Transaction::All();
        return view('admin.banks.transactions.index',['transactions'=>$transactions]) ;  
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.banks.transactions.create') ;  
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
///  Transfer ///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
        
            if($request->type === 'TRANSFER'){

                        $request->validate([
                            'type' => 'required',
                            'Bank_id' => 'required',
                            'Reference_Number' => 'required',
                            'Date' => 'required',
                            'Description' => 'nullable',
                            'Amount1' => 'required',
                            'Bank2' => 'required',
                            'Bank2_id' => 'required',
                            'Amount2' => 'nullable'
                        ]);
                        
                                
                        $transaction_bank1 = new Transaction();
                        
                        $transaction_bank1 -> Date = $request -> Date;
                        $transaction_bank1 -> Payee = $request -> Bank2;
                        $transaction_bank1 -> Description = $request -> Description;
                        $transaction_bank1 -> Reference_Number = $request -> Reference_Number;
                        $transaction_bank1 -> Type = $request -> type;
                        $transaction_bank1 -> Bank_id = $request -> Bank_id;
                        $transaction_bank1 -> Debit = $request -> Amount1; 
                        $transaction_bank1 -> Credit = 0;
                        $transaction_bank1->save();
                        

                        
                        $bank1 = Bank::find($request->Bank_id);
                        $bank1 -> Balance = $bank1 -> Balance - $request->Amount1;
                        
                        $bank1_Name = $bank1 -> Nom_du_compte;
                        $bank1 -> save();
                        
                                
                        $transaction_bank2 = new Transaction();
                        
                        $transaction_bank2 -> Date = $request -> Date;
                        $transaction_bank2 -> Payee = $bank1_Name;
                        $transaction_bank2 -> Description = $request -> Description;
                        $transaction_bank2 -> Reference_Number = $request -> Reference_Number;
                        $transaction_bank2 -> Type = $request -> type;
                        $transaction_bank2 -> Bank_id = $request -> Bank2_id;
                        $transaction_bank2 -> Debit = 0; 
                        $transaction_bank2 -> Credit = $request -> Amount2;
                        $transaction_bank2->save();
                        
                        
                        $bank2 = Bank::find($request->Bank2_id);
                        $bank2 -> Balance = $bank2 -> Balance + $request->Amount2;
                        $bank2 -> save();


                        return redirect()->route('bank_transactions',$request->Bank_id)
                                        ->with('success','Transfer Created Successfully.'); 
                        
                                
                    }

///  Transaction ///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
        

            if($request->type === 'TRANSACTION'){
                        
                        $request->validate([
                            'type' => 'required',
                            'Bank_id' => 'required',
                            'Reference_Number' => 'required',
                            'Date' => 'required',
                            'Description' => 'nullable',
                            'transaction_type' => 'required',
                            'Amount' => 'required',
                            'Payee' => 'nullable'
                        ]);
                        

                        $transaction = new Transaction();

                        $transaction -> Date = $request -> Date;
                        $transaction -> Payee = $request -> Payee;
                        $transaction -> Description = $request -> Description;
                        $transaction -> Reference_Number = $request -> Reference_Number;
                        $transaction -> Type = $request -> type;
                        $transaction -> Bank_id = $request -> Bank_id;


                        $bank = Bank::find($request->Bank_id);

                        if($request->transaction_type === 'CREDIT'){
                            
                            $bank->Balance = $bank->Balance + $request->Amount;

                            $transaction -> Debit = 0; 
                            $transaction -> Credit = $request -> Amount;

                        }elseif($request->transaction_type === 'DEBIT'){
                            
                            $bank->Balance = $bank->Balance - $request->Amount;

                            $transaction -> Debit = $request -> Amount; 
                            $transaction -> Credit = 0;
                        }
                        
                        $bank->save();

                        $transaction->save();
                        
                    
                        return redirect()->route('bank_transactions',$request->Bank_id)
                                        ->with('success','Transaction Created Successfully.');   
                    }

                       }

       public function editTransactions($bank_id,$transaction_id)
       {
        $bank = Bank::find($bank_id);
        $transaction = Transaction::find($transaction_id);

        return view('admin.banks.transactions.edit',compact('bank','transaction'));
       
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
    public function edit($request)
    {
        
        //$transactions = Transaction::find($transaction_id);
        dd($request);
        
        return view('admin.banks.transactions.edit',compact('transactions'));
        
    }
    
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $transaction_id)
    {

   
        
                $request->validate([
        
                    'Transaction_id' => 'required',
                    'Bank_id' => 'required',
                    'Date' => 'required',
                    'Description' => 'nullable',
                    'transaction_type' => 'required',
                    'Amount' => 'required',
                    'Payee' => 'required'

                                ]);
          


        $transaction = Transaction::find($transaction_id);
        $bank = Bank::find($request->Bank_id);

        
        if($transaction -> Type === "TRANSFER"){
            return redirect()->route('bank_transactions',$request->Bank_id); 
        }

        elseif($transaction -> Type === "TRANSACTION"){
            


            $transaction -> Date = $request -> Date;
            $transaction -> Payee = $request -> Payee;
            $transaction -> Description = $request -> Description;
    
            if($request->transaction_type === "CREDIT"){
    
                $amount_diffrent = $request->Amount - $transaction->Credit;
                $bank->Balance = $bank->Balance + $amount_diffrent;

                $transaction -> Credit = $request -> Amount;

            }  elseif($request->transaction_type === "DEBIT"){
    
                $amount_diffrent = $request->Amount - $transaction->Debit;
                $bank->Balance = $bank->Balance - $amount_diffrent;

                $transaction -> Debit = $request -> Amount ;

            }

            $bank->save();
            $transaction->save();


        }

        $transactions = Transaction::where('Bank_id',$request->Bank_id)->get();

     
        return view('admin.banks.transactions.index',compact('bank','transactions'))
                        ->with('success','Transaction Updated Successfully.');  
                      
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

    public function deleteTransactions($transaction_id)
    {
        $transaction = Transaction::find($transaction_id);
        $bank = Bank::find($transaction->Bank_id);

        if($transaction -> Type === "TRANSFER"){
            
            
            $bank2 = Bank::where('Nom_du_compte' , '=', $transaction->Payee)->first();
                        
            $transaction2 = Transaction::where(['Bank_id' => $bank2->id, 'Reference_Number' => $transaction->Reference_Number])->first();
            
            //bank1 set Balance
            if($transaction->Credit > 0){
                $bank->Balance = $bank->Balance - $transaction->Credit ;

            }elseif($transaction->Debit > 0){
                $bank->Balance = $bank->Balance + $transaction->Debit ;
            }


            //bank2 set Balance
            if($transaction2->Credit > 0){
                $bank2->Balance = $bank2->Balance - $transaction2->Credit ;

            }elseif($transaction2->Debit > 0){
                $bank2->Balance = $bank2->Balance + $transaction2->Debit ;
            }


            $transaction->delete();
            $transaction2->delete();

            $bank->save();
            $bank2->save();

            return redirect()->route('bank_transactions',$transaction->Bank_id)
            ->with('success','Transfer Deleted Successfully.'); 
    

        }

        elseif($transaction -> Type === "TRANSACTION"){
            


        if($transaction->Debit > 0){

            $bank->Balance = $bank->Balance + $transaction->Debit ;
            $bank->save();

        }elseif($transaction->Credit > 0){

            $bank->Balance = $bank->Balance - $transaction->Credit ;
            $bank->save();
        }

        $transaction->delete();

        return redirect()->route('bank_transactions',$transaction->Bank_id)
        ->with('success','Transaction Deleted Successfully.'); 

    }

        
        elseif($transaction -> Type === "EXPENSE"){
            
            $expense = Expense::where('Transaction_id' , '=', $transaction_id)->first();            

            
                $bank->Balance = $bank->Balance + $transaction->Debit ;
                $bank->save();


     
                $transaction->delete();
                $expense->delete();

            return redirect()->route('bank_transactions',$transaction->Bank_id)
            ->with('success','EXPENSE Deleted Successfully.'); 

        }

    }
}
