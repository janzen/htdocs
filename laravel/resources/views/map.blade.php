<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>禾描</title>
        <link rel="stylesheet" href="css/bootstrap.min.css">
        <script src="js/jquery.js"></script>
        <style type="text/css">
            html {
                  -ms-text-size-adjust: 100%;
                  -webkit-text-size-adjust: 100%;
                  -webkit-user-select: none;
                  user-select: none;
                }
                body {
                  line-height: 1.6;
                  font-family: "Helvetica Neue", Helvetica, Arial, sans-serif;
                  background-color: #f1f0f6;
                }
                * {
                  margin: 0;
                  padding: 0;
                }
                button {
                  font-family: inherit;
                  font-size: 100%;
                  margin: 0;
                  *font-family: "Helvetica Neue", Helvetica, Arial, sans-serif;
                }
                ul,
                ol {
                  padding-left: 0;
                  list-style-type: none;
                }
                a {
                  text-decoration: none;
                }
                .label_box {
                  background-color: #ffffff;
                }
                .label_item {
                  padding-left: 15px;
                }
                .label_inner {
                  padding-top: 10px;
                  padding-bottom: 10px;
                  min-height: 24px;
                  position: relative;
                }
                .label_inner:before {
                  content: " ";
                  position: absolute;
                  left: 0;
                  top: 0;
                  width: 200%;
                  height: 1px;
                  border-top: 1px solid #ededed;
                  -webkit-transform-origin: 0 0;
                  transform-origin: 0 0;
                  -webkit-transform: scale(0.5);
                  transform: scale(0.5);
                  top: auto;
                  bottom: -2px;
                }
                .lbox_close {
                  position: relative;
                }
                .lbox_close:before {
                  content: " ";
                  position: absolute;
                  left: 0;
                  top: 0;
                  width: 200%;
                  height: 1px;
                  border-top: 1px solid #ededed;
                  -webkit-transform-origin: 0 0;
                  transform-origin: 0 0;
                  -webkit-transform: scale(0.5);
                  transform: scale(0.5);
                }
                .lbox_close:after {
                  content: " ";
                  position: absolute;
                  left: 0;
                  top: 0;
                  width: 200%;
                  height: 1px;
                  border-top: 1px solid #ededed;
                  -webkit-transform-origin: 0 0;
                  transform-origin: 0 0;
                  -webkit-transform: scale(0.5);
                  transform: scale(0.5);
                  top: auto;
                  bottom: -2px;
                }
                .lbox_close .label_item:last-child .label_inner:before {
                  display: none;
                }
                .btn {
                  display: block;
                  margin-left: auto;
                  margin-right: auto;
                  padding-left: 14px;
                  padding-right: 14px;
                  font-size: 18px;
                  text-align: center;
                  text-decoration: none;
                  overflow: visible;
                  /*.btn_h(@btnHeight);*/
                  height: 42px;
                  border-radius: 5px;
                  -moz-border-radius: 5px;
                  -webkit-border-radius: 5px;
                  box-sizing: border-box;
                  -moz-box-sizing: border-box;
                  -webkit-box-sizing: border-box;
                  color: #ffffff;
                  line-height: 42px;
                  -webkit-tap-highlight-color: rgba(255, 255, 255, 0);
                }
                .btn.btn_inline {
                  display: inline-block;
                }
                .btn_primary {
                  background-color: #04be02;
                }
                .btn_primary:not(.btn_disabled):visited {
                  color: #ffffff;
                }
                .btn_primary:not(.btn_disabled):active {
                  color: rgba(255, 255, 255, 0.9);
                  background-color: #039702;
                }
                button.btn {
                  width: 100%;
                  border: 0;
                  outline: 0;
                  -webkit-appearance: none;
                }
                button.btn:focus {
                  outline: 0;
                }
                .wxapi_container {
                  font-size: 16px;
                }
                h1 {
                  font-size: 14px;
                  font-weight: 400;
                  line-height: 2em;
                  padding-left: 15px;
                  color: #8d8c92;
                }
                .desc {
                  font-size: 14px;
                  font-weight: 400;
                  line-height: 2em;
                  color: #8d8c92;
                }
                .wxapi_index_item a {
                  display: block;
                  color: #3e3e3e;
                  -webkit-tap-highlight-color: rgba(0, 0, 0, 0);
                }
                .wxapi_form {
                  background-color: #ffffff;
                  padding: 0 15px;
                  margin-top: 30px;
                  padding-bottom: 15px;
                }
                h3 {
                  padding-top: 16px;
                  margin-top: 25px;
                  font-size: 16px;
                  font-weight: 400;
                  color: #3e3e3e;
                  position: relative;
                }
                h3:first-child {
                  padding-top: 15px;
                }
                h3:before {
                  content: " ";
                  position: absolute;
                  left: 0;
                  top: 0;
                  width: 200%;
                  height: 1px;
                  border-top: 1px solid #ededed;
                  -webkit-transform-origin: 0 0;
                  transform-origin: 0 0;
                  -webkit-transform: scale(0.5);
                  transform: scale(0.5);
                }
                .btn {
                  margin-bottom: 15px;
                }


        </style>
    </head>
    <body>
        <img src="img/weixingongzhonghao/5.jpg" class="img-responsive center-block">
        <button class="btn btn_primary" id="openLocation">打开地图</button>
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
// 7 地理位置接口
  // 7.1 查看地理位置
  document.querySelector('#openLocation').onclick = function () {
    wx.openLocation({
      latitude: 39.993850,
      longitude: 116.470090,
      name: '禾描家',
      address: '北京市朝阳区里外里公寓一单元',
      scale: 14,
      infoUrl: 'http://www.homerus.cn'
    });
  };
// $(function(){
//     setTimeout(function(){wx.openLocation({
//           latitude: 39.993850,
//           longitude: 116.470090,
//           name: '禾描工作室',
//           address: '北京市朝阳区里外里公寓一单元2001',
//           scale: 14,
//           infoUrl: 'http://www.homerus.cn'
//         });},2000);
// });
    </script>
</html>