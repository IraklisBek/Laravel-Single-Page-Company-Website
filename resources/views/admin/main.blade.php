<!DOCTYPE html>
<html lang="en">
<head>
    @include('admin.partials._head')
</head>

<body>
    @yield('previews')
    <div id="wrapper">
        @include('admin.partials._nav')


        <div class="page-wrapper">
            @include('admin.partials._messages')
        </div>
        <div id="page-wrapper">
            @include('admin.partials._header')
            @yield('content')
        </div>
        <div><br><br><br><br></div>
        @include('admin.partials._scripts')

        @yield('scripts')
    </div>
    <!-- /#wrapper -->
</body>

</html>
