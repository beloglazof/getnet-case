<script>
  import Template from '../components/Template.svelte';
  import Table from '../components/Table.svelte';
  export let columns = [
    {key: 'guid', title: 'guid', value: v => v.guid},
    {key: 'company', title: 'company', value: v => v.company},
    {key: 'description', title: 'description', value: v => v.description},
    {key: 'balance', title: 'balance', value: v => v.balance},
    {key: 'date', title: 'date', value: v => v.date},
  ]
  export let rows = [
    {
      "guid": "06444916-e023-4570-8410-44b814ca8c31",
      "company": "Viocular",
      "description": "fugiat",
      "balance": 1622,
      "date": "Thu Sep 01 1977 07:54:52 GMT+0000 (UTC)"
    },
  ]
</script>

<Template>
  <h1>Услуги</h1>
  <Table columns={columns} rows={rows} />
</Template>