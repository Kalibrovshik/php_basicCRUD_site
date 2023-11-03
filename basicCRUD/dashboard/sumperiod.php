<?php
	$bd = new mysqli('localhost','root','','firmadogovor');
	if ($bd->connect_error){
		die("connection error " . $bd->connect_error);
	}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Gather sum from dogovors</title>
</head>
<body>
    <form method="POST" action="">
        <label for="date_from">From:</label>
        <input type="date" id="date_from" name="date_from" required>
        <br>
        <label for="date_until">Until:</label>
        <input type="date" id="date_until" name="date_until" required>
        <br>
        <input type="submit" name="submit" value="Execute SQL Query">
    </form>

    <?php
    if (isset($_POST['submit'])) {
        
        $dateFrom = $_POST['date_from'];
        $dateUntil = $_POST['date_until'];

        $sql = "SELECT SUM(sumd) AS total_value
                FROM dogovor
                WHERE datastart >= '$dateFrom'
                AND datafinish <= '$dateUntil'";

        $result = $bd->query($sql);

        if ($result && $result->num_rows > 0) {
            
            $row = $result->fetch_assoc();
            $totalValue = $row['total_value'];

            echo "Total Value: " . $totalValue;
        } else {
            echo "No results found.";
        }
        $bd->close();
    }
    ?>
</body>
</html>
