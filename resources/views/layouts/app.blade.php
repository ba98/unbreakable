<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Styles -->
    <link rel="stylesheet" href="{{asset('css/app.css')}}">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <script type="text/javascript" src="{{ URL::asset('js/typed.js') }}"></script>
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.37/js/bootstrap-datetimepicker.min.js"></script>

    {{-- Char Counter --}}
    <script type="text/javascript" src="{{ URL::asset('js/character-counter.js') }}"></script>
    <script src="https://code.jquery.com/jquery-1.12.4.min.js" integrity="sha384-nvAa0+6Qg9clwYCGGPpDQLVpLNn0fRaROjHqs13t4Ggj3Ez50XnGQqc/r8MhnRDZ" crossorigin="anonymous"></script>

    <!-- Font Awesome -->
    <script src="https://kit.fontawesome.com/77a1bfd10a.js" crossorigin="anonymous"></script>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Luckiest+Guy&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Gotu&display=swap" rel="stylesheet">


    {{-- DateTime picker Bootstrap 4 --}}
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.22.2/moment.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/tempusdominus-bootstrap-4/5.0.1/js/tempusdominus-bootstrap-4.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/tempusdominus-bootstrap-4/5.0.1/css/tempusdominus-bootstrap-4.min.css" />

    <title>{{config('app.name', 'Unbreakable')}}</title>
