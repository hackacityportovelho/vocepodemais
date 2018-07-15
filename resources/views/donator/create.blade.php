@extends('layout')

@section('content')
<div class="col-sm-4 offset-sm-4">
  <h3>Seja um doador</h3>
  <form action="{{ route('donator.store') }}" method="POST">
    {{ csrf_field() }}


    <div class="form-group">
      <label for="name">Nome</label>
      <input id="name" name="name" type="text" value="{{ old('name') }}" class="form-control @if($errors->has('name')) is-invalid @endif()">
      @if($errors->has('name')) <div class="invalid-feedback">{!! $errors->first('name') !!}</div> @endif()
    </div>

    <div class="form-group">
      <label for="">E-mail</label>
      <input id="email" name="email" type="email" value="{{ old('email') }}" class="form-control @if($errors->has('email')) is-invalid @endif()">
      @if($errors->has('email')) <div class="invalid-feedback">{!! $errors->first('email') !!}</div> @endif()
    </div>

    <div class="form-group">
      <label for="">Senha (6 caracteres)</label>
      <input id="password" name="password" type="password" class="form-control @if($errors->has('password')) is-invalid @endif()">
    </div>

    <div class="form-group">
      <label for="">Confirme a senha</label>
      <input id="password_confirmation" name="password_confirmation" type="password" class="form-control @if($errors->has('password')) is-invalid @endif()">
      @if($errors->has('password')) <div class="invalid-feedback">{!! $errors->first('password') !!}</div> @endif()
    </div>
  
    <div class="form-group">
      <button class="btn btn-block btn-primary">Cadastrar</button>
    </div>
  </form>
</div>

@endsection()
