<!doctype html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>ADMIN</title>
  <meta name="description" content="Sufee Admin - HTML5 Admin Template">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <link rel="apple-touch-icon" href="apple-icon.png">
  <link rel="shortcut icon" href="favicon.ico">
  <link rel="stylesheet" href="/assets/css/normalize.css">
  <link rel="stylesheet" href="/assets/css/bootstrap.min.css">
  <link rel="stylesheet" href="/assets/css/font-awesome.min.css">
  <link rel="stylesheet" href="/assets/css/themify-icons.css">
  <link rel="stylesheet" href="/assets/css/flag-icon.min.css">
  <link rel="stylesheet" href="/assets/css/cs-skin-elastic.css">
  <link rel="stylesheet" href="/assets/css/bootstrap-select.less">
  <link rel="stylesheet" href="/assets/scss/style.css">
  <link href="/assets/css/lib/vector-map/jqvmap.min.css" rel="stylesheet">
  <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,600,700,800' rel='stylesheet' type='text/css'>
</head>
<body>
  @include('admin.layouts.left_sidebar')
  <div id="right-panel" class="right-panel">
    @include('admin.layouts.header')
    @yield('content')
  </div>
    <script src="/assets/js/vendor/jquery-2.1.4.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js"></script>
    <script src="/assets/js/plugins.js"></script>
    <script src="/assets/js/main.js"></script>

    <script>
      var $ = jQuery.noConflict();
      $.ajaxSetup({
        headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
      });
    </script>
    @yield('script')
</body>
</html>
