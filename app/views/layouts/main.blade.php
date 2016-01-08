<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0"> 
    
    <title>Odot</title>
    
    <!-- EXTERNAL STYLESHEETS -->
    <!-- stylesheets from other sources go here -->
    
    <!-- BOOTSTRAP -- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">

    <!-- BOOTSTRAP -- Optional theme -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap-theme.min.css" integrity="sha384-fLW2N01lMqjakBkx3l/M9EahuwpSfeNvV63J5ezn3uZzapT0u7EYsXMjQV+0En5r" crossorigin="anonymous">
       
    <!-- Google fonts -->
    <link href='https://fonts.googleapis.com/css?family=Cabin:600' rel='stylesheet' type='text/css'>    
    <link href='https://fonts.googleapis.com/css?family=Roboto:400,700,500' rel='stylesheet' type='text/css'>
        
    <!-- custom stylesheets go here -->    
    {{ HTML::style('css/custom.css') }}
    
    
    <!-- END EXTERNAL STYLESHEETS -->
</head>
<body>

    <!-- HEADER-->    
    <div id="header" class="container-fluid">
        <h1>{{ link_to_route('list.index', 'odot') }}</h1>
         
    </div>
    <!-- END HEADER -->

    <!-- CHECK FOR FLASH MESSAGES -->
    @if (Session::has('message'))
        <div class="alert alert-success" role="alert">
            {{{ Session::get('message') }}}
        </div>
    @endif
    <!-- END CHECK FOR FLASH MESSAGES -->
   
    <!-- CUSTOM CONTENT -->
    @yield('content')
    <!-- END CUSTOM CONTENT -->
    
    <!-- FOOTER -->    
    <div id="footer" class="container">
        &copy;Copyright 2016 by <a href="http://www.roypenrod.com" target="_blank">Roy Penrod</a>.  All Rights Reserved.
    </div>
    <!-- END FOOTER -->
    
    <!-- JAVASCRIPT FILES -->
    <!-- libraries go here -->
    <script src="//code.jquery.com/jquery-1.11.3.min.js"></script>

    
    <!-- custom scripts go here -->
    {{ HTML::script('js/app.js') }}
    
    <!-- END JAVASCRIPT FILES -->
</body>    
</html>