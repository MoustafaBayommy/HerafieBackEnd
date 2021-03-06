<!doctype html>
<html lang="en">
<head>
	<meta charset="utf-8" />
<link rel="icon" type="image/png" href="assets/img/favicon.ico">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

	<meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
    <meta name="viewport" content="width=device-width" />
	<title>Herafie</title>
           @extends('layouts.styles')
 <script type="text/javascript" src="{{ URL::asset('assets/js/jquery-1.10.2.js') }}"></script>


	    <script>
        window.Laravel = <?php echo json_encode([
            'csrfToken' => csrf_token(),
        ]); ?>
    </script>
</head>
<body>
    
<div class="wrapper">
    <div class="sidebar" data-color="purple" data-image="assets/img/sidebar-5.jpg">

    <!--

        Tip 1: you can change the color of the sidebar using: data-color="blue | azure | green | orange | red | purple"
        Tip 2: you can also add an image using data-image tag

    -->

    	<div class="sidebar-wrapper">
            <div class="logo">
                <a href="http://www.creative-tim.com" class="simple-text">
                  Herafie
                </a>
            </div>

            <ul class="nav">
<!--
                <li class="active">
                    <a href="orders">
                        <i class="pe-7s-graph"></i>
                        <p>Orders</p>
                    </a>
                </li>
-->
                <li class="orders">
                    <a href="orders">
                        <i class="pe-7s-note2"></i>
                        <p>Orders</p>
                    </a>
                </li>
                    <li class="ordersreports">
                    <a href="ordersreports">
                        <i class="pe-7s-graph1"></i>
                        <p>Reports</p>
                    </a>
                </li>
                    <li class="clients">
                    <a href="clients">
                        <i class="pe-7s-user"></i>
                        <p>Clients</p>
                    </a>
                </li>
                <li class="offers">
                    <a href="offers">
                        <i class="pe-7s-magic-wand"></i>
                        <p>Offers</p>
                    </a>
                </li>
                <li class="ratings">
                    <a href="ratings">
                        <i class="pe-7s-star"></i>
                        <p>Ratings</p>
                    </a>
                </li>
                <!--<li>
                    <a href="icons.html">
                        <i class="pe-7s-science"></i>
                        <p>reports</p>
                    </a>
                </li>-->
            
                <!--<li>
                    <a href="notifications.html">
                        <i class="pe-7s-bell"></i>
                        <p>Notifications</p>
                    </a>
                </li>-->
			      <!--<li>
                    <a href="user.html">
                        <i class="pe-7s-user"></i>
                        <p>User Profile</p>
                    </a>
                </li>-->
            </ul>
    	</div>
    </div>

    <div class="main-panel">
        <nav class="navbar navbar-default navbar-fixed">
            <div class="container-fluid">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navigation-example-2">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <!--<a class="navbar-brand" href="orders">Orders</a>-->
                </div>
                <div class="collapse navbar-collapse">
                    <ul class="nav navbar-nav navbar-left">
                        <li>
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                <i class="fa fa-dashboard"></i>
                            </a>
                        </li>
             @yield('notification')
                        <li>
                           <a href="">
                                <i class="fa fa-search"></i>
                            </a>
                        </li>
                    </ul>

                    <ul class="nav navbar-nav navbar-right">
                        <!--<li>
                           <a href="">
                               Account
                            </a>
                        </li>
                        <li class="dropdown">
                              <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                    Dropdown
                                    <b class="caret"></b>
                              </a>
                              <ul class="dropdown-menu">
                                <li><a href="#">Action</a></li>
                                <li><a href="#">Another action</a></li>
                                <li><a href="#">Something</a></li>
                                <li><a href="#">Another action</a></li>
                                <li><a href="#">Something</a></li>
                                <li class="divider"></li>
                                <li><a href="#">Separated link</a></li>
                              </ul>
                        </li>-->
                         <li>
                                        <a href="{{ url('/logout') }}"
                                            onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                            Logout
                                        </a>

                                        <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
                                            {{ csrf_field() }}
                                        </form>
                                    </li>
                    </ul>
                </div>
            </div>
        </nav>
                @yield('content')


        <!--<footer class="footer">
            <div class="container-fluid">
                <nav class="pull-left">
                    <ul>
                        <li>
                            <a href="#">
                                Home
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                Company
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                Portfolio
                            </a>
                        </li>
                        <li>
                            <a href="#">
                               Blog
                            </a>
                        </li>
                    </ul>
                </nav>
                <p class="copyright pull-right">
                    &copy; 2016 <a href="http://www.creative-tim.com">Creative Tim</a>, made with love for a better web
                </p>
            </div>
        </footer>-->

    </div>
</div>


</body>
    


    <!--   Core JS Files   -->
     <script type="text/javascript" src="{{ URL::asset('assets/js/bootstrap.min.js') }}"></script>
 <script type="text/javascript" src="{{ URL::asset('assets/js/bootstrap-checkbox-radio-switch.js') }}"></script>
 <script type="text/javascript" src="{{ URL::asset('assets/js/chartist.min.js') }}"></script>
 <script type="text/javascript" src="{{ URL::asset('assets/js/bootstrap-notify.js') }}"></script>
 <script type="text/javascript" src="{{ URL::asset('assets/js/light-bootstrap-dashboard.js') }}"></script>




	<!-- Light Bootstrap Table DEMO methods, don't include it in your project! -->
<!--	<script src="assets/js/demo.js"></script>-->

<!--
	<script type="text/javascript">
    	$(document).ready(function(){

        	demo.initChartist();

        	$.notify({
            	icon: 'pe-7s-gift',
            	message: "Welcome to <b>Light Bootstrap Dashboard</b> - a beautiful freebie for every web developer."

            },{
                type: 'info',
                timer: 4000
            });

    	});
	</script>
-->
    
    <script>

    var numeroFnOTIFICATIONS=0;
        function setactiveOption(className){
   
         $('.active').removeClass('active');
        $('.'+className).addClass('active');
    
        }

        // addNotification('dhjfhdsf','fdsdfsdf','#SAfasf','ff');

        function addNotification(title,body,link,id){
            var notification='<li id='+id+'><a '
                +'href='+link+'>'
               +'<div>'+title+'</div>'
               +'<div>'+body+'</div></a></li>';
$(".notifications").append(notification);
numeroFnOTIFICATIONS++;
$(".numberOfNot").html(numeroFnOTIFICATIONS);
        }

        function   removeNotification(id){
// $("#'+id+'").remove();
// numeroFnOTIFICATIONS--;
// $(".numberOfNot").html(numeroFnOTIFICATIONS);
$(".numberOfNot").html(0);
$(".notifications").html('');
        }
    </script>

                    @yield('script')


</html>
