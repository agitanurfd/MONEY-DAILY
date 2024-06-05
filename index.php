<?php
require 'cek-sesi.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Money Daily</title>

  <!-- Custom fonts for this template-->
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">

  <!-- Custom styles for this template-->
  <link href="css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body id="page-top">

  <?php
  require('koneksi.php');
  require('sidebar.php');

  //UNTUK CARD PEMASUKAN & PENGELUARAN
  $id = $_SESSION['id'];

  $arraymasuk = [0];
  $pemasukan = mysqli_query($koneksi, "SELECT * FROM pemasukan where tgl_pemasukan = CURDATE() AND id_user = '$id'");
  while ($masuk = mysqli_fetch_array($pemasukan)) {
    array_push($arraymasuk, $masuk['jumlah']);
  }
  $pemasukan_hari_ini = array_sum($arraymasuk);


  $arraymasuk = [0];
  $pemasukan = mysqli_query($koneksi, "SELECT * FROM pemasukan WHERE id_user = '$id'");
  while ($masuk = mysqli_fetch_array($pemasukan)) {
    array_push($arraymasuk, $masuk['jumlah']);
  }
  $jumlahmasuk = array_sum($arraymasuk);

  $arraykeluar = [0];
  $pengeluaran = mysqli_query($koneksi, "SELECT * FROM pengeluaran WHERE id_user = '$id'");
  while ($keluar = mysqli_fetch_array($pengeluaran)) {
    array_push($arraykeluar, $keluar['jumlah']);
  }
  $jumlahkeluar = array_sum($arraykeluar);

  //SISA UANG
  $uang = $jumlahmasuk - $jumlahkeluar;

  $max2 = [0];

  $arrayhasil6[] = [0];
  $hasil6 = mysqli_query($koneksi, "SELECT * FROM pengeluaran where id_sumber = 6 AND id_user = '$id'");
  while ($jumlah6 = mysqli_fetch_array($hasil6)) {
    array_push($arrayhasil6, $jumlah6['jumlah']);
  }
  $jumlahhasil6 = array_sum($arrayhasil6);
  array_push($max2, $jumlahhasil6);

  $arrayhasil7[] = [0];
  $hasil7 = mysqli_query($koneksi, "SELECT * FROM pengeluaran where id_sumber = 7 AND id_user = '$id'");
  while ($jumlah7 = mysqli_fetch_array($hasil7)) {
    array_push($arrayhasil7, $jumlah7['jumlah']);
  }
  $jumlahhasil7 = array_sum($arrayhasil7);
  array_push($max2, $jumlahhasil7);

  $arrayhasil8[] = [0];
  $hasil8 = mysqli_query($koneksi, "SELECT * FROM pengeluaran where id_sumber = 8 AND id_user = '$id'");
  while ($jumlah8 = mysqli_fetch_array($hasil8)) {
    array_push($arrayhasil8, $jumlah8['jumlah']);
  }
  $jumlahhasil8 = array_sum($arrayhasil8);
  array_push($max2, $jumlahhasil8);

  $arrayhasil9[] = [0];
  $hasil9 = mysqli_query($koneksi, "SELECT * FROM pengeluaran where id_sumber = 9 AND id_user = '$id'");
  while ($jumlah9 = mysqli_fetch_array($hasil9)) {
    array_push($arrayhasil9, $jumlah9['jumlah']);
  }
  $jumlahhasil9 = array_sum($arrayhasil9);
  array_push($max2, $jumlahhasil9);

  $arrayhasil10[] = [0];
  $hasil10 = mysqli_query($koneksi, "SELECT * FROM pengeluaran where id_sumber = 10 AND id_user = '$id'");
  while ($jumlah10 = mysqli_fetch_array($hasil10)) {
    array_push($arrayhasil10, $jumlah10['jumlah']);
  }
  $jumlahhasil10 = array_sum($arrayhasil10);
  array_push($max2, $jumlahhasil10);

  $tomax2 = 0;

  foreach ($max2 as $value) {
    if ($value > $tomax2) {
      $tomax2 = $value;
    }
  }

  $max1 = [0];


  $arrayhasil1[] = [0];
  $hasil1 = mysqli_query($koneksi, "SELECT * FROM pemasukan where id_sumber = 1 AND id_user = '$id'");
  while ($jumlah1 = mysqli_fetch_array($hasil1)) {
    array_push($arrayhasil1, $jumlah1['jumlah']);
  }
  $jumlahhasil1 = array_sum($arrayhasil1);
  array_push($max1, $jumlahhasil1);

  $arrayhasil2[] = [0];
  $hasil2 = mysqli_query($koneksi, "SELECT * FROM pemasukan where id_sumber = 2 AND id_user = '$id'");
  while ($jumlah2 = mysqli_fetch_array($hasil2)) {
    array_push($arrayhasil2, $jumlah2['jumlah']);
  }
  $jumlahhasil2 = array_sum($arrayhasil2);
  array_push($max1, $jumlahhasil2);

  $arrayhasil3[] = [0];
  $hasil3 = mysqli_query($koneksi, "SELECT * FROM pemasukan where id_sumber = 3 AND id_user = '$id'");
  while ($jumlah3 = mysqli_fetch_array($hasil3)) {
    array_push($arrayhasil3, $jumlah3['jumlah']);
  }
  $jumlahhasil3 = array_sum($arrayhasil3);
  array_push($max1, $jumlahhasil3);

  $arrayhasil4[] = [0];
  $hasil4 = mysqli_query($koneksi, "SELECT * FROM pemasukan where id_sumber = 4 AND id_user = '$id'");
  while ($jumlah4 = mysqli_fetch_array($hasil4)) {
    array_push($arrayhasil4, $jumlah4['jumlah']);
  }
  $jumlahhasil4 = array_sum($arrayhasil4);
  array_push($max1, $jumlahhasil4);

  $arrayhasil5[] = [0];
  $hasil5 = mysqli_query($koneksi, "SELECT * FROM pemasukan where id_sumber = 5 AND id_user = '$id'");
  while ($jumlah5 = mysqli_fetch_array($hasil5)) {
    array_push($arrayhasil5, $jumlah5['jumlah']);
  }
  $jumlahhasil5 = array_sum($arrayhasil5);
  array_push($max1, $jumlahhasil5);

  $tomax1 = 0;

  foreach ($max1 as $value) {
    if ($value > $tomax1) {
      $tomax1 = $value;
    }
  }

  ?>
  <!-- Main Content -->
  <div id="content">

    <!-- Topbar -->
    <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

      <!-- Sidebar Toggle (Topbar) -->
      <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
        <i class="fa fa-bars"></i>
      </button>

      <!-- Topbar Search -->
      <h5> Selamat Datang, <?= $_SESSION['name'] ?></h5>

      <?php require 'user.php'; ?>

    </nav>
    <!-- End of Topbar -->

    <!-- Begin Page Content -->
    <div class="container-fluid">

      <!-- Page Heading -->
      <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
        <a href="export-semua.php" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-download fa-sm text-white-50"></i> Download Laporan</a>
      </div>

      <!-- Content Row -->
      <div class="row">

        <!-- Earnings (Monthly) Card Example -->
        <div class="col-md-4 mb-4">
          <div class="card border-left-success shadow h-100 py-2">
            <div class="card-body">
              <div class="row no-gutters align-items-center">
                <div class="col mr-2">
                  <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Pemasukan</div>
                  <div class="h5 mb-0 font-weight-bold text-gray-800">Rp<?= number_format($jumlahmasuk, 2, ',', '.'); ?></div>
                </div>
                <div class="col-auto">
                  <i class="fas fa-calendar fa-2x text-gray-300"></i>
                </div>
              </div>
            </div>
          </div>
        </div>

        <!-- Earnings (Monthly) Card Example -->
        <div class="col-md-4 mb-4">
          <div class="card border-left-danger shadow h-100 py-2">
            <div class="card-body">
              <div class="row no-gutters align-items-center">
                <div class="col mr-2">
                  <div class="text-xs font-weight-bold text-danger text-uppercase mb-1">Pengeluaran</div>
                  <div class="h5 mb-0 font-weight-bold text-gray-800">Rp<?= number_format($jumlahkeluar, 2, ',', '.'); ?></div>
                </div>
                <div class="col-auto">
                  <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
                </div>
              </div>
            </div>
          </div>
        </div>

        <!-- Earnings (Monthly) Card Example -->
        <div class="col-md-4 mb-4">
          <div class="card border-left-info shadow h-100 py-2">
            <div class="card-body">
              <div class="row no-gutters align-items-center">
                <div class="col mr-2">
                  <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Sisa Uang</div>
                  <div class="row no-gutters align-items-center">
                    <div class="col-auto">
                      <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800">Rp<?= number_format($uang, 2, ',', '.'); ?></div>
                    </div>
                  </div>
                </div>
                <div class="col-auto">
                  <i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
                </div>
              </div>

            </div>
            <div class="col">
              <div class="progress progress-sm mr-2">
                <?php
                if ($uang < 1) {
                  $warna = 'danger';
                  $value = 0;
                } else if ($uang >= 1 && $uang < 1000000) {
                  $warna = 'warning';
                  $value = 1;
                } else {
                  $warna = 'info';
                  $value = $uang / 10000;
                };

                ?>

                <div class="progress-bar bg-<?= $warna ?>" role="progressbar" style="width: 100%" aria-valuenow="<?= $value ?>" aria-valuemin="0" aria-valuemax="100"><span><?= $value ?> % </span></div>
              </div>
            </div>
          </div>
        </div>

        <!-- Pending Requests Card Example -->


        <!-- Content Row -->

      </div>
      <div class="row">

        <div class="col-xl-8 col-lg-7">
          <!-- Bar Chart -->
          <div class="card shadow mb-4">
            <div class="card-header py-3 justify-content-between">
              <h6 class="m-0 font-weight-bold text-primary">Diagram Pengeluaran</h6>
            </div>
            <div class="card-body">
              <div class="chart-bar">
                <canvas id="myBarChart2"></canvas>
              </div>
            </div>
          </div>

        </div>

        <!-- Donut Chart -->
        <div class="col-xl-4 col-lg-5">
          <div class="card shadow mb-4">
            <!-- Card Header - Dropdown -->
            <div class="card-header py-3 justify-content-between">
              <h6 class="m-0 font-weight-bold text-primary">Cashflow</h6>
            </div>
            <!-- Card Body -->
            <div class="card-body">
              <div class="chart-pie">
                <canvas id="myPieChart"></canvas>
              </div>
              <div class="mt-4 text-center small">
                <span class="mr-2">
                  <i class="fas fa-circle text-success"></i> Pemasukan
                </span>
                <span class="mr-2">
                  <i class="fas fa-circle text-danger"></i> Pengeluaran
                </span>
              </div>
            </div>
          </div>
        </div>

        <div class="col-md-14">
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Diagram Pemasukan</h6>
            </div>
            <div class="card-body">
              <div class="chart-bar">
                <canvas id="myBarChart"></canvas>
              </div>
            </div>
          </div>

        </div>
        <div class="col-md-6">

        </div>
        <!-- /.container-fluid -->

      </div>
      <!-- DataTables Example -->
      <div class="col-md-12">
        <div class="card shadow mb-4">
          <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Transaksi Masuk</h6>
          </div>
          <div class="card-body">
            <div class="table-responsive">
              <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                  <tr>
                    <th>No</th>
                    <th>Tanggal</th>
                    <th>Jumlah</th>
                  </tr>
                </thead>
                <tfoot>
                  <tr>
                    <th>No</th>
                    <th>Tanggal</th>
                    <th>Jumlah</th>
                  </tr>
                </tfoot>
                <tbody>
                  <?php
                  $num = 1;
                  $query = mysqli_query($koneksi, "SELECT tgl_pemasukan, sum(jumlah) as jumlah, id_sumber FROM pemasukan WHERE id_user = '$id' GROUP BY tgl_pemasukan");
                  $query2 = mysqli_query($koneksi, "SELECT id_sumber FROM pemasukan WHERE id_user = '$id' GROUP BY tgl_pemasukan");
                  while ($data = mysqli_fetch_assoc($query)) {
                  ?>
                    <tr>
                      <td><?= $num++ ?></td>
                      <td><?= $data['tgl_pemasukan'] ?></td>
                      <td>Rp. <?= number_format($data['jumlah'], 2, ',', '.'); ?></td>
                    </tr>
                  <?php
                  }
                  ?>
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>

      <div class="row">
        <div class="col-md-12">
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Transaksi Keluar</h6>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>No</th>
                      <th>Tanggal</th>
                      <th>Jumlah</th>
                    </tr>
                  </thead>
                  <tfoot>
                    <tr>
                      <th>No</th>
                      <th>Tanggal</th>
                      <th>Jumlah</th>
                    </tr>
                  </tfoot>
                  <tbody>
                    <?php
                    $query = mysqli_query($koneksi, "SELECT tgl_pengeluaran, sum(jumlah) as jumlah, id_sumber FROM pengeluaran WHERE id_user = '$id' GROUP BY tgl_pengeluaran");
                    $query2 = mysqli_query($koneksi, "SELECT * FROM pengeluaran WHERE id_user = '$id' ORDER BY tgl_pengeluaran");
                    $num = 1;
                    while ($data = mysqli_fetch_assoc($query)) {
                    ?>
                      <tr>
                        <td><?= $num++ ?></td>
                        <td><?= $data['tgl_pengeluaran'] ?></td>
                        <td>Rp. <?= number_format($data['jumlah'], 2, ',', '.'); ?></td>

                      </tr>
              </div>
            <?php
                    }
            ?>
            </tbody>
            </table>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- End of Main Content -->

  <?php require 'footer.php' ?>

  </div>
  <!-- End of Content Wrapper -->

  </div>
  <!-- End of Page Wrapper -->

  <!-- Scroll to Top Button-->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>

  <?php require 'logout-modal.php'; ?>

  <!-- Bootstrap core JavaScript-->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="js/sb-admin-2.min.js"></script>

  <!-- Page level plugins -->
  <script src="vendor/chart.js/Chart.min.js"></script>

  <!-- Page level custom scripts -->
  <script>
    // Set new default font family and font color to mimic Bootstrap's default styling
    Chart.defaults.global.defaultFontFamily = 'Nunito', '-apple-system,system-ui,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif';
    Chart.defaults.global.defaultFontColor = '#858796';

    // Pie Chart Example
    var ctx = document.getElementById("myPieChart");
    var myPieChart = new Chart(ctx, {
      type: 'doughnut',
      data: {
        labels: ["Pemasukan", "Pengeluaran"],
        datasets: [{
          data: [<?= $jumlahmasuk ?>, <?= $jumlahkeluar ?>],
          backgroundColor: ['#1cc88a', '#e74a3b'],
          hoverBackgroundColor: ['#13865c', '#b62416'],
          hoverBorderColor: "rgba(234, 236, 244, 1)",
        }],
      },
      options: {
        maintainAspectRatio: false,
        tooltips: {
          backgroundColor: "rgb(255,255,255)",
          bodyFontColor: "#858796",
          borderColor: '#dddfeb',
          borderWidth: 1,
          xPadding: 15,
          yPadding: 15,
          displayColors: false,
          caretPadding: 10,
        },
        legend: {
          display: true
        },
        cutoutPercentage: 80,
      },
    });
  </script>

  <script>
    // Set new default font family and font color to mimic Bootstrap's default styling
    Chart.defaults.global.defaultFontFamily = 'Nunito', '-apple-system,system-ui,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif';
    Chart.defaults.global.defaultFontColor = '#858796';

    function number_format(number, decimals, dec_point, thousands_sep) {
      // *     example: number_format(1234.56, 2, ',', ' ');
      // *     return: '1 234,56'
      number = (number + '').replace(',', '').replace(' ', '');
      var n = !isFinite(+number) ? 0 : +number,
        prec = !isFinite(+decimals) ? 0 : Math.abs(decimals),
        sep = (typeof thousands_sep === 'undefined') ? ',' : thousands_sep,
        dec = (typeof dec_point === 'undefined') ? '.' : dec_point,
        s = '',
        toFixedFix = function(n, prec) {
          var k = Math.pow(10, prec);
          return '' + Math.round(n * k) / k;
        };
      // Fix for IE parseFloat(0.55).toFixed(0) = 0;
      s = (prec ? toFixedFix(n, prec) : '' + Math.round(n)).split('.');
      if (s[0].length > 3) {
        s[0] = s[0].replace(/\B(?=(?:\d{3})+(?!\d))/g, sep);
      }
      if ((s[1] || '').length < prec) {
        s[1] = s[1] || '';
        s[1] += new Array(prec - s[1].length + 1).join('0');
      }
      return s.join(dec);
    }

    // Bar Chart PENGELUARAN
    var ctx = document.getElementById("myBarChart2");
    var myBarChart = new Chart(ctx, {
      type: 'bar',
      data: {
        labels: ["Fashion", "Skincare", "Transportasi", "Konsumsi", "Lain-Lain"],
        datasets: [{
          label: "Pengeluaran",
          backgroundColor: "#e74a3b",
          hoverBackgroundColor: "#b62416",
          borderColor: "#4e73df",
          data: [<?= $jumlahhasil6 ?>, <?= $jumlahhasil7 ?>, <?= $jumlahhasil8 ?>, <?= $jumlahhasil9 ?>, <?= $jumlahhasil10 ?>],
        }],
      },
      options: {
        maintainAspectRatio: false,
        layout: {
          padding: {
            left: 10,
            right: 25,
            top: 25,
            bottom: 0
          }
        },
        scales: {
          xAxes: [{
            time: {
              unit: 'Keperluan'
            },
            gridLines: {
              display: false,
              drawBorder: false
            },
            ticks: {
              maxTicksLimit: 6
            },
            maxBarThickness: 25,
          }],
          yAxes: [{
            ticks: {
              min: 0,
              max: <?= $tomax2 ?>,
              maxTicksLimit: 5,
              padding: 10,
              // Include a dollar sign in the ticks
              callback: function(value, index, values) {
                return 'Rp.' + number_format(value);
              }
            },
            gridLines: {
              color: "rgb(234, 236, 244)",
              zeroLineColor: "rgb(234, 236, 244)",
              drawBorder: false,
              borderDash: [2],
              zeroLineBorderDash: [2]
            }
          }],
        },
        legend: {
          display: false
        },
        tooltips: {
          titleMarginBottom: 10,
          titleFontColor: '#6e707e',
          titleFontSize: 14,
          backgroundColor: "rgb(255,255,255)",
          bodyFontColor: "#858796",
          borderColor: '#dddfeb',
          borderWidth: 1,
          xPadding: 15,
          yPadding: 15,
          displayColors: false,
          caretPadding: 10,
          callbacks: {
            label: function(tooltipItem, chart) {
              var datasetLabel = chart.datasets[tooltipItem.datasetIndex].label || '';
              return datasetLabel + ': Rp.' + number_format(tooltipItem.yLabel);
            }
          }
        },
      }
    });
  </script>

  <script>
    // Set new default font family and font color to mimic Bootstrap's default styling
    Chart.defaults.global.defaultFontFamily = 'Nunito', '-apple-system,system-ui,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif';
    Chart.defaults.global.defaultFontColor = '#858796';

    function number_format(number, decimals, dec_point, thousands_sep) {
      // *     example: number_format(1234.56, 2, ',', ' ');
      // *     return: '1 234,56'
      number = (number + '').replace(',', '').replace(' ', '');
      var n = !isFinite(+number) ? 0 : +number,
        prec = !isFinite(+decimals) ? 0 : Math.abs(decimals),
        sep = (typeof thousands_sep === 'undefined') ? ',' : thousands_sep,
        dec = (typeof dec_point === 'undefined') ? '.' : dec_point,
        s = '',
        toFixedFix = function(n, prec) {
          var k = Math.pow(10, prec);
          return '' + Math.round(n * k) / k;
        };
      // Fix for IE parseFloat(0.55).toFixed(0) = 0;
      s = (prec ? toFixedFix(n, prec) : '' + Math.round(n)).split('.');
      if (s[0].length > 3) {
        s[0] = s[0].replace(/\B(?=(?:\d{3})+(?!\d))/g, sep);
      }
      if ((s[1] || '').length < prec) {
        s[1] = s[1] || '';
        s[1] += new Array(prec - s[1].length + 1).join('0');
      }
      return s.join(dec);
    }

    // Bar Chart PEMASUKAN
    var ctx = document.getElementById("myBarChart");
    var myBarChart = new Chart(ctx, {
      type: 'bar',
      data: {
        labels: ["Freelancer", "Laba Penjualan", "Pemberian", "Piutang", "Lain-Lain"],
        datasets: [{
          label: "Pengeluaran",
          backgroundColor: "#1cc88a",
          hoverBackgroundColor: "#13865c",
          borderColor: "#4e73df",
          data: [<?= $jumlahhasil1 ?>, <?= $jumlahhasil2 ?>, <?= $jumlahhasil3 ?>, <?= $jumlahhasil4 ?>, <?= $jumlahhasil5 ?>],
        }],
      },
      options: {
        maintainAspectRatio: false,
        layout: {
          padding: {
            left: 10,
            right: 25,
            top: 25,
            bottom: 0
          }
        },
        scales: {
          xAxes: [{
            time: {
              unit: 'Keperluan'
            },
            gridLines: {
              display: false,
              drawBorder: false
            },
            ticks: {
              maxTicksLimit: 6
            },
            maxBarThickness: 25,
          }],
          yAxes: [{
            ticks: {
              min: 0,
              max: <?= $tomax1 ?>,
              maxTicksLimit: 5,
              padding: 10,
              // Include a dollar sign in the ticks
              callback: function(value, index, values) {
                return 'Rp.' + number_format(value);
              }
            },
            gridLines: {
              color: "rgb(234, 236, 244)",
              zeroLineColor: "rgb(234, 236, 244)",
              drawBorder: false,
              borderDash: [2],
              zeroLineBorderDash: [2]
            }
          }],
        },
        legend: {
          display: false
        },
        tooltips: {
          titleMarginBottom: 10,
          titleFontColor: '#6e707e',
          titleFontSize: 14,
          backgroundColor: "rgb(255,255,255)",
          bodyFontColor: "#858796",
          borderColor: '#dddfeb',
          borderWidth: 1,
          xPadding: 15,
          yPadding: 15,
          displayColors: false,
          caretPadding: 10,
          callbacks: {
            label: function(tooltipItem, chart) {
              var datasetLabel = chart.datasets[tooltipItem.datasetIndex].label || '';
              return datasetLabel + ': Rp.' + number_format(tooltipItem.yLabel);
            }
          }
        },
      }
    });
  </script>

</body>

</html>