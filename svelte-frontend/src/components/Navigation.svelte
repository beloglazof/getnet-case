<script>
  import { Link } from 'svero';
  export let currentPath = '';

  let navItems = [
    { id: 1, name: 'Профиль', path: '/' },
    { id: 2, name: 'Услуги', path: '/services/1' },
    { id: 3, name: 'Баланс', path: '/balance/1' }
  ]
</script>
<style>
  ul {
    list-style-type: none;
    display: flex;
    justify-content: space-around;
    padding-inline-start: 0;
    margin-block-start: 8px;
    margin-block-end: 8px;
  }

  li {
    display: inline;
    margin: 8px;
  }
</style>
<nav>
  <ul>
    {#each navItems as item (item.id)}
      <li>
        <Link href={item.path}>
          <span>
              {item.name}
          </span>
        </Link>
      </li>
    {/each}
  </ul>
</nav>