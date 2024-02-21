<?php
// Database connection settings
$servername = "localhost";
$username = "root";
$password = ""; // If you have a password, add it here
$dbname = "blackcoffer"; // Your database name

// Create a connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check the connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// SQL queries to get counts
$sql_countries = "SELECT COUNT(DISTINCT country) AS country_count FROM blackcoffer_tbl WHERE country IS NOT NULL AND country <> ''";
$sql_articles = "SELECT COUNT(*) AS article_count FROM blackcoffer_tbl";
$sql_topic = "SELECT COUNT(*) AS topic_count FROM blackcoffer_tbl WHERE topic IS NOT NULL AND topic <> ''";

$result_countries = $conn->query($sql_countries);
$result_articles = $conn->query($sql_articles);
$result_topic= $conn->query($sql_topic);

$countryCount = "N/A";
$articleCount = "N/A";
$topicCount ="N/A";



if ($result_countries  && $result_articles && $result_topic) {
    // Fetch the results as associative arrays
    $row_countries = $result_countries->fetch_assoc();
	$row_articles = $result_articles->fetch_assoc();
	$row_topic = $result_topic->fetch_assoc();

    $countryCount = $row_countries['country_count'];
	$articleCount = $row_articles['article_count'];
    $topicCount  = $row_topic['topic_count'];

}

?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
  
	<!-- Boxicons -->
	<link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>
	<!-- My CSS -->
	<link rel="stylesheet" href="style.css">

	<title>Blackcoffer</title>
</head>
<body>


	<!-- SIDEBAR -->
	<section id="sidebar">
		<a href="#" class="brand">
			<i class='bx bxs'> </i>
			<span class="text">Blackcoffer</span>
		</a>
		<ul class="side-menu top">
			<li class="active">
				<a href="#">
					<i class='bx bxs-dashboard' ></i>
					<span class="text">Dashboard</span>
				</a>
			</li>
			<li>
				<a href="articleslist.php">
					<i class='bx bxs-book-reader' ></i>
					<span class="text">Articles List</span>
				</a>
			</li>
			<li>
				<a href="#">
					<i class='bx bxs-doughnut-chart' ></i>
					<span class="text">Article Analytics</span>
				</a>
			</li>
		
		</ul>
		<ul class="side-menu">
			<li>
				<a href="#">
					<i class='bx bxs-cog' ></i>
					<span class="text">Settings</span>
				</a>
			</li>
			<li>
				<a href="#" class="logout">
					<i class='bx bxs-log-out-circle' ></i>
					<span class="text">Logout</span>
				</a>
			</li>
		</ul>
	</section>
	<!-- SIDEBAR -->



	<!-- CONTENT -->
	<section id="content">
		<!-- NAVBAR -->
		<nav>
			<i class='bx bx-menu' ></i>
			
			<form action="#">
				<div class="form-input">
					<input type="search" placeholder="Search...">
					<button type="submit" class="search-btn"><i class='bx bx-search' ></i></button>
				</div>
			</form>
			<input type="checkbox" id="switch-mode" hidden>
			<label for="switch-mode" class="switch-mode"></label>
			<a href="#" class="notification">
				<i class='bx bxs-bell' ></i>
				<span class="num">8</span>
			</a>
			<a href="#" class="profile">
				<img src="dp.jpg">
			</a>
		</nav>
		<!-- NAVBAR -->

		<!-- MAIN -->
		<main>
        
        <div class="row">
            <?php
    include 'articleslist.php';

    ?>

            
            
        </div>
    </div>
  		

         
           
		</main>
		<!-- MAIN -->
	</section>
	<!-- CONTENT -->
	
			
	
	
    <script src="script.js"></script>
    <!-- Include jQuery and Bootstrap JavaScript from CDNs -->
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js"></script>
		
</body>
</html>