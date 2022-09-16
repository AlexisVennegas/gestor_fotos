@extends('layout')


@section('content')

<div class="container">

<form method="POST" action="{{ route('enlace') }}">
    @csrf
    <h1>Reset password</h1>

        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="email" name="email" id="email" class="form-control" placeholder="example@gmail.com">
            @error("email")
                        <span class="red-text text-darken-1">{{ $message }}</span>
            @enderror
        </div>

       
         

        <button type="submit" class="btn btn-primary">Enviar correo</button>
</form>




</div>

@endsection
