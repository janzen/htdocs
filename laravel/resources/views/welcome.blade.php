<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta name="robots" content="noindex, nofollow">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>禾描-实木定制</title>
        <meta name=”keywords” content=“禾描|实木定制|实木家具定制|实木衣柜定制|实木直拼|实木平拼|实木榻榻米定制|环保|白橡|黑胡桃|木蜡油”>
        <meta name=”description” content=“禾描|实木定制|实木家具定制|实木衣柜定制|实木直拼|实木平拼|实木榻榻米定制|环保|白橡|黑胡桃|木蜡油”>
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">

        <!-- Styles -->
        <style>
            html, body {
                background-color: #fff;
                color: #636b6f;
                font-family: 'Raleway', sans-serif;
                font-weight: 100;
                height: 100vh;
                margin: 0;
            }

            .full-height {
                height: 100vh;
            }

            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }

            .position-ref {
                position: relative;
            }

            .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
            }

            .content {
                text-align: center;
            }

            .title {
                font-size: 84px;
            }

            .links > a {
                color: #636b6f;
                padding: 0 25px;
                font-size: 12px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

            .m-b-md {
                margin-bottom: 30px;
            }
        </style>
    </head>
    <body>
        <div class="flex-center position-ref full-height">
            @if (Route::has('login'))
                <div class="top-right links">
                    @if (Auth::check())
                        <a href="{{ url('/home') }}">Home</a>
                    @else
                        <a href="{{ url('/login') }}">Login</a>
                        <a href="{{ url('/register') }}">Register</a>
                    @endif
                </div>
            @endif

            <div class="content">
                <div class="title m-b-md">
                    禾描
                </div>

                <div>
                    <p>————————————</p>
                    <p>把空气做成不同的盒子</p>
                    <p>让灵感自由徜徉</p>
                    <p>是梦想变为真实</p>
                    <p>由建筑师／设计师／诗人／互联网工程师</p>
                    <p>共同创立的实木家具定制品牌</p>
                    <p>更理解空间</p>
                    <p>更热爱家</p>
                    <p>更关怀你</p>
                    <p>————————————</p>
                </div>
                <div>
                    <a href="https://shop142723414.taobao.com">淘宝店铺</a>
                </div>
            </div>
        </div>
    </body>
</html>
