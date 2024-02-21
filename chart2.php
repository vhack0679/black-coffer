<!DOCTYPE html>
<html>
<head>
    <title>Likelihood Chart</title>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.7.0/chart.min.js"></script>
</head>
<body>
    <div style="width: 80%; margin: 0 auto;">
        <canvas id="likelihoodChart"></canvas>
    </div>

    <?php
    // Database connection parameters
    $hostname = "localhost";
    $username = "root";
    $password = "";
    $database = "blackcoffer";

    // Connect to the database
    $conn = new mysqli($hostname, $username, $password, $database);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // SQL query to fetch likelihood data
    $sql = "SELECT end_year, likelihood FROM blackcoffer_tbl";

    $result = $conn->query($sql);

    // Initialize arrays to store data
    $labels = [];
    $likelihoodData = [];

    // Fetch and format data
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $labels[] = $row['end_year'];
            $likelihoodData[] = (int)$row['likelihood'];
        }
    }

    // Close the database connection
    $conn->close();
    ?>

    <script>
        // Get the canvas element by its id
        var ctx = document.getElementById('likelihoodChart').getContext('2d');

        // Create the chart
        var likelihoodChart = new Chart(ctx, {
            type: 'bar', // Chart type (pie chart)
            data: {
                labels: <?php echo json_encode($labels); ?>,
                datasets: [{
                    label: 'Likelihood',
                    data: <?php echo json_encode($likelihoodData); ?>,
                    backgroundColor: [
                        'rgba(75, 192, 192, 0.2)',
                        'rgba(255, 99, 132, 0.2)',
                        'rgba(255, 205, 86, 0.2)',
                        // Add more colors if needed
                    ],
                    borderColor: [
                        'rgba(75, 192, 192, 1)',
                        'rgba(255, 99, 132, 1)',
                        'rgba(255, 205, 86, 1)',
                        // Add more colors if needed
                    ],
                    borderWidth: 1
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false
                // You can customize other chart options here
            }
        });
    </script>
</body>
</html>
