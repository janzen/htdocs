<!DOCTYPE html><html lang="zh-cmn-Hans">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width,initial-scale=1,user-scalable=0">
    <title>地图</title>
    <script type="text/javascript" src="https://res.wx.qq.com/open/js/jweixin-1.2.0.js"></script>  
    <script src="http://cdn.bootcss.com/jquery/1.11.1/jquery.min.js"></script><!--调用jQuery-->

  <style type="text/css">
        body, html,#allmap {width: 100%;height: 100%;overflow: hidden;margin:0;font-family:"微软雅黑";}
    </style> </head><body>  
   <div id="allmap"></div></body>  </html>  
   <script type="text/javascript">  
wx.config({
    debug: true, // 开启调试模式,调用的所有api的返回值会在客户端alert出来，若要查看传入的参数，可以在pc端打开，参数信息会通过log打出，仅在pc端时才会打印。
    appId: <?echo $appId?>, // 必填，公众号的唯一标识
    timestamp: <?echo $timestamp?>, // 必填，生成签名的时间戳
    nonceStr: <?echo $nonceStr?>, // 必填，生成签名的随机串
    signature: <?echo $signature?>,// 必填，签名
    jsApiList: ['openLocation'] // 必填，需要使用的JS接口列表 这里填写需要用到的微信api openlocation为使用微信内置地图查看位置接口
});

        wx.openLocation({
            latitude: 12, // 纬度，浮点数，范围为90 ~ -90
            longitude: 136, // 经度，浮点数，范围为180 ~ -180。
            name: 'a', // 位置名
            address: '', // 地址详情说明
            scale: 1, // 地图缩放级别,整形值,范围从1~28。默认为最大
            infoUrl: '' // 在查看位置界面底部显示的超链接,可点击跳转
            });
  

    </script>