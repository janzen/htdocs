<!DOCTYPE html><html lang="zh-cmn-Hans">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width,initial-scale=1,user-scalable=0">
    <title>地图</title>
    <script type="text/javascript" src="https://res.wx.qq.com/open/js/jweixin-1.2.0.js"></script>  
    <script src="http://cdn.bootcss.com/jquery/1.11.1/jquery.min.js"></script><!--调用jQuery-->

  <style type="text/css">
        body, html,#allmap {width: 100%;height: 100%;overflow: hidden;margin:0;font-family:"微软雅黑";}
    </style> 
</head>

    <body>  
   <span class="desc" style="color: red">地理位置接口-使用微信内置地图查看位置接口</span><br>
      <button class="btn btn_primary" id="openLocation">openLocation</button><br>
      <span class="desc" style="color: red">地理位置接口-获取地理位置接口</span><br>
      <button class="btn btn_primary" id="getLocation">getLocation</button><br>



   </body>  </html>  
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
    alert("sdf");
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