<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags-->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="au theme template">
    <meta name="author" content="Hau Nguyen">
    <meta name="keywords" content="au theme template">

    <!-- Title -->
    <title>{{config('app.name', 'Unbreakable')}}</title>

     <!-- Fonts -->
     <link href="https://fonts.googleapis.com/css2?family=Luckiest+Guy&display=swap" rel="stylesheet">
     <link href="https://fonts.googleapis.com/css2?family=Gotu&display=swap" rel="stylesheet">

    {{-- Font Awesome --}}
    <script src="https://kit.fontawesome.com/77a1bfd10a.js" crossorigin="anonymous"></script>

    {{-- CSS --}}
    <link rel="stylesheet" href="{{ asset('css/theme.css') }}">
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">

    {{-- JS --}}
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.js"></script>
    <script type="text/javascript" src="{{ URL::asset('js/main.js') }}"></script>
    <script type="text/javascript" src="{{ URL::asset('js/bootstrap.min.js') }}"></script>
    <script type="text/javascript" src="{{ URL::asset('js/popper.min.js') }}"></script>

</head>


<body>
    <div style="position:relative;">
        <main>
            <div class="">
                @include('inc.messages')
            </div>
            @include('inc.adminNav')
            @include('inc.adminSide')
            @yield('content')
        </main>
    </div>
</body>
<script>
    $(document).ready(function () {

    $('#sidebarCollapse').on('click', function () {
        $('#sidebar').toggleClass('active');
    });

    });
</script>
</html>
