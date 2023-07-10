<?php
	include './include/sql_conn.php';

	function check_signup($userID, $conn){
		$sql = "SELECT COUNT(*) as count FROM user WHERE userID = '$userID'";
		$result = mysqli_query($conn, $sql);
		$row = $result->fetch_assoc();
		$count = $row['count'];
		return $count == 1;
	}

	$userID = $_POST['userID'];
	$userPW = $_POST['userPW'];
	$department = $_POST['dp_select'];

	if(check_signup($userID, $conn)){
		echo "<script>alert('중복된 아이디입니다.');</script>";
		echo "<script>location.href='regist.php'</script>";
	} else {
		$sql2 = "INSERT INTO user(userID, userPW, department) VALUES ('$userID', '$userPW', '$department')";
		if($conn->query($sql2) == TRUE){
			echo "<script>alert('회원가입 완료');</script>";
			echo "<script>location.href='mainpage.php'</script>";
		}
	}
?>