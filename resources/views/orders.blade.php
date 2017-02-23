       @extends('layouts.main')
            <link href="{{ asset('assets/css/custom.bootstrap.css') }}" rel="stylesheet" />

       @section('headerTitle')

          <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navigation-example-2">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="#">Orders</a>
                </div>
@stop
       @section('notification')

           <li class="dropdown">
                              <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                    <i class="fa fa-globe"></i>
                                    <b class="caret"></b>
                                    <span class="notification numberOfNot">0</span>
                              </a>
                              <ul class="dropdown-menu notifications">
                                <!--<li id="notificationId"><a href="#">Notification 1</a></li>-->
                              </ul>
                        </li>
                        @stop

       @section('content')



<script>
var index=-1;
</script>
  <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="header">
                                <h4 class="title">Orders In Progress</h4>
                                <p class="category">Here is a Orders In Progress/p>
                            </div>
                            <div class="content table-responsive table-full-width">
                                <!--<table class="table table-hover table-striped" >-->
                                <table class="table table-hover table-striped" >

                                    <thead>
                                        <th>ID</th>
                                    	<th>Client</th>
                                    	<th>Adress</th>
                                    	<th>Main Service</th>
                                    	<th>Service Type</th>
                                        <th>Place Type</th>
                                        <th>On Date</th>
                                        <th>On Time</th>
                                        <th>Description</th>
                                        <th>Attached File</th>
                                        <th>Order Time</th>
                                        <th>stutes</th>


                                    </thead>
                                    <tbody id="newOrdersTableBody" >
                                    
                                    @foreach ($ordesrInProgress as $order)

<script>
index++;
</script>
                                        <tr>
                                            <td>{{$loop->index}}</td>
                                            <td>{{$order->Client->mobile}}</td>
                                        	<td>{{$order->adressText}}</td>
                                            <td>{{$order->mainServiceType}}</td>
                                        	<td>{{$order->serviceType}}</td>
                                            <td>{{$order->placeType}}</td>
                                        	<td>{{$order->onDate}}</td>
                                        	<td>{{$order->onTime}}</td>
                                            <td>{{$order->textDescription}}</td>
@if ($order->fileDescription=='')
  <td>No File</td>
@else
  <td><a href="{{ asset('uploads')}}/{{$order->fileDescription}}" target="_blank">  
      {{str_limit($order->fileDescription, $limit = 7, $end = '...')}}</a>
  </td>
@endif                                             <td>{{$order->created_at}}</td>
                                            <td>
        <button class="btn btn-primary btn-sm" data-toggle="modal" data-target="#changeOrdeStutes" data-order="{{$order->id}}" data-stutes="{{$order->orderStutes}}">
        @if ($order->orderStutes==='new')
    I New
@elseif ($order->orderStutes==='serving')
    Serving
@endif
</button>
                                          
                                            </td>
                                        </tr>
                                        @endforeach

                                    </tbody>
                                </table>

                            </div>
                        </div>
                    </div>


                    <div class="col-md-12">


                        <div class="card card-plain">
                            <div class="header">
                                <h4 class="title">Finished Orders Today</h4>
                                <p class="category">Here is a Finished Orders Today</p>
                            </div>
                            <div class="content table-responsive table-full-width">
                                <table class="table table-hover">
                                    <thead>
                                       <th>ID</th>
                                    	<th>Client</th>
                                    	<th>Adress</th>
                                    	<th>Main Service</th>
                                    	<th>Service Type</th>
                                        <th>Place Type</th>
                                        <th>On Date</th>
                                        <th>On Time</th>
                                        <th>Description</th>
                                        <th>Attached File</th>
                                        <th>Order Time</th>
                                    </thead>
                                    <tbody  style="background-color: #c2f392;">
                                 @foreach ($ordersFinishedToday as $orderfi)

                                        <tr>
                                            <td>{{$loop->index}}</td>
                                            <td>{{$orderfi->Client->mobile}}</td>
                                        	<td>{{$orderfi->adressText}}</td>
                                            <td>{{$orderfi->mainServiceType}}</td>
                                        	<td>{{$orderfi->serviceType}}</td>
                                            <td>{{$orderfi->placeType}}</td>
                                        	<td>{{$orderfi->onDate}}</td>
                                        	<td>{{$orderfi->onTime}}</td>
                                            <td>{{$orderfi->textDescription}}</td>
