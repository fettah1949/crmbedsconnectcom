<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Agencycontact;

class AgencysController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $agencys = Agencycontact::All();
        return view('admin.agencys.index',['agencys'=>$agencys]) ;  
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.agencys.create') ;  
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

            'Agency_ID' => 'required',
            'VAT_ID' => 'nullable',
            'Agency_Name' => 'nullable',
            'First_Name' => 'nullable',
            'Last_Name' => 'nullable',
            'Email' => 'nullable',
            'Email2' => 'nullable',
            'Email3' => 'nullable',
            'Phone' => 'nullable',
            'Mobile' => 'nullable',
            'Emergency_Phone' => 'nullable',
            'Payment_Terms' => 'nullable',
            'Billing_Address' => 'nullable',
            'Billing_City' => 'nullable',
            'Billing_State' => 'nullable',
            'Billing_Country' => 'nullable',
            'ZIP_code' => 'nullable',
            'Booking_Manager' => 'nullable',
            'Booking_Manager_email' => 'nullable',
            'Booking_Manager_Phone' => 'nullable',
            'Support_Email' => 'nullable',
            'Support_Email_2' => 'nullable',
            'Support_Email_3' => 'nullable',
            'Support_Email_4' => 'nullable',
            'Financial_Manager' => 'nullable',
            'Financial_Manager_email' => 'nullable',
            'Financial_Manager_email2' => 'nullable',
            'Financial_Manager_email3' => 'nullable',
            'Financial_Manager_email4' => 'nullable',
            'Financial_Manager_Phone' => 'nullable',
            'Notes' => 'nullable',
            'Contact_Type' => 'required',
        ]);
    
        Agencycontact::create($request->all());
     
        return redirect()->route('agencylist.index')
                        ->with('success','Agency created successfully.');  
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
    public function edit($agency_id)
    {
        $agencys = Agencycontact::where('id',$agency_id)->first();

        //dd($agencys);
        return view('admin.agencys.edit',compact('agencys'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $agency_id)
    {
        $agencys = Agencycontact::where('id',$agency_id)->first();
        
        $request->validate([
            'Agency_ID' => 'nullable',
            'VAT_ID' => 'nullable',
            'Agency_Name' => 'nullable',
            'First_Name' => 'nullable',
            'Last_Name' => 'nullable',
            'Email' => 'nullable',
            'Email2' => 'nullable',
            'Email3' => 'nullable',
            'Phone' => 'nullable',
            'Mobile' => 'nullable',
            'Emergency_Phone' => 'nullable',
            'Payment_Terms' => 'nullable',
            'Billing_Address' => 'nullable',
            'Billing_City' => 'nullable',
            'Billing_State' => 'nullable',
            'Billing_Country' => 'nullable',
            'ZIP_code' => 'nullable',
            'Booking_Manager' => 'nullable',
            'Booking_Manager_email' => 'nullable',
            'Booking_Manager_Phone' => 'nullable',
            'Support_Email' => 'nullable',
            'Support_Email_2' => 'nullable',
            'Support_Email_3' => 'nullable',
            'Support_Email_4' => 'nullable',
            'Financial_Manager' => 'nullable',
            'Financial_Manager_email' => 'nullable',
            'Financial_Manager_email2' => 'nullable',
            'Financial_Manager_email3' => 'nullable',
            'Financial_Manager_email4' => 'nullable',
            'Financial_Manager_Phone' => 'nullable',
            'Notes' => 'nullable',
            'Contact_Type' => 'required',
        ]);
    
        $agencys->update($request->all());
    
        return redirect()->route('agencylist.index')
                        ->with('success','Agency updated successfully');    }

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
}
