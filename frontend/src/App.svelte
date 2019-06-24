<script>
	import { Router, Route } from 'svero';
	import Login from './routes/Login.svelte';
	import Join from './routes/Join.svelte';
	import Home from './routes/Profile.svelte';
	import NotFound from './routes/NotFound.svelte';
	import Services from './routes/Services.svelte';
	import Balance from './routes/Balance.svelte';
	import LogOut from './routes/LogOut.svelte';

	function isLoggedIn() {
		if (localStorage.token) {
			return localStorage.token !== 'undefined';
		}
		return false;
	}
</script>

<Router>
	<Route path='*' component={NotFound} />
	<Route path='/' component={Home} condition={isLoggedIn} redirect="/login" />
	<Route path='/login' component={Login} />
	<Route path='/join' component={Join} />
	<Route path='/services/:page'
	component={Services} condition={isLoggedIn} redirect="/login" />
	<Route path='/balance/:page' component={Balance} condition={isLoggedIn} redirect="/login" />
</Router>