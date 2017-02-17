<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Order;
use App\Client;
use PDF;
use Event;
use App\Events\NewOrder;


use \Datetime;
class OrderController extends Controller
{

    // STUTES=['new','onServe','served'];
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $date=date( 'Y-m-d 0:0:0');
        $ordesrInProgress= Order::with('Client')->where('orderStutes','new')->get();
            //   $ordesrInProgress=Order::where('orderStutes','new');
              $ordersFinishedToday=Order::with('Client')->whereNotIn('orderStutes',['new'])->where('created_at',$date);

          return view('orders',compact(['ordesrInProgress','ordersFinishedToday']));
    }



//get all  orders includes soft delete
    public function getOrdersFromDeletedAndNot($state)
    {
        
        Order::withTrashed()->where('id','>',1)->get();
    }


//get all  orders which soft delete
    public function ordersReport(Request $request)
    {


     
  $fromDate=DateTime::createFromFormat('d/m/Y',$request->from)->format('Y-m-d 00:00:00');
    $toDate=DateTime::createFromFormat('d/m/Y',$request->to)->format('Y-m-d 00:00:00');
        $stutes=$request->stutes;



        if($stutes==='all'){
   $reportOrders=Order::with('Client')->where('created_at','>',$fromDate)->where('created_at','<',$toDate)
          ->get();
        }else{
   $reportOrders=Order::with('Client')->where('created_at','>',$fromDate)->where('created_at','<',$toDate)
        ->where('orderStutes',$stutes)->get();
        }
     

        
        //  $reportOrders=Order::with('Client')->where('id',1)->get();
                //  view()->share('reportOrders',$reportOrders);
  $from=$request->from;
  $to=$request->to;
$date=date( 'd-m-Y H:i:s');
 if($request->has('download')){
     
        //    $pdf = PDF::loadView('ordersReportsview', $reportOrders)->setPaper('A4', 'landscape');
        //     return $pdf->stream();
      
            return view('ordersReportsview',compact( ['reportOrders','from','to','stutes','date']));

        }
return view('ordersReportsview',compact( ['reportOrders']));
      
    }

//get view
    public function reports(Request $request)
    {
   

     return view('ordersReports');
    }
//get all  orders which soft delete
    public function getOrdersFromDeletedOnly($state)
    {
        
        Order::onlyTrashed()->where('id','>',1)->get();
    }

    public function getOrderByStutes($state)
    {
        // Order::where('orderStutes',$state);
        //         Order::where('id','>',1);
        //         Order::where('id','>',1)->Order::where('orderStutes',$state);

        Order::where('orderStutes',$state)->orderBy('id','Desc')->take(1)->get() ;

            return view('orders');
    }


   public function getClientOrders(Request $request){
//               if ($result->first()) { } 
// if (!$result->isEmpty()) { }
// if ($result->count()) { }
// if (count($result)) { }
           $mobile=$request->mobile;
            
//  $client=Client::where('mobile',$mobile)->get();
// $orders=Order::where('client',$client->id)->take(10)->get();
$orders = Client::where('mobile',$mobile)->first()->orders()->take(10)->get();
// $orders = Client::find(1)->orders()->first();


// $orders = Order::with(['Client' => function ($query) {
//     $query->where('mobile',1222);
// }])->take(10)->get();

return response()->json($orders);
            // $orders=Order::where('orderStutes',$state)->orderBy('onDate','Desc')->take(10)->get();
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

        $filename='';
              $destinationPath = 'uploads';

if ($request->hasFile('file')) {
          $file = $request->file('file');
    //    $filename=$file->getClientOriginalName();
     $filename=  uniqid('herafie_');

              $file->move($destinationPath, $filename);
        return response()
            ->json([
    'filesucess' => 'true',
    'name'=>$filename
]);
}


         $client=Client::where('mobile',$request->clientMobil)->get();

  //Move Uploaded File

     $order=new Order;
        $order->client=$client[0]->id;
        $order->adressText=$request->adressText;
        $order->adressLong=$request->adressLong;
        $order->adressAlti=$request->adressLat;
        $order->mainServiceType=$request->mainServceType;
        $order->placeType=$request->placetype;
        $order->serviceType=$request->serviceType;
        $order->onDate=date( 'Y-m-d H:i:s',strtotime($request->onDate));
        $order->onTime =$request->onTime;
        $order->textDescription=$request->descriptionText;
        $order->fileDescription=$request->descriptionFile;

        

                $order->save();
// Event::fire(new NewOrder($order::with('Client')));

        //  Order::create($request->all());
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
        $order=Order::find($id);
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
    public function update(Request $request)
    {
        $stutes='';
   if($request->served==='true'){
   $stutes='served';
   }else if($request->serving==='true'){
   $stutes='serving';

   }
        // $newSates=$request->orderStutes;

        //

        // $order=Order::find($id);
        // $order->client='';
        //  $order->adressText='';
        //  $order->save();
        // Order::where('id',$id)->where('name','fd00')->update(['orderStutes'=>$orderStutes]);
                Order::where('id',$request->id)->update(['orderStutes'=>$stutes]);

                return response()->json([
                    'done'=>'true'
                ]);

    }

    

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
                // $order=Order::find($id);
        // $order->client='';
        //  $order->adressText='';
        //  $order->delete();
        //


        // Order::where('id',$id)->where('name','fd00')->delete();

// more than one
        // Order::destroy($id,10);

        Order::destroy($id);
    }
}
