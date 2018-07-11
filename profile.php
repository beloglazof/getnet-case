<?php 
session_start();

$servername = 'localhost';
$user = 'gtntest1-profile';
$password = 'vaDNvkx-,pxtKDN9';
$database = 'gtntest1-profile';

$connection = new mysqli($servername, $user, $password, $database);

if ($connection -> connect_error) {
    die('Connection failed: ' . $connection -> connect_error);
}

$session_id = $_SESSION['id'];

if ($session_id < 0) {
    header("location: index.html");
    exit;
}

$sql = "SELECT * FROM users WHERE user_id = '$session_id'";
$result = $connection -> query("SELECT * FROM users WHERE user_id = '$session_id'");
$user_data = $result -> fetch_assoc();
?>
<!doctype html>
<html lang="ru">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">    
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB" crossorigin="anonymous">
    <title>Личный кабинет</title>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <a class="navbar-brand col-11" href="#">Компания N</a>
        <ul class="navbar-nav col-1">
            <li class="nav-item">
                <a class="nav-link" href="logout.php?logout">Выйти</a>
            </li>
        </ul>
    </nav>
      
    <div class="container-fluid">
        <div class="container">
            <div class="row my-4">
                <div class="col-12 col-lg-3 my-4">
                    <img class="img-fluid mb-3" src="/img/img_avatar.png">
                    <h1 class="h4 mb-2"><?php echo "{$user_data['firstname']} {$user_data['lastname']}"; ?></h1>
                    <div class="h6"><?php echo "{$user_data['balance']} у.е." ?></div>
                    <div class="small mt-5"><a href="edit-profile">Редактировать профиль</a></div>
                </div>
                <div class="col-12 col-lg-9 my-4">
                    <ul class="nav nav-tabs nav-fill" id="tabs" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" id="profile-tab" data-toggle="tab" href="#profile">Профиль</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="balance-tab" data-toggle="tab" href="#balance">Баланс</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="service-tab" data-toggle="tab" href="#services">Услуги</a>
                        </li>
                    </ul>
                    <div class="tab-content" id="myTabContent">
                        <div class="tab-pane fade show active" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                            <?php
                                echo "Email: {$user_data['email']}";
                            ?>
                        </div>
                        <div class="tab-pane fade" id="balance" role="tabpanel" aria-labelledby="balance-tab">...</div>
                        <div class="tab-pane fade" id="services" role="tabpanel" aria-labelledby="services-tab">...</div>
                    </div>
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
