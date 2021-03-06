       @extends('layouts.main')
            <link href="{{ asset('assets/css/custom.bootstrap.css')}}'" rel="stylesheet" />

       @section('headerTitle')

          <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navigation-example-2">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="#">Ratings Today</a>
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
                                <h4 class="title">Herafie Ratings</h4>
                                <!--<p class="category">Here is a subtitle for this table</p>-->
                            </div>
                            <div class="content table-responsive table-full-width">
                                <table class="table table-hover table-striped">
                                    <thead>
                                        <th>ID</th>
                                    	<th>client</th>
                                        <th>App Rate</th>
                                    	<th>Delectate Rate</th>
                                    	<th>Tech Rate</th>
                                    	<th>Notes</th>
                                        <th>Date/Time</th>
                                    </thead>
                                    <tbody>
                                    
                                    @foreach ($ratings as $rate)
<script>
index++;
</script>
                                        <tr>
                                            <td>{{$loop->index}}</td>
                                             <td>{{$rate->client->mobile}}</td>
                                            <td>{{$rate->appRate}}</td>
                                            <td>{{$rate->agentRate}}</td>
                                            <td>{{$rate->techRate}}</td>
                                            <td>{{$rate->notes}}</td>
                                            <td>{{$rate->created_at}}</td>

           
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
          
        @stop

     

@section('script')
      <script src="https://js.pusher.com/3.2/pusher.js"></script>

<script type="text/javascript">

setactiveOption('ratings');




    Pusher.logToConsole = true;

    var pusher = new Pusher("{{ env('PUSHER_KEY') }}", { cluster: 'MT1' }
);
  var channel = pusher.subscribe('newRateChannel');
 var eventName="App\\Events\\NewRate";
    channel.bind(eventName,  function(data) {
        console.log(data.rate);
        var title="new Rate";
        var body="you have new rate from client "+data.Client.mobile;
        var link='';
        var id;
                // addNotification('dhjfhdsf','fdsdfsdf','#SAfasf','ff');
       
index++;


var rate=data.rate;
var newRow='<tr class="new">'
        +'<td>'+index+'</td>'
        +'<td>'+data.Client.mobile+'</td>'
        +'<td>'+rate.appRate+'</td>'
        +'<td>'+rate.agentRate+'</td>'
        +'<td>'+rate.techRate+'</td>'
        +'<td>'+rate.notes+'</td>'
        +'<td>'+rate.created_at+'</td>'
        +'</tr>';
$('#newOrdersTableBody').append(newRow)
 var title='new Order';
        var body='new order from client : '+data.order.client.mobile;
        var link;
        var id=data.order.id;
                addNotification(title,body,link,id);

  });

  $('.notifications li').click(function(){
    $('.new').removeClass('new');
removeNotification(0);
  });
//     channel.bind('pusher:subscription_succeeded', function(data) {
//       alert(data.message);
//   });

	</script>

     
     @stop


   

