<?php
	include './include/sql_conn.php';

	function check_login($userID, $userPW, $conn){
		$sql = "SELECT COUNT(*) as count FROM user WHERE userID = '$userID' AND userPW = '$userPW'";
		$result = mysqli_query($conn, $sql);
		$row = $result->fetch_assoc();
		$count = $row['count'];
		return $count == 1;
	}

	$userID = $_POST['userID'];
	$userPW = $_POST['userPW'];
	$department = $_POST['department'];

	if(!session_id()){
		session_name('로그인세션');
		session_start();

		if(check_login($userID, $userPW, $conn)){
			$_SESSION['userID'] = $userID;
			echo "<script>alert('로그인에 성공했습니다.');</script>";
			$_SESSION['department'] = $department;
			echo "<script>location.replace('home.php?userID=$userID&department=$department')</script>";
		} else {
			echo "<script>alert('아이디 또는 비밀번호를 다시 확인하세요.');</script>";
			echo "<script>location.href='mainpage.php'</script>";
		}
	}
?>