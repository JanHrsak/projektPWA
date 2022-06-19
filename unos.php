<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>LExpress</title>
	<link rel="stylesheet" type="text/css" href="style.css">
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
								<div class="col-lg-2 ffs"><a href="kategorija.php?id=monde"> MONDE </a></div>
								<div class="col-lg-2 ffs"><a href="kategorija.php?id=economie"> ECONOMIE </a></div>
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

	<form action="skripta.php" method="POST" class="forma">
		<div class="form-item">
			<label for="title">Naslov vijesti</label>
			<br/>
			<span id="porukaNaslov" class="bojaPoruke"></span>
			<div class="form-field">
				<input type="text" name="title" id="title" class="form-field-textual">
			</div>
		</div>
		<div class="form-item">
			<label for="about">Kratki sadržaj vijesti (do 50 znakova)</label>
			<br/>
			<span id="porukaOpis" class="bojaPoruke"></span>
			<div class="form-field">
				<textarea name="about" id="about" cols="30" rows="10" class="form-field-textual"></textarea>
			</div>
		</div>
		<div class="form-item">
			<label for="content">Sadržaj vijesti</label>
			<br/>
			<span id="porukaSadrzaj" class="bojaPoruke"></span>
			<div class="form-field">
				<textarea name="content" id="content" cols="30" rows="10" class="form-field-textual"></textarea>
			</div>
		</div>
		<div class="form-item">
			<label for="pphoto">Slika: </label>
			<br/>
			<span id="porukaSlika" class="bojaPoruke"></span>
			<div class="form-field">
				<input type="file" accept="image/jpg,image/gif" class="input-text" id="pphoto" name="pphoto"/>
			</div>
		</div>
		<div class="form-item">
			<label for="category">Kategorija vijesti</label>
			<br/>
			<span id="porukaKategorija" class="bojaPoruke"></span>
			<div class="form-field">
				<select name="category" id="category" class="form-field-textual">
					<option value="monde">Monde</option>
					<option value="economie">Economie</option>
				</select>
			</div>
		</div>
		<div class="form-item">
			<label>Spremiti u arhivu:
			<div class="form-field">
				<input type="checkbox" name="archive">
			</div>
			</label>
		</div>
		<div class="form-item">
			<button type="reset" value="Poništi">Poništi</button>
			<button type="submit" id="slanje" value="Prihvati">Prihvati</button>
		</div>
	</form>


	<script type="text/javascript">
		document.getElementById("slanje").onclick = function(event)
		{
			var slanjeForme = true;
			var naslov = document.getElementById('title').value;
			var opis = document.getElementById('about').value;
			var sadrzaj = document.getElementById('content').value;
			var slika = document.getElementById('pphoto').value;
			var kategorija = document.getElementById('category').value;
			if(naslov.length < 5 || naslov.length >30)
			{
				document.getElementById('porukaNaslov').innerHTML = "Naslov mora imati izmedu 5 i 30 znakova!";
				document.getElementById('title').style.border = "1px dashed red";
				slanjeForme = false;
			}
			else{
				document.getElementById('porukaNaslov').innerHTML = "";
				document.getElementById('title').style.border = "none";
			}
			if(opis.length <10 || opis.length > 50)
			{
				document.getElementById('porukaOpis').innerHTML = "Kratak sadrzaj mora imati izmedu 10 i 50 znakova!";
				document.getElementById('about').style.border = "1px dashed red";
				slanjeForme = false;
			}
			else{
				document.getElementById('porukaOpis').innerHTML = "";
				document.getElementById('about').style.border = "none";
			}
			if(sadrzaj.length<=0)
			{
				document.getElementById('porukaSadrzaj').innerHTML = "Sadrzaj mora biti unesen!";
				document.getElementById('content').style.border = "1px dashed red";
				slanjeForme = false;
			}
			else{
				document.getElementById('porukaSadrzaj').innerHTML = "";
				document.getElementById('content').style.border = "none";
			}
			if(!slika)
			{
				document.getElementById('porukaSlika').innerHTML = "Slika mora biti odabrana!";
				document.getElementById('pphoto').style.border = "1px dashed red";
				slanjeForme = false;
			}
			else{
				document.getElementById('porukaSlika').innerHTML = "";
				document.getElementById('pphoto').style.border = "none";
			}
			if(!kategorija)
			{
				document.getElementById('porukaKategorija').innerHTML = "kategorija mora biti odabrana!";
				document.getElementById('category').style.border = "1px dashed red";
				slanjeForme = false;
			}
			else{
				document.getElementById('porukaKategorija').innerHTML = "";
				document.getElementById('category').style.border = "none";
			}

			if (slanjeForme != true) {
				event.preventDefault();
			}
		};
	</script>

	<footer>
		Jan Hršak
		<br/>
		jhrsak@tvz.hr
		<br/>
		2022.

	</footer>
</body>
</html>