<script>
  import { onMount } from 'svelte';
  import { getUser, updateUser } from '../api';
  import Template from '../components/Template.svelte';
  import avatar from '../img/avatar.png';

  export let router = {};
  $: currentPath = router.route.path;

  let user = {
    firstname: '',
    lastname: '',
    balance: 0,
    email_state: ''
  };
  let state = 'view';
  let width = 150;
  let height = 150;
  $: isEdit = state === 'edit';
  $: isView = state === 'view';

  onMount(async () => {
    const token = localStorage.token;
    const fetchedUser = await getUser(token);
    user = {...fetchedUser}
  });
  function handleEditClick() {
    state = isEdit ? 'view' : 'edit';
  };
  function handleSubmit() {
    const token = localStorage.token;
    updateUser(token, user.firstname, user.lastname);
    state = 'view'
  };
  function handleChange({target: input}) {
    user[input.name] = input.value;
  }
</script>
<Template {currentPath}>
  {#if user.firstname.length}
  <p>Здравствуйте, {user.firstname} {user.lastname}!</p>
  {/if}
  <p>Ваш баланс: {user.balance} у.е.</p>
  <section>
    <h1>Профиль</h1>
    {#if user.email_state === 'unverified'}
    <p>Ваша почта не подтверждена</p>
    {/if}
    <img {width} {height} src="{avatar}" alt="avatar" />
    {#if isEdit }
    <form on:submit|preventDefault={handleSubmit}>
      <label for="firstname">Имя</label>
      <input
        bind:value="{user.firstname}"
        type="text"
        name="firstname"
        id="firstname"
        on:chage={handleChange}
      />
      <label for="lastname">Фамилия</label>
      <input
        bind:value="{user.lastname}"
        type="text"
        name="lastname"
        id="lastname"
      />
      <br />
      <button type="submit">Сохранить</button>
    </form>
    {/if} {#if isView && user.firstname.length}
    <div>
      Имя: {user.firstname}
      <br />
      Фамилия: {user.lastname}
    </div>
    {/if}
  </section>
  <button type="button" on:click="{handleEditClick}">
    {isView ? 'Редактировать' : 'Отмена'}
  </button>
</Template>
