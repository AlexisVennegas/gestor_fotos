<DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Gestor de fotos</title>
	<link rel="stylesheet" type="text/css" href="{{asset('bootstrap-5.1.3-dist/css/bootstrap.min.css')}}">
	<link rel="stylesheet" type="text/css" href="{{asset('css/star-rating.css')}}">
	<link rel="shortcut icon" href=".../img/imagen.png">
    <!-- CSS only -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
	<link rel="stylesheet" href="{{asset ('css/listblade.css')}}">
	<style type="text/css">
		.container {
			max-width: 97%;
    		margin: 0 auto;
			box-shadow: rgb(17 12 46 / 15%) 0px 48px 100px 0px;

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
@section('content')

<h3>Cambiar contraseña</h3>
<div class="row">
    <form class="col m12 l6" method="POST" action="">
        @csrf
        <input type="hidden" name="token" value="{{ $token }}">
        <div class="row">
            <div class="input-field col s12">
                <input id="email" type="text" name="email" value="" required autofocus>
                <label for="email">E-mail</label>
                @error("email")
                <span class="red-text text-darken-1">{{ $message }}</span>
                @enderror
            </div>
            <div class="input-field col s12">
                <input id="password" type="password" name="password" value="" required>
                <label for="password">Contraseña</label>
                @error("password")
                <span class="red-text text-darken-1">{{ $message }}</span>
                @enderror
            </div>
            <div class="input-field col s12">
                <input id="password-confirm" type="password" name="password_confirmation" value="" required>
                <label for="password-confirm">Repetir contraseña</label>
                @error("password_confirmation")
                <span class="red-text text-darken-1">{{ $message }}</span>
                @enderror
            </div>
            <div class="input-field col s12">
                <a href="" title="Volver">
                    <button class="btn waves-effect waves-light" type="button">Volver
                        <i class="material-icons right">refresh</i>
                    </button>
                </a>
                <button class="btn waves-effect waves-light" type="submit">Cambiar contraseña
                    <i class="material-icons right">person</i>
                </button>
            </div>
        </div>
    </form>
</div>
