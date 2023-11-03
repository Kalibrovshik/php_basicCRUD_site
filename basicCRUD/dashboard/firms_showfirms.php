<!DOCTYPE html>
<html>
<head>
    <title>Database Viewer</title>
    <style>
        table {
            border-collapse: collapse;
        }

        table, th, td {
            border: 1px solid black;
            padding: 5px;
        }
    </style>
</head>
<body>
    <?php
    // Database connection settings
    $host = 'localhost';
    $dbname = 'firmadogovor';
    $username = 'root';
    $password = '';

    try {
        // Create a new PDO instance
        $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $username, $password);

        // Fetch database records
        $query = "SELECT * FROM firm";
        $stmt = $pdo->query($query);
        $records = $stmt->fetchAll(PDO::FETCH_ASSOC);

        // Display the records in a table
        if (count($records) > 0) {
            echo '<table>';
            echo '<tr>';
            foreach ($records[0] as $key => $value) {
                echo '<th>' . $key . '</th>';
            }
            echo '</tr>';
            foreach ($records as $record) {
                echo '<tr>';
                foreach ($record as $value) {
                    echo '<td>' . $value . '</td>';
                }
                echo '</tr>';

                // Fetch and display records from another table
                $otherTableQuery = "SELECT * FROM your_other_table_name WHERE id = :id";
                $otherTableStmt = $pdo->prepare($otherTableQuery);
                $otherTableStmt->bindParam(':id', $record['id'], PDO::PARAM_INT);
                $otherTableStmt->execute();
                $otherTableRecords = $otherTableStmt->fetchAll(PDO::FETCH_ASSOC);

                if (count($otherTableRecords) > 0) {
                    echo '<tr>';
                    echo '<td colspan="' . count($record) . '">';

                    echo '<table>';
                    echo '<tr>';
                    foreach ($otherTableRecords[0] as $key => $value) {
                        echo '<th>' . $key . '</th>';
                    }
                    echo '</tr>';
                    foreach ($otherTableRecords as $otherTableRecord) {
                        echo '<tr>';
                        foreach ($otherTableRecord as $value) {
                            echo '<td>' . $value . '</td>';
                        }
                        echo '</tr>';
                    }
                    echo '</table>';

                    echo '</td>';
                    echo '</tr>';
                }
            }
            echo '</table>';
        } else {
            echo 'No records found.';
        }
    } catch (PDOException $e) {
        die('Error: ' . $e->getMessage());
    }

    // Close the PDO connection
    $pdo = null;
    ?>

    <h3>Other Databases:</h3>
    <ul>
        <li><a href="other_database1.php">Other Database 1</a></li>
        <li><a href="other_database2.php">Other Database 2</a></li>
        <!-- Add more links for other databases as needed -->
    </ul>
</body>
</html>