<?php 
session_start();
require '../../backend/koneksi.php';
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
      <aside class="sidebar">
        <!-- Sidebar Menu -->
        <nav class="mt-2">
          <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
            <li class="nav-item">
              <a href="../dashboard.php" class="nav-link">
                <i class="nav-icon fas fa-tachometer-alt"></i>
                <p>Dashboard</p>
              </a>
            </li>
            <li class="nav-item menu-open">
              <a href="kost/kost.php" class="nav-link active">
                <i class="nav-icon fas fa-th"></i>
                <p>Kost</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="../logout.php" class="nav-link">
                <i class="nav-icon fas fa-power-off"></i>
                <p>Log Out</p>
              </a>
            </li>
          </ul>
        </nav>
        <!-- /.sidebar-menu -->
      </aside>
      <!-- /.sidebar -->
    </aside>

      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
          <div class="container-fluid">
            <div class="row mb-2">
              <div class="col-sm-6">
                <h1 class="m-0">KOST</h1>
              </div><!-- /.col -->
            </div><!-- /.row -->
          </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header d-flex justify-content-between align-items-end">
                <h3 class="card-title">Table Kost</h3>
                <a href="tambah.php" class="btn btn-primary ml-auto">Tambah Data</a>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <div class="mt-2 mb-2" id="google-map" style="height:400px"></div>
                <table id="example2" class="table table-bordered table-hover">
                  <thead>
                    <tr>
                      <th>No</th>
                      <th>Nama Kost</th>
                      <th>Alamat</th>
                      <th>Longitude</th>
                      <th>Latitude</th>
                      <th class="text-center">Opsi</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                    $no = 1;
                    $sqld = "SELECT * FROM kost";
                    $resultd = mysqli_query($conn, $sqld);

                    if ($resultd) {
                        while ($rowd = mysqli_fetch_assoc($resultd)) {
                            $id = $rowd['id_kost'];
                            $nama = $rowd['nama_kost'];
                            $longitude = $rowd['longitude'];
                            $latitude = $rowd['latitude'];
                            $alamat = $rowd['alamat'];
                            ?>
                        <tr>
                          <td><?php echo $id; ?></td>
                          <td><?php echo $nama; ?></td>
                          <td><?php echo $alamat; ?></td>
                          <td><?php echo $longitude; ?></td>
                          <td><?php echo $latitude; ?></td>
                          <td class="text-center">
                            <a class="btn btn-warning" href="edit.php?id_kost=<?php echo $id; ?>"><i class="fas fa-edit"></i></a>
                            <a class="btn btn-danger" href="#" onclick="confirmDelete(<?php echo $id; ?>)"><i class="fas fa-trash"></i></a>
                          </td>
                        </tr>
                            <?php
                        }
                    } else {
                        echo "<tr><td colspan='6'>No data found</td></tr>";
                    }
                    ?>
                  </tbody>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
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
        <strong>Copyright &copy; Ichsan Hanifdeal</strong>. All rights reserved.
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
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAQqCVzh9CHvZAJrfAoR-mVZD-dZxap2Xo&callback=initGoogleMap&libraries=geometry" async defer></script>
<script>
    var googleMap;
    var markers = [];

    function initGoogleMap() {
        googleMap = new google.maps.Map(document.getElementById("google-map"), {
            center: {
                lat: 0.537488,
                lng: 101.448387
            },
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
                var marker = new google.maps.Marker({
                    position: {
                        lat: <?php echo $lat; ?>,
                        lng: <?php echo $long; ?>
                    },
                    map: googleMap,
                    title: '<?php echo $nama; ?>',
                    icon: {
                        url: '../../plugins/house.png',
                        scaledSize: new google.maps.Size(40, 40),
                    },
                });

                marker.addListener('click', function () {
                    console.log('Marker clicked: ' + this.getTitle());
                });

                markers.push(marker);
                <?php
            }
        }
        ?>
    }
</script>

   <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.10.0/dist/sweetalert2.all.min.js"></script>
    <script>
        function confirmDelete(id) {
            Swal.fire({
                title: "Apa kamu yakin?",
                text: "Ketika dihapus, Anda tidak dapat mengembalikan data ini!",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#3085d6",
                cancelButtonColor: "#d33",
                confirmButtonText: "Yes",
            }).then((result) => {
                if (result.isConfirmed) {
                    window.location.href = "hapus.php?id=" + id;
                } else {}
            });
        }
    </script>
  </body>

  </html>
