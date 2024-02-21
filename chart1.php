<!DOCTYPE html>
<html>
<head>
    <title>Intensity Chart</title>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.7.0/chart.min.js"></script>
</head>
<body>
    <div style="width: 80%; margin: 0 auto;">
        <canvas id="intensityChart"></canvas>
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

    // SQL query to fetch intensity data
    $sql = "SELECT end_year, intensity FROM blackcoffer_tbl";

    $result = $conn->query($sql);

    // Initialize arrays to store data
    $labels = [];
    $intensityData = [];

    // Fetch and format data
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $labels[] = $row['end_year'];
            $intensityData[] = (int)$row['intensity'];
        }
    }

    // Close the database connection
    $conn->close();
    ?>

    <script>
        // Get the canvas element by its id
        var ctx = document.getElementById('intensityChart').getContext('2d');

        // Create the chart
        var intensityChart = new Chart(ctx, {
            type: 'bar', // Chart type (bar chart)
            data: {
                labels: <?php echo json_encode($labels); ?>,
                datasets: [{
                    label: 'Intensity',
                    data: <?php echo json_encode($intensityData); ?>,
                    backgroundColor: 'rgba(75, 192, 192, 0.2)',
                    borderColor: 'rgba(75, 192, 192, 1)',
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                },
                responsive: true,
                maintainAspectRatio: false
            }
        });
    </script>
</body>
</html>
