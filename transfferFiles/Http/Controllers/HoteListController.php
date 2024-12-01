<?php

namespace App\Http\Controllers;


use App\Models\Hotellist;
use App\Models\Hotelroom;
use Illuminate\Http\Request;


class HoteListController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $hotels = Hotellist::All();
        return view('admin.hotels.index',['hotels'=>$hotels]) ;  

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.hotels.create') ;  
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

            'Hotel_Code' => 'required',
            'bdc_id' => 'nullable',
            'Giata_id' => 'nullable',
            'provider_id' => 'nullable',
            'Hotel_Name' => 'required',
            'Latitude' => 'nullable',
            'Longitude' => 'nullable',
            'Address' => 'nullable',
            'City' => 'nullable',
            'Zip_Code' => 'nullable',
            'Email' => 'nullable',
            'Country' => 'nullable',
            'Country_Code' => 'nullable',
            'provider' => 'required'
        ]);
    
        Hotellist::create($request->all());
     
        return redirect()->route('hotellist.index')
                        ->with('success','Hotel created successfully.');  
                      }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($HotelCode)
    {

        $hotel = Hotellist::where('Hotel_Code',$HotelCode)->first();
        $rooms = Hotelroom::where('Hotel_Code',$HotelCode)->get();
        return view('admin.hotels.hotelrooms.index',compact('rooms','hotel'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Hotellist $hotellist)
    {
        //dd($hotellist);
        return view('admin.hotels.edit',compact('hotellist'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Hotellist $hotellist)
    {
        $request->validate([
            'Hotel_Code' => 'nullable',
            'bdc_id' => 'nullable',
            'Giata_id' => 'nullable',
            'provider_id' => 'nullable',
            'Hotel_Name' => 'required',
            'Latitude' => 'nullable',
            'Longitude' => 'nullable',
            'Address' => 'nullable',
            'City' => 'nullable',
            'Zip_Code' => 'nullable',
            'Email' => 'nullable',
            'Country' => 'nullable',
            'Country_Code' => 'nullable',
            'provider' => 'required',
            
        ]);
    
        $hotellist->update($request->all());
    
        return redirect()->route('hotellist.index')
                        ->with('success','Hotel updated successfully');
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
}
