<script>
  import {onMount} from 'svelte';
  import {getBalanceDetails} from '../api';
  import Template from '../components/Template.svelte';
  import Table from '../components/Table.svelte';
  import Pagination from '../components/Pagination.svelte';
  export let router = {};
  let currentPath = '/balance';
  $: currentPage = router.params.page;
  let columns = [
    {key: 'guid', title: 'ID', value: v => v.guid},
    {key: 'company', title: 'Получатель', value: v => v.company},
    {key: 'description', title: 'Описание', value: v => v.description},
    {key: 'balance', title: 'Состояние счета', value: v => v.balance},
    {key: 'date', title: 'Дата', value: v => v.date},
  ]
  let rows = [
    {
      "guid": "06444916-e023-4570-8410-44b814ca8c31",
      "company": "Viocular",
      "description": "fugiat",
      "balance": 1622,
      "date": "Thu Sep 01 1977 07:54:52 GMT+0000 (UTC)"
    },
  ]
  let pagesCount;
  onMount(async () => {
    const details = await getBalanceDetails(currentPage);
    rows = details.data;
    pagesCount = details.pages;
  });
</script>

<Template {currentPath}>
  <h1>Баланс</h1>
  <Table rows={rows} columns={columns} />
  <Pagination path={currentPath} count={pagesCount} />
</Template>