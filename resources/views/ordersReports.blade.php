       @extends('layouts.main')
    
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
<style>
   .ui-datepicker .ui-datepicker-header { position: relative;
    padding: .2em 0;
   background: #a5a19d;}
</style>

  <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card" style=" padding: 15px 15px 100px 15px;">
                            <div class="header">
                                <h4 class="title">Orders Reports</h4>
                                <p class="category">Select Date and Stutes</p>

<form  > 

  <div class="form-group"     margin-top: 50px;>
    <label for="formGroupExampleInput2">From Date</label>
    <input type="text" class="form-control"  id = "datepicker-from" placeholder="Another input">
  </div>
    <div class="form-group">
    <label for="formGroupExampleInput2">To Date</label>
    <input type="text" class="form-control"  id = "datepicker-to" placeholder="Another input">
  </div>

            <div class="form-group">
<div class="custom-controls-stacked"  style="text-align: center;" >
  <label class="custom-control custom-radio" style="margin-right: 80px" >
  stutes :
</label>
  <label class="custom-control custom-radio" style="margin-right: 20px">
    <input id="all" name="radio-stacked" type="radio" class="custom-control-input" checked>
    <span class="custom-control-indicator"></span>
    <span class="custom-control-description" style="color:black;">all</span>
  </label>
    
<label class="custom-control custom-radio" style="margin-right: 20px">
    <input id="new" name="radio-stacked" type="radio" class="custom-control-input">
    <span class="custom-control-indicator"></span>
    <span class="custom-control-description" style="color:orange;">new</span>
  </label>
    
  <label class="custom-control custom-radio" style="margin-right: 20px">
    <input id="serving" name="radio-stacked" type="radio" class="custom-control-input">
    <span class="custom-control-indicator"></span>
    <span class="custom-control-description" style="color:blue;">Serving</span>
  </label>
    
  <label class="custom-control custom-radio" style="margin-right: 20px">
    <input id="served" name="radio-stacked" type="radio" class="custom-control-input">
    <span class="custom-control-indicator"></span>
    <span class="custom-control-description" style="color:green;">Served</span>
  </label>
  
</div>
          </div>
    <div class="form-group" style="text-align: center;">
     <button type="button" class="btn btn-outline-success" >
                                    <span class="glyphicon glyphicon-star" aria-hidden="true" ></span>report</button>
    </div>
</form>

                            </div>
                            <!--<div class="content table-responsive table-full-width">
                              <iframe src="ordersReportsView" style="width:100%;height:100%;    margin-top: 50px;"></iframe>
                            </div>-->
                        </div>
                    </div>


              


                </div>
            </div>
        </div>

 <script type="text/javascript"
     src="../resources/assets/js/jqueryUi.js">
    </script>
    
<script>
   $(function() {
            $( "#datepicker-from" ).datepicker({
               showWeek:true,
               showAnim: "slide",
             defaultDate: new Date(),
                dateFormat:'dd/mm/yy'
            });
                $( "#datepicker-to" ).datepicker({
               showWeek:true,
               showAnim: "slide",
             defaultDate: new Date(),
                dateFormat:'dd/mm/yy'
            });
       

 
         });
    $('#datepicker-from').val(returndate());
    $('#datepicker-to').val(returndate());


    function returndate() {
    var date = new Date();
    var dd = date.getDate();             
    var mm = date.getMonth() + 1;
    var yyyy = date.getFullYear();

    var ToDate = dd + '/' + mm + '/' + yyyy;
 
        return ToDate;
}
    

       
          $('.btn-outline-success').click(function(){
              
            var fromDate= $( "#datepicker-from" ).val();
            var toDate=$( "#datepicker-to" ).val();
            var stutes='all';

              if($( "#new" ).prop("checked")){
                  stutes='new';
              }else if($( "#served" ).prop("checked")){
                  stutes='served';

              }else if($( "#serving" ).prop("checked")){
                  stutes='serving';

              }else{
                  
              }
        
              
              var url='ordersReportsView?download=pdf&from='+fromDate+'&to='+toDate+'&stutes='+stutes;
              
                 var win = window.open(url, '_blank');
//        var win = window.open("{{ route('ordersReportsView',['download'=>'pdf','from'=>'"+fromDate+"']) }}", '_blank');
  win.focus();
    });
      </script>
@stop
<!--
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
 
      -->