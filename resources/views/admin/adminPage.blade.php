<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Admin Dashboard</title>
<link rel="stylesheet" href="css/bootstrap.min.css">
<link rel="stylesheet" href="css/admin.css" />

        <style>
          main{
            font-size: 16px;
          }
        </style>

</head>


<body>

<nav class="navbar navbar-fixed-top navbar-inverse">
      <div class="container-fluid">
        <div class="navbar-header">
            <a class="navbar-brand" href="#">E-Waste Management</a>
        </div>
          <ul class="nav navbar-nav navbar-right">
      
           <li><a href="{{route('adminProfile')}}">Profile</a></li>
           <li><a class="dropdown-item" href="{{ route('logout') }}"
                  onclick="event.preventDefault();
                   document.getElementById('logout-form').submit();">
                   {{ __('Logout') }}
               </a></li>
              <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                  @csrf
              </form></li>
          </ul>
      </div>
  </nav>  

<div class="sidenav">

  <div id="" style="">
    <img src="img/logo.png" class="logo" style="width: 180px; height: 180px; top: 10px" >
  </div>
  <br>
  <br>

  <a href="/admin">Home</a>
    <a href="/maincat/create">Add Main Category</a>
    <a href="/wastes/create">Add Sub Category</a>
  <a href="/addnews">Add News</a>
  <a href="/addnews">View Users</a>
  <a href="/addnews">View Buyers</a>
    <a href="{{route('viewsellers')}}">View Sellers</a>
</div>


<div class="main">

  <br>
  <br>

 

<div class="container">
            <div class="col-sm-12">

                <div class="bs-calltoaction bs-calltoaction-default">
                    <div class="row">
                        <div class="col-md-9 cta-contents">
                            <h1 class="cta-title">E-waste disposal camp</h1>
                            <div class="cta-desc">
                                <p>No amount of post-consumer recycling can recoup the waste generated before consumers purchase their devices</p>
                               
                            </div>
                        </div>
                        <div class="col-md-3 cta-button">
                            <a href="#" class="btn btn-lg btn-block btn-default">View!</a>
                        </div>
                     </div>
                </div>

                <div class="bs-calltoaction bs-calltoaction-primary">
                    <div class="row">
                        <div class="col-md-9 cta-contents">
                            <h1 class="cta-title">Global Warming</h1>
                            <div class="cta-desc">
                                <p>The global volume of e-waste is expected to reach 52.2 million tonne (MT) or 6.8 kg per inhabitant by 2021 from 44.7 MT in 2016 at a compound annual growth rate of 20 per cent.</p>
                               
                            </div>
                        </div>
                        <div class="col-md-3 cta-button">
                            <a href="#" class="btn btn-lg btn-block btn-primary">View!</a>
                        </div>
                     </div>
                </div>

                <div class="bs-calltoaction bs-calltoaction-info">
                    <div class="row">
                        <div class="col-md-9 cta-contents">
                            <h1 class="cta-title">Environmental Day</h1>
                            <div class="cta-desc">
                                <p>The most sustainable phone is the one you already own. But if you're in the market for a new handset, consider choosing one with replaceable parts to avoid having to replace the whole thing again.
                                </p>
                                
                            </div>
                        </div>
                        <div class="col-md-3 cta-button">
                            <a href="#" class="btn btn-lg btn-block btn-info">View!</a>
                        </div>
                     </div>
                </div>

                <div class="bs-calltoaction bs-calltoaction-success">
                    <div class="row">
                        <div class="col-md-9 cta-contents">
                            <h1 class="cta-title">Product Informations</h1>
                            <div class="cta-desc">
                                <p>We want products that last, it's up to manufacturers to provide us with the information we need to buy them.</p>
                                
                            </div>
                        </div>
                        <div class="col-md-3 cta-button">
                            <a href="#" class="btn btn-lg btn-block btn-success">View!</a>
                        </div>
                     </div>
                </div>

                <div class="bs-calltoaction bs-calltoaction-warning">
                    <div class="row">
                        <div class="col-md-9 cta-contents">
                            <h1 class="cta-title">Guide for Recycling</h1>
                            <div class="cta-desc">
                                <p>Design-for-recycling and take-back laws – not just more recycling – are needed to address the sprawling e-waste problem</p>
                                
                            </div>
                        </div>
                        <div class="col-md-3 cta-button">
                            <a href="#" class="btn btn-lg btn-block btn-warning">View!</a>
                        </div>
                     </div>
                </div>

                <div class="bs-calltoaction bs-calltoaction-danger">
                    <div class="row">
                        <div class="col-md-9 cta-contents">
                            <h1 class="cta-title">New Notification</h1>
                            <div class="cta-desc">
                                <p>The need for a solution to e-waste disposal is more urgent than ever.</p>
                                
                            </div>
                        </div>
                        <div class="col-md-3 cta-button">
                            <a href="#" class="btn btn-lg btn-block btn-danger">View!</a>
                        </div>
                     </div>
                </div>

            </div>
        </div>


</div>    

<footer class="footer font-small blue pt-4 mt-4">
 <!-- Copyright -->
  <div class="footer-copyright text-right py-3">© 2018 Copyright:
    <a href="#"> E-Waste Management</a>
  </div>
  <!-- Copyright -->
</footer>

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</body>
</html> 
