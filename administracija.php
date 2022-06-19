<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Administracija</title>
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
								<div class="col-lg-4 ffs">
									<?php
										session_start();
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

		$query = "SELECT * FROM clanci";
		$result = mysqli_query($conn, $query);
		while($row = mysqli_fetch_array($result)) {
			echo "<div class='container-fluid main'>
				<form enctype='multipart/form-data' action='index.php' method='POST'>
				<div class='form-item'>
					<label for='title'>Naslov vjesti:</label>
					<div class='form-field'>
						<input type='text' name='title' class='form-field-textual' value='".$row["naslov"]."'>
					</div>
				</div>
				<div class='form-item'>
					<label for='about'>Kratki sadržaj vijesti (do 50 znakova):</label>
					<div class='form-field'>
						<textarea name='about' id='' cols='30' rows='10' class='form-field-textual'>".$row["opis"]."</textarea>
					</div>
				</div>
				<div class='form-item'>
					<label for='content'>Sadržaj vijesti:</label>
					<div class='form-field'>
						<textarea name='content' id='' cols='30' rows='10' class='form-field-textual'>".$row["sadrzaj"]."</textarea>
					</div>
				</div>
				<div class='form-item'>
					<label for='pphoto'>Slika:</label>
					<div class='form-field'>
						<input type='file' class='input-text' id='pphoto' value='".$row["slika"]."' name='pphoto'/> <br><img src='images/". $row["slika"] . "' class='slikara'/>
					</div>
				</div>
				<div class='form-item'>
					<label for='category'>Kategorija vijesti:</label>
					<div class='form-field'>
						<select name='category' id='' class='form-field-textual' value='".$row["kategorija"]."'>
							<option value='monde'>Monde</option>
							<option value='economie'>Economie</option>
						</select>
					</div>
				</div>
				<div class='form-item'>
					<label>Spremiti u arhivu:
					<div class='form-field'>";
						if($row['arhiva'] == 0) {
							echo "<input type='checkbox' name='archive' id='archive'/>Arhiviraj?";
						} else {
							echo "<input type='checkbox' name='archive' id='archive' checked/> Arhiviraj?";
						}
					echo "</div>
						</label>
						</div>";
			echo "<div class='form-item'>
					<input type='hidden' name='id' class='form-field-textual' value='".$row["id"]."'>
					<button type='reset' value='Poništi'>Poništi</button>
					<button type='submit' name='update' value='Prihvati'>Izmjeni</button>
					<button type='submit' name='delete' value='Izbriši'>Izbriši</button>
				</div>
				</form>
				</div>";
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