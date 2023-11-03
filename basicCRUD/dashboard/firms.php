<?php
	$bd = new mysqli('localhost','root','','firmadogovor');
	if ($bd->connect_error){
		die("connection error " . $bd->connect_error);
	}
?>

<!doctype html>

<html lang="en">
<head>
	<meta charset="utf-8">
    <!-- Always force latest IE rendering engine or request Chrome Frame -->
    <meta content="IE=edge,chrome=1" http-equiv="X-UA-Compatible">
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
	
	<title>Firms</title>
	<meta name="description" content="FirmaDogovor Section of the site." />
    <meta name="keywords" content="xampp, apache, php, perl, mariadb, open source distribution" />

    <link href="/dashboard/stylesheets/normalize.css" rel="stylesheet" type="text/css" /><link href="/dashboard/stylesheets/all.css" rel="stylesheet" type="text/css" />
    <link href="//cdnjs.cloudflare.com/ajax/libs/font-awesome/3.1.0/css/font-awesome.min.css" rel="stylesheet" type="text/css" />

    <script src="/dashboard/javascripts/modernizr.js" type="text/javascript"></script>


    <link href="/dashboard/images/singer.png" rel="icon" type="image/png" />
</head>
<body>
	<header class="header contain-to-grid">
      <nav class="top-bar" data-topbar>
        <ul class="title-area">
          <li class="name">
            <h1>Firms</h1>
          </li>
          <li class="toggle-topbar menu-icon">
            <a href="#">
              <span>Menu</span>
            </a>
          </li>
        </ul>
      </nav>
    </header>
	<table class="table">
		<thead>
			<tr>
				<th>#</th>
				<th>Firma</th>
				<th>Shef</th>
				<th>Address</th>
				<th></th>
			</tr>
		</thead>
		<tbody>
		<?php
			$sql = "SELECT * FROM firm";
			
			if($result = $bd -> query($sql))
			{
				$id = 0;
				while($row = $result -> fetch_row())
				{
					$id++;
					echo "<tr><td>" . $id .
						"</td><td>" . $row[1] .
						"</td><td>" . $row[2] .
						"</td><td>" . $row[3] .
						"</td><td><a href='dogovora.php?id=" . $row[0] . "'>Dogovora</a>
						</td><td><a href='firm_editdata.php?id=" . $row[0] . "'>Redaguvaty</a>
						</td><td><a href='firm_drop.php?id=" . $row[0] . "'>Vydality</a>
						</td><br>";
				}
				$result -> free_result();
			}
		?>
		</tbody>
	</table>
	<div class="center">
		<br>
		<br>
		<a class="btn" href="firms.php">Firms</a>
		<a href="/dashboard/firmadogovorindex.html">FirmaDogovor</a>
		<a class="btn" href="firm_createnew.php">Add firm</a>
		<a class="btn" href="dogovora.php">Dogovora</a>
		<a class="btn" href="sumperiod.php">Request sum from period</a>
		<a class="btn" href="longtermdogovors.php">Long term dogovors</a>
</body>
</html>