@if ($orderfi->fileDescription=='')
  <td>No File</td>

@else
  <td><a href="{{ asset('uploads')}}/{{$orderfi->fileDescription}}" target="_blank">  {{$orderfi->fileDescription}}</a>
  </td>
@endif 

                                             <td>{{$orderfi->created_at}}</td>
                                            <td>{{$orderfi->orderStutes}}</td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>

                            </div>
                        </div>
                    </div>
<div class="col-md-12">


                        <div class="card card-plain">
                            <div class="header">
                                <h4 class="title">Rejected Orders Today</h4>
                                <p class="category">Here is a Rejected Orders For Today</p>
                            </div>
                            <div class="content table-responsive table-full-width">
                                <table class="table table-hover">
                                    <thead>
                                       <th>ID</th>
                                    	<th>Client</th>
                                    	<th>Adress</th>
                                    	<th>Main Service</th>
                                    	<th>Service Type</th>
                                        <th>Place Type</th>
                                        <th>On Date</th>
                                        <th>On Time</th>
                                        <th>Description</th>
                                        <th>Reject Reason</th>
                                        <th>Order Time</th>
                                    </thead>
                                    <tbody style="    background-color: #f392a4;">
                                 @foreach ($ordersRejectedToday as $orderfi)

                                        <tr>
                                            <td>{{$loop->index}}</td>
                                            <td>{{$orderfi->Client->mobile}}</td>
                                        	<td>{{$orderfi->adressText}}</td>
                                            <td>{{$orderfi->mainServiceType}}</td>
                                        	<td>{{$orderfi->serviceType}}</td>
                                            <td>{{$orderfi->placeType}}</td>
                                        	<td>{{$orderfi->onDate}}</td>
                                        	<td>{{$orderfi->onTime}}</td>
                                            <td>{{$orderfi->textDescription}}</td>
                                        	<td>{{$orderfi->note}}</td>
                                             <td>{{$orderfi->created_at}}</td>
                                            <td>{{$orderfi->orderStutes}}</td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>

                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>





      <script>

  var id;
                  $(document).ready(function(){
          $('#changeOrdeStutes').on('show.bs.modal', function (event) {
  var button = $(event.relatedTarget); // Button that triggered the modal
  id = button.data('order') ;
  stutes= button.data('stutes'); 
alert(stutes);
// if(stutes==='served'){
    $('.custom-control-input').prop("checked", false);
  $('#'+stutes).prop("checked", true)
    //   var mydata= { 'id' :id, 'served' : $('#served').prop("checked"),'serving' :$('#serving').prop("checked"),'rejected' :$('#rejected').prop("checked"),'note':$('#note').val()};

})
//          
//

$('.custom-control-input').change(function(){
if($('#rejected').prop("checked")){
    $(".rejectreason").fadeIn(1000);
}else{
    $(".rejectreason").fadeOut(1000);


}
}) ;
      $(".modalbtn").click(function(){
                    $("#modalform input[type=text],textarea").prop('disabled',true);

             var $this = $(this);
  $this.button('loading');

      var mydata= { 'id' :id, 'served' : $('#served').prop("checked"),'serving' :$('#serving').prop("checked"),'rejected' :$('#rejected').prop("checked"),'note':$('#note').val()};

console.log(mydata);

var saveData = $.ajax({
      type: 'POST',
      url: "api/orders/ChangeStutes",
      data: mydata,
      dataType: "text",
      success: function(resultData) {
            $this.button('reset');
        $('#changeOrdeStutes').modal('hide');
                              displayDone();
      
      },error:function(err) {
    console.log(err);

 }
});


// saveData.error(function(err) {
//     console.log(err);
//     //  alert("Something we nt wrong");

//  });              
                      
});
     
  
          });
                      
                      


                  
         
          
          function displayDone(){
                 setTimeout(function() {
         location.reload();



 }, 10000);
    $("#done").fadeIn("4000");
                  $("#done").fadeOut(6000);
              

          }
          
      </script>

