<?php
	include './include/sql_conn.php';

	$userID = $_GET['userID'];

	$sql = "SELECT department FROM user WHERE userID = '$userID'";
	$result = mysqli_query($conn, $sql); 
	$row = mysqli_fetch_assoc($result);
	$department = $row['department'];

	$sql = "SELECT * FROM department WHERE major = '$department'";
	$result = mysqli_query($conn, $sql);
	$row = mysqli_fetch_assoc($result);
	$summary = $row['summary'];
	$employment_rate = $row['employment_rate'];
	$qualifications = $row['qualifications'];
	$enter_field = $row['enter_field'];
	$major = $row['major'];
	$job = $row['job'];
?>

<head>
	<link rel="stylesheet" href="./css/style.css?ver=4">
</head>

<body>
	<div id="main_wrap2" class="wrap">
		<br><hr/><br><br>
		<h1><?php echo $major; ?></h1>
		<br><hr/><br><br><br>
		<p class="home_btn"><a href='home.php?userID=<?php echo $userID; ?>'>홈으로 돌아가기</a></p>
		<br><br><br>
		<h2>학과 개요</h2>
		<br><hr class="gray"><br><br>
		<p class="job_info"><p class="job_info"><font face=나눔고딕><?php echo $summary; ?></font></p>
		<br><br><hr class="gray"><br>
		<h2>취업률</h2>
		<br><hr class="gray"><br><br>
		<p class="job_info"><font face=나눔고딕><?php echo $employment_rate; ?></font></p>
		<br><br><hr class="gray"><br>
		<h2>관련 자격증</h2>
		<br><hr class="gray"><br><br>
		<p class="job_info"><p class="job_info"><font face=나눔고딕><?php echo $qualifications; ?></font></p>
		<br><br><hr class="gray"><br>
		<h2>진출 분야</h2>
		<br><hr class="gray"><br><br>
		<p class="job_info"><font family="나눔고딕"><?php echo $enter_field; ?></font></p>
		<br><br><hr class="gray"><br>
		<h2>관련 직업</h2>
		<br><hr class="gray"><br><br>
		<p class="job_info"><font family="나눔고딕"><?php echo $job; ?></font></p>
		<br><br><hr class="gray"><br>
	</div>
</body>