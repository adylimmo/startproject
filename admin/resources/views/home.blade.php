@extends('layouts.app')

@section('css')
    <style>
        /* Always set the map height explicitly to define the size of the div
         * element that contains the map. */
        #map {
            height: 100vh;
        }
    </style>
@endsection

@section('content')
<div class="container">
    <div class="row">
        <div id="map"></div>
    </div>
</div>
@endsection

@section('scripts')
    <script>
        var trackings = [];
        var salesTrack = {};
        var customers = [];

        $.ajax({
            url: "{{ url('/api/customers') }}",
            async: false,
            type: 'GET',
            success: function (response) {
                $.each(response.data, function (index, value) {
                    customers.push(
                        [value.customer_name, parseFloat(value.geolocation_lat), parseFloat(value.geolocation_lng), index+1]
                    );
                })
            }
        });

        $.ajax({
            url: "{{ url('/api/trackings') }}",
            async: false,
            type: 'GET',
            success: function (response) {
                trackings = response.data;

                /*$.each(response.data, function (index, value) {
                    trackings[index].push(
                        {lat : parseFloat(value.geolocation_lat), lng : parseFloat(value.geolocation_lng)}
                    );
                })*/
            }
        });
    </script>

    <script>
        // The following example creates complex markers to indicate beaches near
        // Sydney, NSW, Australia. Note that the anchor is set to (0,32) to correspond
        // to the base of the flagpole.

        function initMap() {
            var map = new google.maps.Map(document.getElementById('map'), {
                zoom: 12,
                center: {lat: -6.224950, lng: 106.846670},
                mapTypeId: 'terrain'
            });

            $.each(trackings, function (index, value) {
                salesTrack[index] = [];

                $.each(value, function (idx, val) {
                    salesTrack[index].push(
                        {lat : parseFloat(val.geolocation_lat), lng : parseFloat(val.geolocation_lng)}
                    );
                });

                new google.maps.Polyline({
                    path: salesTrack[index],
                    geodesic: true,
                    strokeColor: '#FF0000',
                    strokeOpacity: 1.0,
                    strokeWeight: 2
                }).setMap(map);

                new google.maps.Marker({
                    position: salesTrack[index][salesTrack[index].length-1],
                    map: map,
                    title: index
                });
            });

            setMarkers(map);
        }

        // Data for the markers consisting of a name, a LatLng and a zIndex for the
        // order in which these markers should display on top of each other.
        var beaches = customers;

        function setMarkers(map) {
            // Adds markers to the map.

            // Marker sizes are expressed as a Size of X,Y where the origin of the image
            // (0,0) is located in the top left of the image.

            // Origins, anchor positions and coordinates of the marker increase in the X
            // direction to the right and in the Y direction down.
            var image = {
                url: 'https://developers.google.com/maps/documentation/javascript/examples/full/images/beachflag.png',
                // This marker is 20 pixels wide by 32 pixels high.
                size: new google.maps.Size(20, 32),
                // The origin for this image is (0, 0).
                origin: new google.maps.Point(0, 0),
                // The anchor for this image is the base of the flagpole at (0, 32).
                anchor: new google.maps.Point(0, 32)
            };
            // Shapes define the clickable region of the icon. The type defines an HTML
            // <area> element 'poly' which traces out a polygon as a series of X,Y points.
            // The final coordinate closes the poly by connecting to the first coordinate.
            var shape = {
                coords: [1, 1, 1, 20, 18, 20, 18, 1],
                type: 'poly'
            };
            for (var i = 0; i < beaches.length; i++) {
                var beach = beaches[i];
                var marker = new google.maps.Marker({
                    position: {lat: beach[1], lng: beach[2]},
                    map: map,
                    icon: image,
                    shape: shape,
                    title: beach[0],
                    zIndex: beach[3]
                });
            }
        }
    </script>
    <script async defer
            src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDTcJ2sO8JC5SUs7YYkx3AGM5hg_Z0H2L4&callback=initMap">
    </script>
@endsection
