<?php
	include './include/sql_conn.php';

	$search_con = $_GET['search'];
	$jobname = $_GET['jobname'];
	$sql = "SELECT * FROM jobs WHERE jobname = '$jobname'";
	$result = mysqli_query($conn, $sql);

	$userID = $_GET['userID'];
	$row = mysqli_fetch_assoc($result);
	$profession = $row['profession'];
	$summary = $row['summary'];
	$possibility = $row['possibility'];
	$salary = $row['salary'];
	$similarJob = $row['similarJob'];
	$major = $row['major'];
?>

<head>
	<link rel="stylesheet" href="./css/style.css?ver=4">
</head>

<body>
	<div id="main_wrap2" class="wrap">
		<br><hr/><br><br>
		<h1><?php echo $jobname; ?></h1>
		<br><hr/><br><br><br>
		<p class="home_btn"><a href='search_result.php?userID=<?php echo $userID; ?>&search=<?php echo $search_con; ?>'>검색 결과로 돌아가기</a></p>
		<br><br>
		<form action="bookmarkON.php" method="get" name="form" id="bookmark_form" class="form">
    		<input type="hidden" name="userID" value="<?php echo $userID; ?>"/>
   		<input type="hidden" name="jobname" value="<?php echo $jobname; ?>"/>
   		<input type="hidden" name="search" value="<?php echo $search_con; ?>"/>
		<input type="submit" value="즐겨찾기 추가" class="bookmarkON_btn"></form>
		<form action="bookmarkOFF.php" method="get" name="form" id="bookmark_form" class="form">
   		<input type="hidden" name="userID" value="<?php echo $userID; ?>"/>
   		<input type="hidden" name="jobname" value="<?php echo $jobname; ?>"/>
		<input type="hidden" name="search" value="<?php echo $search_con; ?>"/>
		<input type="submit" value="즐겨찾기 삭제" class="bookmarkOFF_btn"></form>
		<br><br><br>
		<h2>직업 분야</h2>
		<br><hr class="gray"><br><br>
		<p class="job_info"><font face=나눔고딕><?php echo $profession; ?></font></p>
		<br><br><hr class="gray"><br>
		<h2>직업 설명</h2>
		<br><hr class="gray"><br><br>
		<p class="job_info">
		<?php $summaryData = $row['summary'];
			$summaryLines = explode('-', $summaryData);
			foreach ($summaryLines as $line) {
    				if (!empty(trim($line))) {
        				echo "$line<br><br>";
    				}
			}
		?></p>
		<br><br><hr class="gray"><br>
		<h2>직업 전망</h2>
		<br><hr class="gray"><br><br>
		<p class="job_info">
		<?php $possibilityData = $row['possibility'];
			$possibilityLines = explode('-', $possibilityData);
			foreach ($possibilityLines as $line) {
    				if (!empty(trim($line))) {
        				echo "$line<br><br>";
    				}
			}
		?></p>
		<br><br><hr class="gray"><br>
		<h2>연봉</h2>
		<br><hr class="gray"><br><br>
		<p class="job_info"><font family="나눔고딕"><?php echo $salary; ?></font></p>
		<br><br><hr class="gray"><br>
		<h2>유사 직업</h2>
		<br><hr class="gray"><br><br>
		<p class="job_info"><font family="나눔고딕"><?php echo $similarJob; ?></font></p>
		<br><br><hr class="gray"><br>
		<h2>관련 학과</h2>
		<br><hr class="gray"><br><br>
		<p class="job_info"><font family="나눔고딕"><?php echo $major; ?></font></p>
		<br><br><hr class="gray"><br>
	</div>
</body>