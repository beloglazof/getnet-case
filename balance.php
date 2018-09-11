<?php 
    session_start();
    require "components/connectToDB.php";
?>
</<!DOCTYPE html>
<html>
<head>
    <?php include "components/head.php"; ?>
    <title>Баланс</title>
</head>
<body>
    <?php include "components/navbar.php";?>
    <div class="container-fluid">
        <div class="container">
            <div class="row my-4">
                <?php include "components/navlinks.php"; ?>
            </div>
            
            <div class="col-12 my-4 table-responsive-md">
                <table class="table table-hover table-bordered">
                    <thead>
                        <tr>
                            <th scope="col">Идентификатор операции</th>
                            <th scope="col">Состояние счета</th>
                            <th scope="col">Дата</th>
                        </tr>
                    </thead>
                    <tbody></tbody>
                </table>
                    
            </div>
            
            <div class="btn-group " id="buttons"></div>
        </div>
    </div>
    <script src ="js/createBalanceTable.js"></script>
</body>
</html>