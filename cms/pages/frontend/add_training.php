<?php
$page = "add_training";
include 'template/header.php';
include '../../connection/connection.php';
?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Technology Training</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active">Technology Training</li>
          </ol>
        </div>
      </div>
    </div><!-- /.container-fluid -->
  </section>

  <!-- Main content -->
  <section class="content">
    <div class="container-fluid">
      <!-- SELECT2 EXAMPLE -->
      <form action="../backend/add_training.php" method="get">
        <div class="card card-info">
          <div class="card-header">
            <h3 class="card-title">Technology Training Profile</h3>
            <div class="card-tools">
              <button type="button" class="btn btn-tool" data-card-widget="collapse">
                <i class="fas fa-minus"></i>
              </button>
              <!--  <button type="button" class="btn btn-tool" data-card-widget="remove">
                <i class="fas fa-times"></i>
              </button> -->
            </div>
          </div>
          <!-- /.card-header -->
          <div class="card-body">
            <div class="row">
              <div class="col-md-12">
                <div class="form-group">
                  <label>Title <span style="color:red">*</span></label>
                  <input class="form-control" name="training_title" type="text" placeholder="Enter Technology Training Title" style="width: 100%;" required>
                </div>
                <!-- /.form-group -->
              </div>
          </div>
          <div class="row">
              <div class="col-md-8">
                <div class="form-group">
                  <label>Venue <span style="color:red">*</span></label>
                  <input type="text" class="form-control" name="resource_venue" placeholder="Bldg name (if any), Brgy, Municipality" required>
                </div>
              </div>
              <div class="col-md-4">
                <div class="form-group">
                  <label>Date Conducted <span style="color:red">*</span></label>
                  <input type="date" class="form-control" name="dateconducted" required>
                </div>
              </div>
            </div>
          <div class="row">
              <div class="col-md-3">
                <div class="form-group">
                  <label>Charging <span style="color:red">*</span></label>
                  <select name="charging" id="charging" class="form-control" required>
                    <option value="">Select charging</option>
                    <option value="1">TAIS</option>
                    <option value="2">GIA</option>
                    <option value="3">CEST</option>
                    <option value="4">SSCP</option>
                    <option value="5">Others</option>
                  </select>
                </div>
                <!-- /.form-group -->
              </div>
              <div class="col-md-3">
                <div class="form-group">
                  <label>Charging Remarks </label>
                  <input type="text" name="charge_remarks" id="charge_remarks" class="form-control" placeholder="Details of other charging" disabled />
                </div>
              </div>
              <div class="col-md-3">
                <div class="form-group">
                  <label>Cost of Training <span style="color:red">*</span></label>
                  <input type="number" name="amount_training" min="0" class="form-control" placeholder="Total Cost of Training" required>
                </div>
              </div>
              <div class="col-md-3">
                <div class="form-group">
                  <label>Expenses Breakdown <span style="color:red">*</span></label>
                  <textarea name="breakdown" class="form-control" placeholder="Expenses Breakdown" required></textarea>
                </div>
              </div>
            </div>

          </div>
        </div>
        <div class="card card-success">
          <div class="card-header">
            <h3 class="card-title">Resource Speaker</h3>

            <div class="card-tools">
              <button type="button" class="btn btn-tool" data-card-widget="collapse">
                <i class="fas fa-minus"></i>
              </button>
              <!--  <button type="button" class="btn btn-tool" data-card-widget="remove">
                <i class="fas fa-times"></i>
              </button> -->
            </div>
          </div>
          <!-- /.card-header -->
          <div class="card-body">

          <div id="entriesContainer">
          <!-- Entry Template -->
          <div class="entry row g-3 mb-3">
            <div class="col-md-4">
              <label for="fullName" class="form-label">Full Name</label>
              <input type="text" class="form-control" name="fullName[]" placeholder="Enter full name" required>
            </div>
            <div class="col-md-3">
              <label for="designation" class="form-label">Designation</label>
              <input type="text" class="form-control" name="designation[]" placeholder="Enter designation" required>
            </div>
            <div class="col-md-4">
              <label for="agency" class="form-label">Agency</label>
              <input type="text" class="form-control" name="agency[]" placeholder="Enter agency" required>
            </div>
            <div class="col-md-1 d-flex align-items-end">
              <button type="button" class="btn btn-danger deleteEntryBtn">Delete</button>
            </div>
          </div>
        </div>

      <div class="d-flex justify-content-between mb-3">
        <button type="button" id="addEntryBtn" class="btn btn-primary">Add Another Entry</button>
        <button type="button" id="generateJsonBtn" class="btn btn-success">Save Entry</button>
      </div>

    <!-- Textarea for JSON Output -->
    <div class="form-group" style="display:none">
      <label for="jsonOutput" class="form-label">Generated JSON</label>
      <textarea id="jsonOutput" name="rps" class="form-control" rows="10" readonly placeholder="Generated JSON will appear here..."></textarea>
    </div>
  </div>

          </div>
          <!-- /.row -->
        </div>
        <div class="card card-info">
          <div class="card-header">
            <h3 class="card-title">Participants</h3>
            <div class="card-tools">
              <button type="button" class="btn btn-tool" data-card-widget="collapse">
                <i class="fas fa-minus"></i>
              </button>
            </div>
          </div>
          <div class="card-body">
            <div class="row">
              <div class="col-md-6">
                <div class="form-group">
                  <label>Firm Assisted <span style="color:red">*</span></label>
                  <input type="text" class="form-control" name="participant_name" placeholder="Enter Complete Name of the Firm/CBE (avoid abbreviation)" required>
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group">
                  <label>Firm Location <span style="color:red">*</span></label>
                  <input type="text" class="form-control" name="participant_address" placeholder="Enter complete address" required>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="card card-warning">
          <div class="card-header">
            <h3 class="card-title">Technology Training Demographics</h3>
            <div class="card-tools">
              <button type="button" class="btn btn-tool" data-card-widget="collapse">
                <i class="fas fa-minus"></i>
              </button>
            </div>
          </div>
          <div class="card-body">
            <div class="row">
              <div class="col-md-6">
                <div class="form-group">
                  <label>DOST-Assisted Firms</label>
                  <div class="col-md-12">
                    <label>Male</label>
                    <input type="number" name="dost_assist_firm_male" min="0" class="form-control" placeholder="Enter male">
                  </div>
                  <div class="col-md-12">
                    <label>Female</label>
                    <input type="number" name="dost_assist_firm_female" class="form-control" min="0" placeholder="Enter female">
                  </div>
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group">
                  <label>Non-DOST-Assisted Firms</label>
                  <div class="col-md-12">
                    <label>Male</label>
                    <input type="number" min="0" name="nondost_assist_firm_male" placeholder="Enter male" class="form-control">
                  </div>
                  <div class="col-md-12">
                    <label>Female</label>
                    <input type="number" min="0" name="nondost_assist_firm_female" placeholder="Enter female" class="form-control">
                  </div>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-md-6">
                <div class="form-group">
                  <label>CBEs/Cooperatives</label>
                  <div class="col-md-12">
                    <label>Male</label>
                    <input type="number" min="0" name="coop_male" placeholder="Enter male" class="form-control">
                  </div>
                  <div class="col-md-12">
                    <label>Female</label>
                    <input type="number" min="0" name="coop_female" placeholder="Enter female" class="form-control">
                  </div>
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group">
                  <label>Startups</label>
                  <div class="col-md-12">
                    <label>Male</label>
                    <input type="number" min="0" name="startup_male" placeholder="Enter male" class="form-control">
                  </div>
                  <div class="col-md-12">
                    <label>Female</label>
                    <input type="number" min="0" name="startup_female" placeholder="Enter female" class="form-control">
                  </div>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-md-6">
                <div class="form-group">
                  <label>Individuals</label>
                  <div class="col-md-12">
                    <label>Male</label>
                    <input type="number" min="0" name="individual_male" placeholder="Enter male" class="form-control">
                  </div>
                  <div class="col-md-12">
                    <label>Female</label>
                    <input type="number" min="0" name="individual_female" placeholder="Enter female" class="form-control">
                  </div>
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group">
                  <label>Academe</label>
                  <div class="col-md-12">
                    <label>Male</label>
                    <input type="number" min="0" name="academe_male" placeholder="Enter male" class="form-control">
                  </div>
                  <div class="col-md-12">
                    <label>Female</label>
                    <input type="number" min="0" name="academe_female" placeholder="Enter female" class="form-control">
                  </div>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-md-12">
                <div class="form-group">
                  <p class="text-center"><label>Government</label></p>
                  <div class="row">
                    <div class="col-md-6">
                      <label>Male</label>
                      <input type="number" min="0" name="government_male" placeholder="Enter male" class="form-control">
                    </div>
                    <div class="col-md-6">
                      <label>Female</label>
                      <input type="number" min="0" name="government_female" placeholder="Enter female" class="form-control">
                    </div>
                  </div>

                </div>
              </div>

            </div>
            <div class="row">
              <div class="col-md-4">
                <label>PWD</label>
                <input type="number" min="0" name="pwd" placeholder="Enter no. of PWD" class="form-control">
              </div>
              <div class="col-md-4">
                <label>Senior Citizen</label>
                <input type="number" min="0" name="senior" placeholder="Enter no. of Senior" class="form-control">
              </div>
              <div class="col-md-4">
                <div class="form-group">
                  <label>No. of IPe</label>
                  <input type="number" min="0" name="ipe" placeholder="Enter no. of IPe" class="form-control">
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- /.row -->

        <div style="text-align: center">
          <button type="submit" class="btn btn-primary btn-lg">Submit Training</button>
        </div><br /><br /><br />
      </form>
    </div>
    <!-- /.container-fluid -->
  </section>
  <!-- /.content -->
