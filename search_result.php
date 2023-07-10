<?php
	include './include/sql_conn.php';

	$userID = $_GET['userID'];
	$search_con = $_GET['search'];
	$sql = "SELECT * FROM jobs WHERE jobname like '%$search_con%'";
	$result = mysqli_query($conn, $sql);

	$total_pages = ceil(mysqli_num_rows($result) / 10);
	$current_page = isset($_GET['page']) ? $_GET['page'] : 1;
	$index = ($current_page - 1) * 10;
	$sql .= "LIMIT $index, 10";
	$result2= mysqli_query($conn, $sql);
?>
<head>
	<link rel="stylesheet" href="./css/style.css?ver=3">

</head>

<body>
	<div id="main_wrap" class="wrap">
		<div>
          		<div id="search_box2">
			    	<form action="/search_result.php" method="get">
					<input type="hidden" name="userID" value="<?php echo $userID; ?>"/>
					<input type="text" name="search" size="50" required="required"/>
                      		<br><button>검색</button>
				<p class="home_btn"><a href="home.php?userID=<?php echo $userID; ?>">홈 화면으로 돌아가기</a></p>
				</form>
			</div>
          		<br><hr/><br><br>
          		<h1>'<font color=#1DDB16><?php echo $search_con; ?></font>' 검색 결과 <h1>
          		<br><hr/><br><br>
		</div>	
		<div>
			<div id="search_rows">
				<?php
					if(mysqli_num_rows($result2) > 0){
						echo "<ul>";
						while($row = mysqli_fetch_assoc($result2)){
							$jobname = $row['jobname'];
							echo "<br><hr class=gray><br>";
							echo "<a href='jobInfo.php?userID=$userID&search=$search_con&jobname=$jobname'>$jobname</a>";
							echo "<br>";
						}
						echo "</ul>";
					}
					else{
						echo "<font color=gray face=나눔고딕><b>검색 결과가 없습니다.</b></font>";
					}
				?>
			</div>
		</div>
	<div class="paging">
		<br><br>
		<?php
			for ($page = 1; $page <= $total_pages; $page++){
				$active_class = ($page == $current_page) ? "active" : "";
				echo "<a href='search_result.php?userID=$userID&search=$search_con&page=$page' class='$active_class'>$page </a>";
			}
		?>
	</div>
	</div>
</body>