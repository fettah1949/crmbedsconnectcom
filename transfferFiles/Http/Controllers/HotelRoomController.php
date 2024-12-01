<?php

namespace App\Http\Controllers;

use App\Models\Hotellist;
use App\Models\Hotelroom;
use Illuminate\Http\Request;

class HotelRoomController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $rooms = Hotelroom::All();
        return view('admin.hotels.hotelrooms.index',['rooms'=>$rooms]) ;  

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.hotels.hotelrooms.create') ;  
    }

    public function createH($HotelCode)
    {
        $hotel = Hotellist::where('Hotel_Code',$HotelCode)->first();
        //dd($hotel);

         return view('admin.hotels.hotelrooms.create',['hotel'=>$hotel]) ;  

     
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

            'Room_Id' => 'nullable',
            'Room_Name' => 'nullable',
            'Hotel_Name' => 'nullable',
            'Hotel_Code' => 'nullable'
        ]);
    
        Hotelroom::create($request->all());
     
        return redirect()->route('hotelrooms.index')
                        ->with('success','Room created successfully.');  
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
    public function edit($room_id)
    {
        $rooms = Hotelroom::where('id',$room_id)->first();

        return view('admin.hotels.hotelrooms.edit',compact('rooms'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $room_id)
    {
        $rooms = Hotelroom::where('id',$room_id)->first();

        $request->validate([
            'Room_Id' => 'nullable',
            'Room_Name' => 'nullable',
            'Hotel_Name' => 'nullable',
            'Hotel_Code' => 'nullable',
        ]);
        
    
        $rooms->update($request->all());
    
        return redirect()->route('hotelrooms.index')
                        ->with('success','Room updated successfully');
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
