<div id="main">
  <div class="main-container">
    <div class="row mb-3">
      <div class="col-lg-12 d-flex justify-content-end align-items-center gap-3">

        <!-- Year Filter -->
        <div class="d-flex align-items-center gap-2">
          <label for="yearFilter" class="form-label fw-bold mb-0">Filter by Year:</label>
          <select id="yearFilter" class="form-select" style="width: 200px;" aria-label="Filter by Year">
            <option selected>Select Year</option>
            <option value="2023">2023</option>
            <option value="2024">2024</option>
            <option value="2025">2025</option>
          </select>
        </div>

        <!-- Month Filter -->
        <div class="d-flex align-items-center gap-2">
          <label for="monthFilter" class="form-label fw-bold mb-0">Filter by Month:</label>
          <select id="monthFilter" class="form-select" style="width: 200px;" aria-label="Filter by Month">
            <option selected>Select Month</option>
            <option value="01">January</option>
            <option value="02">February</option>
            <option value="03">March</option>
            <option value="04">April</option>
            <option value="05">May</option>
            <option value="06">June</option>
            <option value="07">July</option>
            <option value="08">August</option>
            <option value="09">September</option>
            <option value="10">October</option>
            <option value="11">November</option>
            <option value="12">December</option>
          </select>
        </div>
      </div>
    </div>

    <div class="row">
      <!-- Left side columns -->
      <div class="col-lg-12">
        <div class="row">
          <!-- Programs Card -->
          <div class="col-xxl-6 col-md-6">
            <div class="card info-card">
              <div class="card-body">
                <h5 class="card-title">Total <span>| Programs</span></h5>
                <div class="d-flex align-items-center">
                  <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                    <i class='bx bxs-graduation display-6'></i>
                  </div>
                  <div class="ps-3">
                    <h6><?= $stats['total_programs'] ?? 0 ?> Programs</h6>
                    <span class="text-success small pt-1 fw-bold">+6%</span>
                    <span class="text-muted small pt-2 ps-1">increase</span>
                  </div>
                  <div class="ms-auto">
                    <i class='bx bx-trending-up display-5 text-success'></i>
                  </div>
                </div>
              </div>
            </div>
          </div>

          <!-- Students Card -->
          <div class="col-xxl-6 col-md-6">
            <div class="card info-card">
              <div class="card-body">
                <h5 class="card-title">Total <span>| Students</span></h5>
                <div class="d-flex align-items-center">
                  <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                    <i class='bx bxs-group display-6'></i>

                  </div>
                  <div class="ps-3">
                    <h6><?= $stats['total_students'] ?? 0 ?> Students</h6>
                    <span class="text-success small pt-1 fw-bold">+10%</span>
                    <span class="text-muted small pt-2 ps-1">increase</span>
                  </div>
                  <div class="ms-auto">
                    <i class='bx bx-line-chart display-5 text-success'></i>
                  </div>
                </div>
              </div>
            </div>
          </div>

          <!-- BSSC Card -->
          <div class="col-xxl-3 col-md-6">
            <div class="card info-card">
              <div class="card-body">
                <h5 class="card-title">Total Students <span>| BSSC</span></h5>
                <div class="d-flex align-items-center">
                  <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                    <i class='bx bxs-shield display-6'></i>

                  </div>
                  <div class="ps-3">
                    <h6><?= $stats['total_scholarships'] ?? 0 ?> Scholarships</h6>
                    <span class="text-danger small pt-1 fw-bold">-2%</span>
                    <span class="text-muted small pt-2 ps-1">decrease</span>
                  </div>
                  <div class="ms-auto">
                    <i class='bx bx-trending-down display-5 text-danger'></i>
                  </div>
                </div>
              </div>
            </div>
          </div>

          <!-- BSIC Card -->
          <div class="col-xxl-3 col-md-6">
            <div class="card info-card">
              <div class="card-body">
                <h5 class="card-title">Total Students <span>| BSIC</span></h5>
                <div class="d-flex align-items-center">
                  <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                    <i class='bx bxs-bar-chart-alt-2 display-6'></i>
                  </div>
                  <div class="ps-3">
                    <h6>25 Students</h6>
                    <span class="text-success small pt-1 fw-bold">+4%</span>
                    <span class="text-muted small pt-2 ps-1">increase</span>
                  </div>
                  <div class="ms-auto">
                    <i class='bx bx-bar-chart display-5 text-success'></i>
                  </div>
                </div>
              </div>
            </div>
          </div>

          <!-- BSHM Card -->
          <div class="col-xxl-3 col-md-6">
            <div class="card info-card">
              <div class="card-body">
                <h5 class="card-title">Total Students <span>| BSHM</span></h5>
                <div class="d-flex align-items-center">
                  <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                    <i class='bx bxs-book-open display-6'></i>
                  </div>
                  <div class="ps-3">
                    <h6>120 Students</h6>
                    <span class="text-success small pt-1 fw-bold">+8%</span>
                    <span class="text-muted small pt-2 ps-1">increase</span>
                  </div>
                  <div class="ms-auto">
                    <i class='bx bx-trending-up display-5 text-success'></i>
                  </div>
                </div>
              </div>
            </div>
          </div>

          <!-- HMT Card -->
          <div class="col-xxl-3 col-md-6">
            <div class="card info-card">
              <div class="card-body">
                <h5 class="card-title">Total Students <span>| HMT</span></h5>
                <div class="d-flex align-items-center">
                  <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                    <i class='bx bxs-hotel display-6'></i>
                  </div>
                  <div class="ps-3">
                    <h6>85 Students</h6>
                    <span class="text-danger small pt-1 fw-bold">-3%</span>
                    <span class="text-muted small pt-2 ps-1">decrease</span>
                  </div>
                  <div class="ms-auto">
                    <i class='bx bx-trending-down display-5 text-danger'></i>
                  </div>
                </div>
              </div>
            </div>
          </div>

        </div>
      </div>

    </div>
  </div>








  <div class="row">

    <!-- Publications Chart -->
    <div class="col-lg-6">
      <div class="card">
        <div class="card-body">
          <h5 class="card-title">Files Uploaded</h5>
          <!-- Bar Chart -->
          <canvas id="barChartResearch" style="max-height: 600px;"></canvas>
        </div>
      </div>
    </div>

    <!-- Recent Students Table -->
    <div class="col-lg-6 d-flex align-items-stretch">
      <div class="card w-100">
        <div class="card-body p-4">
          <h5 class="card-title fw-semibold mb-4">Recent Students</h5>
          <div class="table">
            <table class="table text-nowrap mb-0 align-middle">
              <thead class="text-dark fs-4">
                <tr>
                  <th>Student Name</th>
                  <th>Course</th>
                  <th>Status</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td>
                    <h6 class="fw-semibold mb-1">Juan Dela Cruz</h6>
                    <span class="fw-normal">ID: 2025001</span>
                  </td>
                  <td>
                    <h6 class="fw-semibold mb-1">BS Computer Science</h6>
                  </td>
                  <td><span class="badge bg-primary rounded-3 fw-semibold">Enrolled</span></td>
                </tr>
                <tr>
                  <td>
                    <h6 class="fw-semibold mb-1">Maria Santos</h6>
                    <span class="fw-normal">ID: 2025002</span>
                  </td>
                  <td>
                    <h6 class="fw-semibold mb-1">BS Accountancy</h6>
                  </td>
                  <td><span class="badge bg-success rounded-3 fw-semibold">Graduated</span></td>
                </tr>
                <tr>
                  <td>
                    <h6 class="fw-semibold mb-1">Pedro Reyes</h6>
                    <span class="fw-normal">ID: 2025003</span>
                  </td>
                  <td>
                    <h6 class="fw-semibold mb-1">BS Engineering</h6>
                  </td>
                  <td><span class="badge bg-danger rounded-3 fw-semibold">Dropped</span></td>
                </tr>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>

    <!-- Recent Student Activities Table -->
    <div class="col-lg-6 d-flex align-items-stretch">
      <div class="card w-100">
        <div class="card-body p-4">
          <h5 class="card-title fw-semibold mb-4">Recent Activities</h5>
          <div class="table">
            <table class="table text-nowrap mb-0 align-middle">
              <thead class="text-dark fs-4">
                <tr>
                  <th>Activity</th>
                  <th>Date</th>
                  <th>Status</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td>Enrollment - BSIT</td>
                  <td>September 05, 2025</td>
                  <td><span class="badge bg-primary rounded-3 fw-semibold">Completed</span></td>
                </tr>
                <tr>
                  <td>Graduation - BSHM</td>
                  <td>August 20, 2025</td>
                  <td><span class="badge bg-success rounded-3 fw-semibold">Certified</span></td>
                </tr>
                <tr>
                  <td>Dropout Report - BSIC</td>
                  <td>July 15, 2025</td>
                  <td><span class="badge bg-danger rounded-3 fw-semibold">Processed</span></td>
                </tr>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>

  </div>

</div>

<!-- Chart.js -->
<script>
  document.addEventListener("DOMContentLoaded", () => {
    new Chart(document.querySelector('#barChartResearch'), {
      type: 'bar',
      data: {
        labels: ['January', 'February', 'March', 'April', 'May', 'June', 'July'],
        datasets: [{
          label: 'Researches',
          data: [12, 19, 8, 15, 10, 18, 22],
          backgroundColor: [
            'rgba(255, 99, 132, 0.2)',
            'rgba(255, 159, 64, 0.2)',
            'rgba(255, 205, 86, 0.2)',
            'rgba(75, 192, 192, 0.2)',
            'rgba(54, 162, 235, 0.2)',
            'rgba(153, 102, 255, 0.2)',
            'rgba(201, 203, 207, 0.2)'
          ],
          borderColor: [
            'rgb(255, 99, 132)',
            'rgb(255, 159, 64)',
            'rgb(255, 205, 86)',
            'rgb(75, 192, 192)',
            'rgb(54, 162, 235)',
            'rgb(153, 102, 255)',
            'rgb(201, 203, 207)'
          ],
          borderWidth: 1
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









</div>