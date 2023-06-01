<!DOCTYPE html>
<html lang="en">

<head>
    <title>@yield('title')</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="keywords" content="ADIDAS" />
    <meta charset utf="8">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />


    @include('frontend.frontend_layout.body.style')

</head>

<body>
    @include('frontend.frontend_layout.body.header')

    @if (request()->routeIs('home'))
    @else
        @include('frontend.frontend_layout.body.breadcrumb')
    @endif

    @yield('frontend_content')

    <!--  FOOTER  -->
    @include('frontend.frontend_layout.body.footer')

    @include('frontend.frontend_layout.body.script')


   

    <script>
        // function AlertSubcribe() {
        //     Swal.fire({
        //         position: 'top-end',
        //         icon: 'success',
        //         title: '!!',
        //         showConfirmButton: false,
        //         timer: 1500
        //     })
        // }
    </script>
</body>

</html>
