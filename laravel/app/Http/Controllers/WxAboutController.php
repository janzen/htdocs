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
    public function wxXcxbanner(Request $request){
        $list = array('error'=>false,
                      'bannerList'=>array(
                        array('type'=>'h5','desc'=>'https://www.homerus.cn/img/wxxcx/7501.jpg'),
                        array('type'=>'h5','desc'=>'https://www.homerus.cn/img/wxxcx/7502.jpg'),
                        array('type'=>'h5','desc'=>'https://www.homerus.cn/img/wxxcx/7503.jpg'),
                      )
                    );
      return $list;
    }

    public function linkUrl(Request $request){
      $num = $request->num;
      $url = "1";
      if($num == 1){
        $url = "https://mp.weixin.qq.com/s/W_u87p4mWbWzHzkocOzOGg";
      }else if($num == 2){
        $url = "https://mp.weixin.qq.com/s/dGtVs99ta51lDysYC4gizQ";
      }else if($num == 3){
        $url = "https://mp.weixin.qq.com/s/AH0SYxvlIL_MWUua78m-HQ";
      }else if($num == 4){
        $url = "https://mp.weixin.qq.com/s/zakjFFEFSpy8pUENGnFbRg";
      }else if($num == 5){
        $url = "https://mp.weixin.qq.com/s/J_ByoCQHnG6eWYX61IupZw";
      }
      $html = file_get_contents($url);  
  
      echo $html;
    }
    public function wxCase(Request $request){
      $page = $request->page;
      if($page == 1){
        $list = array(
          "error"=>false,
          "totalPage"=>10,
          "results"=>array(
            array('title'=>"45㎡三居室",'imgUrl'=>"https://www.homerus.cn/img/wxxcx/quanwu/1.jpg",'linkUrl'=>"https://www.homerus.cn/linkUrl/1",'desc'=>"小户型设计要以实用为主，环保放第一位。再有就是售后服务，服务态度，响应及时非常重要。"),
            array('title'=>"电视？哪有黑胡桃岛台",'imgUrl'=>"https://www.homerus.cn/img/wxxcx/quanwu/2.jpg",'linkUrl'=>"https://www.homerus.cn/linkUrl/2",'desc'=>"客厅去电视化似乎正在成为一种潮流，尤其是有宝宝的家庭，注重孩子的成长，注重一家人的交流，让客厅变得自由开放更重要。"),
            array('title'=>"黑白灰太冷淡",'imgUrl'=>"https://www.homerus.cn/img/wxxcx/quanwu/3.jpg",'linkUrl'=>"https://www.homerus.cn/linkUrl/3",'desc'=>"“森系空间”   
森系是一种拥抱大自然的，清新的感觉，也是一种追求自然的生活态度。
它如山间清爽的风，林间温柔的光，治愈身心。"),
            array('title'=>"看辣妈的客厅布局",'imgUrl'=>"https://www.homerus.cn/img/wxxcx/quanwu/4.jpg",'linkUrl'=>"https://www.homerus.cn/linkUrl/4",'desc'=>"屋主是拥有两个萌宝的超级辣妈
除了每个妈妈都关注的环保问题，屋主也在房间布局和家具的选择上，处处体现“让孩子自己动手”的教育理念，给宝贝们创造一个舒心的成长环境。"),
            array('title'=>"客厅越大越好？她把客厅改小了却更美",'imgUrl'=>"https://www.homerus.cn/img/wxxcx/quanwu/5.jpg",'linkUrl'=>"https://www.homerus.cn/linkUrl/5",'desc'=>"很多人都喜欢大，大房子，大客厅，大卧室，大汽车，总之越大越好，而我们今天要分享的案例，屋主把大客厅改小了，反而住的更加惬意，来一探究竟吧～"),
          )
        );
      }else{
        $list = array(
          "error"=>false,
          "totalPage"=>10,
          "results"=>array()
        );
      }
      return $list;
    }

    public function wxXcx(Request $request){
        $page = $request->page;
        if($page==1){
          
          $list=array(
                  "error"=>false,
                  "totalPage"=>10,
                  "results"=>array(
                                array("toptitle"=>'餐厅',
                                   "listcontent"=>array(
                                                      array("title"=>'餐桌',
                                                        "listdesc"=>array(
                                                                      array(
                                                                        "type"=>2,
                                                                        "title"=>'餐桌',
                                                                        "img"=>'http://www.homerus.cn/img/chanpinji/canting/canzhuo1.jpg'
                                                                      ),
                                                                      array(
                                                                        "type"=>2,
                                                                        "title"=>'餐桌',
                                                                        "img"=>'http://www.homerus.cn/img/chanpinji/canting/canzhuo2.jpg'
                                                                      ),
                                                                      array(
                                                                        "type"=>2,
                                                                        "title"=>'餐桌',
                                                                        "img"=>'http://www.homerus.cn/img/chanpinji/canting/canzhuo3.jpg'
                                                                      ),
                                                                      array(
                                                                        "type"=>2,
                                                                        "title"=>'餐桌',
                                                                        "img"=>'http://www.homerus.cn/img/chanpinji/canting/canzhuo4.jpg'
                                                                      ),
                                                                      array(
                                                                        "type"=>2,
                                                                        "title"=>'餐桌',
                                                                        "img"=>'http://www.homerus.cn/img/chanpinji/canting/canzhuo5.jpg'
                                                                      ),
                                                                      array(
                                                                        "type"=>2,
                                                                        "title"=>'餐桌',
                                                                        "img"=>'http://www.homerus.cn/img/chanpinji/canting/canzhuo6.jpg'
                                                                      ),
                                                                      array(
                                                                        "type"=>2,
                                                                        "title"=>'餐桌',
                                                                        "img"=>'http://www.homerus.cn/img/chanpinji/canting/canzhuo7.jpg'
                                                                      )
                                                                    )
                                                      ),
                                                      array("title"=>'餐椅',
                                                        "listdesc"=>array(
                                                                      array(
                                                                        "type"=>2,
                                                                        "title"=>'餐椅',
                                                                        "img"=>'http://www.homerus.cn/img/chanpinji/canting/yideng1.jpg'
                                                                      ),
                                                                      array(
                                                                        "type"=>2,
                                                                        "title"=>'餐椅',
                                                                        "img"=>'http://www.homerus.cn/img/chanpinji/canting/yideng2.jpg'
                                                                      ),
                                                                      array(
                                                                        "type"=>2,
                                                                        "title"=>'餐椅',
                                                                        "img"=>'http://www.homerus.cn/img/chanpinji/canting/yideng3.jpg'
                                                                      ),
                                                                      array(
                                                                        "type"=>2,
                                                                        "title"=>'餐椅',
                                                                        "img"=>'http://www.homerus.cn/img/chanpinji/canting/yideng4.jpg'
                                                                      ),
                                                                      array(
                                                                        "type"=>2,
                                                                        "title"=>'餐椅',
                                                                        "img"=>'http://www.homerus.cn/img/chanpinji/canting/yideng5.jpg'
                                                                      ),
                                                                      array(
                                                                        "type"=>2,
                                                                        "title"=>'餐椅',
                                                                        "img"=>'http://www.homerus.cn/img/chanpinji/canting/yideng6.jpg'
                                                                      ),
                                                                      array(
                                                                        "type"=>2,
                                                                        "title"=>'餐椅',
                                                                        "img"=>'http://www.homerus.cn/img/chanpinji/canting/yideng7.jpg'
                                                                      )
                                                                    )
                                                      ),
                                                      array("title"=>'餐边柜',
                                                        "listdesc"=>array(
                                                                      array(
                                                                        "type"=>2,
                                                                        "title"=>'餐边柜',
                                                                        "img"=>'http://www.homerus.cn/img/chanpinji/canting/biangui1.jpg'
                                                                      ),
                                                                      array(
                                                                        "type"=>2,
                                                                        "title"=>'餐边柜',
                                                                        "img"=>'http://www.homerus.cn/img/chanpinji/canting/biangui2.jpg'
                                                                      )
                                                                    )
                                                      )
                                                    )
                                 ),
                            array("toptitle"=>'客厅',
                                   "listcontent"=>array(
                                                      array("title"=>'电视柜',
                                                        "listdesc"=>array(
                                                                      array(
                                                                        "type"=>2,
                                                                        "title"=>'电视柜',
                                                                        "img"=>'http://www.homerus.cn/img/chanpinji/keting/dianshigui1.jpg'
                                                                      ),
                                                                      array(
                                                                        "type"=>2,
                                                                        "title"=>'电视柜',
                                                                        "img"=>'http://www.homerus.cn/img/chanpinji/keting/dianshigui2.jpg'
                                                                      ),
                                                                      array(
                                                                        "type"=>2,
                                                                        "title"=>'电视柜',
                                                                        "img"=>'http://www.homerus.cn/img/chanpinji/keting/dianshigui3.jpg'
                                                                      )
                                                                    )
                                                      ),
                                                      array("title"=>'沙发',
                                                        "listdesc"=>array(
                                                                      array(
                                                                        "type"=>2,
                                                                        "title"=>'沙发',
                                                                        "img"=>'http://www.homerus.cn/img/chanpinji/keting/shafa1.jpg'
                                                                      ),
                                                                      array(
                                                                        "type"=>2,
                                                                        "title"=>'沙发',
                                                                        "img"=>'http://www.homerus.cn/img/chanpinji/keting/shafa2.jpg'
                                                                      ),array(
                                                                        "type"=>2,
                                                                        "title"=>'沙发',
                                                                        "img"=>'http://www.homerus.cn/img/chanpinji/keting/shafa3.jpg'
                                                                      ),array(
                                                                        "type"=>2,
                                                                        "title"=>'沙发',
                                                                        "img"=>'http://www.homerus.cn/img/chanpinji/keting/shafa4.jpg'
                                                                      ),array(
                                                                        "type"=>2,
                                                                        "title"=>'沙发',
                                                                        "img"=>'http://www.homerus.cn/img/chanpinji/keting/shafa5.jpg'
                                                                      )
                                                                    )
                                                      )
                                                    )
                                 )
                          ),
                  "imgMap"=>array('http://www.homerus.cn/img/chanpinji/canting/canzhuo1.jpg','http://www.homerus.cn/img/chanpinji/canting/canzhuo2.jpg','http://www.homerus.cn/img/chanpinji/canting/canzhuo2.jpg','http://www.homerus.cn/img/chanpinji/canting/canzhuo4.jpg','http://www.homerus.cn/img/chanpinji/canting/canzhuo5.jpg','http://www.homerus.cn/img/chanpinji/canting/canzhuo6.jpg','http://www.homerus.cn/img/chanpinji/canting/canzhuo7.jpg','http://www.homerus.cn/img/chanpinji/canting/yideng1.jpg','http://www.homerus.cn/img/chanpinji/canting/yideng2.jpg','http://www.homerus.cn/img/chanpinji/canting/yideng3.jpg','http://www.homerus.cn/img/chanpinji/canting/yideng4.jpg','http://www.homerus.cn/img/chanpinji/canting/yideng5.jpg','http://www.homerus.cn/img/chanpinji/canting/yideng6.jpg','http://www.homerus.cn/img/chanpinji/canting/yideng7.jpg','http://www.homerus.cn/img/chanpinji/canting/biangui1.jpg','http://www.homerus.cn/img/chanpinji/canting/biangui2.jpg','http://www.homerus.cn/img/chanpinji/keting/dianshigui1.jpg','http://www.homerus.cn/img/chanpinji/keting/dianshigui2.jpg','http://www.homerus.cn/img/chanpinji/keting/dianshigui3.jpg','http://www.homerus.cn/img/chanpinji/keting/shafa1.jpg','http://www.homerus.cn/img/chanpinji/keting/shafa2.jpg','http://www.homerus.cn/img/chanpinji/keting/shafa3.jpg','http://www.homerus.cn/img/chanpinji/keting/shafa4.jpg','http://www.homerus.cn/img/chanpinji/keting/shafa5.jpg')
                );

          return $list;
        }else if($page==2){
            $list=array(
                  "error"=>false,
                  "totalPage"=>10,
                  "results"=>array(
                                array("toptitle"=>'满墙书柜',
                                   "listcontent"=>array(
                                                      array("title"=>'书柜',
                                                        "listdesc"=>array(
                                                                      array(
                                                                        "type"=>2,
                                                                        "title"=>'书柜',
                                                                        "img"=>'http://www.homerus.cn/img/chanpinji/manqiangshugui/manqiangshugui1.jpg'
                                                                      ),
                                                                      array(
                                                                        "type"=>2,
                                                                        "title"=>'书柜',
                                                                        "img"=>'http://www.homerus.cn/img/chanpinji/manqiangshugui/manqiangshugui2.jpg'
                                                                      ),
                                                                      array(
                                                                        "type"=>2,
                                                                        "title"=>'书柜',
                                                                        "img"=>'http://www.homerus.cn/img/chanpinji/manqiangshugui/manqiangshugui3.jpg'
                                                                      ),
                                                                      array(
                                                                        "type"=>2,
                                                                        "title"=>'书柜',
                                                                        "img"=>'http://www.homerus.cn/img/chanpinji/manqiangshugui/manqiangshugui4.jpg'
                                                                      ),
                                                                      array(
                                                                        "type"=>2,
                                                                        "title"=>'书柜',
                                                                        "img"=>'http://www.homerus.cn/img/chanpinji/manqiangshugui/manqiangshugui5.jpg'
                                                                      ),
                                                                      array(
                                                                        "type"=>2,
                                                                        "title"=>'书柜',
                                                                        "img"=>'http://www.homerus.cn/img/chanpinji/manqiangshugui/manqiangshugui6.jpg'
                                                                      ),
                                                                      array(
                                                                        "type"=>2,
                                                                        "title"=>'书柜',
                                                                        "img"=>'http://www.homerus.cn/img/chanpinji/manqiangshugui/manqiangshugui7.jpg'
                                                                      ),
                                                                      array(
                                                                        "type"=>2,
                                                                        "title"=>'书柜',
                                                                        "img"=>'http://www.homerus.cn/img/chanpinji/manqiangshugui/manqiangshugui8.jpg'
                                                                      ),
                                                                      array(
                                                                        "type"=>2,
                                                                        "title"=>'书柜',
                                                                        "img"=>'http://www.homerus.cn/img/chanpinji/manqiangshugui/manqiangshugui9.jpg'
                                                                      ),
                                                                      array(
                                                                        "type"=>2,
                                                                        "title"=>'书柜',
                                                                        "img"=>'http://www.homerus.cn/img/chanpinji/manqiangshugui/manqiangshugui10.jpg'
                                                                      )
                                                                    )
                                                      )
                                                    )
                                 ),
                            array("toptitle"=>'书房',
                                   "listcontent"=>array(
                                                      array("title"=>'书桌',
                                                        "listdesc"=>array(
                                                                      array(
                                                                        "type"=>2,
                                                                        "title"=>'书桌',
                                                                        "img"=>'http://www.homerus.cn/img/chanpinji/shufang/shuzhuo1.jpg'
                                                                      ),
                                                                      array(
                                                                        "type"=>2,
                                                                        "title"=>'书桌',
                                                                        "img"=>'http://www.homerus.cn/img/chanpinji/shufang/shuzhuo2.jpg'
                                                                      ),
                                                                      array(
                                                                        "type"=>2,
                                                                        "title"=>'书桌',
                                                                        "img"=>'http://www.homerus.cn/img/chanpinji/shufang/shuzhuo3.jpg'
                                                                      ),
                                                                      array(
                                                                        "type"=>2,
                                                                        "title"=>'书桌',
                                                                        "img"=>'http://www.homerus.cn/img/chanpinji/shufang/shuzhuo4.jpg'
                                                                      ),
                                                                      array(
                                                                        "type"=>2,
                                                                        "title"=>'书桌',
                                                                        "img"=>'http://www.homerus.cn/img/chanpinji/shufang/shuzhuo5.jpg'
                                                                      )
                                                                    )
                                                      ),
                                                      array("title"=>'椅子',
                                                        "listdesc"=>array(
                                                                      array(
                                                                        "type"=>2,
                                                                        "title"=>'椅子',
                                                                        "img"=>'http://www.homerus.cn/img/chanpinji/shufang/yizi1.jpg'
                                                                      ),
                                                                      array(
                                                                        "type"=>2,
                                                                        "title"=>'椅子',
                                                                        "img"=>'http://www.homerus.cn/img/chanpinji/shufang/yizi2.jpg'
                                                                      )
                                                                    )
                                                      ),
                                                      array("title"=>'组合柜',
                                                        "listdesc"=>array(
                                                                      array(
                                                                        "type"=>2,
                                                                        "title"=>'组合柜',
                                                                        "img"=>'http://www.homerus.cn/img/chanpinji/shufang/zuhegui1.jpg'
                                                                      ),
                                                                      array(
                                                                        "type"=>2,
                                                                        "title"=>'组合柜',
                                                                        "img"=>'http://www.homerus.cn/img/chanpinji/shufang/zuhegui2.jpg'
                                                                      ),
                                                                      array(
                                                                        "type"=>2,
                                                                        "title"=>'组合柜',
                                                                        "img"=>'http://www.homerus.cn/img/chanpinji/shufang/zuhegui3.jpg'
                                                                      ),
                                                                      array(
                                                                        "type"=>2,
                                                                        "title"=>'组合柜',
                                                                        "img"=>'http://www.homerus.cn/img/chanpinji/shufang/zuhegui4.jpg'
                                                                      )
                                                                    )
                                                      ),
                                                      array("title"=>'格子边柜',
                                                        "listdesc"=>array(
                                                                      array(
                                                                        "type"=>2,
                                                                        "title"=>'格子边柜',
                                                                        "img"=>'http://www.homerus.cn/img/chanpinji/shufang/gezibiangui1.jpg'
                                                                      ),
                                                                      array(
                                                                        "type"=>2,
                                                                        "title"=>'格子边柜',
                                                                        "img"=>'http://www.homerus.cn/img/chanpinji/shufang/gezibiangui2.jpg'
                                                                      ),
                                                                      array(
                                                                        "type"=>2,
                                                                        "title"=>'格子边柜',
                                                                        "img"=>'http://www.homerus.cn/img/chanpinji/shufang/gezibiangui3.jpg'
                                                                      )
                                                                    )
                                                      )
                                                    )
                                 )
                          ),
                  "imgMap"=>array('http://www.homerus.cn/img/chanpinji/manqiangshugui/manqiangshugui1.jpg','http://www.homerus.cn/img/chanpinji/manqiangshugui/manqiangshugui2.jpg','http://www.homerus.cn/img/chanpinji/manqiangshugui/manqiangshugui3.jpg','http://www.homerus.cn/img/chanpinji/manqiangshugui/manqiangshugui4.jpg','http://www.homerus.cn/img/chanpinji/manqiangshugui/manqiangshugui5.jpg','http://www.homerus.cn/img/chanpinji/manqiangshugui/manqiangshugui6.jpg','http://www.homerus.cn/img/chanpinji/manqiangshugui/manqiangshugui7.jpg','http://www.homerus.cn/img/chanpinji/manqiangshugui/manqiangshugui8.jpg','http://www.homerus.cn/img/chanpinji/manqiangshugui/manqiangshugui9.jpg','http://www.homerus.cn/img/chanpinji/manqiangshugui/manqiangshugui10.jpg','http://www.homerus.cn/img/chanpinji/shufang/shuzhuo1.jpg','http://www.homerus.cn/img/chanpinji/shufang/shuzhuo2.jpg','http://www.homerus.cn/img/chanpinji/shufang/shuzhuo3.jpg','http://www.homerus.cn/img/chanpinji/shufang/shuzhuo4.jpg','http://www.homerus.cn/img/chanpinji/shufang/shuzhuo5.jpg','http://www.homerus.cn/img/chanpinji/shufang/yizi1.jpg','http://www.homerus.cn/img/chanpinji/shufang/yizi2.jpg','http://www.homerus.cn/img/chanpinji/shufang/zuhegui1.jpg','http://www.homerus.cn/img/chanpinji/shufang/zuhegui2.jpg','http://www.homerus.cn/img/chanpinji/shufang/zuhegui3.jpg','http://www.homerus.cn/img/chanpinji/shufang/zuhegui4.jpg','http://www.homerus.cn/img/chanpinji/shufang/gezibiangui1.jpg','http://www.homerus.cn/img/chanpinji/shufang/gezibiangui2.jpg','http://www.homerus.cn/img/chanpinji/shufang/gezibiangui3.jpg')
                );

          return $list;
        }else{
          $list=array(
                  "error"=>false,
                  "totalPage"=>10,
                  "results"=>array(),
                );
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
