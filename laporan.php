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

  <title>Laporan Keuangan</title>

  <!-- Custom fonts for this template -->
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <!-- Custom styles for this template -->
  <link href="css/sb-admin-2.min.css" rel="stylesheet">

  <!-- Custom styles for this page -->
  <link href="vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">

</head>

<body id="page-top">

  <?php
  require 'koneksi.php';
  require 'sidebar.php'; ?>

  <!-- Main Content -->
  <div id="content">

    <?php require 'navbar.php'; ?>

    <!-- Begin Page Content -->
    <div class="container-fluid">

      <!-- DataTales Example -->
      <div class="card shadow mb-4">
        <div class="card-header py-3">
          <h6 class="m-0 font-weight-bold text-primary">Laporan Keuangan</h6>
        </div>

        <div class="tampil"></div>
        <div class="card-body">
          <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
              <thead>
                <tr>
                  <th>Nama</th>
                  <th>Jumlah Transaksi </th>
                  <th>Jumlah Total Uang</th>
                  <th>Download</th>
                </tr>
              </thead>
              <tfoot>
              </tfoot>
              <tbody>
                <?php
                $id = $_SESSION['id'];

                $arraymasuk = [0];
                $pemasukan = mysqli_query($koneksi, "SELECT * FROM pemasukan where id_user = '$id'");
                $query1 = mysqli_num_rows($pemasukan);
                while ($masuk = mysqli_fetch_array($pemasukan)) {
                  array_push($arraymasuk, $masuk['jumlah']);
                }
                $jumlahmasuk = array_sum($arraymasuk);

                $arraykeluar = [0];
                $pengeluaran = mysqli_query($koneksi, "SELECT * FROM pengeluaran where id_user = '$id'");
                $query2 = mysqli_num_rows($pengeluaran);
                while ($keluar = mysqli_fetch_array($pengeluaran)) {
                  array_push($arraykeluar, $keluar['jumlah']);
                }
                $jumlahkeluar = array_sum($arraykeluar);

                //untuk data chart area
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

                ?>
                <tr>
                  <td>Pemasukan</td>
                  <td><?= $query1 ?></td>
                  <td>Rp. <?= number_format($jumlahmasuk, 2, ',', '.'); ?></td>
                  <td>
                    <!-- Button untuk modal -->
                    <a href="export-pemasukan.php" type="button" class="btn btn-primary btn-md"><i class="fa fa-download"></i></a>
                  </td>
                </tr>

                <tr>
                  <td>Pengeluaran</td>
                  <td><?= $query2 ?></td>
                  <td>Rp. <?= number_format($jumlahkeluar, 2, ',', '.'); ?></td>
                  <td>
                    <!-- Button untuk modal -->
                    <a href="export-pengeluaran.php" type="button" class="btn btn-primary btn-md"><i class="fa fa-download"></i></a>
                  </td>
                </tr>


              </tbody>
            </table>
          </div>
        </div>
      </div>

      <div class="row mt-4">

        <div class="col-md-6">
          <!-- Bar Chart -->
          <div class="card shadow mb-6">
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
          <!-- Bar Chart -->
          <div class="card shadow mb-6">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Diagram Pengeluaran</h6>
            </div>
            <div class="card-body">
              <div class="chart-bar">
                <canvas id="myBarChart2"></canvas>
              </div>
            </div>
          </div>

        </div>

      </div>
    </div>

    <!-- /.container-fluid -->

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

  <!-- Logout Modal-->
  <?php require 'logout-modal.php'; ?>

  <!-- Bootstrap core JavaScript-->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="js/sb-admin-2.min.js"></script>

  <!-- Page level plugins -->
  <script src="vendor/datatables/jquery.dataTables.min.js"></script>
  <script src="vendor/datatables/dataTables.bootstrap4.min.js"></script>

  <!-- Page level custom scripts -->
  <script src="js/demo/datatables-demo.js"></script>
  <script src="vendor/chart.js/Chart.min.js"></script>
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


</body>

</html>