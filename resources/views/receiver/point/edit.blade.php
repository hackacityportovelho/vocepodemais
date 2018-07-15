@extends('layout')

@section('content')

<div class="row">
  <div class="col-sm-12">
    <div id="map" style="height:250px;width:100%"></div>

    <form action="{{ route('receiver.point.update', $model->id) }}" method="POST">
      {{ csrf_field() }}
      {{ method_field('PATCH') }}

      <input type="hidden" name="latitude" value="{{ $model->latitude }}">
      <input type="hidden" name="longitude" value="{{ $model->longitude }}">
      <div class="form-group">
        <label for="">Descrição</label>
        <textarea id="description" name="description" class="form-control" rows="4">{{ old('description', $model->description) }}</textarea>
      </div>

      <div class="form-group">
        <label for="">Tipo de doação</label>
        <div class="row">
          @foreach(\App\Area::all() as $area)
            <div class="col-sm-3">
              <div class="input-group">
                <div class="input-group-prepend">
                    <div class="input-group-text">
                    <input name="areas[{{$area->id}}]" type="checkbox" aria-label="Checkbox for following text input" value='{{ $area->id }}'>
                    </div>
                </div>
                <input readonly type="text" value="{{ $area->name }}" class="form-control">
              </div>
            </div>
          @endforeach()
        </div>
      </div>

      <div class="col-sm-12">
        <button class="btn btn-primary">Atualizar</button>
        <a class="btn btn-link float-right" href="{{ route('receiver.visualization') }}">x cancelar</a>
      </div>
    </form>
  </div>
</div>

@endsection()

@section('script')
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyC3FfamEfbGaH5GirU8Jl7DDbkR6P290YA" async defer></script>
<script>

$(document).ready(function(){


  var map;
  var marker;
  var content = $('#new_point').html();
  var latitude = parseFloat($('[name=latitude]').val()), longitude = parseFloat($('[name=longitude]').val()), zoom = 12;

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
    });
  }

  google.maps.event.addListener(map, 'click', function(event) {
      if (! marker) {
        new_marker(event.latLng);
      }
  });

  new_marker({lat: parseFloat($('[name=latitude]').val()), lng: parseFloat($('[name=longitude]').val()) })
})
</script>
@endsection()


