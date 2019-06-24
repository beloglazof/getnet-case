<script>
  import { Link, navigateTo } from 'svero';
  import { register } from '../api';
  let form = {
    email: '',
    password: '',
  };
  function handleChange({target: input}){
    form[input.name] = input.value;
  }
  async function handleSubmit(){
    const {email, password} = form;
    const response = await register(email, password);
    if (response === 'ok') {
      navigateTo('/');
    }
  }
</script>
<style>
form {
  padding: 8px 16px;
}
</style>
<form on:submit|preventDefault={handleSubmit} autocomplete="off">
  <h2>Создайте свой аккаунт</h2>
  <label for="email">Email</label>
  <input bind:value={form.email} on:change={handleChange} type="email" name="email" id="email" autocomplete="email" placeholder="your@email.com" required>
  <label for="password">Пароль</label>
  <input bind:value={form.password} on:change={handleChange} type="password" name="password" id="password" autocomplete="new-password" required>
  <br>
  <button type="submit">Создать аккаунт</button>
  <br>
  Уже есть аккаунт? <Link href="/login">Войти</Link>
</form>