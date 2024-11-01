@extends('systemsengineer')

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
            <canvas id="chart-line" class="chart-canvas" height="240"></canvas>
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

      
    <?php
        session_start();

        // Initialize variables
        $completed = [];
        $month = [];
        $pending = [];
        $month1 = [];

        // Ensure the session variable exists
        if (isset($_SESSION['user_id'])) {
            $user_id = $_SESSION['user_id'];
            $con = new mysqli('localhost', 'root', '', 'project_tracking');

            // Completed projects query for the logged-in user
            $query = $con->query("
                SELECT 
                    COUNT(`Project_id`) AS completed, 
                    MONTHNAME(`EndDate`) AS monthname 
                FROM `projects` 
                WHERE `Status` = 'Completed' AND `user_id` = $user_id
                GROUP BY monthname
            ");

            $completed = [];
            $month = [];

            foreach ($query as $data) {
                $completed[] = $data['completed'];
                $month[] = $data['monthname'];
            }

            // Pending projects query for the logged-in user
            $query = $con->query("
                SELECT 
                    COUNT(`Project_id`) AS pending, 
                    MONTHNAME(`EndDate`) AS monthname 
                FROM `projects` 
                WHERE `Status` = 'Pending' AND `u ser_id` = $user_id
                GROUP BY monthname
            ");

            foreach ($query as $data) {
                $pending[] = $data['pending'];
                $month1[] = $data['monthname'];
            }

            $con->close();
        }
    ?>


<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    // Bar Chart for Completed Projects
    const ctx = document.getElementById("chart-bars").getContext("2d");
    const myChart = new Chart(ctx, {
      type: "bar",
      data: {
        labels: <?php echo json_encode($month)?>,
        datasets: [{
          label: "Completed",
          backgroundColor: "rgba(75, 192, 192, 0.6)",
          data: <?php echo json_encode($completed)?>,
        }]
      },
      options: {
        responsive: true,
        scales: {
          y: { beginAtZero: true }
        }
      }
    });

    // Line Chart for Pending Projects
    var ctx1 = document.getElementById("chart-line").getContext("2d");
    new Chart(ctx1, {
      type: "line",
      data: {
        labels: <?php echo json_encode($month1)?>,
        datasets: [{
          label: "Pending",
          borderColor: "rgba(255, 99, 132, 1)",
          backgroundColor: "rgba(255, 99, 132, 0.2)",
          fill: true,
          data: <?php echo json_encode($pending)?>
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
@endsection
