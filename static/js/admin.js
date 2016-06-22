function contact(){
	var name=$("input[name='name']").val();
	var sex=$("input[name='sex']").val();
	
	var tel=$("input[name='tel']").val();
	var city=$("input[name='city']").val();
	var content=$("textarea[name='content']").val();
	
	if (name==""){
		alert('请填写姓名！');
		$("input[name='name']").focus();
		return false;
	}
	if (tel==""){
		alert('请填写手机号码！');
		$("input[name='tel']").focus();
		return false;
	}
	var myreg = /^(((13[0-9]{1})|159|177|(15[0-9]{1})|(18[0-9]{1}))+\d{8})$/;

	if(!myreg.test(tel)){
		alert('请填写正确的手机号码！');
		$("input[name='tel']").focus();
		return false;
	}
	
	if (city==""){
		alert('请填写城市！');
		$("input[name='city']").focus();
		return false;
	}
	
	var data=new Array();
	data[0]=name;
	data[1]=sex;
	data[2]=tel;
	data[3]=city;
	data[4]=content;
	
	$.post('/common/contact', {'data': data}, function(data) {

		if(data==1){
			alert('发送成功！');

			$("input").val('');
			$("textarea").val('');

		}else{
			alert('发送失败！');
		}

	});

}

function bm(){
	var name=$("input[name='name']").val();
	var gender=$("#gender").val();
	var phone=$("input[name='tel']").val();
	
	if (name==""){
		alert('请填写姓名！');
		$("input[name='name']").focus();
		return false;
	}
	if (gender==0){
		alert('请选择性别！');
		return false;
	}
	if (phone==""){
		alert('请填写手机号码！');
		$("input[name='tel']").focus();
		return false;
	}
	var myreg = /^(((13[0-9]{1})|159|177|(15[0-9]{1})|(18[0-9]{1}))+\d{8})$/;

	if(!myreg.test(phone)){
		alert('请填写正确的手机号码！');
		$("input[name='tel']").focus();
		return false;
	}

	var data=new Array();
	data[0]=name;
	data[1]=gender;
	data[2]=phone;

	$.post('/common/bm', {'data': data}, function(data) {

		if(data==1){
			alert('报名成功！');

			$("input").val('');

		}else{
			alert('报名失败！');
		}

	});

}


function visit(){
	var gender=$("#gender").val();
	var name=$("input[name='name']").val();
	var phone=$("input[name='phone']").val();
	var province=$("#s_province").val();
	var city=$("#s_city").val();

	if (name==""){
		alert('请填写姓名！');
		$("input[name='name']").focus();
		return false;
	}
	if (phone==""){
		alert('请填写手机号码！');
		$("input[name='phone']").focus();
		return false;
	}
	var myreg = /^(((13[0-9]{1})|159|177|(15[0-9]{1})|(18[0-9]{1}))+\d{8})$/;

	if(!myreg.test(phone)){
		alert('请填写正确的手机号码！');
		$("input[name='phone']").focus();
		return false;
	}
	if (province=="选择省份"){
		alert('请选择省份！');
		$("#s_province").focus();
		return false;
	}
	if (city=="选择城市"){
		alert('请选择城市！');
		$("#s_city").focus();
		return false;
	}

	var data=new Array();
	data[0]=gender;
	data[1]=name;
	data[2]=phone;
	data[3]=province;
	data[4]=city;

	$.post('/common/visit', {'data': data}, function(data) {

		if(data==1){
			alert('发送成功！');

			$("input").val('');

		}else{
			alert('发送失败！');
		}

	});

}

function mvisit(){
	var gender=$("#gender").val();
	var name=$("input[name='name']").val();
	var phone=$("input[name='phone']").val();
	
	var city=$("input[name='city']").val();

	if (name==""){
		alert('请填写姓名！');
		$("input[name='name']").focus();
		return false;
	}
	if (phone==""){
		alert('请填写手机号码！');
		$("input[name='phone']").focus();
		return false;
	}
	var myreg = /^(((13[0-9]{1})|159|177|(15[0-9]{1})|(18[0-9]{1}))+\d{8})$/;

	if(!myreg.test(phone)){
		alert('请填写正确的手机号码！');
		$("input[name='phone']").focus();
		return false;
	}
	if (city==""){
		alert('请填写城市！');
		$("input[name='city']").focus();
		return false;
	}
	
	var data=new Array();
	data[0]=gender;
	data[1]=name;
	data[2]=phone;
	data[3]=city;

	$.post('/common/mvisit', {'data': data}, function(data) {

		if(data==1){
			alert('发送成功！');

			$("input").val('');

		}else{
			alert('发送失败！');
		}

	});

}