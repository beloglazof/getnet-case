<?php 
    session_start();
    require "connectToDB.php";
    
    $session_id = $_SESSION['id'];
    
    $page = $_GET['p'];

    if ($page == 1) {
        $result = $connection -> 
        query("SELECT * FROM user_{$session_id}_balance WHERE user_id = {$session_id} LIMIT 5");
    } elseif ($page == 2) {
        $page_limit = 5;
        $result = $connection -> 
    query("SELECT * FROM user_{$session_id}_balance WHERE user_id = {$session_id} LIMIT 5, $page_limit");
    } else {
        $page_limit = 10;
        $result = $connection -> 
    query("SELECT * FROM user_{$session_id}_balance WHERE user_id = {$session_id} LIMIT 5, $page_limit");
    }
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
                <div class="col-12 my-4">
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">Номер платежа</th>
                                <th scope="col">Сумма платежа</th>
                                <th scope="col">Назначение платежа</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php 
                            while ($user_data = $result -> fetch_assoc()) {
                                echo "<tr><th scope='row'>{$user_data['payment_id']}</th>";
                                echo "<td>{$user_data['payment_amount']}</td>";
                                echo "<td>{$user_data['payment_type']}</td></tr>";
                            }
                                
                            ?>
                        </tbody>
                    </table>
                    <nav aria-label="page navigation">
                        <ul class="pagination">
                            
                            <li class="page-item"><a class="page-link" href="balance.php?p=1">1</a></li>
                            <li class="page-item"><a class="page-link" href="balance.php?p=2">2</a></li>
                            <li class="page-item"><a class="page-link" href="balance.php?p=3">3</a></li>
                            
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
    </div>
  
</body>
</html>