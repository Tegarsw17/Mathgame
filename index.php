<?php
session_start();
if($_GET['mode']=='new'){
    session_unset();
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
  <body class="bg-secondary">
    <div class="card w-50 text-center mx-auto card border-primary mb-5">
      <div class="card-body">

        <?php 
          if(!isset($_SESSION['email'])){
        ?>

        <form method="POST">
          <div class="form-group">
            <input type="text" class="form-control" name="name" placeholder="Masukkan nama" required>
          </div>
          <div class="form-group">
            <input type="email" class="form-control" name="email" placeholder="Masukan Email" required>
          </div>
          <div class="form-group">
            <input id="start" class="btn btn-success" name="start" type="submit" value="MULAI!">
          </div>
        </form>

        <?php
          } else {
        ?>

        <form method="POST">
          <div class="form-group">
            <p>Hallo <?php echo $_SESSION['name'] ?>, selamat datang kembali di permainan ini!!!</p>
            <p>Bukan Anda?<a href="?mode=new">(klik si sini)</a></p>
          </div>
          <div class="form-group">
            <input id="start" class="btn btn-success" name="start" type="submit" value="MULAI!">
          </div>
        </form>

        <?php
          }
        ?>

      </div>
    </div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
  </body>
</html>

<?php

if(isset($_POST['start'])){
    if(!isset($_SESSION['email'])){
        $_SESSION['name'] = $_POST['name'];
        $_SESSION['email'] = $_POST['email'];
    }
    $_SESSION['lives'] = 5;
    $_SESSION['score'] = 0;
    header('Location: soal.php');
}
?>