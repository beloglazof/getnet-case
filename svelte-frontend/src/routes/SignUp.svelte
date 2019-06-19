<form autocomplete="off">
  <h2>Создайте свой аккаунт</h2>
  <label for="email">Email</label>
  <input type="email" name="email" id="email" autocomplete="email" required>
  <label for="password">Пароль</label>
  <input type="password" name="password" id="password" autocomplete="new-password" required>
  <br>
  <button type="submit">Создать аккаунт</button>
  <br>
  Уже есть аккаунт? <Link href="/login">Войти</Link>
</form>
<script>
  import {Link} from 'svero';
</script>