<?php
	include './include/sql_conn.php';

	function check_bookmarkExists($userID, $jobname, $conn){
		$sql = "SELECT COUNT(*) as count FROM bookmark WHERE b_userID = '$userID' AND b_jobname = '$jobname'";
		$result = mysqli_query($conn, $sql);
		$row = $result->fetch_assoc();
		$count = $row['count'];
		return $count == 1;
	}

	$userID = $_GET['userID'];
	$jobname = $_GET['jobname'];
	$search_con = $_GET['search'];

	if(check_bookmarkExists($userID, $jobname, $conn)){
		echo "<script>alert('이미 즐겨찾기한 직업입니다.');</script>";
		echo "<script>location.href='jobInfo.php?userID=$userID&search=$search_con&jobname=$jobname'</script>";
	} else {
		$sql2 = "INSERT INTO bookmark(b_userID, b_jobname) VALUES ('$userID', '$jobname')";
		if($conn->query($sql2) == TRUE){
			echo "<script>alert('즐겨찾기에 추가되었습니다.');</script>";
			echo "<script>location.href='jobInfo.php?userID=$userID&search=$search_con&jobname=$jobname'</script>";
		}
	}
?>