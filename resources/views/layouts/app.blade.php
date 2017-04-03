<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'Laravel') }}</title>
    <!-- Styles -->
    <link href="{{elixir('/css/app.css')}}" rel="stylesheet">
    <link rel="stylesheet" href="/css/source/semantic.min.css">
    <link rel="stylesheet" href="/css/source/font-awesome.min.css">
    <link rel="stylesheet" href="/css/index.css">
    <link rel="stylesheet" href="/css/question.css">
    <link rel="stylesheet" href="/css/notify.css">
    @yield("header-css")

<!-- Scripts -->
    <script>
        window.Laravel = <?php echo json_encode([
            'csrfToken' => csrf_token(),
        ]); ?>;
        Laravel.apiToken = "{{Auth::check()?'Bearer '.Auth::user()->api_token:'Bearer '}}";
        @if(Auth::check())
            window.Zhihu = {
            name: "{{Auth::user()->name}}",
            avatar: "{{Auth::user()->avatar}}"
        }
        @endif
    </script>
</head>
<body>
<div id="app">
    <nav class="navbar navbar-inverse navbar-static-top">
        <div class="container">
            <div class="navbar-header">
                <!-- Branding Image -->
                <a class="navbar-brand" href="{{ url('/') }}">
                    {{ config('app.name', 'Laravel') }}
                </a>
            </div>

            <div class="collapse navbar-collapse" id="app-navbar-collapse">
                <!-- Left Side Of Navbar -->
                <ul class="nav navbar-nav">
                    <li><a class="nav-link-title" href="/">首页</a></li>
                </ul>


                <ul class="nav navbar-nav navbar-right">

                    <li class="ask-question"><a class="ui button blue" href="/questions/create"><i class="fa fa-paint-brush fa-icon-lg"></i>写问题</a></li>
                    <!-- Authentication Links -->
                    @if (Auth::guest())
                        <li><a href="{{ url('/login') }}">登 录</a></li>
                        <li><a href="{{ url('/register') }}">注 册</a></li>
                    @else
                        <li><a href="{{url('/messages')}}" class="user-notify-bell"><i class="fa fa-bell"></i></a></li>

                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button"
                               aria-expanded="false">
                                {{ Auth::user()->name }} <span class="caret"></span>
                            </a>

                            <ul class="dropdown-menu" role="menu">
                                <li>
                                    <a href="#">我的帖子</a>
                                </li>
                                <li>
                                    <a href="#">我的回答</a>
                                </li>
                                <li>
                                    <a href="/avatar">修改头像</a>
                                </li>
                                <li>
                                    <a href="/password">修改密码</a>
                                </li>
                                <li role="separator" class="divider"></li>
                                <li>
                                    <a href="{{ url('/logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        退出登录
                                    </a>

                                    <form id="logout-form" action="{{ url('/logout') }}" method="POST"
                                          style="display: none;">
                                        {{ csrf_field() }}
                                    </form>
                                </li>
                            </ul>
                        </li>
                    @endif
                </ul>
            </div>
        </div>
    </nav>
    <div class="container">
        @if (session()->has('flash_notification.message'))
            <div class="alert alert-{{ session('flash_notification.level') }}">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>

                {!! session('flash_notification.message') !!}
            </div>
        @endif
    </div>
    @yield('content')
</div>

<!-- Scripts -->
<script src="{{elixir('/js/app.js')}}"></script>

<script>
    $('#flash-overlay-modal').modal();
</script>
<!-- 配置文件 -->
<script type="text/javascript" src="{{ asset('vendor/ueditor/ueditor.config.js') }}"></script>
<!-- 编辑器源码文件 -->
<script type="text/javascript" src="{{ asset('vendor/ueditor/ueditor.all.js') }}"></script>
<script>
    window.UEDITOR_CONFIG.serverUrl = '{{ config('ueditor.route.name') }}'
</script>

@yield('js')

</body>
</html>
