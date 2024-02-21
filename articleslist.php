<!DOCTYPE html>
<html lang="en">
    <head>
                <meta charset="UTF-8">
                <meta name="viewport" content="width=device-width, initial-scale=1.0">
                <!-- My CSS -->
                <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
<title>Blackcoffer</title>
    </head>
<body>
    <style>

        </style>
            <div class="container  mx-2">
            <div class="row">
                <div class="col-md-12">
                    <div class="card mt-4">
                        <div class="card-header">
                            <h4>Data Filtering</h4>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-7">
                                    <form action="" method="GET">
                                        <div class="input-group mb-3">
                                            <input type="text" name="search" class="form-control" placeholder="Search data" value="<?php echo isset($_GET['search']) ? $_GET['search'] : ''; ?>">
                                            <button type="submit" class="btn btn-primary">Search</button>
                                        </div>
                                    </form>
                                </div>
                                
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-12">
                    <div class="mt-4">
                        <div class="card-body">
                            <table class="table table-bordered">
                                <thead><form action="" method="GET">
                                    <tr>
                                        <th><select name="end_year_filter" class="form-select mb-2" onchange="this.form.submit()">
                                                    <option value="">End Year</option>
                                                    <!-- Populate options with unique end year values from your data -->
                                                    <?php
                                                    $con = mysqli_connect("localhost", "root", "", "blackcoffer");
                                                    if ($con) {
                                                        $query = "SELECT DISTINCT end_year FROM blackcoffer_tbl";
                                                        $result = mysqli_query($con, $query);
                                                        while ($row = mysqli_fetch_assoc($result)) {
                                                            $selected = ($_GET['end_year_filter'] == $row['end_year']) ? 'selected' : '';
                                                            echo "<option value='{$row['end_year']}' $selected>{$row['end_year']}</option>";
                                                        }
                                                        mysqli_close($con);
                                                    }
                                                    ?>
                                                </select></th>
                                        <th>City Longitude</th>
                                        <th>City Latitude</th>
                                        <th>Intensity</th>
                                        <th><select name="sector_filter" class="form-select mb-2" onchange="this.form.submit()">
                                                <option value="">sector</option>
                                                    <?php
                                                    $con = mysqli_connect("localhost", "root", "", "blackcoffer");
                                                    if ($con) {
                                                        $query = "SELECT DISTINCT sector FROM blackcoffer_tbl WHERE sector IS NOT NULL AND sector <> ''";
                                                        $result = mysqli_query($con, $query);
                                                        while ($row = mysqli_fetch_assoc($result)) {
                                                            $selected = ($_GET['sector_filter'] == $row['sector']) ? 'selected' : '';
                                                            echo "<option value='{$row['sector']}' $selected>{$row['sector']}</option>";
                                                        }
                                                        mysqli_close($con);
                                                    }
                                                    ?>
                                                </select></th>
                                        <th> <select name="topics_filter" class="form-select mb-2" onchange="this.form.submit()">
                                                <option value="">topic</option>
                                                    <?php
                                                    $con = mysqli_connect("localhost", "root", "", "blackcoffer");
                                                    if ($con) {
                                                        $query = "SELECT DISTINCT topic FROM blackcoffer_tbl WHERE topic IS NOT NULL AND topic <> ''";
                                                        $result = mysqli_query($con, $query);
                                                        while ($row = mysqli_fetch_assoc($result)) {
                                                            $selected = ($_GET['topics_filter'] == $row['topic']) ? 'selected' : '';
                                                            echo "<option value='{$row['topic']}' $selected>{$row['topic']}</option>";
                                                        }
                                                        mysqli_close($con);
                                                    }
                                                    ?>
                                                </select></th>
                                        <th>Insight</th>
                                        <th><select name="swot_filter" class="form-select mb-2" onchange="this.form.submit()">
                                                <option value="">swot</option>
                                                    <?php
                                                    $con = mysqli_connect("localhost", "root", "", "blackcoffer");
                                                    if ($con) {
                                                        $query = "SELECT DISTINCT swot FROM blackcoffer_tbl WHERE swot IS NOT NULL AND swot <> ''";
                                                        $result = mysqli_query($con, $query);
                                                        while ($row = mysqli_fetch_assoc($result)) {
                                                            $selected = ($_GET['swot_filter'] == $row['swot']) ? 'selected' : '';
                                                            echo "<option value='{$row['swot']}' $selected>{$row['swot']}</option>";
                                                        }
                                                        mysqli_close($con);
                                                    }
                                                    ?>
                                                </select></th>
                                        <th>URL</th>
                                        <th><select name="region_filter" class="form-select mb-2" onchange="this.form.submit()">
                                                <option value="">region</option>
                                                    <?php
                                                    $con = mysqli_connect("localhost", "root", "", "blackcoffer");
                                                    if ($con) {
                                                        $query = "SELECT DISTINCT region FROM blackcoffer_tbl WHERE region IS NOT NULL AND region <> ''";
                                                        $result = mysqli_query($con, $query);
                                                        while ($row = mysqli_fetch_assoc($result)) {
                                                            $selected = ($_GET['region_filter'] == $row['region']) ? 'selected' : '';
                                                            echo "<option value='{$row['region']}' $selected>{$row['region']}</option>";
                                                        }
                                                        mysqli_close($con);
                                                    }
                                                    ?>
                                                </select></th>
                                        <th>Start Year</th>
                                        <th>Impact</th>
                                        <th>Added</th>
                                        <th>Published</th>
                                        <th><select name="city_filter" class="form-select mb-2" onchange="this.form.submit()">
                                                <option value="">city</option>
                                                    <?php
                                                    $con = mysqli_connect("localhost", "root", "", "blackcoffer");
                                                    if ($con) {
                                                        $query = "SELECT DISTINCT city FROM blackcoffer_tbl WHERE city IS NOT NULL AND city <> ''";
                                                        $result = mysqli_query($con, $query);
                                                        while ($row = mysqli_fetch_assoc($result)) {
                                                            $selected = ($_GET['city_filter'] == $row['city']) ? 'selected' : '';
                                                            echo "<option value='{$row['city']}' $selected>{$row['city']}</option>";
                                                        }
                                                        mysqli_close($con);
                                                    }
                                                    ?>
                                                </select></th>
                                        <th><select name="country_filter" class="form-select mb-2" onchange="this.form.submit()">
                                                <option value="">country</option>
                                                    <?php
                                                    $con = mysqli_connect("localhost", "root", "", "blackcoffer");
                                                    if ($con) {
                                                        $query = "SELECT DISTINCT country FROM blackcoffer_tbl WHERE country IS NOT NULL AND country <> ''";
                                                        $result = mysqli_query($con, $query);
                                                        while ($row = mysqli_fetch_assoc($result)) {
                                                            $selected = ($_GET['country_filter'] == $row['country']) ? 'selected' : '';
                                                            echo "<option value='{$row['country']}' $selected>{$row['country']}</option>";
                                                        }
                                                        mysqli_close($con);
                                                    }
                                                    ?>
                                                </select></th>
                                        <th>Relevance</th>
                                        <th>
                                        <select name="pestle_filter" class="form-select mb-2" onchange="this.form.submit()">
                                                <option value="">pestle</option>
                                                    <?php
                                                    $con = mysqli_connect("localhost", "root", "", "blackcoffer");
                                                    if ($con) {
                                                        $query = "SELECT DISTINCT pestle FROM blackcoffer_tbl WHERE pestle IS NOT NULL AND pestle <> ''";
                                                        $result = mysqli_query($con, $query);
                                                        while ($row = mysqli_fetch_assoc($result)) {
                                                            $selected = ($_GET['pestle_filter'] == $row['pestle']) ? 'selected' : '';
                                                            echo "<option value='{$row['pestle']}' $selected>{$row['pestle']}</option>";
                                                        }
                                                        mysqli_close($con);
                                                    }
                                                    ?>
                                                </select>
                                        </th>
                                        <th><select name=source_filter" class="form-select mb-2" onchange="this.form.submit()">
                                                <option value="">source</option>
                                                    <?php
                                                    $con = mysqli_connect("localhost", "root", "", "blackcoffer");
                                                    if ($con) {
                                                        $query = "SELECT DISTINCT source FROM blackcoffer_tbl WHERE source IS NOT NULL AND source <> ''";
                                                        $result = mysqli_query($con, $query);
                                                        while ($row = mysqli_fetch_assoc($result)) {
                                                            $selected = ($_GET['source_filter'] == $row['source']) ? 'selected' : '';
                                                            echo "<option value='{$row['source']}' $selected>{$row['source']}</option>";
                                                        }
                                                        mysqli_close($con);
                                                    }
                                                    ?>
                                                </select></th>
                                        <th>Title</th>
                                        <th>Likelihood</th>
                                    </tr> </form>
                                </thead>
                                <tbody>
                                    <?php
                                    $con = mysqli_connect("localhost", "root", "", "blackcoffer");

                                    if ($con) {
                                        $query = "SELECT * FROM blackcoffer_tbl WHERE 1";

                                        if (isset($_GET['search'])) {
                                            $filterValue = $_GET['search'];
                                            $query .= " AND (end_year LIKE '%$filterValue%' OR citylng LIKE '%$filterValue%' OR citylat LIKE '%$filterValue%' OR intensity LIKE '%$filterValue%' OR sector LIKE '%$filterValue%' OR topic LIKE '%$filterValue%' OR insight LIKE '%$filterValue%' OR swot LIKE '%$filterValue%' OR url LIKE '%$filterValue%' OR region LIKE '%$filterValue%' OR start_year LIKE '%$filterValue%' OR impact LIKE '%$filterValue%' OR added LIKE '%$filterValue%' OR published LIKE '%$filterValue%' OR city LIKE '%$filterValue%' OR country LIKE '%$filterValue%' OR relevance LIKE '%$filterValue%' OR pestle LIKE '%$filterValue%' OR source LIKE '%$filterValue%' OR title LIKE '%$filterValue%' OR likelihood LIKE '%$filterValue%')";
                                        }

                                        // Apply filters
                                        if (!empty($_GET['end_year_filter'])) {
                                            $endYearFilter = $_GET['end_year_filter'];
                                            $query .= " AND end_year = '$endYearFilter'";
                                        }
                                        if (!empty($_GET['topics_filter'])) {
                                            $topicFilter = $_GET['topics_filter'];
                                            $query .= " AND topic = '$topicFilter'";
                                        }

                                        // Add similar code for other filters (e.g., topics_filter, sector_filter, region_filter, etc.)

                                        $query_run = mysqli_query($con, $query);

                                        if (mysqli_num_rows($query_run) > 0) {
                                            while ($row = mysqli_fetch_assoc($query_run)) {
                                                ?>
                                                <tr>
                                                    <td><?= $row['end_year']; ?></td>
                                                    <td><?= $row['citylng']; ?></td>
                                                    <td><?= $row['citylat']; ?></td>
                                                    <td><?= $row['intensity']; ?></td>
                                                    <td><?= $row['sector']; ?></td>
                                                    <td><?= $row['topic']; ?></td>
                                                    <td><?= $row['insight']; ?></td>
                                                    <td><?= $row['swot']; ?></td>
                                                    <td><?= $row['url']; ?></td>
                                                    <td><?= $row['region']; ?></td>
                                                    <td><?= $row['start_year']; ?></td>
                                                    <td><?= $row['impact']; ?></td>
                                                    <td><?= $row['added']; ?></td>
                                                    <td><?= $row['published']; ?></td>
                                                    <td><?= $row['city']; ?></td>
                                                    <td><?= $row['country']; ?></td>
                                                    <td><?= $row['relevance']; ?></td>
                                                    <td><?= $row['pestle']; ?></td>
                                                    <td><?= $row['source']; ?></td>
                                                    <td><?= $row['title']; ?></td>
                                                    <td><?= $row['likelihood']; ?></td>
                                                </tr>
                                                <?php
                                            }
                                        } else {
                                            ?>
                                            <tr>
                                                <td colspan="21">No Record Found</td>
                                            </tr>
                                            <?php
                                        }
                                        mysqli_close($con);
                                    } else {
                                        echo "Failed to connect to the database.";
                                    }
                                    ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    
   		
	

	
</body>
</html>