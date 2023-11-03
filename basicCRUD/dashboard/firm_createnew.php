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
	
	<title>Add new firm</title>
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
            <h1>Addnew firm</h1>
          </li>
          <li class="toggle-topbar menu-icon">
            <a href="#">
              <span>Menu</span>
            </a>
          </li>
        </ul>
      </nav>
    </header>
	<form method="post" enctype="multipart/form-data">
		<div class="row">
			<div class="field">
				<br><br>
				<label>Nazva<input type="text" name="name" required=""></label>
			</div>
		</div>
		<div class="row">
			<div class="field">
				<br>	
				<label>Shef<input type="text" name="shef" required=""></label>
			</div>
		</div>
		<div class="row">
			<div class="field">
				<br>
				<label>Address<input type="text" name="address" required=""></label>
			</div>
		</div>
		<div class="row">
			<form method="post">
				<input type="submit" name="b_submit" id="b_submit" value="Submit" /><br/>
			</form>
		</div>
		<!--div class="center">
			<input type="submit" class="btn" name="b_submit" value="Submit">
		</div-->
		</form>
		<tbody>
		<?php
			
			function testfun()
			{
				$name = "";
				$shef = "";
				$address = "";
				
				if(!empty($_POST["name"]) && !empty($_POST["shef"]) && !empty($_POST["address"]))
				{
					$name=$_POST["name"];
					$shef=$_POST["shef"];
					$address=$_POST["address"];
						
					$conn = new mysqli('localhost','root','','firmadogovor');
					$sql = "INSERT INTO firm (name, shef, address) 
					VALUES ('$name', '$shef', '$address')";
					if($conn->query($sql) == TRUE)
					{
						echo "Data submitted";
					}else{
						echo "Data NOT submitted";
					}
				}			
			}

			if(array_key_exists('b_submit',$_POST)){
			testfun();
			}
		?>
		</tbody>
	</table>
	<div class="center">
		<br>
		<a class="btn" href="firms.php">Firms</a>
		<a href="/dashboard/firmadogovorindex.html">FirmaDogovor</a>
</body>
</html>