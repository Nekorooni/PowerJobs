<div class="jumbotron">
    <div class="container">
        <h1 class="display-3">Over ons</h1>
    </div>
</div>
<div class="container">
    <div class="row">
        <p>
            PowerJobs is een bedrijf dat zich bezig houd met het adverteren voor bedrijven die personeel zoeken. Door middel van advertenties in de krant adverteren ze vacatures voor bedrijven.
            En nu is het nog makkelijker om dat te doen, daar is deze site namelijk voor.
        </p>
        <h2>Contact info:</h2>
        <p>1321JT Almere<br>Cissy van marxveldtstraat 32</p>
        <div id="map" style="height:400px; width:100%;"></div>
        <script>
            function initMap() {
                var uluru = {lat: 52.3547655, lng: 5.1883265};
                var map = new google.maps.Map(document.getElementById('map'), {
                    zoom: 10,
                    center: uluru
                });
                var marker = new google.maps.Marker({
                    position: uluru,
                    map: map
                });
            }
        </script>
        <script async defer
                src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDs-22HCwNwltTukxl01kvAB6Q2srtoCYg&callback=initMap">
        </script>
    </div>
</div>