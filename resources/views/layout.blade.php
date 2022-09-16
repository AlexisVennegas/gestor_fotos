	<DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Gestor de fotos</title>
	<link rel="stylesheet" type="text/css" href="{{asset('bootstrap-5.1.3-dist/css/bootstrap.min.css')}}">
	<link rel="stylesheet" type="text/css" href="{{asset('css/star-rating.css')}}">
	<link rel="shortcut icon" href="https://cdn-icons-png.flaticon.com/512/3286/3286363.png">
	<link rel="stylesheet" href="{{asset ('css/listblade.css')}}">
	<style type="text/css">
		.container {
			max-width: 97%;
    		margin: 0 auto;
			border-radius: 10px;
		}
		form{
				border-radius: 20px;
				padding: 50px;
				margin: 30px;
				width: 50%;
				margin: 0 auto;
				display: flex;
				flex-direction: column;
				justify-content: center;
				border: none;
				box-shadow: rgb(17 12 46 / 15%) 0px 48px 100px 0px;
		}
		.card {
			box-shadow: rgba(0, 0, 0, 0.25) 0px 14px 28px, rgba(0, 0, 0, 0.22) 0px 10px 10px;			
			border: none;
			padding: 10px 10px;
			border-radius: 10px; 
		}
		.dateText {
			color: gray;
			opacity: .5;
			text-align: right;
		}
		.divPad {
			padding: 13px 14px;
		}
		.passwordRecovery {
		text-align: center;
    	margin: 18px 0;
		}
		.lupa {
			width: 30px;
			cursor: pointer;
			
		}
		.input {
			padding: 5px 5px;
			border-radius: 10px;
			width: 0;
			display: none;
			transition: .5s;
			display: flex;
			visibility: hidden;
		
		}
		.input-v {
			display: block;
			display: flex;
			transition: .5s;
			width: 300px;
			visibility: visible;
			margin: 0 10px;
		}
		.porfa{
    	display: flex;
    	justify-content: space-around;
		}
		@media (max-width: 1000px){

			.input-v {
			display: block;
			display: flex;
			transition: .5s;
			width: 300px;
			visibility: visible;
			margin: 10px 10px;
		}
			.lupa {
			margin: 12px 21px;
			}
		}
	</style>
</head>
<body>
	<div class="container">
	    <header class="d-flex flex-wrap align-items-center justify-content-center justify-content-md-between py-3 mb-4 border-bottom">
      		<a class="d-flex align-items-center col-md-3 mb-2 mb-md-0 text-dark text-decoration-none">
	      		@auth
	      			Las fotos de {{Auth::user()->name}}
	      		@endauth
	    	</a>
		
			<div class="porfa">
				
					<input type="search" id="search" name="search" class="input form-control"  onkeyup="buscar_ahora($('#buscar').val());">
				
					<img src="https://cdn-icons-png.flaticon.com/512/622/622669.png" alt="search" class="lupa">

			</div>
	    	<div class="col-md-3 text-end">
	      		@auth
		        	<a href="{{route('logout')}}"><button type="button" class="btn btn-outline-primary me-2">Salir</button></a>
	      		@else
		        	<a href="{{route('login')}}"><button type="button" class="btn btn-outline-primary me-2">Entrar</button></a>
		        	<a href="{{route('register')}}"><button type="button" class="btn btn-primary">Registrarse</button></a>
		    	@endauth
	        </div>
	    </header>
	</div>
	<article class="container">
		@if($errors->any() && $errors->getBag('default')->has('exception'))
			<div class="alert alert-danger" role="alert">
				{{$errors->getBag('default')->first('exception')}}
		  	</div>
		@endif
		@yield('content')
	</article>
	<script type="text/javascript" src="{{asset('bootstrap-5.1.3-dist/js/bootstrap.min.js')}}"></script>
	@yield('scripts')
	<script type="text/javascript">

		function buscar_ahora(buscar) {
            var parametros = {
                "buscar": buscar
            };
            $.ajax({
                data: parametros,
                type: 'POST',
                url: 'pictures/list.blade.php',
                success: function(data) {
                    document.getElementById("fatherHilos").innerHTML = data;
                }
            });
        }
        buscar_ahora();


	</script>
</body>
</html>