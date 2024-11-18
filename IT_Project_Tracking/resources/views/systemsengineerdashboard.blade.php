@extends('engineer')

@section('headTitle','Systems Engineer Dashboard')
@section('pageTitle','Systems Engineer Dashboard - ')

@section('content')

<div class="row mt-3">
  <!-- Completed Projects Card -->
  <div class="col-lg-6 col-md-6 mt-3 mb-3">
    <div class="card z-index-2">
      <div class="card-header p-0 position-relative mt-n3 mx-2 z-index-2 bg-transparent">
        <div class="bg-gradient-white border-radius-lg py-2 px-1">
          <div class="chart">
            <canvas id="chart-bars" class="chart-canvas" height="240"></canvas>
          </div>
        </div>
      </div>
      <div class="card-body">
        <h6 class="mb-0">Completed Projects</h6>
        <p class="text-sm">Yearly projects</p>
      </div>
    </div>
  </div>
  
  <!-- Pending Projects Card -->
  <div class="col-lg-6 col-md-6 mt-3 mb-3">
    <div class="card z-index-2">
      <div class="card-header p-0 position-relative mt-n3 mx-2 z-index-2 bg-transparent">
        <div class="bg-gradient-white border-radius-lg py-2 px-1">
          <div class="chart">
            <canvas id="chart-bars1" class="chart-canvas" height="240"></canvas>
          </div>
        </div>
      </div>
      <div class="card-body">
        <h6 class="mb-0">Pending Projects</h6>
        <p class="text-sm">Yearly projects</p>
      </div>
    </div>
  </div>
</div>

@if (Auth::check())
<?php
    $user_id = Auth::id();

    // Get completed projects data, ordered by month numerically
    $completed = DB::select("
        SELECT COUNT(Project_id) as completed, MONTHNAME(EndDate) as monthname, MONTH(EndDate) as monthnumber
        FROM projects
        WHERE Status = 'Completed' AND user_id = :user_id
        GROUP BY MONTH(EndDate), MONTHNAME(EndDate)
        ORDER BY monthnumber ASC
    ", ['user_id' => $user_id]);

    // Get pending projects data, ordered by month numerically
    $pending = DB::select("
        SELECT COUNT(Project_id) as pending, MONTHNAME(EndDate) as monthname, MONTH(EndDate) as monthnumber
        FROM projects
        WHERE Status = 'Pending' AND user_id = :user_id
        GROUP BY MONTH(EndDate), MONTHNAME(EndDate)
        ORDER BY monthnumber ASC
    ", ['user_id' => $user_id]);

    // Extract data from the query result into arrays
    $completedMonths = [];
    $completedCounts = [];
    foreach ($completed as $item) {
        $completedMonths[] = $item->monthname;
        $completedCounts[] = $item->completed;
    }

    $pendingMonths = [];
    $pendingCounts = [];
    foreach ($pending as $item) {
        $pendingMonths[] = $item->monthname;
        $pendingCounts[] = $item->pending;
    }
?>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    // Bar Chart for Completed Projects
    const ctx = document.getElementById("chart-bars").getContext("2d");
    const myChart = new Chart(ctx, {
        type: "bar",
        data: {
            labels: <?php echo json_encode($completedMonths); ?>,
            datasets: [{
                label: "Completed",
                backgroundColor: "rgba(75, 192, 192, 0.6)",
                data: <?php echo json_encode($completedCounts); ?>,
                maxBarThickness: 100,
            }]
        },
        options: {
            responsive: true,
            scales: {
                y: { beginAtZero: true }
            }
        }
    });

    // Bar Chart for Pending Projects (Pink Bar Chart)
    var ctx1 = document.getElementById("chart-bars1").getContext("2d");
    new Chart(ctx1, {
        type: "bar",  
        data: {
            labels: <?php echo json_encode($pendingMonths); ?>,
            datasets: [{
                label: "Pending",
                backgroundColor: "rgba(255, 105, 180, 0.7)",  
                borderColor: "rgba(255, 105, 180, 1)",  
                borderWidth: 1,
                data: <?php echo json_encode($pendingCounts); ?>,
                maxBarThickness: 100,
            }]
        },
        options: {
            responsive: true,
            scales: {
                y: { beginAtZero: true }
            }
        }
    });
</script>
@endif

@endsection
