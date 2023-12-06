<?php require 'backend/koneksi.php'; 
$sqld = "SELECT * FROM kost";
$resultd = mysqli_query($conn, $sqld);
$rowd = mysqli_fetch_assoc($resultd);
?>
<!DOCTYPE html>

<html lang="en">

<head>
  <meta charset="utf-8" />
  <link rel="apple-touch-icon" sizes="76x76" href="plugins/landing/assets/img//apple-icon.png">
  <link rel="icon" type="image/png" href="plugins/landing/assets/img//favicon.png">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
  <title>
    Pencari.id
  </title>
  <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
  <!--     Fonts and icons     -->
  <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700,200" rel="stylesheet" />
  <link href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" rel="stylesheet">
  <!-- CSS Files -->
  <link href="plugins/landing/assets/css/bootstrap.min.css" rel="stylesheet" />
  <link href="plugins/landing/assets/css/paper-kit.css?v=2.2.0" rel="stylesheet" />
  <!-- CSS Just for demo purpose, don't include it in your project -->
  <link href="plugins/landing/assets/demo/demo.css" rel="stylesheet" />
  </head>

<body class="landing-page sidebar-collapse">
  <!-- Navbar -->
  <nav class="navbar navbar-expand-lg fixed-top navbar-transparent " color-on-scroll="300">
    <div class="container">
      <div class="navbar-translate">
        <a class="navbar-brand" href="#" rel="tooltip" title="Pencari Kost" data-placement="bottom">
          Pencari Kost
        </a>
        <button class="navbar-toggler navbar-toggler" type="button" data-toggle="collapse" data-target="#navigation" aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-bar bar1"></span>
          <span class="navbar-toggler-bar bar2"></span>
          <span class="navbar-toggler-bar bar3"></span>
        </button>
      </div>
      <div class="collapse navbar-collapse justify-content-end" id="navigation">
        <ul class="navbar-nav">
          <li class="nav-item">
            <a href="login.php" class="nav-link">Login</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>
  <!-- End Navbar -->
  <div class="page-header" data-parallax="true" style="background-image: url('plugins/landing/assets/img/daniel-olahh.jpg');">
    <div class="filter"></div>
    <div class="container">
      <div class="motto text-center">
        <h1>PencariKost.id</h1>
        <h3>Aplikasi untuk mencari kost kawasan Pekanbaru.</h3>
        <br />
      </div>
    </div>
  </div>
  <div class="main">
    <div class="section text-center">
      <div class="container">
        <div class="row">
          <div class="col-md-8 ml-auto mr-auto">
            <h2 class="title">Map</h2>
            <br>
            <div id="google-map" style="height:500px;"></div>
          </div>
      </div>
      <br><br>
      <input type="text" id="search-input" placeholder="Search for a location">
<button class="btn btn-primary" onclick="getCurrentLocation()">
   Dapatkan lokasi terkini
</button>
      <br>
      <br>
    </div>
    <div class="section section-dark text-center">
      <div class="container">
        <h2 class="title">Let's talk about us</h2>
        <div class="row">
          <div class="col-md-4">
            <div class="card card-profile card-plain">
              <div class="card-avatar">
                <a href="#avatar">
                  <img src="plugins/landing/assets/img/faces/clem-onojeghuo-3.jpg" alt="...">
                </a>
              </div>
              <div class="card-body">
                <a href="#paper-kit">
                  <div class="author">
                    <h4 class="card-title">Nico Jonathan</h4>
                  </div>
                </a>
              </div>
            </div>
          </div>
          <div class="col-md-4">
            <div class="card card-profile card-plain">
              <div class="card-avatar">
                <a href="#avatar">
                  <img src="plugins/landing/assets/img/faces/clem-onojeghuo-3.jpg" alt="...">
                </a>
              </div>
              <div class="card-body">
                <a href="#paper-kit">
                  <div class="author">
                    <h4 class="card-title">Kelvin Kiswanda</h4>
                  </div>
                </a>
              </div>
            </div>
          </div>
          <div class="col-md-4">
            <div class="card card-profile card-plain">
              <div class="card-avatar">
                <a href="#avatar">
                  <img src="plugins/landing/assets/img/faces/clem-onojeghuo-3.jpg" alt="...">
                </a>
              </div>
              <div class="card-body">
                <a href="#paper-kit">
                  <div class="author">
                    <h4 class="card-title">Juan Reynald Simbolon</h4>
                  </div>
                </a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <footer class="footer   footer-white ">
    <div class="container">
      <div class="row">
        <div class="credits ml-auto">
          <span class="copyright">
            ©
            <script>
              document.write(new Date().getFullYear())
            </script>, made with <i class="fa fa-heart heart"></i> by Ichsan Hanifdeal
          </span>
        </div>
      </div>
    </div>
  </footer>
  <!--   Core JS Files   -->
  <script src="plugins/landing/assets/js/core/jquery.min.js" type="text/javascript"></script>
  <script src="plugins/landing/assets/js/core/popper.min.js" type="text/javascript"></script>
  <script src="plugins/landing/assets/js/core/bootstrap.min.js" type="text/javascript"></script>
  <!--  Plugin for Switches, full documentation here: http://www.jque.re/plugins/version3/bootstrap.switch/ -->
  <script src="plugins/landing/assets/js/plugins/bootstrap-switch.js"></script>
  <!--  Plugin for the Sliders, full documentation here: http://refreshless.com/nouislider/ -->
  <script src="plugins/landing/assets/js/plugins/nouislider.min.js" type="text/javascript"></script>
  <!--  Plugin for the DatePicker, full documentation here: https://github.com/uxsolutions/bootstrap-datepicker -->
  <script src="plugins/landing/assets/js/plugins/moment.min.js"></script>
  <script src="plugins/landing/assets/js/plugins/bootstrap-datepicker.js" type="text/javascript"></script>
  <!-- Control Center for Paper Kit: parallax effects, scripts for the example pages etc -->
  <script src="plugins/landing/assets/js/paper-kit.js?v=2.2.0" type="text/javascript"></script>
  <!--  Google Maps Plugin    -->
  
