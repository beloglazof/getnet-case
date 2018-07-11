<!doctype html>
<html lang="ru">
  <head>
    <?php include "head.php";?>
    <title>Вход</title>
</head>
<body>
<div class="row justify-content-center">
    <div class="col-12 col-lg-4">
        <form class="jumbotron" method="POST" action="login.php">            
            <h1 class="h2">Вход</h1>
            <div class="form-group">
                <input type="email" class="form-control" placeholder="Адрес эл.почты" required="required" name="email">
            </div>
            <div class="form-group">
                <input type="password" class="form-control" placeholder="Пароль" required="required" name="password">
            </div>
                    
            <button type="submit" class="btn btn-primary">Войти</button>
          
            <span class="ml-2"><a href="reg-page.php">Регистрация</a></span>
        </form>
          
    </div>
</div>
</body>
</html>