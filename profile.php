<?php 
session_start();

require "connectToDB.php";
require "userData.php";
?>

<!doctype html>
<html lang="ru">
<head>
<?php include "head.php"; ?>
<title>Личный кабинет</title>
</head>
<body>
    <?php include "navbar.php";?>
      
    <div class="container-fluid">
        <div class="container">
            <div class="row my-4">
                <?php include "navlinks.php"; ?>

                <div class="col-12 col-md-3 my-4">
                    <img class="img-fluid mb-3 rounded" src="/img/img_avatar.png ">
                    <h1 class="h4 mb-2"><?php echo "{$user_data['firstname']} {$user_data['lastname']}"; ?></h1>
                    <div class="h6">На счету: <?php echo "{$user_data['balance']} у.е." ?></div>
                    <div class="small mt-5"><a href="edit-profile.php">Редактировать профиль</a></div>
                </div>
                <div class="col-12 col-md-9 my-4">
                    <h1>Профиль <?php echo "{$user_data['email']}";?></h1>
                   
                </div>
            </div>
        </div>
    </div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js" integrity="sha384-smHYKdLADwkXOn1EmN1qk/HfnUcbVRZyYmZ4qpPea6sjB/pTJ0euyQp0Mk8ck+5T" crossorigin="anonymous"></script>
  </body>
</html>
