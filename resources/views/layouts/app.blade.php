<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" type="image/jpg" href="{{ asset('images/logo/Abizra Kitchen.png') }}"/>
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title')</title>

    <!-- Scripts -->
    <!-- Jquery Ui -->
    <script src="https://kit.fontawesome.com/004f56c338.js" crossorigin="anonymous"></script>
    <!-- Eshop StyleSheet -->
    <link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}">
    @yield('style')
    <style>


        .nav-link{
            font-family: poppins;
            color:black;
        }
        .btn:active,
        .btn:focus,
        .btn:focus:active, .form-control:active,
        .form-control:focus,
        .form-control:focus:active {
            border-color:#64e074;
            background-image: none;
            outline: 0;
            box-shadow: none;
        }
        #dropdownMenuButton1{
            background-color: white;
            border:1px solid white;
        }
        #kotak{
            width: 20px;
            height: 20px;
            transform: rotate(-45deg);
            background-color: white;
            margin-top: -28px;
            margin-left: 140px;
        }

        .dropdown-item:hover{
            background-color: #64e074;
            color: white;
        }
        .btn-success:hover{
            background-color: #50bb5e;
            border-color: #50bb5e;
        }
        .btn{
            background-color: #64e074;
            border-color: #64e074;
        }
        .header-dropdown:hover{
            background-color: white;
            font-size: 10px;
            color: black;
        }
        .header-dropdown{
            background-color: white;
            font-size: 0.64em;
            letter-spacing: 0.1rem;
        }
        .title-dropdown:hover{
            background-color: white;
            color: black;
        }
        #logout{
           color: #dc3545;
        }
        #logout:hover{
            background-color: #dc3545;
            color: white;
        }
        .dropdown-item:active{
            background-color: #64e074;
        }
        #logout:active{
            background-color: #dc3545;
            color: white;
        }
        .nav-link:hover{
           color: #64e074;
        }

    </style>

</head>

<body>
    @if (auth()->check())
        @if (auth()->user()->role == 'admin')

        @else
            @include('layouts.navigation')
        @endif
    @else
        @if (Request::is('register'))

        @else
            @include('layouts.navigation')
        @endif
    @endif
    @yield('content')
    <!-- Jquery -->

    <!-- Popper JS -->
    <script src="{{asset('js/popper.min.js')}}"></script>
    <!-- Bootstrap JS -->
    <script src="{{asset('js/bootstrap.min.js')}}"></script>
    <script src="{{asset('js/bootstrap.bundle.min.js')}}"></script>
    <!-- Color JS -->
    <script src="{{asset('js/colors.js')}}"></script>
    <!-- Slicknav JS -->
    <script src="{{asset('js/slicknav.min.js')}}"></script>
    <!-- Owl Carousel JS -->
    <script src="{{asset('js/owl-carousel.js')}}"></script>
    <!-- Magnific Popup JS -->
    <script src="{{asset('js/magnific-popup.js')}}"></script>
    <!-- Waypoints JS -->
    <script src="{{asset('js/waypoints.min.js')}}"></script>
    <!-- Countdown JS -->
    <script src="{{asset('js/finalcountdown.min.js')}}"></script>
    <!-- Nice Select JS -->
    <script src="{{asset('js/nicesellect.js')}}"></script>
    <!-- Flex Slider JS -->
    <script src="{{asset('js/flex-slider.js')}}"></script>
    <!-- ScrollUp JS -->
    <script src="{{asset('js/scrollup.js')}}"></script>
    <!-- Onepage Nav JS -->
    <script src="{{asset('js/onepage-nav.min.js')}}"></script>
    {{-- Isotope --}}
    <script src="{{asset('js/isotope/isotope.pkgd.min.js')}}"></script>
    <!-- Easing JS -->
    <script src="{{asset('js/easing.js')}}"></script>

    <!-- Active JS -->
    <script src="{{asset('js/active.js')}}"></script>
    <script>
        function showPassword(e){

            let password = document.getElementById('password');
            if(password.type == 'password'){
                password.type = 'text';
            }else{
                password.type = 'password';
            }
        }
    </script>
     <script>
    (function () {
        'use strict'

        // Fetch all the forms we want to apply custom Bootstrap validation styles to
        var forms = document.querySelectorAll('.needs-validation')

        // Loop over them and prevent submission
        Array.prototype.slice.call(forms)
          .forEach(function (form) {
            form.addEventListener('submit', function (event) {
              if (!form.checkValidity()) {
                event.preventDefault()
                event.stopPropagation()
              }

              form.classList.add('was-validated')
            }, false)
          })
      })()
      </script>

</body>

</html>
{{--
                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
onclick="event.preventDefault();
document.getElementById('logout-form').submit();">
{{ __('Logout') }}
</a>

<form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
    @csrf
</form>
</div> --}}
