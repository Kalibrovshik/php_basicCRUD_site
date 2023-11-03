<!DOCTYPE html>
<html>
<head>
    <title>Records with Date Difference Greater Than a Year</title>
    <style>
        table {
            border-collapse: collapse;
        }

        th, td {
            border: 1px solid black;
            padding: 8px;
        }
    </style>
</head>
<body>
    <?php
    $conn = new mysqli('localhost','root','','firmadogovor');
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    $sql = "SELECT *
            FROM dogovor
            WHERE DATEDIFF(datafinish, datastart) > 365";

    $result = $conn->query($sql);

    if ($result && $result->num_rows > 0) {
        echo "<table>
                <tr>
                    <th>Record ID</th>
                    <th>Date Start</th>
                    <th>Date End</th>
                </tr>";

        while ($row = $result->fetch_assoc()) {
            echo "<tr>
                    <td>" . $row['named'] . "</td>
                    <td>" . $row['datastart'] . "</td>
                    <td>" . $row['datafinish'] . "</td>
                </tr>";
        }

        echo "</table>";
    } else {
        echo "No records found.";
    }

    $conn->close();
    ?>
</body>
</html>
