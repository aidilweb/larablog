
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="RepublikWEBID">
    <link rel="shortcut icon" href="{{('/assets/img/favicon.ico')}}" type="image/x-icon">

    <title>Larablog</title>

    <!-- Bootstrap core CSS -->
    <link href="{{('/assets/css/bootstrap.min.css')}}" rel="stylesheet">

    <!-- Add custom CSS here -->
    <link href="{{('/assets/css/admin.css')}}" rel="stylesheet">

    

</head>

<body>

    <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
        <div class="container">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="{{ URL::to('admin/dashboard') }}">Larablog - Dashboard</a>
            </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse navbar-ex1-collapse navbar-right">
                <ul class="nav navbar-nav">
                    <li><a href="{{ URL::to('admin/dashboard') }}"><span class="glyphicon glyphicon-home"></span> Dashboard</a>
                    </li>
                    <li><a href="{{ URL::to('/') }}" target="_blank"><span class="glyphicon glyphicon-eye-open"></span> View Blog</a>
                    </li>
                    <li><a href="{{ URL::to('admin/logout') }}"><span class="glyphicon glyphicon-log-out"></span> Logout</a>
                    </li>
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
    </nav>

    <div class="container">

        <div class="row">

            <div class="col-md-3">
                <div class="list-group">
                    <a href="{{ URL::to('admin/post/create') }}" class="list-group-item"><span class="glyphicon glyphicon-cloud-upload"></span> Publish</a>
                    <a href="{{ URL::to('admin/comment') }}" class="list-group-item"><span class="glyphicon glyphicon-comment"></span> Comments</a>
                    <a href="{{ URL::to('admin/post') }}" class="list-group-item"><span class="glyphicon glyphicon-folder-open"></span> Manage</a>
                    <a href="{{ URL::to('admin/setting') }}" class="list-group-item"><span class="glyphicon glyphicon-cog"></span> Setting</a>
                </div>
            </div>

            <div class="col-md-9">
                @show 
                @yield('content')
            </div>

        </div>

    </div>
    <!-- /.container -->

    <div class="container">

        <hr>

        <footer>
            <div class="row">
                <div class="col-lg-12">
                    <p>Copyright &copy; RepublikWEBID 2014</p>
                </div>
            </div>
        </footer>

    </div>
    <!-- /.container -->

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="{{('/assets/js/jquery-2.0.2.min.js')}}"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="{{('/assets/js/bootstrap.min.js')}}"></script>

    <script src="{{('/assets/ckeditor/ckeditor.js')}}"></script>

</body>

</html>
