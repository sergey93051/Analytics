<!DOCTYPE html>
<html lang="en">

<head>
    @stack('header')
    <title>
        @yield('title')
    </title>
    @include('admin.layouts.headerApp')
</head>

<body class="g-sidenav-show  bg-gray-100">

    @include('admin.inc.loader.loader')
    @yield('content')

    @include('admin.inc.plugin')

    @include('admin.layouts.scriptApp')
    @stack('js')

</body>

</html>
