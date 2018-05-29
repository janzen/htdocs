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

    </head><body ontouchstart=""><h3 id="menu-location">地理位置接口</h3>
      <span class="desc">使用微信内置地图查看位置接口</span>
      <button class="btn btn_primary" id="openLocation">openLocation</button>
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
// wx.openLocation({
//       latitude: 23.099994,
//       longitude: 113.324520,
//       name: 'TIT 创意园',
//       address: '广州市海珠区新港中路 397 号',
//       scale: 14,
//       infoUrl: 'http://weixin.qq.com'
//     });
// 7 地理位置接口
  // 7.1 查看地理位置
  // document.querySelector('#openLocation').onclick = function () {
    // wx.openLocation({
    //   latitude: 23.099994,
    //   longitude: 113.324520,
    //   name: 'TIT 创意园',
    //   address: '广州市海珠区新港中路 397 号',
    //   scale: 14,
    //   infoUrl: 'http://weixin.qq.com'
    // });
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

  // };
// wx.getLocation({  
//             type : 'gcj02', // 默认为wgs84的gps坐标，如果要返回直接给openLocation用的火星坐标，可传入'gcj02'  
//             success : function(res) {  
//                 alert("00");  
//                 //使用微信内置地图查看位置接口  
//                 wx.openLocation({  
//                     latitude : res.latitude, // 纬度，浮点数，范围为90 ~ -90  
//                     longitude : res.longitude, // 经度，浮点数，范围为180 ~ -180。  
//                     name : '我的位置', // 位置名  
//                     address : '329创业者社区', // 地址详情说明  
//                     scale : 28, // 地图缩放级别,整形值,范围从1~28。默认为最大  
//                     infoUrl : 'http://www.gongjuji.net' // 在查看位置界面底部显示的超链接,可点击跳转（测试好像不可用）  
//                 });  
//                 alert("11");  
//             },  
//             cancel : function(res) {  
//                 alert("22");  
//             }  
//         }); 

    </script>
</html>