@extends('layout')

@section('content')
<style>
.btn-secondary:not(:disabled):not(.disabled).active, .btn-secondary:not(:disabled):not(.disabled):active, .show>.btn-secondary.dropdown-toggle{
  background-color:green;
}
</style>

<h3>O que vou doar?</h3>
<div class="row">
  @foreach(\App\Area::all() as $area)
  <div class="col-sm-2">
    <div class="btn-group-toggle" data-toggle="buttons">
      <label class="btn btn-secondary">
        <input name="areas[]" type="checkbox"  autocomplete="off" value="{{ $area->id }}"> {{ $area->name }}
      </label>
    </div>
  </div>
  @endforeach()
</div>
<h4>Onde posso doar?</h4>
<div id="map" class="map" style="height:450px;width:100%"></div>

@endsection()

@section('script')
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyC3FfamEfbGaH5GirU8Jl7DDbkR6P290YA" async defer></script>
<script>

$(document).ready(function(){
    var map;
    var marker;
    var markers = [];
    var myLocation;
    var infowindow = new google.maps.InfoWindow({ maxWidth: 200 });
    var latitude = -8.766195769903216, longitude = -63.872108459472656, zoom = 13; // Porto velho

    var new_marker = function(latLng) {
      marker = new google.maps.Marker({
        map: map,
        position: latLng,
        animation: google.maps.Animation.DROP,
        icon: '/point.png',
      });
      return marker;
    };

     map = new google.maps.Map(document.getElementById('map'), {
      center: {lat: latitude, lng: longitude},
      zoom: zoom
    })

    if(navigator.geolocation) {
      navigator.geolocation.getCurrentPosition(function(position) {
        console.log('GET')
        myLocation = {
          lat: position.coords.latitude,
          lng: position.coords.longitude
        };

        map.setCenter(new google.maps.LatLng(position.coords.latitude, position.coords.longitude));

        marker = new google.maps.Marker({
          map: map,
          position: myLocation,
          icon: 'data:image/svg+xml;utf8;base64,PD94bWwgdmVyc2lvbj0iMS4wIiBlbmNvZGluZz0iaXNvLTg4NTktMSI/Pgo8IS0tIEdlbmVyYXRvcjogQWRvYmUgSWxsdXN0cmF0b3IgMTYuMC4wLCBTVkcgRXhwb3J0IFBsdWctSW4gLiBTVkcgVmVyc2lvbjogNi4wMCBCdWlsZCAwKSAgLS0+CjwhRE9DVFlQRSBzdmcgUFVCTElDICItLy9XM0MvL0RURCBTVkcgMS4xLy9FTiIgImh0dHA6Ly93d3cudzMub3JnL0dyYXBoaWNzL1NWRy8xLjEvRFREL3N2ZzExLmR0ZCI+CjxzdmcgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIiB4bWxuczp4bGluaz0iaHR0cDovL3d3dy53My5vcmcvMTk5OS94bGluayIgdmVyc2lvbj0iMS4xIiBpZD0iQ2FwYV8xIiB4PSIwcHgiIHk9IjBweCIgd2lkdGg9IjE2cHgiIGhlaWdodD0iMTZweCIgdmlld0JveD0iMCAwIDQwOS4xNjUgNDA5LjE2NCIgc3R5bGU9ImVuYWJsZS1iYWNrZ3JvdW5kOm5ldyAwIDAgNDA5LjE2NSA0MDkuMTY0OyIgeG1sOnNwYWNlPSJwcmVzZXJ2ZSI+CjxnPgoJPGc+CgkJPHBhdGggZD0iTTIwNC41ODMsMjE2LjY3MWM1MC42NjQsMCw5MS43NC00OC4wNzUsOTEuNzQtMTA3LjM3OGMwLTgyLjIzNy00MS4wNzQtMTA3LjM3Ny05MS43NC0xMDcuMzc3ICAgIGMtNTAuNjY4LDAtOTEuNzQsMjUuMTQtOTEuNzQsMTA3LjM3N0MxMTIuODQ0LDE2OC41OTYsMTUzLjkxNiwyMTYuNjcxLDIwNC41ODMsMjE2LjY3MXoiIGZpbGw9IiMwMDAwMDAiLz4KCQk8cGF0aCBkPSJNNDA3LjE2NCwzNzQuNzE3TDM2MC44OCwyNzAuNDU0Yy0yLjExNy00Ljc3MS01LjgzNi04LjcyOC0xMC40NjUtMTEuMTM4bC03MS44My0zNy4zOTIgICAgYy0xLjU4NC0wLjgyMy0zLjUwMi0wLjY2My00LjkyNiwwLjQxNWMtMjAuMzE2LDE1LjM2Ni00NC4yMDMsMjMuNDg4LTY5LjA3NiwyMy40ODhjLTI0Ljg3NywwLTQ4Ljc2Mi04LjEyMi02OS4wNzgtMjMuNDg4ICAgIGMtMS40MjgtMS4wNzgtMy4zNDYtMS4yMzgtNC45My0wLjQxNUw1OC43NSwyNTkuMzE2Yy00LjYzMSwyLjQxLTguMzQ2LDYuMzY1LTEwLjQ2NSwxMS4xMzhMMi4wMDEsMzc0LjcxNyAgICBjLTMuMTkxLDcuMTg4LTIuNTM3LDE1LjQxMiwxLjc1LDIyLjAwNWM0LjI4NSw2LjU5MiwxMS41MzcsMTAuNTI2LDE5LjQsMTAuNTI2aDM2Mi44NjFjNy44NjMsMCwxNS4xMTctMy45MzYsMTkuNDAyLTEwLjUyNyAgICBDNDA5LjY5OSwzOTAuMTI5LDQxMC4zNTUsMzgxLjkwMiw0MDcuMTY0LDM3NC43MTd6IiBmaWxsPSIjMDAwMDAwIi8+Cgk8L2c+CjwvZz4KPGc+CjwvZz4KPGc+CjwvZz4KPGc+CjwvZz4KPGc+CjwvZz4KPGc+CjwvZz4KPGc+CjwvZz4KPGc+CjwvZz4KPGc+CjwvZz4KPGc+CjwvZz4KPGc+CjwvZz4KPGc+CjwvZz4KPGc+CjwvZz4KPGc+CjwvZz4KPGc+CjwvZz4KPGc+CjwvZz4KPC9zdmc+Cg==',
          icon: {
            labelOrigin: new google.maps.Point(8, 24),
            url: 'data:image/svg+xml;utf8;base64,PD94bWwgdmVyc2lvbj0iMS4wIiBlbmNvZGluZz0iaXNvLTg4NTktMSI/Pgo8IS0tIEdlbmVyYXRvcjogQWRvYmUgSWxsdXN0cmF0b3IgMTYuMC4wLCBTVkcgRXhwb3J0IFBsdWctSW4gLiBTVkcgVmVyc2lvbjogNi4wMCBCdWlsZCAwKSAgLS0+CjwhRE9DVFlQRSBzdmcgUFVCTElDICItLy9XM0MvL0RURCBTVkcgMS4xLy9FTiIgImh0dHA6Ly93d3cudzMub3JnL0dyYXBoaWNzL1NWRy8xLjEvRFREL3N2ZzExLmR0ZCI+CjxzdmcgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIiB4bWxuczp4bGluaz0iaHR0cDovL3d3dy53My5vcmcvMTk5OS94bGluayIgdmVyc2lvbj0iMS4xIiBpZD0iQ2FwYV8xIiB4PSIwcHgiIHk9IjBweCIgd2lkdGg9IjE2cHgiIGhlaWdodD0iMTZweCIgdmlld0JveD0iMCAwIDQwOS4xNjUgNDA5LjE2NCIgc3R5bGU9ImVuYWJsZS1iYWNrZ3JvdW5kOm5ldyAwIDAgNDA5LjE2NSA0MDkuMTY0OyIgeG1sOnNwYWNlPSJwcmVzZXJ2ZSI+CjxnPgoJPGc+CgkJPHBhdGggZD0iTTIwNC41ODMsMjE2LjY3MWM1MC42NjQsMCw5MS43NC00OC4wNzUsOTEuNzQtMTA3LjM3OGMwLTgyLjIzNy00MS4wNzQtMTA3LjM3Ny05MS43NC0xMDcuMzc3ICAgIGMtNTAuNjY4LDAtOTEuNzQsMjUuMTQtOTEuNzQsMTA3LjM3N0MxMTIuODQ0LDE2OC41OTYsMTUzLjkxNiwyMTYuNjcxLDIwNC41ODMsMjE2LjY3MXoiIGZpbGw9IiMwMDAwMDAiLz4KCQk8cGF0aCBkPSJNNDA3LjE2NCwzNzQuNzE3TDM2MC44OCwyNzAuNDU0Yy0yLjExNy00Ljc3MS01LjgzNi04LjcyOC0xMC40NjUtMTEuMTM4bC03MS44My0zNy4zOTIgICAgYy0xLjU4NC0wLjgyMy0zLjUwMi0wLjY2My00LjkyNiwwLjQxNWMtMjAuMzE2LDE1LjM2Ni00NC4yMDMsMjMuNDg4LTY5LjA3NiwyMy40ODhjLTI0Ljg3NywwLTQ4Ljc2Mi04LjEyMi02OS4wNzgtMjMuNDg4ICAgIGMtMS40MjgtMS4wNzgtMy4zNDYtMS4yMzgtNC45My0wLjQxNUw1OC43NSwyNTkuMzE2Yy00LjYzMSwyLjQxLTguMzQ2LDYuMzY1LTEwLjQ2NSwxMS4xMzhMMi4wMDEsMzc0LjcxNyAgICBjLTMuMTkxLDcuMTg4LTIuNTM3LDE1LjQxMiwxLjc1LDIyLjAwNWM0LjI4NSw2LjU5MiwxMS41MzcsMTAuNTI2LDE5LjQsMTAuNTI2aDM2Mi44NjFjNy44NjMsMCwxNS4xMTctMy45MzYsMTkuNDAyLTEwLjUyNyAgICBDNDA5LjY5OSwzOTAuMTI5LDQxMC4zNTUsMzgxLjkwMiw0MDcuMTY0LDM3NC43MTd6IiBmaWxsPSIjMDAwMDAwIi8+Cgk8L2c+CjwvZz4KPGc+CjwvZz4KPGc+CjwvZz4KPGc+CjwvZz4KPGc+CjwvZz4KPGc+CjwvZz4KPGc+CjwvZz4KPGc+CjwvZz4KPGc+CjwvZz4KPGc+CjwvZz4KPGc+CjwvZz4KPGc+CjwvZz4KPGc+CjwvZz4KPGc+CjwvZz4KPGc+CjwvZz4KPGc+CjwvZz4KPC9zdmc+Cg==',
            size: new google.maps.Size(16, 16),
            origin: new google.maps.Point(0, 0),
            anchor: new google.maps.Point(8, 8),
          },
          label: {
            color: 'black',
            fontWeight: 'bold',
            text: 'Eu',
          },
        });

        $(document).on('change', '[name^=area]', function() {
          var areas = $('[name^=areas]:checked').map(function() {
            return $(this).val();
          });

          areas = areas.toArray().join(',');
          $.getJSON('{{ route("api.receivers.points") }}' + '?areas=' + areas, function(data) {
            markers_data = data;

            for(i in markers) {
              markers[i].setMap(null)
            }

            for(i in data) {
              var point = data[i];
              var m = new_marker({lat: parseFloat(point.latitude), lng: parseFloat(point.longitude)});
              m.content = '<h5>'+point.name+'</h5><p>'+point.description+'</p>' + point.areas.join(', ') ;
              m.addListener('click', function() {
                infowindow.setContent(this.content)
                infowindow.open(map, this);
              });
              markers.push(m)
            }
          })
        });

      }, function() {
        handleLocationError(true, infoWindow, map.getCenter());
     });
    }

});
</script>
@endsection()
