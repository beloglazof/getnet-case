<form on:submit={handleSubmit} autocomplete="off">
  <label for="email">Email</label>
  <input
    type="email"
    name="email"
    id="email"
    placeholder="your@email.com"
    on:change={handleChange}
    autocomplete="email"
  >
  <label for="password">Пароль</label>
  <input
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

<script>
  import { navigateTo, Link } from 'svero';
  let state = {
    email: '',
    password: ''
  };
  function handleSubmit(event) {
    event.preventDefault();
    navigateTo('/')
  }
  function handleChange({ target }) {
    const { name, value } = target;
    state[name] = value;
  }
</script>