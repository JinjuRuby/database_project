<?php
	session_start();
	session_destroy();

	echo "<script>alert('로그아웃 되었습니다.');</script>";
	echo "<script>location.href='mainpage.php'</script>";
?>