<?php
include "db.php"; 
session_start();

$bus_id = isset($_GET['bus_id']) ? intval($_GET['bus_id']) : 0;

// Fetch bus details
$bus_query = "SELECT * FROM bus WHERE bus_id = $bus_id";
$bus_result = mysqli_query($con, $bus_query);
$bus_data = mysqli_fetch_assoc($bus_result);

// Fetch bus stops
$stops_query = "SELECT * FROM bus_stops WHERE bus_id = $bus_id ORDER BY sequence ASC";
$stops_result = mysqli_query($con, $stops_query);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bus Stops</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f8f9fa;
            padding: 20px;
        }
        .container {
            max-width: 800px;
            margin: auto;
            background: white;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        h2 {
            text-align: center;
            color: #007bff;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 10px;
        }
        th, td {
            border: 1px solid #ddd;
            padding: 10px;
            text-align: center;
        }
        th {
            background-color: #007bff;
            color: white;
        }
        .form-container {
            margin-top: 20px;
            padding: 10px;
            background: #f1f1f1;
            border-radius: 5px;
        }
        .btn {
            background: #28a745;
            color: white;
            padding: 10px;
            border: none;
            cursor: pointer;
            border-radius: 5px;
            display: block;
            width: 100%;
            margin-top: 10px;
        }
        .btn:hover {
            background: #218838;
        }
        .result {
            margin-top: 15px;
            font-size: 18px;
            text-align: center;
            color: #333;
        }
    </style>
</head>
<body>

<div class="container">
    <h2>Bus Stops for <?php echo $bus_data['bustype'] . " - " . $bus_data['arrival'] . " to " . $bus_data['destination']; ?></h2>

    <table>
        <tr>
            <th>Stop Name</th>
            <th>Arrival Time</th>
            <th>Departure Time</th>
            <th>Day</th>
        </tr>
        <?php while ($stop = mysqli_fetch_assoc($stops_result)) { ?>
            <tr>
                <td><?php echo $stop['stop_name']; ?></td>
                <td><?php echo $stop['arrival_time']; ?></td>
                <td><?php echo $stop['departure_time']; ?></td>
                <td><?php echo $stop['day']; ?></td>
            </tr>
        <?php } ?>
    </table>

    <!-- User Input Form -->
    <div class="form-container">
        <form method="post">
            <label for="start_stop">Select Departure Stop:</label>
            <select name="start_stop" required>
                <option value="">-- Select Stop --</option>
                <?php
                mysqli_data_seek($stops_result, 0);
                while ($stop = mysqli_fetch_assoc($stops_result)) {
                    echo "<option value='" . $stop['stop_name'] . "'>" . $stop['stop_name'] . "</option>";
                }
                ?>
            </select>

            <label for="end_stop">Select Destination Stop:</label>
            <select name="end_stop" required>
                <option value="">-- Select Stop --</option>
                <?php
                mysqli_data_seek($stops_result, 0);
                while ($stop = mysqli_fetch_assoc($stops_result)) {
                    echo "<option value='" . $stop['stop_name'] . "'>" . $stop['stop_name'] . "</option>";
                }
                ?>
            </select>

            <button type="submit" name="calculate" class="btn">Calculate Estimated Time</button>
        </form>
    </div>

    <!-- Travel Time Calculation -->
    <?php
    if (isset($_POST['calculate'])) {
        $start_stop = mysqli_real_escape_string($con, $_POST['start_stop']);
        $end_stop = mysqli_real_escape_string($con, $_POST['end_stop']);

        if ($start_stop == $end_stop) {
            echo "<div class='result'>Error: Start and End Stop cannot be the same.</div>";
        } else {
            // Get start stop details
            $start_query = "SELECT arrival_time, day FROM bus_stops WHERE stop_name='$start_stop' AND bus_id=$bus_id";
            $start_res = mysqli_query($con, $start_query);
            $start_data = mysqli_fetch_assoc($start_res);

            // Get end stop details
            $end_query = "SELECT arrival_time, day FROM bus_stops WHERE stop_name='$end_stop' AND bus_id=$bus_id";
            $end_res = mysqli_query($con, $end_query);
            $end_data = mysqli_fetch_assoc($end_res);

            if ($start_data && $end_data) {
                $start_time = $start_data['arrival_time'];
                $end_time = $end_data['arrival_time'];
                $start_day = intval(str_replace("Day ", "", $start_data['day']));
                $end_day = intval(str_replace("Day ", "", $end_data['day']));

                // Calculate day difference
                $day_diff = $end_day - $start_day;
                
                // Calculate time difference
                $query = "SELECT TIMEDIFF('$end_time', '$start_time') AS travel_time";
                $res = mysqli_query($con, $query);
                $row = mysqli_fetch_assoc($res);
                $travel_time = $row['travel_time'];

                // If journey crosses days, add extra hours
                if ($day_diff > 0) {
                    $extra_hours = $day_diff * 24;
                    $query = "SELECT ADDTIME('$travel_time', '$extra_hours:00:00') AS total_travel_time";
                    $res = mysqli_query($con, $query);
                    $row = mysqli_fetch_assoc($res);
                    $travel_time = $row['total_travel_time'];
                }

                echo "<div class='result'>Estimated Travel Time: " . $travel_time . "</div>";
            } else {
                echo "<div class='result'>Error: Stops not found.</div>";
            }
        }
    }
    ?>

</div>

</body>
</html>
