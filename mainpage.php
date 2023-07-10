<head>
	<link rel="stylesheet" href="./css/style.css?ver=1">
</head>

<body>
<div id="login" class="wrap">
	<div>
		<h1>Login</h1>
		<form action="login_check.php" method="post" name="loginform" id="login_form" class="form" onsubmit="return logit()">
			<p><input type="text" name="userID" id="userID" placeholder="아이디 입력"></p>
			<p><input type="password" name="userPW" id="userPW" placeholder="비밀번호 입력"></p>
			<p><input type="submit" value="로그인" class="form_btn"></p>
		<p class="regist_btn">아직 회원이 아니신가요? <a href="regist.php">회원가입하러 가기</a></p>
		</form>
	</div>
</div>
<script src="./js/regist.js"></script>
</body>