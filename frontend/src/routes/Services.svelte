<script>
  import {onMount} from 'svelte';
  import {getServices} from '../api';
  import Template from '../components/Template.svelte';
  import Table from '../components/Table.svelte';
  import Pagination from '../components/Pagination.svelte';

  export let router = {};
  let currentPath = '/services'
  $: currentPage = router.params.page;

  let columns = [
    {key: 'guid', title: 'ID', value: v => v.guid},
    {key: 'company', title: 'Компания', value: v => v.company},
    {key: 'description', title: 'Описание услуги', value: v => v.description},
    {key: 'balance', title: 'Цена', value: v => v.balance},
    {key: 'date', title: 'Дата', value: v => v.date},
  ]
  let rows = []

  let pagesCount;

  onMount(async () => {
    const details = await getServices(currentPage);
    rows = details.data;
    pagesCount = details.pages;
  });

</script>

<Template {currentPath}>
  <h1>Услуги</h1>
  <Table columns={columns} rows={rows} />
  <Pagination path={currentPath} count={pagesCount} />
</Template>