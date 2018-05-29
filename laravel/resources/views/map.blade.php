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
        <script type="text/javascript" src="https://res.wx.qq.com/open/js/jweixin-1.2.0.js"></script>  
    <script src="http://cdn.bootcss.com/jquery/1.11.1/jquery.min.js"></script><!--调用jQuery-->
        <script type="text/javascript">  
wx.config({
    debug: true, // 开启调试模式,调用的所有api的返回值会在客户端alert出来，若要查看传入的参数，可以在pc端打开，参数信息会通过log打出，仅在pc端时才会打印。
    appId: <?echo "'".$appId."'"?>, // 必填，公众号的唯一标识
    timestamp: <?echo "'".$timestamp."'"?>, // 必填，生成签名的时间戳
    nonceStr: <?echo "'".$nonceStr."'"?>, // 必填，生成签名的随机串
    signature: <?echo "'".$signature."'"?>,// 必填，签名
    jsApiList: ['openLocation'] // 必填，需要使用的JS接口列表 这里填写需要用到的微信api openlocation为使用微信内置地图查看位置接口
});
document.querySelector('#openLocation').onclick = function () {
    wx.openLocation({
      latitude: 23.099994,
      longitude: 113.324520,
      name: 'TIT 创意园',
      address: '广州市海珠区新港中路 397 号',
      scale: 14,
      infoUrl: 'http://weixin.qq.com'
    });
  };

    </script>
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
    <span class="desc" style="color: red">地理位置接口-使用微信内置地图查看位置接口</span><br>
      <button class="btn btn_primary" id="openLocation">openLocation</button><br>
      <span class="desc" style="color: red">地理位置接口-获取地理位置接口</span><br>
      <button class="btn btn_primary" id="getLocation">getLocation</button><br>
    </body>
</html>