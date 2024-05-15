

    <!doctype html>
    <html lang="en">
    <head>
    <meta name="csrf-token" content="{{ csrf_token() }}">

      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
      <meta name="author" content="Untree.co">
      <link rel="shortcut icon" href="{{URL::asset('favicon.png')}}">
    
      <meta name="description" content="" />
      <meta name="keywords" content="bootstrap, bootstrap4" />
    
            <!-- Bootstrap CSS -->
            <link href="{{URL::asset('css/bootstrap.min.css')}}" rel="stylesheet">
            <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
            <link href="{{URL::asset('css/tiny-slider.css')}}" rel="stylesheet">
            <link href="{{URL::asset('css/style.css')}}" rel="stylesheet">
            <title>Furni </title>
        </head>
    
        <body>




    <div id="app">
    
        <main>
            @yield('content')
        </main>
    </div>
</body>
</html>
