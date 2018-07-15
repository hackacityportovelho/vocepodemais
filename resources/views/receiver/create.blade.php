@extends('layout')

@section('content')
<div class="col-sm-4 offset-sm-4">
  <form action="{{ route('receiver.store') }}" method="POST">
    {{ csrf_field() }}

    <h1>Seja uma parceiro</h1>
    <div class="form-group">
      <label for="">CNPJ</label>
      <input id="cnpj" name="cnpj" type="text" class="form-control @if($errors->has('cnpj')) is-invalid @endif()">
      @if($errors->has('cnpj')) <div class="invalid-feedback">{!! $errors->first('cnpj') !!}</div> @endif()
    </div>

    <div class="form-group">
      <label for="name">Nome da organização</label>
      <div class="input-group">
        <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
        <input id="name" name="name" type="text" class="form-control @if($errors->has('name')) is-invalid @endif()">
        @if($errors->has('name')) <div class="invalid-feedback">{!! $errors->first('name') !!}</div> @endif()
      </div>
    </div>

    <div class="form-group">
      <label for="">E-mail</label>
      <input id="email" name="email" type="email" class="form-control @if($errors->has('cnpj')) is-invalid @endif()">
      @if($errors->has('email')) <div class="invalid-feedback">{!! $errors->first('email') !!}</div> @endif()
    </div>

    <div class="form-group">
      <label for="">Senha</label>
      <input id="password" name="password" type="password" class="form-control @if($errors->has('cnpj')) is-invalid @endif()">
    </div>

    <div class="form-group">
      <label for="">Confirme a senha</label>
      <input id="password_confirmation" name="password_confirmation" type="password" class="form-control @if($errors->has('cnpj')) is-invalid @endif()">
      @if($errors->has('password')) <div class="invalid-feedback">{!! $errors->first('password') !!}</div> @endif()
    </div>
  
    <div class="form-group">
      <button class="btn btn-block btn-primary">Criar organização</button>
    </div>
  </form>
</div>

@endsection()

