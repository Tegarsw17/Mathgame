<?php
session_start();
if($_SESSION['lives'] > 0){
    echo $_SESSION['lives']; 
    header("Location: soal.php");
}?>

<!DOCTYPE html>
<html lang="en">
<head>
	<title>Math Quiz</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
	<link rel="stylesheet" type="text/css" href="main.css">
</head>

<body class="bg-secondary">

	<?php include 'db.php';
	 $conn = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname); 
	 if (!$conn){
	 	die("Koneksi gagal");
	 }
	 $querry = "SELECT * FROM hall ORDER BY score DESC LIMIT 10 ";
	 $result = mysqli_query($conn, $querry);
	 ?>

	<div class="card w-50 text-center mx-auto card border-primary mb-5">
		<div class="card-body">
			<div class="form-group">
				<p>Hello, <?php echo $_SESSION['name']; ?> Sayang permainan sudah selesai. Semoga lain kali bisa lebih baik.</p>
				<br>
				<p>Score Anda: <?php echo $_SESSION['score']; ?></p>
			</div>
			<div class="form-group">
				<a href="index.php" class="btn btn-primary">Main Lagi</a>
			</div>
			<?php if (mysqli_num_rows($result) > 0){ ?>
			<table class="table">
				<thead>
					<tr>
						<th scope="col">No</th>
						<th scope="col">Nama</th>
						<th scope="col">Score</th>
					</tr>
				</thead>
				<tbody>
					<?php
					$no=1;
					 while ($data = mysqli_fetch_assoc($result)) { 
					 ?>
						<tr>
							<td><?= $no; ?></td>
							<td><?= $data["nama"];  ?></td>
							<td><?= $data["score"];  ?></td>
						</tr>
					<?php
					$no+=1; 
					}?>
				</tbody>
			</table>
		<?php }else{
			echo "data tidak ditemukan";
			mysqli_close($conn);
		} ?>
		</div>
	</div>





<!--Javascript-->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
  
</body>
</html>