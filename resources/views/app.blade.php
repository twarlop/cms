<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<script>

		window.laratoken = '{{ csrf_token() }}';

	</script>

	<title>{{ config('app.name', 'Laravel') }}</title>

	<!-- Styles -->
	<link href="{{ mix('css/app.css') }}" rel="stylesheet">

</head>
<body>
<div id="app" v-cloak>

	<section v-if="!booted" class="uk-section uk-section-primary uk-flex uk-flex-center uk-flex-middle" uk-height-viewport>

		<div class="">
			<div uk-spinner></div>
			<span>&nbsp;Improving your experience</span>
		</div>

	</section>

	<div v-if="booted" id="app-container" class="uk-animation-fade uk-animation-fast">

		<nav class="uk-navbar-container" uk-navbar="mode: click">

			<div class="uk-navbar-left" v-if="authenticated">

				<ul class="uk-navbar-nav">
					<li>
						<router-link :to="{name: 'home'}"><span uk-icon="icon: home; ratio: 2"></span></router-link>
					</li>
				</ul>

			</div>

			<div class="uk-navbar-center" v-if="authenticated">

				<ul class="uk-navbar-nav">

					<li>
						<router-link :to="{name: 'data'}">Data</router-link>
					</li>

				</ul>

			</div>

			<div class="uk-navbar-right">

				<navigation-auth/>

			</div>
		</nav>

		<router-view></router-view>
	</div>

</div>

<!-- Scripts -->
<script src="{{ mix('js/app.js') }}"></script>
</body>
</html>
