<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class WxAboutController extends Controller
{
    //
    public function wxMap(){
    	$noncestr = $this->createNonceStr(16);
    	$timestamp = time();
    	$url = "http://homerus.cn/maptest";
    	$content = file_get_contents("https://api.weixin.qq.com/cgi-bin/token?grant_type=client_credential&appid=wxcfa82ce1a3e84893&secret=b8cac9729fbcf6bac2c017b80d6b7752");
		$contentArr = json_decode($content,true);
		$access_token = $contentArr['access_token'];
		$jsapi = file_get_contents("https://api.weixin.qq.com/cgi-bin/ticket/getticket?access_token=$access_token&type=jsapi");
		$jsapiArr = json_decode($jsapi,true);
		$ticket = $jsapiArr['ticket'];


		$string='jsapi_ticket='.$ticket.'&noncestr='.$noncestr.'×tamp='.$timestamp.'&url='.$url;
	    $signature = sha1("jsapi_ticket=kgt8ON7yVITDhtdwci0qeaoZi7lcUcb-lkVvrsmBjjONtD7LLqmtC157-bE-vv4pEvBN95yWxMBaEK3wbiQCFw&noncestr=KPcelVljpIkk5wO1&timestamp=1527577182&url=http://homerus.cn/maptest");
	    $signPackage = array(
	        "appId"     =>"wxcfa82ce1a3e84893",
	        "nonceStr"  =>$noncestr,
	        "timestamp" => $timestamp,
	        "url"       => $url,
	        "signature" => $signature,
	        "string" => $string
	    );
	    echo $ticket;
dd($signPackage);

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
