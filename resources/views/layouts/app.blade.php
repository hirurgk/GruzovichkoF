<!DOCTYPE html>
<html lang="ru">
	<head>
		<title>ГрузовичкоФ</title>
		
		<meta name="csrf-token" content="{{ csrf_token() }}">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		
		<link href="{{ asset('/css/app.css') }}" rel="stylesheet">
	</head>

	<body>
	    <div id="app">
			<header>
				<nav class=" container navbar navbar-expand-lg navbar-dark bg-dark">
					<a class="navbar-brand" href="/">ГрузовичкоФ</a>
					
					<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar" aria-controls="navbar" aria-expanded="false" aria-label="Toggle navigation">
						<span class="navbar-toggler-icon"></span>
					</button>

					<div class="collapse navbar-collapse" id="navbar">
						<ul class="navbar-nav mr-auto">
							<li class="nav-item active">
								<a class="nav-link" href="/">Поиск адреса</a>
							</li>
							
							<li class="nav-item">
								<a class="nav-link" href="/about/">Описание</a>
							</li>
						</ul>
						
						
					</div>
				</nav>
			</header>

			<section class="container">
				@yield('content')
			</section>
        </div>
        
        <script src="{{ asset('/js/app.js') }}"></script>
	</body>
</html>