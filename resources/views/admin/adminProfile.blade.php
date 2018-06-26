<!DOCTYPE html>
<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Admin Profile</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/admin.css"/>

    <style>
        table {
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
            </form>
        </ul>
    </div>
</nav>

<div class="sidenav">

    <div id="" style="">
        <img src="img/logo.png" class="logo" style="width: 180px; height: 180px; top: 10px">
    </div>
    <br>
    <br>

    <a href="{{route('adminpage')}}">Home</a>
    <a href="/maincat/create">Add Main Category</a>
    <a href="/wastes/create">Add Sub Category</a>
    <a href="{{route('addnews')}}">Add News</a>
    <a href="{{route('addnews')}}">View Users</a>
    <a href="{{route('addnews')}}">View Buyers</a>
    <a href="{{route('viewsellers')}}">View Sellers</a>
</div>


<div class="main">

    <br>
    <br>

    <div id="page-wrapper">

        <div class="row">
            <div class="col-lg-12">

                <ol class="breadcrumb">
                    <li class="active"><i class="fa fa-user"></i> Admin Profile</li>
                </ol>

                <div class="row" style="text-align: center;">
                    <div class="col-md-3"></div>
                    <div class="col-md-6" style="margin: auto; display: block;">
                        <div class="thumbnail">
                            <img src="#"
                                 style="width: 200px; height: 200px; margin: auto; display: block; margin-top: 40px;"><br>
                            <table class="table">
                                <tbody>
                                <tr>
                                    <td><i class="fa fa-user-circle-o" aria-hidden="true"></i>Full Name</td>
                                    <td>Admin</td>
                                </tr>
                                <tr>
                                    <td><i class="fa fa-envelope-o" aria-hidden="true"></i>Email</td>
                                    <td>admin@gmail.com</td>
                                </tr>
                                <tr>
                                    <td><i class="fa fa-phone" aria-hidden="true"></i> Details</td>
                                    <td>admin</td>
                                </tr>
                                </tbody>
                            </table>
                            <a href="#" class="btn btn-primary submit" role="button" name="update">Update
                                Profile</a><br>
                            <a href="{{route('adminpage')}}" class="btn btn-link">Back to Home</a>

                        </div>
                    </div>
                </div>
                <div class="col-md-3"></div>
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