</head>
<style>
    html,body
    {
        width: 100%;
        height: 100%;
        margin: 0px;
        padding: 0px;
        overflow-x: hidden;
    }
    body{
        background: linear-gradient(110deg, #4c648c 60%, #ababab 60%);
        /* background-image:
        linear-gradient(90deg, #ababab, #4c648c),
        repeating-linear-gradient(-45deg, #7cd4cf, #7cd4cf 1.5px, #49c8c1 2px, #49c8c1 4px); */
    }

    /* error messages style */
    .errmessage{
        margin-top: 50px;
        text-align:center;
        position: fixed;
        width: 100%;
        top: 4px;
        z-index: 300;
    }

    .text-primary{
        color: #ababab !important;
    }
    /* footer */
    .site-footer hr
    {
      border-top-color:#bbb;
      opacity:0.5
    }
    .site-footer hr.small
    {
      margin:20px 0
    }
    .site-footer h6
    {
      color:#fff;
      font-size:16px;
      text-transform:uppercase;
      margin-top:5px;
      letter-spacing:2px
    }
    .site-footer a
    {
      color:#737373;
    }
    .site-footer a:hover
    {
      color:#3366cc;
      text-decoration:none;
    }
    .footer-links
    {
      padding-left:0;
      list-style:none
    }
    .footer-links li
    {
      display:block
    }
    .footer-links a
    {
      color:#737373
    }
    .footer-links a:active,.footer-links a:focus,.footer-links a:hover
    {
      color:#3366cc;
      text-decoration:none;
    }
    .footer-links.inline li
    {
      display:inline-block
    }
    .site-footer .social-icons
    {
      text-align:right
    }
    .site-footer .social-icons a
    {
      width:40px;
      height:40px;
      line-height:40px;
      margin-left:6px;
      margin-right:0;
      border-radius:100%;
      background-color:#33353d
    }
    .copyright-text
    {
      margin:0
    }
    @media (max-width:991px)
    {
      .site-footer [class^=col-]
      {
        margin-bottom:30px
      }
    }
    @media (max-width:767px)
    {
      .site-footer
      {
        padding-bottom:0
      }
      .site-footer .copyright-text,.site-footer .social-icons
      {
        text-align:center
      }
    }
    .social-icons
    {
      padding-left:0;
      margin-bottom:0;
      list-style:none
    }
    .social-icons li
    {
      display:inline-block;
      margin-bottom:4px
    }
    .social-icons li.title
    {
      margin-right:15px;
      text-transform:uppercase;
      color:#96a2b2;
      font-weight:700;
      font-size:13px
    }
    .social-icons a{
      background-color:#eceeef;
      color:#818a91;
      font-size:16px;
      display:inline-block;
      line-height:44px;
      width:44px;
      height:44px;
      text-align:center;
      margin-right:8px;
      border-radius:100%;
      -webkit-transition:all .2s linear;
      -o-transition:all .2s linear;
      transition:all .2s linear
    }
    .social-icons a:active,.social-icons a:focus,.social-icons a:hover
    {
      color:#fff;
      background-color:#29aafe
    }
    .social-icons.size-sm a
    {
      line-height:34px;
      height:34px;
      width:34px;
      font-size:14px
    }
    .social-icons a.facebook:hover
    {
      background-color:#3b5998
    }
    .social-icons a.twitter:hover
    {
      background-color:#00aced
    }
    .social-icons a.linkedin:hover
    {
      background-color:#007bb6
    }
    .social-icons a.dribbble:hover
    {
      background-color:#ea4c89
    }
    @media (max-width:767px)
    {
      .social-icons li.title
      {
        display:block;
        margin-right:0;
        font-weight:600
      }
    }
    /* end of footer style */

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
#login-container .profile-img {
  height: 100px;
  width: 100px;
  background-size: cover;
  object-fit: cover;
  background-position: center;
  position: absolute;
  top: -25px;
  left: -25px;
  border-radius: 50%;
  box-shadow: 5px 5px 10px rgba(0, 0, 0, 0.5);
}
#login-container h2 {
  text-align: center;
  margin-bottom: 30px;
  color: #4c648c;
}
#login-container .description {
  margin-bottom: 20px;
}
#login-container .social {
  display: flex;
  justify-content: space-between;
  align-items: center;
  width: calc(100% - 40px);
  margin: 0 auto;
}
#login-container .social a {
  text-align: center;
  border: solid 2px #ff6b6c;
  width: 75px;
  padding: 5px 0;
  border-radius: 5px;
}
#login-container .social a:hover {
  background: #ff6b6c;
  color: white;
  cursor: pointer;
}
#login-container button {
  width: 40%;
  height: 40px;
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
#login-container button:hover {
  box-shadow: 5px 5px 5px rgba(0, 0, 0, 0.5);
  transform: translateY(2px);
  -webkit-animation: gradientBG 1.5s ease-in-out forwards;
  animation: gradientBG 1.5s ease-in-out forwards;
  cursor: pointer;
}
#login-container button:active {
  box-shadow: 3px 3px 3px rgba(0, 0, 0, 0.5);
  transform: translateY(4px);
}
#login-container footer {
  display: flex;
  justify-content: space-between;
  align-items: center;
  background: #4c648c;
  color: white;
  width: 100%;
  position: absolute;
  bottom: 0;
  /* height: 30px; */
  padding: 0 20px;
  margin-left: -20px;
  border-bottom-left-radius: 5px;
  border-bottom-right-radius: 5px;
}
#login-container footer div {
  display: flex;
}
#login-container footer div .fa-heart {
  color: #ff6b6c;
}
#login-container footer div p:first-child {
  margin-right: 10px;
  border-right: 4px solid white;
  padding-right: 10px;
}
@-webkit-keyframes gradientBG {
  0% {
    background-position: 0% 50%;
  }
  100% {
    background-position: 100% 50%;
  }
}
@keyframes gradientBG {
  0% {
    background-position: 0% 50%;
  }
  100% {
    background-position: 100% 50%;
  }
}
/* End of discussion card */
.desButton{
  width: 20%;
  height: 40px;
  margin-top: 5px;
  color: #ffffff;
  border: none;
  box-shadow: 5px 5px 10px rgba(0, 0, 0, 0.5);
  border-radius: 5px;
  background: linear-gradient(45deg, #ababab, #4c648c, #4c648c, #ababab);
  background-size: 300% 300%;
  outline: none;
  transition: all 200ms ease-in-out;
}

#memberImage{
        border-radius: 10px;
        box-shadow: 5px 5px 10px rgba(0, 0, 0, 0.5);
        object-fit: cover;
        width: 150px;
        height: 150px;
    }
</style>
<script src="//cdnjs.cloudflare.com/ajax/libs/timepicker/1.3.5/jquery.timepicker.min.js"></script>
<body>
<div style="position:relative;">
    <main>
        @include('inc.navbar')
        <div>
            @include('inc.messages')
        </div>
        @yield('content')
    </main>
</div>
</body>
<script>
    var typed = new Typed('.typed-words', {
    strings: ["Share your moments at the gym", "Get to know your gym mates", "Interact with their daily training moments", "Get the latest news about the gym", "And many more..."],
    typeSpeed: 40,
    backSpeed: 20,
    backDelay: 3000,
    startDelay: 2000,
    loop: true,
    showCursor: true
    });
</script>
<script>
    $(document).ready(function () {

    $('#sidebarCollapse').on('click', function () {
        $('#sidebar').toggleClass('active');
    });

    });
</script>
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
<script type="text/javascript">
    function preview_image(){
        var total_file=document.getElementById("image").files.length;
            for(var i=0;i<total_file;i++){
                $('#image_preview').append("<img id='previmg' src='"+URL.createObjectURL(event.target.files[i])+"'>");
            }
    }
</script>
</html>
