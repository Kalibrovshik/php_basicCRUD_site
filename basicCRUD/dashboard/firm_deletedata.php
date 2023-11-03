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
      <h1>Delete record in the table? </h1>
    </header>
    <form method="post" enctype="multipart/form-data">
		<div class="row">
			<form method="post">
				<input type="submit" name="b_submit" id="b_submit" value="Submit" /><br/>
			</form>
		</div>
		</form>
        <?php
        #$_GET['id']
        function testfun(){
            $conn = new mysqli('localhost','root','','firmadogovor');
            $idcolumn = $_GET['id'];   
            $sql = "DELETE FROM firm WHERE id_firm = '$idcolumn'";
            if($conn->query($sql) == TRUE)
			{
				echo "Data deleted";
			}else{
				echo "Data NOT submitted";
			}
        }
        if(array_key_exists('b_submit',$_POST)){
			testfun();
			}
        ?>
</body>
</html>