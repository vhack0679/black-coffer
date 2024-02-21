<?php
// Database connection settings
$servername = "localhost";
$username = "root";
$password = ""; 
$dbname = "blackcoffer"; 

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
    // Assuming that $result_countries, $result_articles, and $result_topic are the results of previous MySQLi queries

    // Fetch the results as associative arrays
    $row_countries = $result_countries->fetch_assoc();
    $row_articles = $result_articles->fetch_assoc();
    $row_topic = $result_topic->fetch_assoc();

    // Extract the values of 'country_count', 'article_count', and 'topic_count' from the associative arrays
    $countryCount = $row_countries['country_count'];
    $articleCount = $row_articles['article_count'];
    $topicCount  = $row_topic['topic_count'];

    // The fetched values can be used for further processing or displaying data
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
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
				<a href="articleslist1.php">
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
			
			
			
			
		</nav>
		<!-- NAVBAR -->

		<!-- MAIN -->
		<main>
			<div class="head-title">
				<div class="left">
					<h1>Dashboard</h1>
					
				</div>
			
			</div>

			<ul class="box-info">
				<li>
					<i class='bx bxs' >
					<img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABgAAAAYCAYAAADgdz34AAAAAXNSR0IArs4c6QAAAb5JREFUSEu9lYExBEEQRe8iQAROBIjAyYAIrAgQgRMBInAiuBOBFQEisCJABPy31b3V9uZmF3W66tfs9Mz8P9PT0zscrNiGK+Yf9BEotIk9YcfAnp4Mc7V3uU3mBA608FIYdZyy0viZgNiCLRO40syTxPxd8z0mxliD0DdLCTj5h2ZOLCxHai+sDwH+cwtPaf01tdfCaVRoCxCWmQD5WKiEN1uwZX266/YNKX76CNE/FJpwtQUg3BSOhalQCDcCF4l4NMbjyXwuHIjWFgV8wrP8ZAzmJMSW0EXz0z7IObYBsmtbaE4RBVJkpSaTovsC39EIC+F7FzZsgPiTebdCgS8KuDqZwjf2aS0EELUNH3H3cU5OhrG+zrgo4GQJnl+5au5/FUiFqB2CviFqEuUvlxzvyHmyl+xp11yQGKYCue7vIp7gx2nK4kqID813lHpoXlK8PPjcV3GMfCfLSgWxJ/dpX6zldXqq8gbw03oBvLd+tlQg7DuDbCKwgMeWKna84lKg8iLWWez8ZC4SY853e7dxfIGcwa4fDkLcSc6IOfGfpyblBHw+2QIoAxQyjDwn2yBNEvviPgIdB8gPr1zgC9T2dhnaA0PxAAAAAElFTkSuQmCC"/>
					</i>
					<span class="text">
						<h3><?php echo $countryCount; ?></h3>
						<p>No.Of countries</p>
					</span>
				</li>
				<li>
					<i class='bx bxs' >
					<img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABgAAAAYCAYAAADgdz34AAAAAXNSR0IArs4c6QAAAPxJREFUSEvtlWENwjAUhDcFgAKQgANwAA6YBHCAAywMB0gYDpAADkAB3Ld0SdnK2hKa8GNNLmu3vrvXa/uWZ4lbnpg/CxUYK5GDsBbol8JOuPsSDBU4iWjVIjtqXPxK4OkgIvtJSoGHsatX428sajZ2qXRHAv5vYze58bkygRc96Z89PiO6EObGMsa02h3bItdGMofN5BSRNYI0SDZCc2xdOQQL2MG2gGdh4SvwEX36/tUKYsQGAa9bg0XxFu0VQs3hys+EqZfifcJNw6tAieH2w9f7R0OMkkA5ABQ5u1GuKSGgMqSdnELLNYGFAf3SoEPYfhEj4CVzTUgu8AJvfS8ZS3trIgAAAABJRU5ErkJggg=="/>
					</i>
					<span class="text">
						<h3><?php echo $articleCount; ?></h3>
						<p>No.Of article</p>
					</span>
				</li>
				<li>
					<i class='bx bxs' >
					<img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABgAAAAYCAYAAADgdz34AAAAAXNSR0IArs4c6QAAAUdJREFUSEu1VYsVwUAQjArQARWgAlSADqICVIAK6EB0oAPRARVICVTATN6dF+e+kux7+yTrzOzezq5GVLM1asaPQgmuSOgFH/gmFkIQA/QggOf4THxIQghSAA4FKJ/HVRKMAHZWAElAIqv5VnACykRBOuKd11aaoAOEuwGli3hmYyhWMMXBHpyAdFoL3nckSWU9xBmS0W9wVv0lU8qvSsuTL1YQ413KsCzRR8Zqk8uSPJHZEp7IDHUq+peE4CM4e/Ixk0xDSbTgag/Ue98jsPBshnHobIOWAlyuBhfPCgeY0I/ZCEJkexH3703AZqm7x1VFGwfkwDmbTKntNIhbEVtrvpshlk9v0UxXpC43jj6VJSXI9ZHAuVqkaZefiYClNsUvmfXGcD+My2oyPHP5eVUgMy1mbeDIlyGrof0sRt//AxO4M147wRsXyTUZaHkP2AAAAABJRU5ErkJggg=="/>

					</i>
					<span class="text">
						<h3><?php echo $topicCount; ?></h3>
						<p>No.Of topics</p>
					</span>
				</li>
			</ul> 

						<?php
							require 'chart1.php';
							require 'chart2.php';
							
						?>
         
			
				
		</main>
		<!-- MAIN -->
	</section>
	<!-- CONTENT -->
	

	<script src="script.js"></script>
</body>
</html>