<!DOCTYPE html>
<html lang="en">

<head>
    <base href="./">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <meta name="description" content="CoreUI - Open Source Bootstrap Admin Template">
    <meta name="author" content="Łukasz Holeczek">
    <meta name="keyword" content="Bootstrap,Admin,Template,Open,Source,jQuery,CSS,HTML,RWD,Dashboard">
    <title>Customer Dashboard</title>
    @include('customer.includes.style')
</head>

<body>
   @include('customer.includes.sidebar')
    <div class="wrapper d-flex flex-column min-vh-100">

        @include('customer.includes.header')

        @yield('content')

        @include('customer.includes.footer')
    </div>
   
    @include('customer.includes.script')

</body>

</html>
