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
        <script src="js/jquery.js"></script>

    </head>
     </body>
        <script type="text/javascript" src="https://res.wx.qq.com/open/js/jweixin-1.2.0.js"></script>  
        <script type="text/javascript">  
wx.config({
    debug: false, // 开启调试模式,调用的所有api的返回值会在客户端alert出来，若要查看传入的参数，可以在pc端打开，参数信息会通过log打出，仅在pc端时才会打印。
    appId: <?echo "'".$appId."'"?>, // 必填，公众号的唯一标识
    timestamp: <?echo "'".$timestamp."'"?>, // 必填，生成签名的时间戳
    nonceStr: <?echo "'".$nonceStr."'"?>, // 必填，生成签名的随机串
    signature: <?echo "'".$signature."'"?>,// 必填，签名
    jsApiList: ['openLocation','getLocation'] // 必填，需要使用的JS接口列表 这里填写需要用到的微信api openlocation为使用微信内置地图查看位置接口
});
$(function(){
    setTimeout(function(){wx.openLocation({
          latitude: 39.993850,
          longitude: 116.470090,
          name: '禾描工作室',
          address: '北京市朝阳区里外里公寓一单元2001',
          scale: 14,
          infoUrl: 'http://www.homerus.cn'
        });},2000);
});
    </script>
</html>