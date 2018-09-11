<?php
    session_start();

    require "components/connectToDB.php";
    require "components/userData.php";
?>


<!DOCTYPE html>
<html>
<head>
    <?php include 'components/head.php'; ?>
    <title>Редактировать профиль</title>
    
</head>
<body>
    <?php include "components/navbar.php"; ?>

    <div class="container-fluid">
        <div class="container">
            <div class="row my-4">

                <?php include "components/navlinks.php"; ?>
  
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
    <script src="js/editProfile.js"></script>
</body>
</html>