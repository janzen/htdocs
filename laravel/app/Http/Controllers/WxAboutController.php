<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class WxAboutController extends Controller
{
    //
    public function wxMap(Request $request){
    	$noncestr = $this->createNonceStr(16);
    	$timestamp = time();
    	$url = "https://www.homerus.cn".$request->getRequestUri();
    	$content = file_get_contents("https://api.weixin.qq.com/cgi-bin/token?grant_type=client_credential&appid=wxcfa82ce1a3e84893&secret=b8cac9729fbcf6bac2c017b80d6b7752");
		$contentArr = json_decode($content,true);
		$access_token = $contentArr['access_token'];
		$jsapi = file_get_contents("https://api.weixin.qq.com/cgi-bin/ticket/getticket?access_token=$access_token&type=jsapi");
		$jsapiArr = json_decode($jsapi,true);
		$ticket = $jsapiArr['ticket'];


		$string='jsapi_ticket='.$ticket.'&noncestr='.$noncestr.'&timestamp='.$timestamp.'&url='.$url;
	    $signature = sha1($string);
	    $signPackage = array(
	        "appId"     =>"wxcfa82ce1a3e84893",
	        "nonceStr"  =>$noncestr,
	        "timestamp" => $timestamp,
	        "url"       => $url,
	        "signature" => $signature,
	        "string" => $string
	    );

    	return view('map',$signPackage);
    }



    private function createNonceStr($length = 16) {
	    $chars = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";
	    $str = "";
	    for ($i = 0; $i < $length; $i++) {
	      $str .= substr($chars, mt_rand(0, strlen($chars) - 1), 1);
	    }
	    return $str;
	  }

	  public function productManual(){
	  	
	  }

    public function wxXcx(Request $request){
        $page = $request->page;
        if($page==1){
          $list=array(
                  "error"=>false,
                  "results"=>array("toptitle"=>'餐厅',
                                   "listcontent"=>array("title"=>'餐桌',
                                                        "listdesc"=>array(
                                                                      "type"=>2,
                                                                      "title"=>'餐桌',
                                                                      "img"=>'http://www.homerus.cn/img/chanpinji/canzhuo1.jpg'
                                                                    ),
                                                                    array(
                                                                      "type"=>2,
                                                                      "title"=>'餐桌',
                                                                      "img"=>'http://www.homerus.cn/img/chanpinji/canzhuo2.jpg'
                                                                    ),
                                                                    array(
                                                                      "type"=>2,
                                                                      "title"=>'餐桌',
                                                                      "img"=>'http://www.homerus.cn/img/chanpinji/canzhuo3.jpg'
                                                                    )
                                                      ),
                                                      array("title"=>'餐椅',
                                                        "listdesc"=>array(
                                                                      "type"=>2,
                                                                      "title"=>'餐椅',
                                                                      "img"=>'http://www.homerus.cn/img/chanpinji/canyi1.jpg'
                                                                    ),
                                                                    array(
                                                                      "type"=>2,
                                                                      "title"=>'餐椅',
                                                                      "img"=>'http://www.homerus.cn/img/chanpinji/canyi2.jpg'
                                                                    ),
                                                                    array(
                                                                      "type"=>2,
                                                                      "title"=>'餐椅',
                                                                      "img"=>'http://www.homerus.cn/img/chanpinji/canyi3.jpg'
                                                                    )
                                                      ),
                                                      array("title"=>'餐边柜',
                                                        "listdesc"=>array(
                                                                      "type"=>2,
                                                                      "title"=>'餐边柜',
                                                                      "img"=>'http://www.homerus.cn/img/chanpinji/canbiangui1.jpg'
                                                                    ),
                                                                    array(
                                                                      "type"=>2,
                                                                      "title"=>'餐边柜',
                                                                      "img"=>'http://www.homerus.cn/img/chanpinji/canbiangui2.jpg'
                                                                    )
                                                      )
                                 ),
                            array("toptitle"=>'客厅',
                                   "listcontent"=>array("title"=>'电视柜',
                                                        "listdesc"=>array(
                                                                      "type"=>2,
                                                                      "title"=>'电视柜',
                                                                      "img"=>'http://www.homerus.cn/img/chanpinji/dainshigui1.jpg'
                                                                    ),
                                                                    array(
                                                                      "type"=>2,
                                                                      "title"=>'电视柜',
                                                                      "img"=>'http://www.homerus.cn/img/chanpinji/dainshigui2.jpg'
                                                                    ),
                                                                    array(
                                                                      "type"=>2,
                                                                      "title"=>'电视柜',
                                                                      "img"=>'http://www.homerus.cn/img/chanpinji/dainshigui3.jpg'
                                                                    )
                                                      ),
                                                      array("title"=>'沙发',
                                                        "listdesc"=>array(
                                                                      "type"=>2,
                                                                      "title"=>'沙发',
                                                                      "img"=>'http://www.homerus.cn/img/chanpinji/shafa1.jpg'
                                                                    ),
                                                                    array(
                                                                      "type"=>2,
                                                                      "title"=>'沙发',
                                                                      "img"=>'http://www.homerus.cn/img/chanpinji/shafa2.jpg'
                                                                    )
                                                      )
                                 )
                )


          return $list;
        }
    }
	  public function homerusPhoto(){
	  	return '{
  "error": false, 
  "results": [
    {
      "_id": "5b481d01421aa90bba87b9ae", 
      "createdAt": "2018-07-13T11:31:13.266Z", 
      "desc": "2018-07-13", 
      "publishedAt": "2018-07-13T00:00:00.0Z", 
      "source": "web", 
      "type": "\u798f\u5229", 
      "url": "http://wsw.homerus.cn/img/weixingongzhonghao/1.jpg", 
      "used": true, 
      "who": "homerus"
    }, 
    {
      "_id": "5b456f5d421aa92fc4eebe48", 
      "createdAt": "2018-07-11T10:45:49.246Z", 
      "desc": "2018-07-11", 
      "publishedAt": "2018-07-11T00:00:00.0Z", 
      "source": "web", 
      "type": "\u798f\u5229", 
      "url": "http://wsw.homerus.cn/img/weixingongzhonghao/1.jpg", 
      "used": true, 
      "who": "homerus"
    }, 
    {
      "_id": "5b441f06421aa92fccb520a2", 
      "createdAt": "2018-07-10T10:50:46.379Z", 
      "desc": "2018-07-10", 
      "publishedAt": "2018-07-10T00:00:00.0Z", 
      "source": "web", 
      "type": "\u798f\u5229", 
      "url": "http://wsw.homerus.cn/img/weixingongzhonghao/1.jpg", 
      "used": true, 
      "who": "homerus"
    }, 
    {
      "_id": "5b42d1aa421aa92d1cba2918", 
      "createdAt": "2018-07-09T11:08:26.162Z", 
      "desc": "2018-07-09", 
      "publishedAt": "2018-07-09T00:00:00.0Z", 
      "source": "web", 
      "type": "\u798f\u5229", 
      "url": "http://wsw.homerus.cn/img/weixingongzhonghao/1.jpg", 
      "used": true, 
      "who": "homerus"
    }, 
    {
      "_id": "5b3ed2d5421aa91cfe803e35", 
      "createdAt": "2018-07-06T10:24:21.907Z", 
      "desc": "2018-07-06", 
      "publishedAt": "2018-07-06T00:00:00.0Z", 
      "source": "web", 
      "type": "\u798f\u5229", 
      "url": "http://wsw.homerus.cn/img/weixingongzhonghao/1.jpg", 
      "used": true, 
      "who": "homerus"
    }, 
    {
      "_id": "5b3d883f421aa906e5b3c6f1", 
      "createdAt": "2018-07-05T10:53:51.361Z", 
      "desc": "2018-07-05", 
      "publishedAt": "2018-07-05T00:00:00.0Z", 
      "source": "web", 
      "type": "\u798f\u5229", 
      "url": "http://wsw.homerus.cn/img/weixingongzhonghao/1.jpg", 
      "used": true, 
      "who": "homerus"
    }, 
    {
      "_id": "5b3ae394421aa906e7db029b", 
      "createdAt": "2018-07-03T10:46:44.112Z", 
      "desc": "2018-07-03", 
      "publishedAt": "2018-07-03T00:00:00.0Z", 
      "source": "web", 
      "type": "\u798f\u5229", 
      "url": "http://wsw.homerus.cn/img/weixingongzhonghao/1.jpg", 
      "used": true, 
      "who": "homerus"
    }, 
    {
      "_id": "5b398cf8421aa95570db5491", 
      "createdAt": "2018-07-02T10:24:56.546Z", 
      "desc": "2018-07-02", 
      "publishedAt": "2018-07-02T00:00:00.0Z", 
      "source": "web", 
      "type": "\u798f\u5229", 
      "url": "http://wsw.homerus.cn/img/weixingongzhonghao/1.jpg", 
      "used": true, 
      "who": "homerus"
    }, 
    {
      "_id": "5b33ccf2421aa95570db5478", 
      "createdAt": "2018-06-28T01:44:18.488Z", 
      "desc": "2018-06-28", 
      "publishedAt": "2018-06-28T00:00:00.0Z", 
      "source": "web", 
      "type": "\u798f\u5229", 
      "url": "http://wsw.homerus.cn/img/weixingongzhonghao/1.jpg", 
      "used": true, 
      "who": "homerus"
    }, 
    {
      "_id": "5b32807e421aa95570db5471", 
      "createdAt": "2018-06-27T02:05:50.227Z", 
      "desc": "2018-06-27", 
      "publishedAt": "2018-06-27T00:00:00.0Z", 
      "source": "web", 
      "type": "\u798f\u5229", 
      "url": "http://wsw.homerus.cn/img/weixingongzhonghao/1.jpg", 
      "used": true, 
      "who": "homerus"
    }
  ]
}';
	  }
}
