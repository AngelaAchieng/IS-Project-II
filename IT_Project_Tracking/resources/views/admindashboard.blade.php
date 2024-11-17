@extends('admin')

@section('headTitle','Admin Dashboard')
@section('pageTitle','Admin Dashboard - ')

@section('content')
    <div class="container-fluid py-4">
      <div class="row">
        <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
          <div class="card">
            <div class="card-header p-3 pt-2">
              <div class="icon icon-lg icon-shape bg-gradient-dark shadow-dark text-center border-radius-xl mt-n4 position-absolute">
                <i class="material-icons opacity-10">money</i>
              </div>
              <div class="text-end pt-1">
                <p class="text-sm mb-0 text-capitalize">Weekly Money</p>
                @php
                  $Project_amount = DB::table('payments')->pluck('Project_amount')->toArray();  // Fetch project amounts as an array
                  $paymentsum = array_sum($Project_amount);  // Sum the project amounts
                @endphp

                <h4 class="mb-0">KES {{ $paymentsum }}</h4>

              </div>
            </div>
            <hr class="dark horizontal my-0">
            <div class="card-footer p-3">
              <p class="mb-0"><span class="text-success text-sm font-weight-bolder">+55% </span>than last week</p>
            </div>
          </div>
        </div>
        <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
          <div class="card">
            <div class="card-header p-3 pt-2">
              <div class="icon icon-lg icon-shape bg-gradient-primary shadow-primary text-center border-radius-xl mt-n4 position-absolute">
                <i class="material-icons opacity-10">money</i>
              </div>
              <div class="text-end pt-1">
                <p class="text-sm mb-0 text-capitalize">Today's Expenses</p>
                @php
                  $UnitPrice = DB::table('requirements')->pluck('UnitPrice')->toArray();  //Fetch unit price as an array
                  $requirementsum = array_sum($UnitPrice);  //Sum the unit price
                @endphp

                <h4 class="mb-0">KES {{ $requirementsum }}</h4>
              </div>
            </div>
            <hr class="dark horizontal my-0">
            <div class="card-footer p-3">
              <p class="mb-0"><span class="text-success text-sm font-weight-bolder">+55% </span>than last week</p>
            </div>
          </div>
        </div>
        <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
          <div class="card">
            <div class="card-header p-3 pt-2">
              <div class="icon icon-lg icon-shape bg-gradient-success shadow-success text-center border-radius-xl mt-n4 position-absolute">
                <i class="material-icons opacity-10">event</i>
              </div>
              <div class="text-end pt-1">
                <p class="text-sm mb-0 text-capitalize">Monthly Projects</p>
                @php
                  $Project_id = DB::table('projects')->pluck('Project_id')->toArray();  //Fetch project IDs as an array
                  $projectcount = count($Project_id);  //Count the project IDs
                @endphp

                <h4 class="mb-0">{{ $projectcount }}</h4>
              </div>
            </div>
            <hr class="dark horizontal my-0">
            <div class="card-footer p-3">
              <p class="mb-0"><span class="text-danger text-sm font-weight-bolder">-2%</span> than yesterday</p>
            </div>
          </div>
        </div>
        <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
          <div class="card">
            <div class="card-header p-3 pt-2">
              <div class="icon icon-lg icon-shape bg-gradient-info text-center border-radius-xl mt-n4 position-absolute">
                <i class="material-icons opacity-10">person</i>
              </div>
              <div class="text-end pt-1">
                <p class="text-sm mb-0 text-capitalize">Systems Engineers</p>
                @php
                  // Get the role ID for "Systems Engineer"
                  $roleId = DB::table('roles')->where('Role_name', 'Systems Engineer')->value('Role_id');

                  // Count users with the "Systems Engineer" role
                  $systemsEngineerCount = DB::table('users')->where('role_id', $roleId)->count();
                @endphp

                <h4 class="mb-0">{{ $systemsEngineerCount }}</h4>
              </div>
              <div class="text-end pt-0.25">
                <p class="text-sm mb-0 text-capitalize">Technical Engineers</p>
                  @php
                    // Get the role ID for "Technical Engineer"
                    $roleId = DB::table('roles')->where('Role_name', 'Technical Engineer')->value('Role_id');

                    // Count users with the "Technical Engineer" role
                    $technicalEngineerCount = DB::table('users')->where('role_id', $roleId)->count();
                  @endphp

                  <h4 class="mb-0">{{ $technicalEngineerCount }}</h4>
              </div>
            </div>
            <div class="card-footer p-1"></div>
          </div>
        </div>
      </div>
      <div class="row mt-4">
        <div class="col-lg-6 col-md-8 mt-4 mb-4">
          <div class="card z-index-2" style="height: 370px;">
            <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2 bg-transparent">
              <div class="bg-gradient-primary shadow-primary border-radius-lg py-3 pe-1">
                <div class="chart" style="width: 100%; height: 300px;">
                  <canvas id="chart-bars" class="chart-canvas" style="width: 100%; height: 100%;"></canvas>
                </div>
              </div>
            </div>
            <div class="card-body">
              <h6 class="mt-1">Completed Projects</h6>
            </div>
          </div>
        </div>

        <div class="col-lg-6 col-md-8 mt-4 mb-4">
          <div class="card z-index-2" style="height: 370px;">
            <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2 bg-transparent">
              <div class="bg-gradient-success shadow-success border-radius-lg py-3 pe-1">
                <div class="chart" style="width: 100%; height: 300px;">
                  <canvas id="chart-line" class="chart-canvas" style="width: 100%; height: 100%;"></canvas>
                </div>
              </div>
            </div>
            <div class="card-body">
              <h6 class="mt-1">Pending Projects</h6>
            </div>
          </div>
        </div>
      </div>

      <div class="row">
        <div class="col-12">
          <div class="card my-4">
            <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
              <div class="bg-gradient-dark shadow-dark border-radius-lg pt-4 pb-3">
                <h6 class="text-white text-capitalize ps-3">Projects table</h6>
              </div>
            </div>

            <?php
              // Database connection
              $con = new mysqli('localhost', 'root', '', 'project_tracking');

              // Query to join the projects, users, and milestones tables
              $query = $con->query("
                SELECT 
                  p.Project_name, 
                  p.Status AS project_status, 
                  u.UserName AS engineer, 
                  (SELECT COUNT(*) FROM milestones m WHERE m.project_id = p.Project_id AND m.Status = 'Completed') AS completed_milestones,
                  (SELECT COUNT(*) FROM milestones m WHERE m.project_id = p.Project_id) AS total_milestones
                FROM projects p
                LEFT JOIN users u ON p.user_id = u.User_id
              ");

              $projects = [];
              while ($data = $query->fetch_assoc()) {
                  // Calculate the completion percentage
                  if ($data['total_milestones'] > 0) {
                      $completion_percentage = round(($data['completed_milestones'] / $data['total_milestones']) * 100);
                  } else {
                      $completion_percentage = 0;  // No milestones means 0% completion
                  }

                  // Store the project data
                  $projects[] = [
                      'Project_name' => $data['Project_name'],
                      'project_status' => $data['project_status'],
                      'engineer' => $data['engineer'],
                      'completion_percentage' => $completion_percentage,
                  ];
              }
            ?>

            <div class="card-body px-0 pb-2">
              <div class="table-responsive p-0">
                <table class="table align-items-center justify-content-center mb-0">
                  <thead>
                    <tr>
                      <th class="text-uppercase text-secondary text-xs font-weight-bolder opacity-7">Project</th>
                      <th class="text-uppercase text-secondary text-xs font-weight-bolder opacity-7 ps-2">Engineer</th>
                      <th class="text-uppercase text-secondary text-xs font-weight-bolder opacity-7 ps-2 text-center">Status</th>
                      <th class="text-uppercase text-secondary text-xs font-weight-bolder text-center opacity-7 ps-2">Completion</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php foreach ($projects as $project) { ?>
                      <tr>
                        <td>
                          <div class="d-flex px-2">
                            <div class="my-auto">
                              <h6 class="mb-0 text-sm"><?php echo $project['Project_name']; ?></h6>
                            </div>
                          </div>
                          </td>
                          <td>
                            <p class="text-sm font-weight-bold mb-0"><?php echo $project['engineer']; ?></p>
                          </td>
                          <td class="align-middle text-center text-sm">
                            <div class="d-flex align-items-center justify-content-center">
                              <?php if ($project['project_status'] == 'Completed') { ?>
                                <span class="badge badge-sm bg-gradient-success">Completed</span>
                              <?php } else { ?>
                                <span class="badge badge-sm bg-gradient-secondary">Pending</span>
                              <?php } ?>
                            </div>
                          </td>
                          <td class="align-middle text-center">
                            <div class="d-flex align-items-center justify-content-center">
                              <span class="me-2 text-xs font-weight-bold"><?php echo $project['completion_percentage']; ?>%</span>
                              <div>
                                <div class="progress">
                                  <div class="progress-bar bg-gradient-<?php echo ($project['completion_percentage'] == 100 ? 'success' : ($project['completion_percentage'] >= 50 ? 'info' : 'danger')); ?>" 
                                    role="progressbar" 
                                    aria-valuenow="<?php echo $project['completion_percentage']; ?>" 
                                    aria-valuemin="0" 
                                    aria-valuemax="100" 
                                    style="width: <?php echo $project['completion_percentage']; ?>%;">
                                  </div>
                                </div>
                              </div>
                            </div>
                          </td>
                      </tr>
                    <?php } ?>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <?php
      /*$con = new mysqli('localhost','root','','project_tracking');
      $query = $con->query("
      SELECT (`Project_amount`) as amount,
      MONTHNAME(`Date`) as monthname
      FROM `payments` 
      ");

      foreach($query as $data)
      {
        $amount[] =$data['amount'];
        $month[] =$data['monthname'];
      }*/
    ?>

    <?php
    $con = new mysqli('localhost', 'root', '', 'project_tracking');

    $query = $con->query("
      SELECT 
        COUNT(`Project_id`) AS completed, 
        MONTHNAME(`EndDate`) AS monthname,
        MONTH(`EndDate`) AS month_number
      FROM `projects` 
      WHERE `Status` = 'Completed'
      GROUP BY month_number, monthname
      ORDER BY month_number
    ");

    $completed = [];
    $month = [];

    foreach ($query as $data) {
        $completed[] = $data['completed'];
        $month[] = $data['monthname'];
    }
    ?>


    <?php
    $con = new mysqli('localhost', 'root', '', 'project_tracking');

    $query = $con->query("
      SELECT 
        COUNT(`Project_id`) AS pending, 
        MONTHNAME(`EndDate`) AS monthname,
        MONTH(`EndDate`) AS month_number
      FROM `projects` 
      WHERE `Status` = 'Pending'
      GROUP BY month_number, monthname
      ORDER BY month_number
    ");

    $pending = [];
    $month1 = [];

    foreach ($query as $data) {
        $pending[] = $data['pending'];
        $month1[] = $data['monthname'];
    }
    ?>


  <script src="js/plugins/chartjs.min.js"></script>
  <script>
    const ctx = document.getElementById("chart-bars").getContext("2d");
    const myChart = new Chart(ctx, {
      type: "bar",
      data: {
        labels: <?php echo json_encode($month)?>,
        datasets: [{
          label: "Completed",
          tension: 0.4,
          borderWidth: 0,
          borderRadius: 4,
          borderSkipped: false,
          backgroundColor: "rgba(255, 255, 255, .8)",
          data: <?php echo json_encode($completed)?>,
          maxBarThickness: 20
        }, ],
      },
      options: {
        responsive: true,
        maintainAspectRatio: false,
        plugins: {
          legend: {
            display: false,
          }
        },
        interaction: {
          intersect: false,
          mode: 'index',
        },
        scales: {
          y: {
            grid: {
              drawBorder: false,
              display: true,
              drawOnChartArea: true,
              drawTicks: false,
              borderDash: [5, 5],
              color: 'rgba(255, 255, 255, .2)'
            },
            ticks: {
              suggestedMin: 0,
              suggestedMax: 500,
              beginAtZero: true,
              padding: 10,
              font: {
                size: 14,
                weight: 300,
                family: "Roboto",
                style: 'normal',
                lineHeight: 2
              },
              color: "#fff"
            },
          },
          x: {
            grid: {
              drawBorder: false,
              display: true,
              drawOnChartArea: true,
              drawTicks: false,
              borderDash: [5, 5],
              color: 'rgba(255, 255, 255, .2)'
            },
            ticks: {
              display: true,
              color: '#f8f9fa',
              padding: 10,
              font: {
                size: 14,
                weight: 300,
                family: "Roboto",
                style: 'normal',
                lineHeight: 2
              },
            }
          },
        },
      },
    });


    var ctx2 = document.getElementById("chart-line").getContext("2d");

    new Chart(ctx2, {
      type: "line",
      data: {
        labels: <?php echo json_encode($month1)?>,
        datasets: [{
          label: "Pending",
          tension: 0,
          borderWidth: 0,
          pointRadius: 5,
          pointBackgroundColor: "rgba(255, 255, 255, .8)",
          pointBorderColor: "transparent",
          borderColor: "rgba(255, 255, 255, .8)",
          borderColor: "rgba(255, 255, 255, .8)",
          borderWidth: 4,
          backgroundColor: "transparent",
          fill: true,
          data: <?php echo json_encode($pending)?>,
          maxBarThickness: 6

        }],
      },
      options: {
        responsive: true,
        maintainAspectRatio: false,
        plugins: {
          legend: {
            display: false,
          }
        },
        interaction: {
          intersect: false,
          mode: 'index',
        },
        scales: {
          y: {
            grid: {
              drawBorder: false,
              display: true,
              drawOnChartArea: true,
              drawTicks: false,
              borderDash: [5, 5],
              color: 'rgba(255, 255, 255, .2)'
            },
            ticks: {
              display: true,
              color: '#f8f9fa',
              padding: 10,
              font: {
                size: 14,
                weight: 300,
                family: "Roboto",
                style: 'normal',
                lineHeight: 2
              },
            }
          },
          x: {
            grid: {
              drawBorder: false,
              display: false,
              drawOnChartArea: false,
              drawTicks: false,
              borderDash: [5, 5]
            },
            ticks: {
              display: true,
              color: '#f8f9fa',
              padding: 10,
              font: {
                size: 14,
                weight: 300,
                family: "Roboto",
                style: 'normal',
                lineHeight: 2
              },
            }
          },
        },
      },
    });
  </script>
@endsection