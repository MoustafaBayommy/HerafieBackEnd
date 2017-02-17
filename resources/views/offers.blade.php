       @extends('layouts.main')
    
       @section('headerTitle')

          <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navigation-example-2">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="#">Offers</a>
                </div>
@stop

       @section('content')




  <div class="content">
      <div class="panel-group" id="accordion">
  <div class="panel panel-default">
    <div class="panel-heading">
      <h4 class="panel-title">
        <a data-toggle="collapse" data-parent="#accordion" href="#collapse1">
        Add New Offer</a>
      </h4>
    </div>
    <div id="collapse1" class="panel-collapse collapse in">
      <div class="panel-body">
        
                               
                            <form action="/offers/addOffer" method="post">
  <div class="form-group">
    <label for="formGroupExampleInput">Offer Title</label>
    <input type="text" class="form-control" id="formGroupExampleInput" placeholder="Example input">
  </div>
  <div class="form-group">
    <label for="formGroupExampleInput2">Offer Details</label>
  <textarea class="form-control" rows="5" id="comment"></textarea>
  </div>
                                   <div class="form-group row">
      <div class="offset-sm-2 col-sm-10">
        <button type="submit" class="btn btn-primary">Sign in</button>
      </div>
    </div>
</form>
        </div>
    </div>
  </div>
  <div class="panel panel-default">
    <div class="panel-heading">
      <h4 class="panel-title">
        <a data-toggle="collapse" data-parent="#accordion" href="#collapse2">
        All Offers</a>
      </h4>
    </div>
    <div id="collapse2" class="panel-collapse collapse">
      <div class="panel-body">
         <div class="col-md-12">
                        <div class="card">
                            <div class="header">
                                <h4 class="title">Orders In Progress</h4>
                                <p class="category">Here is a subtitle for this table</p>
                            </div>
                            <div class="content table-responsive table-full-width">
                                <table class="table table-hover table-striped">
                                    <thead>
                                        <th>Title</th>
                                    	<th>Description</th>
                                       <th>Action</th>
                                    </thead>
                                    <tbody>  
@foreach ($offers as $offer)


                                        <tr>
                                        	<td>{{ $offer->name }}</td>
                                          <td>{{ $offer->offerDescription}}</td>
                                            <td>
        <button class="btn btn-primary btn-sm" data-toggle="modal" data-target="#exampleModal" data-whatever="@mdo" >Edit</button>
        <button class="btn btn-danger btn-sm">Delete</button>
      </td>
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
          
   
          
        </div>
      
<!--
      <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal" data-whatever="@mdo">Open modal for @mdo</button>
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal" data-whatever="@fat">Open modal for @fat</button>
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal" data-whatever="@getbootstrap">Open modal for @getbootstrap</button>
-->

       
                
      
      
      <script>
                  $(document).ready(function(){

          $('#exampleModal').on('show.bs.modal', function (event) {
  var button = $(event.relatedTarget) // Button that triggered the modal
  var recipient = button.data('whatever') // Extract info from data-* attributes
  // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
  // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
  var modal = $(this)
  modal.find('.modal-title').text('New message to ' + recipient)
  modal.find('.modal-body input').val(recipient);
//              alert('selected');
})
//          
//
      $(".modalbtn").click(function(){
alert('selected');
                    $("#modalform input[type=text],textarea").prop('disabled',true);

             var $this = $(this);
  $this.button('loading');
    setTimeout(function() {
       $this.button('reset');
        $('#exampleModal').modal('hide');
                              displayDone();

   }, 8000);
          });
                      
        function sendData(){              
                      
        var myKeyVals = { A1984 : 1, A9873 : 5, A1674 : 2, A8724 : 1, A3574 : 3, A1165 : 5 }



var saveData = $.ajax({
      type: 'POST',
      url: "someaction.do?action=saveData",
      data: myKeyVals,
      dataType: "text",
      success: function(resultData) {
          
          alert("Save Complete") 
      
      }
});
saveData.error(function() { alert("Something went wrong"); });  

        }            
                      
                  });
          
          
          function displayDone(){
    $("#done").fadeIn("2000");
                  $("#done").fadeOut(500);
              

          }
          
      </script>
@stop
      
      
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">New message</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form id="modalform">
          <div class="form-group">
            <label for="recipient-name" class="form-control-label">Recipient:</label>
            <input type="text" class="form-control" id="recipient-name">
          </div>
          <div class="form-group">
            <label for="message-text" class="form-control-label">Message:</label>
            <textarea class="form-control" id="message-text"></textarea>
          </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn modalbtn btn-primary" id="load" data-loading-text="<i class='fa fa-spinner fa-spin '></i> Processing Order">Send message</button>
      </div>
    </div>
  </div>
</div>
      
      
      <div id ="done" style="   margin: 25%;margin-left:40%; display:none;
 position: absolute;font-size: 1500%;z-index: 10000;width: 100%;height: 100%;" >
<i class="pe-7s-like2"></i> 
 
      </div>
      
      @section('script')
<script type="text/javascript">

setactiveOption('offers');

	</script>
      @stop