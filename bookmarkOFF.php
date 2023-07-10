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
		$sql2 = "DELETE FROM bookmark WHERE b_userID = '$userID' AND b_jobname = '$jobname'";
		if($conn->query($sql2) == TRUE){
			echo "<script>alert('즐겨찾기가 해제되었습니다.');</script>";
			echo "<script>location.href='jobInfo.php?userID=$userID&search=$search_con&jobname=$jobname'</script>";
		}
	} else {
		echo "<script>alert('즐겨찾기 상태가 아닙니다.');</script>";
		echo "<script>location.href='jobInfo.php?userID=$userID&search=$search_con&jobname=$jobname'</script>";
	}
?>