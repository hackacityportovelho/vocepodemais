@extends('layout')

@section('content')
<div class="row">
  <div class="col-sm-4 offset-sm-4">
    <form action="{{ route('donator.login') }}" method="POST">
      {{ csrf_field() }}

      <div class="form-group">
        <label for="">E-mail</label>
        <input id="email" name="email" type="text" placeholder="email@email.com.br" class="form-control" value="{{ old('email') }}">
      </div>

      <div class="form-group">
        <label for="">Senha</label>
        <input id="password" name="password" type="password" placeholder="***" class="form-control">
      </div>

      <div class="form-group">
        <button class="btn btn-block btn-primary">Logar</button>
      </div>

      @if($errors->has('login'))
        <h5 class="text-danger text-center"> E-mail ou senha errado </h5>
      @endif()

      <span class="btn-block text-center">ou</span>
      <a href="{{ route('donator.create') }}" class="btn btn-block btn-link text-center">Cadastre-se</a>
    </form>
  </div>
</div>
@endsection()