</div>
<!-- /.content-wrapper -->
<script>
  document.getElementById('charging').addEventListener('change', function() {
    const input = document.getElementById('charge_remarks');
    input.disabled = this.value != '5'; // Disable input if option 2 is selected
  });
</script>

<script>
  const entriesContainer = document.getElementById('entriesContainer');
  const addEntryBtn = document.getElementById('addEntryBtn');
  const generateJsonBtn = document.getElementById('generateJsonBtn');
  const jsonOutput = document.getElementById('jsonOutput');

  // Function to add a new entry row
  addEntryBtn.addEventListener('click', () => {
    const newEntry = document.createElement('div');
    newEntry.className = 'entry row g-3 mb-3';
    newEntry.innerHTML = `
      <div class="col-md-4">
        <label for="fullName" class="form-label">Full Name</label>
        <input type="text" class="form-control" name="fullName[]" placeholder="Enter full name" required>
      </div>
      <div class="col-md-3">
        <label for="designation" class="form-label">Designation</label>
        <input type="text" class="form-control" name="designation[]" placeholder="Enter designation" required>
      </div>
      <div class="col-md-4">
        <label for="agency" class="form-label">Agency</label>
        <input type="text" class="form-control" name="agency[]" placeholder="Enter agency" required>
      </div>
      <div class="col-md-1 d-flex align-items-end">
        <button type="button" class="btn btn-danger deleteEntryBtn">Delete</button>
      </div>
    `;
    entriesContainer.appendChild(newEntry);

    // Attach delete functionality to the new delete button
    newEntry.querySelector('.deleteEntryBtn').addEventListener('click', () => {
      newEntry.remove();
    });
  });

  // Function to generate JSON and display it in the textarea
  generateJsonBtn.addEventListener('click', () => {
    const resourcePersons = [];
    const fullNameInputs = document.querySelectorAll('input[name="fullName[]"]');
    const designationInputs = document.querySelectorAll('input[name="designation[]"]');
    const agencyInputs = document.querySelectorAll('input[name="agency[]"]');

    // Collect form data
    for (let i = 0; i < fullNameInputs.length; i++) {
      resourcePersons.push({
        fullName: fullNameInputs[i].value,
        designation: designationInputs[i].value,
        agency: agencyInputs[i].value,
      });
    }

    // Display the JSON data in the textarea
    jsonOutput.value = JSON.stringify(resourcePersons, null, 2);

    // Hide the buttons
    addEntryBtn.style.display = 'none';
    generateJsonBtn.style.display = 'none';
  });

  // Add delete functionality to initial delete buttons
  document.querySelectorAll('.deleteEntryBtn').forEach(button => {
    button.addEventListener('click', (event) => {
      button.closest('.entry').remove();
    });
  });
</script>
<?php
include 'template/footer.php';
?>