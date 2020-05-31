<?php
session_start();
$a = rand(0,20);
$b = rand(0,20);
if($_SESSION['lives'] <= 0){
    echo $_SESSION['lives']; 
    header("Location: hall.php");
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
        <form action="" method="POST">
          <div class="form-group">
            <p>Hello <?php echo $_SESSION['name']; ?>, tetap semangat ya... you can do the best!!</p>
            <p>Lives: <?php echo $_SESSION['lives']; ?> | Score: <?php echo $_SESSION['score']; ?></p>
          </div>
          <div class="form-group">
            <p>Berapakah <?php echo $a; ?> + <?php echo $b; ?> =</p>
            <input type="hidden" name="a" value="<?php echo $a; ?>">
            <input type="hidden" name="b" value="<?php echo $b; ?>">
          </div>
          <div class="form-group">
            <input type="number" class="form-control" name="isi" placeholder="Masukan Jawaban" required>
          </div>
          <div class="form-group">
             <button class="btn btn-success" name="jawab" type="submit" value="jawab">JAWAB</button>
          </div>
        </form>
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
if($_POST['jawab']){
    if($_POST['isi'] == $_POST['a']+$_POST['b']){
        $_SESSION['score'] += 10;
        header("Location: hasil.php?result=success");
    }else{
        $_SESSION['lives'] -= 1;
        $_SESSION['score'] -= 2;
        if($_SESSION['lives'] > 0){
            header("Location: hasil.php?result=failed");
        }else{
      include "db.php";
      $conn = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);

      if (!$conn) {
        die("koneksi gagal");
      }else{
        $nama = $_SESSION['name'];
        $score = $_SESSION['score'];

        $query = "INSERT INTO hall (no, nama, score)
                  VALUES (null, '$nama', '$score')";
        $result = mysqli_query($conn, $query);

        mysqli_close($conn);
        header("Location: hall.php");
      }
    }
  }
}
?>
