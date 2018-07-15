@extends('layout')

@section('content')
<div class="row">
  <div class="col-sm-12">
    <h1 class="text-center heading">Meu painel</h1>
  </div>
</div>
<div class="row">
  <h4>Crie pontos de coletas clicando no mapa</h4>
  <div id="map" class="map" style="height:250px;width:100%"></div>
</div>
<div class="row">
  <div class="col-sm-4 text-center">
    <h3>1</h3>
    <h1>Doadores</h1>
  </div>
  <div class="col-sm-4 text-center">
    <h3>{{ $model->Points()->count() }}</h3>
    <h1>Pontos de coletas</h1>
  </div>
</div>


<div id="new_point" hidden>
  <h4>Novo ponto de coleta</h4>
  <form action="{{ route('receiver.point.store') }}" method="POST">
    {{ csrf_field() }}
    <input type="hidden" name="latitude">
    <input type="hidden" name="longitude">

    <div class="form-group">
      <label for="">Descrição</label>
      <textarea id="description" name="description" class="form-control" rows="3" required></textarea>
    </div>
    <button class="btn btn-primary">Criar</button>
  </form>
</div>
@endsection()

@section('script')
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyC3FfamEfbGaH5GirU8Jl7DDbkR6P290YA" async defer></script>
<script>

$(document).ready(function(){

  var map;
  var marker;
  var content = $('#new_point').html();
  var latitude = -8.766195769903216, longitude = -63.872108459472656, zoom = 12;

  var map = new google.maps.Map(document.getElementById('map'), {
      center: {lat: parseFloat(latitude), lng: parseFloat(longitude)},
      zoom: zoom
  });

  var new_marker = function(latLng) {

    marker = new google.maps.Marker({
     draggable: true,
      map: map,
      position: latLng
    });

    google.maps.event.addListener(marker,'dragend',function(event) {
      $('[name=latitude]').val(event.latLng.lat())
      $('[name=longitude]').val(event.latLng.lng())
      //document.getElementById('lat').value =event.latLng.lat();
      //document.getElementById('lng').value =event.latLng.lng();
      var infowindow = new google.maps.InfoWindow({
            content: content// 'Latitude: ' + event.latLng.lat() + '<br>Longitude:' + event.latLng.lng()
      });
      infowindow.open(map,marker);
    });
  }

  google.maps.event.addListener(map, 'click', function(event) {
      if (! marker) {
        new_marker(event.latLng);
      }
  });
})
</script>
@endsection()

