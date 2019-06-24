<script>
  import { navigateTo, Link } from 'svero';
  import { signIn } from '../api';
  let email = '';
  let password = '';
  let feedback = ''
  async function handleSubmit() {
    const response = await signIn(email, password);
    const {token, message} = response;
    if (token) {
      localStorage.setItem('token', token);
      navigateTo('/')
    }
    feedback = message;
  }
  function handleChange({ target }) {
    const { name, value } = target;
    name = value;
  }
</script>
<style>
form {
  padding: 8px 16px;
}
</style>
<form on:submit|preventDefault={handleSubmit} autocomplete="off">
  <h1>Вход</h1>
  {#if feedback.length}
  <span>{feedback}</span>
  <br>
  {/if}
  <label for="email">Email</label>
  <input
    bind:value={email}
    type="email"
    name="email"
    id="email"
    placeholder="your@email.com"
    on:change={handleChange}
    autocomplete="email"
  >
  <label for="password">Пароль</label>
  <input
    bind:value={password}
    type="password"
    name="password"
    id="password"
    on:change={handleChange}
    autocomplete="new-password"
  >
  <br>
  <button type="submit">
    Войти
  </button>
  <br>
  Впервые здесь?
  <Link href="/join">Регистрация</Link>
</form>
