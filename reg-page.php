<!doctype html>
<html lang="ru">
  <head>
    <?php include "head.php"; ?>
    <title>Регистрация</title>
  </head>
<body>
    <div class="row justify-content-center">
        <div class="col-12 col-lg-4">
            <form method="post" action="registration.php" class="jumbotron">
                <h1>Регистрация</h1>
                <div class="form-group">
                    <label for="firstname">Имя :</label>
                    <input type="text" name="firstname" class="form-control">
                </div>
                <div class="form-group">
                    <label for="firstname">Фамилия :</label>
                    <input type="text" name="lastname" class="form-control">
                </div>
                <div class="form-group">
                    <label for="firstname">Email :</label>
                    <input type="email" name="email" class="form-control">
                </div>
                <div class="form-group">
                    <label for="firstname">Пароль :</label>
                    <input type="password" name="password" class="form-control">
                </div>
                <div class="form-group">
                    <label for="firstname">Повторите пароль :</label>
                    <input type="password" name="confirmPass" class="form-control">
                </div>

                <div class="text-center">
                    <button type="submit" class="btn btn-primary">Регистрация</button>
                    <p class="mt-4 mb-0">
                        Уже есть аккаунт? 
                        <a href="index.html">Войти</a>
                    </p>
                </div>
    
  
    </form>
</body>
</html>