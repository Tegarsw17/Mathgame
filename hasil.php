<?php
session_start();
if($_GET['result'] == 'success'){
    $result = "Hallo ".$_SESSION['name']." Selamat jawaban Anda benar…";
} else if($_GET['result'] == 'failed'){
    $result = "Hallo ".$_SESSION['name']." Sayang jawaban Anda salah… tetap semangat ya !!!";
}
?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="main.css">

    <title>Math Quiz</title>
  </head>
  <body>
    <div class="card w-50 text-center mx-auto card border-primary mb-5">
      <div class="card-body">
        <div class="form-group">
          <p><?php echo $result; ?></p>
          <p>Lives : <?php echo $_SESSION['lives']; ?> | Score : <?php echo $_SESSION['score']; ?></p>
        </div>
        <div class="form-group">
          <a href="soal.php" class="btn btn-success">Soal Selanjutnya</a>
        </div>
      </div>
    </div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
  </body>
</html>