<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Client;
class ClientsController extends Controller
{
    

 function _construct(){
//  $this->middleware('cors');
 }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {
                   return view('clients');

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


    //  $client=new Client();
    //   $client->email=$request->title;
      //and so on
    //   $client.save();

        Client::create($request->all());
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


    public function isClientExist(Request $request,Response $response){
     $client=Client::where('mobile',$request['mobile'])->first();

$response->content_type='text/json';


if ( !is_null($client) ) {
//   App::abort(404);

 return response()->json([
    'isClient' => 'true'
]);
            }else{
 return response()->json([
    'isClient' => 'false'
]);           
 }
    }

    
}
