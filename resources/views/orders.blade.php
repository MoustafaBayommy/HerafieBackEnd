       @extends('layouts.main')
            <link href="{{ asset('../resources/assets/css/custom.bootstrap.css') }}" rel="stylesheet" />

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

       @section('content')


  <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="header">
                                <h4 class="title">Orders In Progress</h4>
                                <p class="category">Here is a subtitle for this table</p>
                            </div>
                            <div class="content table-responsive table-full-width">
                                <table class="table table-hover table-striped">
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
                                    <tbody>
                                    
                                    @foreach ($ordesrInProgress as $order)

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
                                        	<td>{{$order->fileDescription}}</td>
                                             <td>{{$order->created_at}}</td>
                                            <td>
        <button class="btn btn-primary btn-sm" data-toggle="modal" data-target="#changeOrdeStutes" data-order="{{$order->id}}">
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
                                <p class="category">Here is a subtitle for this table</p>
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
                                    <tbody>
                                 @foreach ($ordersFinishedToday as $order)

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
                                        	<td>{{$order->fileDescription}}</td>
                                             <td>{{$order->created_at}}</td>
                                            <td>{{$order->orderStutes}}</td>
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
  id = button.data('order') ;// Extract info from data-* attributes
  // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
  // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
//   var modal = $(this)
//   modal.find('.modal-title').text('New message to ' + recipient)
//   modal.find('.modal-body input').val(recipient);
//              alert('selected');
})
//          
//
      $(".modalbtn").click(function(){
                    $("#modalform input[type=text],textarea").prop('disabled',true);

             var $this = $(this);
  $this.button('loading');

      var mydata= { 'id' :id, 'served' : $('#served').prop("checked"),'serving' :$('#serving').prop("checked")};

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
            window.location.reload(true);


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
        var title;
        var body;
        var link;
        var id;
                addNotification('dhjfhdsf','fdsdfsdf','#SAfasf','ff');

  });
//     channel.bind('pusher:subscription_succeeded', function(data) {
//       alert(data.message);
//   });

	</script>

     @stop