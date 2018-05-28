<!DOCTYPE html><html lang="zh-cmn-Hans">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width,initial-scale=1,user-scalable=0">
    <title>HTML5页面直接调用百度地图API,获取当前位置，直接导航目的地</title>
    <script type="text/javascript" src="http://res.wx.qq.com/open/js/jweixin-1.2.0.js"></script>  
    <script src="http://cdn.bootcss.com/jquery/1.11.1/jquery.min.js"></script><!--调用jQuery-->

  <style type="text/css">
        body, html,#allmap {width: 100%;height: 100%;overflow: hidden;margin:0;font-family:"微软雅黑";}
    </style> </head><body>  
   <div id="allmap"></div></body>  </html>  
   <script type="text/javascript">  
wx.openLocation({
    latitude: 0, // 纬度，浮点数，范围为90 ~ -90
    longitude: 0, // 经度，浮点数，范围为180 ~ -180。
    name: '', // 位置名
    address: '', // 地址详情说明
    scale: 1, // 地图缩放级别,整形值,范围从1~28。默认为最大
    infoUrl: '' // 在查看位置界面底部显示的超链接,可点击跳转
    });
    </script>