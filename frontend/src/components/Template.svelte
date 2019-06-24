<script>
  import Navigation from './Navigation.svelte';
  import Header from './Header.svelte';
  export let currentPath = '';
</script>
<style>
main {
  padding: 8px;
}
</style>
<Header />
<Navigation {currentPath}/>
<main>
  <slot></slot>
</main>