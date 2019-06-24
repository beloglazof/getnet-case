<script>
  import {navigateTo} from 'svero';
  function handleLogout(){
    localStorage.clear();
    navigateTo('/login')
  }
</script>
<style>
  header {
    display: flex;
    justify-content: space-between;
    align-items: center;
    padding: 0 16px;
    height: 40px;
    background-color: gainsboro;
  }
</style>
<header>
  <span>Company</span>
  <a href="/login" on:click|preventDefault={handleLogout}>
    Выйти
  </a>
</header>