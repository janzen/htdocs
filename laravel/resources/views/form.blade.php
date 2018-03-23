<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>
		
	</title>
</head>
<body>

<form action="insert" method="post">
	用户名<input type="text" name="username"/><br>
	密码<input type="password" name="password"><br>
	<button>点击提交</button>
	{{csrf_field()}}
</form>
</body>
</html>