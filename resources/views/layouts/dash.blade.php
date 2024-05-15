<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <title>Corona Admin</title>

    <link rel="stylesheet" href="{{URL::asset('dashAsset/vendors/mdi/css/materialdesignicons.min.css')}}" />
    <link rel="stylesheet" href="{{URL::asset('dashAsset/vendors/css/vendor.bundle.base.css')}}" />

    <link rel="stylesheet" href="{{URL::asset('dashAsset/vendors/select2/select2.min.css')}}" />
    <link rel="stylesheet" href="{{URL::asset('dashAsset/vendors/select2-bootstrap-theme/select2-bootstrap.min.css')}}" />

    <link rel="stylesheet" href="{{URL::asset('dashAsset/css/style.css')}}" />
    <link rel="shortcut icon" href="{{URL::asset('dashAsset/images/favicon.png')}}" />
</head>

<body>

    <div id="app">
 
        <main>
            @yield('dashcontent')
        </main>
    </div>
    <script src="{{URL::asset('dashAsset/vendors/js/vendor.bundle.base.js')}}"></script>
    <script src="{{URL::asset('dashAsset/vendors/select2/select2.min.js')}}"></script>
    <script src="{{URL::asset('dashAsset/vendors/typeahead.js/typeahead.bundle.min.js')}}"></script>
    <script src="{{URL::asset('dashAsset/js/off-canvas.js')}}"></script>
    <script src="{{URL::asset('dashAsset/js/hoverable-collapse.js')}}"></script>
    <script src="{{URL::asset('dashAsset/js/misc.js')}}"></script>
    <script src="{{URL::asset('dashAsset/js/settings.js')}}"></script>
    <script src="{{URL::asset('dashAsset/js/todolist.js')}}"></script>
    <script src="{{URL::asset('dashAsset/js/file-upload.js')}}"></script>
    <script src="{{URL::asset('dashAsset/js/typeahead.js')}}"></script>
    <script src="{{URL::asset('dashAsset/js/select2.js')}}"></script>

</body>
</html>