<?php
    session_start();

    require "connectToDB.php";
    require "userData.php";
?>


<!DOCTYPE html>
<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta charset="utf-8">
    <title>Редактировать профиль</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB" crossorigin="anonymous">
</head>
<body>
    <?php include "navbar.php"?>

    <div class="container-fluid">
        <div class="container">
            <div class="row my-4">

                <?php include "navlinks.php"; ?>

                

                
            </div>
            <div class="row my-4">
                <div class="col-12 col-md-6">
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text">Имя</span>
                        </div>
                        <input type="text" class="form-control" placeholder="<?php echo"{$user_data['firstname']}";?>" id="firstname">
                        <div class="input-group-append">
                            <button class="btn btn-outline-secondary" type="button" onclick="editProfile(document.getElementById('firstname').value, <?php echo "'{$user_data['email']}'";?>)">Изменить</button>
                        </div>
                    </div>
                </div> 
            </div>
        </div>
    </div>
    <script src="editProfile.js"></script>
</body>
</html>