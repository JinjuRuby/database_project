<head>
	<link rel="stylesheet" href="./css/style.css?ver=1">
</head>

<body>
	<div id="regist" class="wrap">
		<div>
			<h1>Sign Up</h1>
			<form action="signup.php" method="post" name="regiform" id="regist_form" class="form" onsubmit="return sendit()">
				<p><input type="text" name="userID" id="userID" placeholder="아이디 입력"><input type="button" id="IDcheckBtn" value="중복 확인" onclick="IDcheck()" style="cursor: pointer;"></p>
				<p id="result">&nbsp;</p>
				<p><input type="password" name="userPW" id="userPW" placeholder="비밀번호 입력"></p>
				<p><input type="password" name="userPW_ch" id="userPW_ch" placeholder="비밀번호 다시 입력"></p>
				<p class="department">
					<label for="dp_select_form">학과 선택</label>
					<select id="dp_select" name="dp_select" style="width:150px; height:30px;">
						<option value="조형디자인학과">조형예술학과</option>
						<option value="산업디자인학과">산업디자인학과</option>
						<option value="실내디자인학과">실내디자인학과</option>
						<option value="패션디자인학과">패션디자인학과</option>
						<option value="시각디자인학과">시각영상디자인학과</option>
						<option value="미디어콘텐츠학과">미디어콘텐츠학과</option>
						<option value="메카트로닉스과">메카트로닉스공학과</option>
						<option value="컴퓨터공학과">컴퓨터공학과</option>
						<option value="바이오메디컬공학과">바이오메디컬공학과</option>
						<option value="녹색기술융합학과">녹색기술융합학과</option>
						<option value="응용화학과">응용화학과</option>
						<option value="경찰행정학과">경찰학과</option>
						<option value="문헌정보학과">문헌정보학과</option>
						<option value="유아교육과">유아교육과</option>
						<option value="소방방재학과">소방방재융합학과</option>
						<option value="경영학과">경영학과</option>
						<option value="국제통상학과">경제통상학과</option>
						<option value="사회복지학과">사회복지학과</option>
						<option value="신문방송학과">신문방송학과</option>
						<option value="국어국문학과">동화 · 한국어문화학과</option>
						<option value="영어영문학과">영어문화학과</option>
						<option value="간호학과">간호학과</option>
						<option value="바이오의학과">바이오의학과</option>
						<option value="생명공학과">생명공학과</option>
						<option value="식품영양학과">식품영양학과</option>
						<option value="화장품과학과">뷰티화장품학과</option>
						<option value="스포츠건강학과">스포츠건강학과</option>
						<option value="골프산업학과">골프산업학과</option>
						<option value="의예과">의예과</option>
						<option value="반려동물융합전공">반려동물융합전공</option>
						<option value="융합치유전공">융합치유전공</option>
						<option value="빅데이터융합전공">빅데이터융합전공</option>
						<option value="도시디자인융합전공">도시디자인융합전공</option>
						<option value="자기설계전공">자기설계전공</option>
					</select>
				</p>
				<p><input type="submit" value="가입하기" class="form_btn"></p>
				<p class="pre_btn">이미 회원이신가요? <a href="mainpage.php">로그인 화면으로 돌아가기</a></p>
			</form>
		</div>
	</div>
	<script src="./js/regist.js"></script>
<body>