@stop

<div class="modal fade" id="changeOrdeStutes" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Change Order Stutes</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form id="modalform">
          <div class="form-group">
<div class="custom-controls-stacked">
  <label class="custom-control custom-radio">
    <input id="serving" name="radio-stacked" type="radio" class="custom-control-input">
    <span class="custom-control-indicator"></span>
    <span class="custom-control-description" style="color:blue;">Serving</span>
  </label>
  <label class="custom-control custom-radio">
    <input id="served" name="radio-stacked" type="radio" class="custom-control-input">
    <span class="custom-control-indicator"></span>
    <span class="custom-control-description" style="color:green;">Served</span>
  </label>
    <label class="custom-control custom-radio">
    <input id="rejected" name="radio-stacked" type="radio" class="custom-control-input">
    <span class="custom-control-indicator"></span>
    <span class="custom-control-description" style="color:red;">rejected</span>
  </label>
</div>

<div class="form-group rejectreason" style="display:none;">
  <label for="note">reason:</label>
  <textarea class="form-control" rows="5" id="note"></textarea>
</div>
          </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">cancel</button>
        <button type="button" class="btn modalbtn btn-primary" id="load" data-loading-text="<i class='fa fa-spinner fa-spin '></i> Processing Order">Change Stutes</button>
      </div>
    </div>
  </div>
</div>
      
      
      <div id ="done" style="   margin: 25%;margin-left:40%; display:none;
 position: absolute;font-size: 1500%;z-index: 10000;width: 100%;height: 100%;" >
<i class="pe-7s-like2"></i> 
 
      </div>

     

@section('script')
      <script src="https://js.pusher.com/3.2/pusher.js"></script>

<script type="text/javascript">

setactiveOption('orders');

    Pusher.logToConsole = true;

    var pusher = new Pusher("{{ env('PUSHER_KEY') }}", { cluster: 'MT1' }
);
  var channel = pusher.subscribe('newOrderChannel');
 var eventName="App\\Events\\NewOrder";
    channel.bind(eventName,  function(data) {
        console.log(data.order);
       
index++;

var order=data.order;
var newRow='<tr class="new">'
        +'<td>'+index+'</td>'
        +'<td>'+data.client.mobile+'</td>'
        +'<td>'+order.adressText+'</td>'
        +'<td>'+order.mainServiceType+'</td>'
        +'<td>'+order.serviceType+'</td>'
        +'<td>'+order.placeType+'</td>'
        +'<td>'+order.onDate+'</td>'
        +'<td>'+order.onTime+'</td>'
        +'<td>'+order.textDescription+'</td>'
        +'<td>'+order.fileDescription+'</td>'
        +'<td>'+order.created_at+'</td>'
        +'<td>'
        +'<button class="btn btn-primary btn-sm" data-toggle="modal" data-target="#changeOrdeStutes" '
        +'data-order="'+order.id+'">'
        +' New'
        +'</button>'
        +'</td>'
        +'</tr>';
$('#newOrdersTableBody').append(newRow)
 var title='new Order';
        var body='new order from client : '+data.order.client.mobile;
        var link="";
        var id=data.order.id;
                addNotification(title,body,link,id);

  });

  $('.notifications li').click(function(){
      alert('index '+index);
    $('.new').removeClass('new');
removeNotification(0);
  });
//     channel.bind('pusher:subscription_succeeded', function(data) {
//       alert(data.message);
//   });

	</script>

     @stop