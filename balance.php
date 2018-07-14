<?php 
    session_start();
    require "connectToDB.php";
?>
</<!DOCTYPE html>
<html>
<head>
    <?php include "head.php"; ?>
    <title>Баланс</title>
</head>
<body>
    <?php include "navbar.php";?>
    <div class="container-fluid">
        <div class="container">
            <div class="row my-4">
                <?php include "navlinks.php"; ?>
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
    <script src ="createBalanceTable.js"></script>
</body>
</html>