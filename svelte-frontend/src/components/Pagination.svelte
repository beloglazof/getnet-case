<script>
  import {navigateTo} from 'svero';
  export let count;
  export let path;
  $: pages = new Array(count).fill(0);

  function goTo(page) {
    return () => {
      navigateTo(`${path}/${page}`);
    }
  }
</script>
<div>
{#each pages as p, i}
<button type="button" on:click={goTo(i+1)}>
  {i + 1}
</button>
{/each}
</div>