@extends('admin.index')
@section('content')
<div class="pagetitle">
                <h1>Dashboard</h1>
                <nav>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Dashboard</li>
                    </ol>
                </nav>
            </div><!-- End Page Title -->
<section class="section">
      <div class="row">
        <div class="col-lg-6">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Total Pemasukan Di Setiap Bulan</h5>

              <!-- Line Chart -->
              <canvas id="lineChart" style="max-height: 400px;"></canvas>
              <script>
                var pemasukan = <?php echo json_encode($total_pemasukan) ?>;
                var bulan = <?php echo json_encode($bulan) ?>;
                document.addEventListener("DOMContentLoaded", () => {
                  new Chart(document.querySelector('#lineChart'), {
                    type: 'line',
                    data: {
                      labels: bulan,
                      datasets: [{
                        label: 'Grafik Total Pemasukan Perbulan',
                        data: pemasukan,
                        fill: false,
                        borderColor: 'rgb(75, 192, 192)',
                        tension: 0.1
                      }]
                    },
                    options: {
                      scales: {
                        y: {
                          beginAtZero: true
                        }
                      }
                    }
                  });
                });
              </script>
              <!-- End Line CHart -->

            </div>
          </div>
        </div>

        <div class="col-lg-6">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Total Pengeluaran di Setiap Bulan</h5>

              <!-- Line Chart -->
              <canvas id="lineChart2" style="max-height: 400px;"></canvas>
              <script>
                var pengeluaran = <?php echo json_encode($total_pengeluaran) ?>;
                var bulan2 = <?php echo json_encode($bulan2) ?>;
                document.addEventListener("DOMContentLoaded", () => {
                  new Chart(document.querySelector('#lineChart2'), {
                    type: 'line',
                    data: {
                      labels: bulan2,
                      datasets: [{
                        label: 'Grafik Total Pengeluaran Per Bulan',
                        data: pengeluaran,
                        fill: false,
                        borderColor: 'rgb(75, 192, 192)',
                        tension: 0.1
                      }]
                    },
                    options: {
                      scales: {
                        y: {
                          beginAtZero: true
                        }
                      }
                    }
                  });
                });
              </script>
              <!-- End Line CHart -->

            </div>
          </div>
        </div>

        <div class="col-md-6">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Grafik Perbandingan Gender Pengurus Masjid</h5>
              <!-- Pie Chart -->
              <canvas id="pieChart" style="max-height: 300px;"></canvas>
              <script>
                //ambil data gender dan jumlah gendernya dari DashboardController di fungsi index
                var lbl2 = [@foreach($ar_gender as $g) '{{ $g->gender }}', @endforeach];
                var jml = [@foreach($ar_gender as $g) {{ $g->jumlah }}, @endforeach];
                document.addEventListener("DOMContentLoaded", () => {
                  new Chart(document.querySelector('#pieChart'), {
                    type: 'pie',
                    data: {
                      labels: lbl2,
                      datasets: [{
                        label: 'My First Dataset',
                        //data: [300, 50, 100],
                        data: jml,
                        backgroundColor: [
                          'rgb(255, 99, 132)',
                          'rgb(54, 162, 235)',
                          'rgb(255, 205, 86)'
                        ],
                        hoverOffset: 4
                      }]
                    }
                  });
                });
              </script>
              <!-- End Pie CHart -->

            </div>
          </div>
        </div>

        <div class="col-md-6">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Grafik Perbandingan Status Pengurus Masjid</h5>
              <!-- Pie Chart -->
              <canvas id="pieChart1" style="max-height: 300px;"></canvas>
              <script>
                //ambil data gender dan jumlah gendernya dari DashboardController di fungsi index
                var lbl3 = [@foreach($ar_status as $g) '{{ $g->status }}', @endforeach];
                var jml3 = [@foreach($ar_status as $g) {{ $g->jumlah }}, @endforeach];
                document.addEventListener("DOMContentLoaded", () => {
                  new Chart(document.querySelector('#pieChart1'), {
                    type: 'pie',
                    data: {
                      labels: lbl3,
                      datasets: [{
                        label: 'My First Dataset',
                        //data: [300, 50, 100],
                        data: jml3,
                        backgroundColor: [
                          'rgb(255, 99, 132)',
                          'rgb(54, 162, 235)',
                          'rgb(255, 205, 86)'
                        ],
                        hoverOffset: 4
                      }]
                    }
                  });
                });
              </script>
              <!-- End Pie CHart -->

            </div>
          </div>
        </div>


      </div>
    </section>
@endsection