<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BookingFormController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
        $data = $id;
        return view ('Room/BookingForm')->with('data',$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        DB::table('forms')->insert([
            'Name' => $request->Name, 
            'Email' => $request->Email, 
            'Address' => $request->Address, 
            'PhoneNumber' => $request->PhoneNumber, 
            'TypeOfRoom' => $request->Room, 
            'CheckIn' => $request->CheckIn, 
            'CheckOut' => $request->CheckOut, 
            'PaymentMethod' => $request->PaymentMethod, 
                    
            ]
        );
        return redirect('BookingReview');
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
    // public function edit($id)
    // {
    //     //
    // }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    // public function update(Request $request, $id)
    // {
    //     //
    // }

    public function edit($ID){

        $forms = DB::table('forms')->where('IDCustomer',$ID)->get();
        // passing data pegawai yang didapat ke view edit.blade.php
        return view('room/editform',['forms' => $forms]);
 
    }

    
    public function update(Request $request)
    {
    // dd($request->id);
    DB::table('forms')->where('IDCustomer',$request->id)->update([
        'Name' => $request->Name, 
        'Email' => $request->Email, 
        'Address' => $request->Address, 
        'PhoneNumber' => $request->PhoneNumber, 
        'CheckIn' => $request->CheckIn, 
        'CheckOut' => $request->CheckOut, 
        'PaymentMethod' => $request->PaymentMethod,            
    ]);
    
	return redirect('/BookingReview');
}

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    
    public function delete($ID)
    {
	// menghapus data pegawai berdasarkan id yang dipilih
	DB::table('forms')->where('IDCustomer',$ID)->delete();
		
	// alihkan halaman ke halaman pegawai
	return redirect('/BookingReview');
    }


}
