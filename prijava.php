<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Prijava</title>
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
								<div class="col-lg-2 ffs"><a href="kategorija.php?id=monde" class="">MONDE</a></div>
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
								<div class="col-lg-4 ffs"></div>
								<div class="col-lg-2 ffs"></div>
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

	<div class="container-fluid main">
		<form method="post"> 
			<label for="username">Korisničko ime:</label>
			<input type="text" name="username" id="username">
			<br/>
			<label for="pass">Lozinka:</label>
			<input type="password" name="pass" id="pass">
			<br/>
			<input type="submit" name="posalji" id="posalji" value="Posalji">
		</form>
	</div>
	<?php

		$conn = new mysqli("localhost", "root", "", "lexpress"); 		
  		if ($conn->connect_error)
    		die("Connection failed: " . $conn->connect_error);

    	if(isset($_POST['posalji']))
    	{
    		$username = $_POST['username'];
    		$pass = $_POST['pass'];
    		$sql = "SELECT pristup, lozinka FROM korisnik WHERE k_ime = ?";
    		$stmt = mysqli_stmt_init($conn);
			if (mysqli_stmt_prepare($stmt, $sql)) {
				mysqli_stmt_bind_param($stmt, 's', $username);
				mysqli_stmt_execute($stmt);
				mysqli_stmt_store_result($stmt);
			}
			if(mysqli_stmt_num_rows($stmt) > 0)
			{
				mysqli_stmt_bind_result($stmt, $pristup, $lozinka);
				mysqli_stmt_fetch($stmt);
				if(password_verify($pass, $lozinka))
				{
					$_SESSION['pristup'] = $pristup;
					$_SESSION['brojac'] = 8;
					header("location:index.php");
				}
				else{
					echo "Krivo korisnicko ime ili lozinka.";
				}
			}
			else{
				echo "Krivo korisnicko ime ili lozinka.";
			}
    	}

	?>


	<footer>
		Jan Hršak
		<br/>
		jhrsak@tvz.hr
		<br/>
		2022.

	</footer>

</body>
</html>