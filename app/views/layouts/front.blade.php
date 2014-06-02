
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="RepublikWEBID">
    <link rel="shortcut icon" href="{{('/assets/img/favicon.ico')}}" type="image/x-icon">

    <title>{{$setting->title}} - {{$setting->slogan}}</title>

    <!-- Bootstrap core CSS -->
    <link href="{{('/assets/css/bootstrap.min.css')}}" rel="stylesheet">

    <!-- Add custom CSS here -->
    <link href="{{('/assets/css/front.css')}}" rel="stylesheet">

    

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
                <a class="navbar-brand" href="{{ URL::to('admin/dashboard') }}">{{$setting->title}} - {{$setting->slogan}}</a>
            </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse navbar-ex1-collapse navbar-right">
                <ul class="nav navbar-nav">
                    <li><a href="{{ URL::to('/') }}"><span class="glyphicon glyphicon-home"></span> Home</a>
                    </li>
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
                <p class="lead">Kategori</p>
                <div class="list-group">
                    @foreach($category as $key => $value)
                    <a href="{{ URL::to('kategori') }}/{{$value->id}}" class="list-group-item"><span class="glyphicon glyphicon-th-list"></span> {{$value->name}}</a>
                    @endforeach
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
                    <p>{{$setting->footer}}</p>
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
