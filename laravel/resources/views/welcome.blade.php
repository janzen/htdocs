<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
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

                <div style="margin: 0 auto;">
                    <p>————————————</p>
                    <p style="font-size: 10px">禾描®，诞生于2015年7月，北京。</p>
                    <p style="font-size:14px;width: 50%;margin: 0 auto;text-align: left;">懂空间的建筑师，爱生活的家具设计师，以及关注用户体验的互联网人，因为有着共同的居住理想“诗意地栖居于大地之上”，他们一起创立了“禾描”实木定制家具品牌。</p>
                    <br/>
                    <p style="font-size:14px;width: 50%;margin: 0 auto;text-align: left;">禾描，充分考虑你的实际需求，分析空间特点，运用简约的设计语言进行设计；优选北美FAS级实木，只涂装植物性木蜡油，极力追求环保健康；采用传统榫卯与现代木作相结合的工艺，配搭全球顶级五金，为你量身定制真正好用的实木家具。禾描，探索空间，感受生活。</p>
                    <p>————————————</p>
                </div>
                <div>
                    <a href="https://shop142723414.taobao.com">淘宝店铺</a>
                </div>
            </div>
        </div>
    </body>
</html>
