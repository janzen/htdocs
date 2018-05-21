jQuery(function($) {
		ymdTime("#id-date-picker-1");
		var html = "";
        $("#input_city").append(html); $("#input_area").append(html);
	        $.each(pdata,function(idx,item){
	            if (parseInt(item.level) == 0) {
	                html += "<option value='" + item.names + "' exid='" + item.code + "'>" + item.names + "</option>";
	            }
	        });
	        $("#input_province").append(html);
	        $("#input_province").change(function(){
	            if ($(this).val() == "") return;
	            $("#input_city option").remove(); $("#input_area option").remove();
	            var code = $(this).find("option:selected").attr("exid"); code = code.substring(0,2);
	            var html = "<option value=''>--请选择--</option>"; $("#input_area").append(html);
	            $.each(pdata,function(idx,item){
	                if (parseInt(item.level) == 1 && code == item.code.substring(0,2)) {
	                    html += "<option value='" + item.names + "' exid='" + item.code + "'>" + item.names + "</option>";
	                }
	            });
	            $("#input_city").append(html);
	        });
	        $("#input_city").change(function(){
	            if ($(this).val() == "") return;
	            $("#input_area option").remove();
	            var code = $(this).find("option:selected").attr("exid"); code = code.substring(0,4);
	            var html = "<option value=''>--请选择--</option>";
	            $.each(pdata,function(idx,item){
	                if (parseInt(item.level) == 2 && code == item.code.substring(0,4)) {
	                    html += "<option value='" + item.names + "' exid='" + item.code + "'>" + item.names + "</option>";
	                }
	            });
	            $("#input_area").append(html);
	        });
		
	        $("input[name='checkboxs']").click(function(){
	        	var checkId = $(this).val();
	        	if($(this).is(':checked')){
					ajaxPostCheck(checkId,true);
	        	}else{
					ajaxPostCheck(checkId,false);
	        	}
	        });
		});
function ajaxPostCheck(checkId,isChecked){
	$.ajax({
			headers: {
	          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
	        },
        type: 'POST',
        url: '/order/updstage',
        data:'{"dataVal":"'+checkId+'","checkVal":"'+isChecked+'"}',
        dataType: 'json',
        success: function (data) {
            
        },
        error: function () {
            alert("提交错误")
        }
    });
}

//格式化日期
var formatDate = function (date) {  
    var y = date.getFullYear();  
    var m = date.getMonth();  
    m = m < 10 ? '0' + m : m;  
    var d = date.getDate();  
    d = d < 10 ? ('0' + d) : d;  
    return y + '-' + m + '-' + d;  
};
var delivery_time;
function ymdTime(id){
	var start_time;
	if(id == "#id-date-picker-1"){
		start_time = new Date();
	}else if(id== "#id-date-picker-2"){
		start_time = delivery_time;
	}
	$(id).datetimepicker({//选择年月日
　　　　　　format: 'yyyy-mm-dd',
　　　　　　language: 'zh-CN',
　　　　　　weekStart: 1,
　　　　　　todayBtn: 1,//显示‘今日’按钮
　　　　　　autoclose: 1,
　　　　　　todayHighlight: 1,
　　　　　　startView: 2,
　　　　　　minView: 2,  //Number, String. 默认值：0, 'hour'，日期时间选择器所能够提供的最精确的时间选择视图。
　　　　　　clearBtn:false,//清除按钮
　　　　　　forceParse: 0,
		  initialDate:start_time,
　　　　}).on('changeDate',function(ev){
            var time = $(id).val().split('-');
			timeStr = new Date(Number(time['0']),(Number(time['1'])),Number(time['2'])); 
			timeStr.setDate(timeStr.getDate() + 60);
			delivery_time = formatDate(timeStr);
			ymdTime("#id-date-picker-2");
        }); 

	$(id).focus(function(){
　　　　　　$(this).blur();//不可输入状态
　　　　});
}

function confirmAct() 
{ 
  if(confirm('确定要执行此操作吗?')) 
  { 
    return true; 
  } 
  return false; 
} 