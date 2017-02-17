       @extends('layouts.main')
            <link href="../resources/assets/css/custom.bootstrap.css" rel="stylesheet" />

       @section('headerTitle')

          <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navigation-example-2">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="#">Clients</a>
                </div>
@stop

       @section('content')

  <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                             <div class="header">
                                <h4 class="title">Herafie Clients</h4>
                                <!--<p class="category">Here is a subtitle for this table</p>-->
                            </div>
                            <div class="content table-responsive table-full-width">
                                <table class="table table-hover table-striped">
                                    <thead>
                                        <th>ID</th>
                                    	<th>Name</th>
                                        <th>Mobile</th>
                                    	<th>Email</th>
                                    	<th>City</th>
                                    	<th>Neighborhood</th>
                                        <th>known From Method</th>
                                        <th>Created at</th>
                                    </thead>
                                    <tbody>
                                    
                                    @foreach ($clients as $client)

                                        <tr>
                                            <td>{{$loop->index}}</td>
                                            <td>{{$client->name}}</td>
                                             <td>{{$client->mobile}}</td>
                                            <td>{{$client->email}}</td>
                                            <td>{{$client->city}}</td>
                                            <td>{{$client->neighborhood}}</td>
                                            <td>{{$client->knownFrom}}</td>
                                            <td>{{$client->created_at}}</td>

           
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
<script type="text/javascript">

setactiveOption('clients');

	</script>

     @stop


   

