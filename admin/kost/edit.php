<?php
session_start();
require '../../backend/koneksi.php';

$idToUpdate = '';

if (isset($_GET['id_kost'])) {
    $idToUpdate = $_GET['id_kost'];

    $sqlGetData = "SELECT * FROM kost WHERE id_kost = '$idToUpdate'";
    $resultGetData = mysqli_query($conn, $sqlGetData);

    if ($resultGetData) {
        $rowData = mysqli_fetch_assoc($resultGetData);
        $namaKost = $rowData['nama_kost']; 
        $alamat = $rowData['alamat'];
        $lat = $rowData['latitude'];
        $long = $rowData['longitude'];
    }
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $namaKost = mysqli_real_escape_string($conn, $_POST["nama_kost"]);
    $alamat = mysqli_real_escape_string($conn, $_POST["nama_daerah"]);
    $latitude = mysqli_real_escape_string($conn, $_POST["latitude"]);
    $longitude = mysqli_real_escape_string($conn, $_POST["longitude"]);
    
    $sqlUpdate = "UPDATE kost SET nama_kost = '$namaKost', alamat = '$alamat', latitude = '$latitude', longitude = '$longitude' WHERE id_kost = '$idToUpdate'";
    $resultUpdate = mysqli_query($conn, $sqlUpdate);

    if ($resultUpdate) {
        header('location: kost.php');
    } else {
        echo json_encode(array("status" => "error", "message" => "Error: " . mysqli_error($conn)));
    }
}

mysqli_close($conn);
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>PencariKost.id | Dashboard</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="../../plugins/dashboard/plugins/fontawesome-free/css/all.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../../plugins/dashboard/dist/css/adminlte.min.css">
</head>
<body class="hold-transition sidebar-mini">
<div class="wrapper">

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
      <img src="../../plugins/dashboard/dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">PencariKost.id</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <li class="nav-item">
            <a href="../dashboard.php" class="nav-link">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Dashboard
              </p>
            </a>
          </li>     
          <li class="nav-item menu-open">
            <a href="kost.php" class="nav-link active">
              <i class="nav-icon fas fa-th"></i>
              <p>
                Kost
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="../logout.php" class="nav-link">
              <i class="nav-icon fas fa-power-off"></i>
              <p>
                Log Out
              </p>
            </a>
          </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Edit Data</h1>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
      <div class="container-fluid py-4">
            <div class="row">
                <div class="col-lg-8 mx-auto">
                    <div class="card shadow">
                        <div class="card-header bg-gradient-primary shadow-primary border-0">
                            <h6 class="text-white text-uppercase mb-0">Edit Lokasi Kost</h6>
                        </div>
                        <div class="card-body px-4">
                            <div id="map" style="height: 600px;"></div>
                            <form method="post" action="">
                                <input type="hidden" name="id" value="<?php echo $editData['id_kost']; ?>">

                                <div class="mb-3">
                                    <label for="nama_kost" class="form-label">Nama Kost:</label>
                                    <input type="text" name="nama_kost" id="nama_kost" class="form-control" value="<?php echo $namaKost; ?>" required>
                                </div>
                            
                                <div class="mb-3">
                                    <label for="nama_daerah" class="form-label">Alamat:</label>
                                    <input type="text" name="nama_daerah" id="nama_daerah" class="form-control" value="<?php echo $alamat; ?>" readonly required>
                                </div>

                                <div class="mb-3">
                                    <label for="latitude" class="form-label">Latitude:</label>
                                    <input type="text" id="latitude" name="latitude" class="form-control" value="<?php echo $lat; ?>" readonly required>
                                </div>

                                <div class="mb-3">
                                    <label for="longitude" class="form-label">Longitude:</label>
                                    <input type="text" id="longitude" name="longitude" class="form-control" value="<?php echo $long; ?>" readonly required>
                                </div>

                                <button type="submit" class="btn btn-primary mt-3">Edit</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
    <div class="p-3">
      <h5>Title</h5>
      <p>Sidebar content</p>
    </div>
  </aside>
  <!-- /.control-sidebar -->

  <!-- Main Footer -->
  <footer class="main-footer">
    <!-- To the right -->
    <div class="float-right d-none d-sm-inline">
      Anything you want
    </div>
    <!-- Default to the left -->
    <strong>Copyright &copy; Ichsan Hanifdeal</a>.</strong> All rights reserved.
  </footer>
</div>
<!-- ./wrapper -->

<!-- REQUIRED SCRIPTS -->

<!-- jQuery -->
<script src="../../plugins/dashboard/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="../../plugins/dashboard/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="../../plugins/dashboard/dist/js/adminlte.min.js"></script>
<script>
    let map, marker;

    function initMap() {
        map = new google.maps.Map(document.getElementById("map"), {
            center: {
                lat: 0.537488,
                lng: 101.448387
            },
            zoom: 15,
        });

<?php if (isset($lat) && isset($long)) : ?>
    console.log("Initial Location: ", <?php echo $lat; ?>, <?php echo $long; ?>);
    const initialLocation = new google.maps.LatLng(<?php echo $lat; ?>, <?php echo $long; ?>);
    placeMarker(initialLocation);
<?php endif; ?>


        map.addListener("click", (event) => {
            placeMarker(event.latLng);
        });
    }

    function placeMarker(location) {
        if (marker) {
            marker.setPosition(location);
        } else {
            marker = new google.maps.Marker({
                position: location,
                map: map,
                icon: {
                    url: "../../plugins/house.png",
                    scaledSize: new google.maps.Size(40, 40),
                }
            });
        }

        reverseGeocode(location);

        $("#latitude").val(location.lat());
        $("#longitude").val(location.lng());
    }

    function reverseGeocode(location) {
        const geocoder = new google.maps.Geocoder();
        geocoder.geocode({
            'location': location
        }, function(results, status) {
            if (status === 'OK') {
                if (results[0]) {
                    const namaDaerah = results[0].formatted_address;
                    $("#nama_daerah").val(namaDaerah);
                }
            }
        });
    }

    $(document).ready(function() {
        initMap();
    });
</script>

<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAQqCVzh9CHvZAJrfAoR-mVZD-dZxap2Xo&libraries=places&callback=initMap" defer></script>
</body>
</html>