<script>
    var googleMap;
    var markers = [];
    var searchInput = document.getElementById('search-input');
    var autocomplete;

    function initGoogleMap() {
        googleMap = new google.maps.Map(document.getElementById("google-map"), {
            center: { lat: 0.537488, lng: 101.448387 },
            zoom: 15,
        });

        <?php
        $resultd = mysqli_query($conn, $sqld);
        while ($rowd = mysqli_fetch_assoc($resultd)) {
            $nama = $rowd['nama_kost'];
            $long = $rowd['longitude'];
            $lat = $rowd['latitude'];
            $alamat = $rowd['alamat'];

            if (!empty($lat) && !empty($long)) {
                ?>
                var marker = createMarker(<?php echo $lat; ?>, <?php echo $long; ?>, '<?php echo $nama; ?>');
                markers.push(marker);
                <?php
            }
        }
        ?>

        // Initialize Places Autocomplete
        autocomplete = new google.maps.places.Autocomplete(searchInput);
        autocomplete.bindTo('bounds', googleMap);

        autocomplete.addListener('place_changed', function () {
            var place = autocomplete.getPlace();
            if (!place.geometry) {
                console.error("Place not found");
                return;
            }

            // Example: Zoom to the selected location
            googleMap.setCenter(place.geometry.location);
            googleMap.setZoom(15);
        });
    }

    function createMarker(lat, lng, title) {
        var marker = new google.maps.Marker({
            position: { lat: lat, lng: lng },
            map: googleMap,
            title: title,
            icon: {
                path: google.maps.SymbolPath.HOUSE,
                scale: 6,
                fillColor: 'blue',
                fillOpacity: 1
            }
        });

        marker.addListener('click', function () {
            updateMarkerColor(marker);
            calculateAndDisplayRoute(marker.getPosition());
        });

        return marker;
    }

    function updateMarkerColor(marker) {
        marker.setIcon({
            path: google.maps.SymbolPath.HOUSE,
            scale: 6,
            fillColor: 'green',
            fillOpacity: 1
        });
    }

    function calculateAndDisplayRoute(position) {
        var directionsService = new google.maps.DirectionsService();
        var directionsRenderer = new google.maps.DirectionsRenderer();

        directionsRenderer.setMap(googleMap);

        var request = {
            destination: position,
            travelMode: 'DRIVING'
        };

        directionsService.route(request, function (result, status) {
            if (status == 'OK') {
                directionsRenderer.setDirections(result);
            }
        });
    }

    function getCurrentLocation() {
        // Example: Get the current location using the Geolocation API
        if (navigator.geolocation) {
            navigator.geolocation.getCurrentPosition(function (position) {
                var currentLocation = {
                    lat: position.coords.latitude,
                    lng: position.coords.longitude
                };

                // Example: Add a marker at the current location
                var currentLocationMarker = createMarker(currentLocation.lat, currentLocation.lng, 'Current Location');

                // Example: Zoom to the current location
                googleMap.setCenter(currentLocation);
                googleMap.setZoom(15);

                // Example: Add click event for the current location marker
                currentLocationMarker.addListener('click', function () {
                    // Add your code for the current location marker click event
                });
            }, function (error) {
                console.error('Error getting current location:', error);
            });
        } else {
            console.error('Geolocation is not supported by this browser.');
        }
    }

</script>
<script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAQqCVzh9CHvZAJrfAoR-mVZD-dZxap2Xo&callback=initGoogleMap&libraries=places"></script>


</body>

</html>
