<?php
$msg = null;
$conn = new mysqli("localhost", "root", "", "biblioteka");
$sql1 = "SELECT imie, nazwisko FROM autorzy ORDER BY nazwisko";
$result1 = $conn->query($sql1);
$authors = $result1->fetch_all(MYSQLI_ASSOC);

if (isset($_POST["btn"])) {
    $imie = $_POST["imie"];
    $nazwisko = $_POST["nazwisko"];
    $symbol = $_POST["symbol"];
	$sql2 = "INSERT INTO czytelnicy(imie, nazwisko, kod) VALUES('$imie', '$nazwisko', '$symbol')";
	$conn->query($sql2);
	$msg = "Czytelnik $imie $nazwisko został(a) dodany do bazy danych";
}

$conn->close();
?>

<!doctype html>
<html lang="pl">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="style.css">
	<title>Biblioteka publiczna</title>
</head>
<body>
<header>
	<h1>Biblioteka w Książkowicach wielkich</h1>
</header>
<main>
	<section class="left">
		<h3>Polecamy dzieła autorów</h3>
		<ol>
            <?php foreach ($authors as $author): ?>
				<li><?php echo $author['imie'] . " " . $author['nazwisko']; ?></li>
            <?php endforeach; ?>
		</ol>
	</section>
	<section class="mid">
		<h3>ul. Czytelnicza 25, Ksiązkowice&nbsp;Wielkie</h3>
		<a href="mailto:sekretariat@biblioteka.pl"><p>Napisz do nas</p></a>
		<img src="biblioteka.png" alt="książki">
	</section>
	<section class="right">
		<div class="right-1">
			<h3>Dodaj czytelnika</h3>
			<form action="" method="post">
				imię: <input type="text" name="imie"><br>
				nazwisko: <input type="text" name="nazwisko"><br>
				symbol: <input type="number" name="symbol"><br>
				<input type="submit" name="btn" value="DODAJ">
			</form>
		</div>
		<div class="right-2">
            <?php echo $msg; ?>
		</div>
	</section>
</main>
<footer>
	<p>Projekt strony: 00000000</p>
</footer>
</body>
</html>
