<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Ratings;
use App\Client;

class ratingsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
               $date=date( 'Y-m-d 0:0:0');

        $ratings=Ratings::with('Client')->where('created_at',$date);


          return view('ratings',compact(['ratings']));
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
        //
         $client=Client::where('mobile',$request->client)->get();

$rate=new Ratings();
         $rate->client= $client[0]->id;
     $rate->appRate=$request->appRate;
            $rate->agentRate=$request->agentRate;
             $rate->techRate=$request->techRate;
             $rate->notes=$request->notes;

        $rate->save();
   
        return response()
            ->json([
    'sucess' => 'true'
]);
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
    public function destroy($id)
    {
        //
    }
}
