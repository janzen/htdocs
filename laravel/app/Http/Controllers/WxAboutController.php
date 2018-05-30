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
    	dd($request->getRequestUri());
    	$url = "https://www.homerus.cn/hemiaomap";
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
}
