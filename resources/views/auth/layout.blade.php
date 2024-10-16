<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Kapella Bootstrap Admin Dashboard Template</title>
  <!-- base:css -->
  <link rel="stylesheet" href="{{asset('admin/vendors/mdi/css/materialdesignicons.min.css')}}">
  <link rel="stylesheet" href="{{asset('admin/vendors/base/vendor.bundle.base.css')}}">
  <!-- endinject -->
  <!-- plugin css for this page -->
  <!-- End plugin css for this page -->
  <!-- inject:css -->
  <link rel="stylesheet" href="{{asset('admin/css/style.css')}}">
  <!-- endinject -->
  <link rel="shortcut icon" href="{{asset('admin/images/favicon.png')}}" />
</head>

<body>
    @if (Session::has('error'))
        <div class="alert alert-error">
            {{ Session::get('danger') }}
        </div>
    @endif
    @yield('content')

  <!-- container-scroller -->
  <!-- base:js -->
  <script src="{{asset('admin/vendors/base/vendor.bundle.base.js')}}"></script>
  <!-- endinject -->
  <!-- inject:js -->
  <script src="{{asset('admin/js/template.js')}}"></script>
  <!-- endinject -->
</body>

</html>
