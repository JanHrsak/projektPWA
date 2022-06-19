<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Registracija</title>
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
								<div class="col-lg-3 ffs"></div>
								<div class="col-lg-3 ffs"><a href="#"> OFFRES LOCALES </a></div>
							</div>
						</div>
					</div>
					<div class="col-lg-6">
						<div class="container navigacija">
							<div class="row">
								<div class="col-lg-4 ffs"></div>
								<div class="col-lg-4 ffs"></div>
								<div class="col-lg-2 ffs"><a href='prijava.php'> PRIJAVA</a></div>
								<div class="col-lg-2 ffs"></div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</nav>
	</header>

	<div class="container-fluid main">
		<section role="main">
			<form enctype="multipart/form-data" action="" method="POST">
				<div class="form-item">
					<span id="porukaIme" class="bojaPoruke"></span>
					<label for="title">Ime: </label>
					<div class="form-field">
						<input type="text" name="ime" id="ime" class="form-field-textual">
					</div>
				</div>
				<div class="form-item">
					<span id="porukaPrezime" class="bojaPoruke"></span>
					<label for="about">Prezime: </label>
					<div class="form-field">
						<input type="text" name="prezime" id="prezime" class="form-field-textual">
					</div>
				</div>
				<div class="form-item">
					<span id="porukaUsername" class="bojaPoruke"></span>
					<label for="content">Korisničko ime:</label>
					<div class="form-field">
						<input type="text" name="username" id="username" class="form-field-textual">
					</div>
				</div>
				<div class="form-item">
					<span id="porukaPass" class="bojaPoruke"></span>
					<label for="pphoto">Lozinka: </label>
					<div class="form-field">
							<input type="password" name="pass" id="pass" class="form-field-textual">
					</div>
				</div>
				<div class="form-item">
					<span id="porukaPassRep" class="bojaPoruke"></span>
					<label for="pphoto">Ponovite lozinku: </label>
					<div class="form-field">
						<input type="password" name="passRep" id="passRep" class="form-field-textual">
					</div>
				</div>
				<div class="form-item">
					<button type="submit" value="Prijava" name="slanje" id="slanje">Prijava</button>
				</div>
			</form>
		</section>
	</div>



	<script type="text/javascript">
		document.getElementById("slanje").onclick = function(event) {
			var slanjeForme = true;
			var poljeIme = document.getElementById("ime");
			var ime = document.getElementById("ime").value;
			if (ime.length == 0) {
				slanjeForme = false;
				poljeIme.style.border="1px dashed red";
				document.getElementById("porukaIme").innerHTML="<br>Unesite ime!<br>";
			} else {
				poljeIme.style.border="1px solid green";
				document.getElementById("porukaIme").innerHTML="";
			}
			var poljePrezime = document.getElementById("prezime");
			var prezime = document.getElementById("prezime").value;
			if (prezime.length == 0) {
				slanjeForme = false;
				poljePrezime.style.border="1px dashed red";
				document.getElementById("porukaPrezime").innerHTML="<br>Unesite Prezime!<br>";
			} else {
				poljePrezime.style.border="1px solid green";
				document.getElementById("porukaPrezime").innerHTML="";
			}
			var poljeUsername = document.getElementById("username");
			var username = document.getElementById("username").value;
			if (username.length == 0) {
				slanjeForme = false;
				poljeUsername.style.border="1px dashed red";
				document.getElementById("porukaUsername").innerHTML="<br>Unesite korisničko ime!<br>";
			} else {
				poljeUsername.style.border="1px solid green";
				document.getElementById("porukaUsername").innerHTML="";
			}
			var poljePass = document.getElementById("pass");
			var pass = document.getElementById("pass").value;
			var poljePassRep = document.getElementById("passRep");
			var passRep = document.getElementById("passRep").value;
			if (pass.length == 0 || passRep.length == 0 || pass != passRep) {
				slanjeForme = false;
				poljePass.style.border="1px dashed red";
				poljePassRep.style.border="1px dashed red";
				document.getElementById("porukaPass").innerHTML="<br>Lozinke nisu iste!<br>";
				document.getElementById("porukaPassRep").innerHTML="<br>Lozinke nisu iste!<br>";
			} else {
				poljePass.style.border="1px solid green";
				poljePassRep.style.border="1px solid green";
				document.getElementById("porukaPass").innerHTML="";
				document.getElementById("porukaPassRep").innerHTML="";
			}
			if (slanjeForme != true) {
				event.preventDefault();
			}
	
		};
	</script>

<?php
	$conn = new mysqli("localhost", "root", "", "lexpress");
  		
  	if ($conn->connect_error)
    	die("Connection failed: " . $conn->connect_error);

    if(isset($_POST['slanje']))
	{
		$ime = $_POST['ime'];
		$prezime = $_POST['prezime'];
		$username = $_POST['username'];
		$lozinka = $_POST['pass'];
		$hashed_password = password_hash($lozinka, CRYPT_BLOWFISH);
		$razina = 0;
		$registriranKorisnik = '';
		$sql = "SELECT k_ime FROM korisnik WHERE k_ime = ?";
		$stmt = mysqli_stmt_init($conn);
		
		if (mysqli_stmt_prepare($stmt, $sql)) {
			mysqli_stmt_bind_param($stmt, 's', $username);
			mysqli_stmt_execute($stmt);
			mysqli_stmt_store_result($stmt);
		}
		if(mysqli_stmt_num_rows($stmt) > 0){
			echo "<p style='font-size:25px; color:red;' class='postojeci'>Korisnik vec postoji!</p>";
		}else{
			$sql = "INSERT INTO korisnik (ime, prezime, k_ime, lozinka, pristup) VALUES (?, ?, ?, ?, ?)";
			$stmt = mysqli_stmt_init($conn);
			if (mysqli_stmt_prepare($stmt, $sql)) {
				mysqli_stmt_bind_param($stmt, 'ssssi', $ime, $prezime, $username, $hashed_password, $razina);
				mysqli_stmt_execute($stmt);
				$registriranKorisnik = true;
			}
		}
		if($registriranKorisnik == true) {
		echo '<p>Korisnik je uspješno registriran!</p>';
		} 
	}
	$conn->close();
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