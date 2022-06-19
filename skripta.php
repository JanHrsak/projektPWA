<!DOCTYPE html>
<html>

<?php
	$title = $_POST['title'];
	$category = $_POST['category'];
	$about = $_POST['about'];
	$content = $_POST['content'];
	$image = $_POST['pphoto'];
	$datum = date("m/d/Y");
?>

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="style.css?v=<?php echo time(); ?>">
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/	ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous"/>
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.2/css/all.css" integrity="sha384-vSIIfh2YWi9wW0r9iZe7RJPrKwp6bG+s9QZMoITbCckVJqGCCRhc+ccxNcdpHuYu" crossorigin="anonymous" />
	<title>
		<?php
			echo $title;
		?>		
	</title>
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
					<div class="col-lg-6"></div>
				</div>
			</div>
		</nav>
		
	</header>
	<section role="main" class="sekcija">
		<div class="znjbrnj">
			<p class="category"><?php
				echo $category;
			?></p>
			<h1 class="title"><?php
					echo $title;
			?></h1>
			<p>AUTOR:</p>
			<p>OBJAVLJENO:<?php echo $datum; ?></p>
		</div>
		<section class="slika">
			<?php
			echo "<img src='images/".$image."' class='slikica'/>";
		?>
		</section>
		<section class="about">
			<p><?php
				echo $about;
			?></p>
		</section>
		<section class="sadrzaj">
			<p><?php
				echo $content;
			?></p>
		</section>
	</section>

	<?php
		$conn = new mysqli("localhost", "root", "", "lexpress");
  		

  		if ($conn->connect_error)
    		die("Connection failed: " . $conn->connect_error);
  		
    	$sql = "INSERT INTO clanci (naslov, opis, sadrzaj, kategorija, slika) VALUES (?,?,?,?,?);";

    	$stmt = mysqli_stmt_init($conn);
    	if(mysqli_stmt_prepare($stmt, $sql))
  		{
  			mysqli_stmt_bind_param($stmt, 'sssss' , $title, $about, $content, $category, $image);
  			mysqli_stmt_execute($stmt);
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