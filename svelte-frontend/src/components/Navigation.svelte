<script>
  import { Link } from 'svero'
  let navItems = [
    { id: 1, name: 'Профиль', path: '/' },
    { id: 2, name: 'Услуги', path: '/services' },
    { id: 3, name: 'Баланс', path: '/account' }
  ]
</script>
<nav>
  <ul>
    {#each navItems as item (item.id)}
      <li><Link href={item.path}>{item.name}</Link></li>
    {/each}
  </ul>
</nav>