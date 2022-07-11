<!DOCTYPE html>
<html lang="en">
<head>
    @include('layouts.header')
    <title>@yield('title')</title>
</head>
<body>
<style>
    .select2-container {
        z-index: 1000000;
    }

    .hd-required {
        font-weight: bold;
        color: red;
    }
</style>
<div class="main-wrapper">

    <!-- partial:partials/_sidebar.html -->
      @include('layouts.sidebar')
      @include('layouts.settings-sidebar')
    <!-- partial -->

    <div class="page-wrapper">

        <!-- partial:partials/_navbar.html -->
         @include('layouts.navbar')
        <!-- partial -->

        <div class="page-content">

         @yield('content')

        </div>

        <!-- partial:partials/_footer.html -->
          @include('layouts.footer')
        <!-- partial -->

    </div>


</div>

<!-- include all the script  -->
@include('layouts.script')

</body>
</html>
