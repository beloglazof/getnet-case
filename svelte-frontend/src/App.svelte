<script>
	import { Router, Route } from 'svero';
	import Login from './routes/Login.svelte';
	import SignUp from './routes/SignUp.svelte';
	import Home from './routes/Profile.svelte';
	import NotFound from './routes/NotFound.svelte';
	import Services from './routes/Services.svelte';
	import Account from './routes/Account.svelte';
</script>
<style>
	h1 {
		color: purple;
	}
</style>

<Router>
	<Route path='*' component={NotFound} />
	<Route path='/login' component={Login} />
	<Route path='/' component={Home} />
	<Route path='/join' component={SignUp} />
	<Route path='/services' component={Services} />
	<Route path='/account' component={Account} />
</Router>