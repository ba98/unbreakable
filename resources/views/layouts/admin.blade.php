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

    {{-- DateTime --}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.37/js/bootstrap-datetimepicker.min.js"></script>
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.js"></script>


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
<style>
    /* Discussion card */
    @import url('https://fonts.googleapis.com/css?family=Roboto|Sriracha&display=swap');
* {
  margin: 0;
  padding: 0;
  box-sizing: border-box;
}
#login-container {
  height: 100%;
  width: 100%;
  padding: 20px;
  border-radius: 20px;
  background: #fffffb;
  position: relative;
  box-shadow: 5px 5px 10px rgba(0, 0, 0, 0.5);
}
#login-container h4 {
  text-align: center;
  margin-bottom: 30px;
  color: #4c648c;
}
#login-container .description {
  margin-bottom: 20px;
}
#login-container button {
  width: 110%;
  height: 30px;
  margin-top: 20px;
  color: #ffffff;
  border: none;
  box-shadow: 5px 5px 10px rgba(0, 0, 0, 0.5);
  border-radius: 5px;
  background: linear-gradient(45deg, #ababab, #4c648c, #4c648c, #ababab);
  background-size: 300% 300%;
  outline: none;
  transition: all 200ms ease-in-out;
}
/* End of discussion card */

</style>
<script src="//cdnjs.cloudflare.com/ajax/libs/timepicker/1.3.5/jquery.timepicker.min.js"></script>
<body>
    <div>
        <main>
            @yield('content')
        </main>
    </div>
</body>
<script>
    $('.timepicker').timepicker({
        timeFormat: 'h:mm p',
        interval: 60,
        minTime: '10',
        maxTime: '11:00pm',
        defaultTime: false,
        startTime: '10:00',
        dynamic: false,
        dropdown: true,
        scrollbar: false
    });
</script>
<script>
    $(document).ready(function () {

    $('#sidebarCollapse').on('click', function () {
        $('#sidebar').toggleClass('active');
    });

    });
</script>
</html>
