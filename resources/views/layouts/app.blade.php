
<!doctype html>
 <style>
body{margin:0px;padding:0px;font-family:sans-serif;}
ul{display:flex;justify-content: space-around;list-style:none;margin:0;padding:0;overflow:hidden;box-shadow:0 0 3px;}
ul li{display:inline;font-weight:bold;padding:15px;text-align:center;}
.data{margin:2em;border:1px solid #999;display:flex;justify-content:space-around;}
li a{text-decoration:none;color:#000;}
.content{width:95%;margin:0 auto;display: table-footer-group;}
.box1,.box2{float:left;border:1px solid;padding:0.5em;display:flex;margin:1em;width:320px;height:100px;}
input,select{margin-bottom:5px;padding:5px;width:212px;}
button{background:green;color:#fff;border:0px;border-radius:5px;padding:0.5em 1em;cursor:pointer;}
.right{padding:1em;}
.right p{font-weight:bold;}
</style>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
    <div id="app">
         <div class="menu">
            <ul>
            <img src="/image/logo.jpg" style="width:90px;">
              @guest
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                </li>
                @if (Route::has('register'))
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                    </li>
                @endif
                @else
                <li class="nav-item"><a class="nav-link" href="{{url('/home')}}">Home</a></li>
                <li class="nav-item"><a class="nav-link" href="{{url('api/state')}}">State</a></li>
                <li class="nav-item"><a class="nav-link" href="{{url('api/district')}}">District</a></li>
                <li class="nav-item" ><a class="nav-link" href="{{url('api/childist')}}">Child</a></li>
                <li class="nav-item dropdown" >
                    <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                            {{ __('Logout') }}
                        </a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                
                </li>
            @endguest
            </ul>
        </div>
        <main class="py-4">
            @yield('content')
        </main>
    </div>
</body>
</html>
