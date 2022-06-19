<!DOCTYPE html>
<html>
	<?php
		$kategorija=$_GET["id"];
	?>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title><?php echo strtoupper($kategorija)?></title>
	<link rel="stylesheet" type="text/css" href="style.css?v=<?php echo time(); ?>">
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous"/>
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.2/css/all.css" integrity="sha384-vSIIfh2YWi9wW0r9iZe7RJPrKwp6bG+s9QZMoITbCckVJqGCCRhc+ccxNcdpHuYu" crossorigin="anonymous" />

</head>
<body>
	<header>
		<div class="container">
			<div class="row">
				<div class="col-lg-5 col-md-5 col-sm-5 col-xs-5"></div>
				<div class="col-lg-7 col-md-7 col-sm-7 col-xs-7">
					<img src="images/lexLogo.png" class="logo" />
				</div>
			</div>
		</div>
		
		<nav>
			<div class="container">
				<div class="row">
					<div class="col-lg-6">
						<div class="container navigacija">
							<div class="row">
								<div class="col-lg-2 ffs"><a href="index.php"> HOME </a></div>
								<div class="col-lg-2 ffs"><a href="kategorija.php?id=monde" class=""> MONDE </a></div>
								<div class="col-lg-2 ffs"><a href="kategorija.php?id=economie" class=""> ECONOMIE </a></div>
								<div class="col-lg-3 ffs">
									<?php
										session_start();
										if(isset($_SESSION['pristup']))
										{
											if($_SESSION['pristup'] === 1)	
												echo '<a href="administracija.php"> ADMINISTRACIJA </a>';
										}

									?>
								</div>
								<div class="col-lg-3 ffs"><a href="#"> OFFRES LOCALES </a></div>
							</div>
						</div>
					</div>
					<div class="col-lg-6">
						<div class="container navigacija">
							<div class="row">
								<div class="col-lg-4 ffs"></div>
								<div class="col-lg-4 ffs">
									<?php
										if(isset($_SESSION['pristup']))
											echo '<a href="unos.php"> UNOS </a>';
									?>
								</div>
								<div class="col-lg-2 ffs">
									<?php
										if(isset($_SESSION['pristup']))
											echo "<a href='odjava.php'> ODJAVA</a>";
										else
											echo "<a href='prijava.php'> PRIJAVA</a>";

									?>								
								</div>
								<div class="col-lg-2 ffs">
									<?php
										if(!isset($_SESSION['pristup']))
											echo '<a href="registracija.php"> REGISTRACIJA</a>';
									?>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</nav>
	</header>

	<?php
		

		$conn = new mysqli("localhost", "root", "", "lexpress");
  		
  		if ($conn->connect_error)
    		die("Connection failed: " . $conn->connect_error);

		$sql = "SELECT id, slika, naslov, opis FROM clanci WHERE kategorija = '$kategorija' ORDER BY id DESC;";

		$result = mysqli_query($conn, $sql);
	?>

	<div class="container-fluid main">
		<div class="container">
			<div class="row naslov"> <h3><?php echo strtoupper($kategorija)?></h3> </div>
			<div class="container sekta">
				<div class="row">
				<?php
					while($row = mysqli_fetch_array($result))
					{
						echo "<div class='col-lg-3 col-md-3 col-sm-3 col-sm-3'>";
						echo "<div>";
						echo "<a href = 'clanak.php?id=". $row["id"] ."'><img src='images/". $row["slika"]."' /></a>";
						echo "<h4>".$row["naslov"]."</h4>";
						echo "<p>". $row["opis"] ."</p>";
						echo "</div></div>";
					}
				?>
				</div>
			</div>
		</div>
	</div>

	<footer>
		Jan Hršak
		<br/>
		jhrsak@tvz.hr
		<br/>
		2022.

	</footer>

	<?php
		$conn->close();
	?>
</body>
</html>