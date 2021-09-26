 <nav class="navbar default-layout col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
        <div class="text-center navbar-brand-wrapper d-flex align-items-top justify-content-center" style="background-color: #ffffff !important;">
        <!-- <div class="text-center navbar-brand-wrapper d-flex align-items-top justify-content-center" > -->
          <a class="navbar-brand brand-logo" href="home.php">
            <img src="../assets/images/123.png" alt="logo" style="height:53px; width: 174px;" /> </a>
          <a class="navbar-brand brand-logo-mini" href="home.php">
            <img src="../assets/images/light_logo.png" alt="logo" /> </a>
        </div>
        <div class="navbar-menu-wrapper d-flex align-items-center">
          <ul class="navbar-nav">
            <li class="nav-item dropdown language-dropdown">
              <a class="nav-link px-2 d-flex align-items-center" href="home.php">
                <div class="d-inline-flex mr-0 mr-md-3">
                  <div class="flag-icon-holder">
                    <i class="mdi mdi-view-dashboard-outline"></i>
                  </div>
                </div>
                <span class="profile-text font-weight-medium d-none d-md-block">Dashboard</span>
              </a>
            </li>

            <li class="nav-item dropdown language-dropdown">
              <a class="nav-link dropdown-toggle px-2 d-flex align-items-center" id="LanguageDropdown" href="#" data-toggle="dropdown" aria-expanded="false">
                <div class="d-inline-flex mr-0 mr-md-3">
                  <div class="flag-icon-holder">
                    <i class="mdi mdi-account"></i>
                  </div>
                </div>
                <span class="profile-text font-weight-medium d-none d-md-block">Client</span>
              </a>
              <div class="dropdown-menu dropdown-menu-left navbar-dropdown py-2" aria-labelledby="LanguageDropdown">
                <a class="dropdown-item" href="customer.php">
                  <div class="flag-icon-holder">
                    <i class="mdi mdi-account-box" aria-hidden="true"></i>
                  </div>Client Creation
                </a>
                <a class="dropdown-item" href="search_client.php">
                  <div class="flag-icon-holder">
                    <i class="mdi mdi-account-search" aria-hidden="true"></i>
                  </div>Search Clients
                </a>
              </div>
            </li>

            <li class="nav-item dropdown language-dropdown">
              <a class="nav-link px-2 d-flex align-items-center" href="center.php">
                <div class="d-inline-flex mr-0 mr-md-3">
                  <div class="flag-icon-holder">
                    <i class="mdi mdi-bank" aria-hidden="true"></i>
                  </div>
                </div>
                <span class="profile-text font-weight-medium d-none d-md-block">Center Creation</span>
              </a>
            </li>

            <li class="nav-item dropdown language-dropdown">
              <a class="nav-link dropdown-toggle px-2 d-flex align-items-center" id="LanguageDropdown" href="#" data-toggle="dropdown" aria-expanded="false">
                <div class="d-inline-flex mr-0 mr-md-3">
                  <div class="flag-icon-holder">
                    <i class="mdi mdi-account-edit"></i>
                  </div>
                </div>
                <span class="profile-text font-weight-medium d-none d-md-block">Loan</span>
              </a>
              <div class="dropdown-menu dropdown-menu-left navbar-dropdown py-2" aria-labelledby="LanguageDropdown">
                <a class="dropdown-item" href="loan.php">
                  <div class="flag-icon-holder">
                    <i class="mdi mdi-ballot-outline" aria-hidden="true"></i>
                  </div>Loan Creation
                </a>
              </div>
            </li>

            <!-- <li class="nav-item dropdown language-dropdown">
              <a class="nav-link dropdown-toggle px-2 d-flex align-items-center" id="LanguageDropdown" href="#" data-toggle="dropdown" aria-expanded="false">
                <div class="d-inline-flex mr-0 mr-md-3">
                  <div class="flag-icon-holder">
                    <i class="mdi mdi-file-document"></i>
                  </div>
                </div>
                <span class="profile-text font-weight-medium d-none d-md-block">Report</span>
              </a>
              <div class="dropdown-menu dropdown-menu-left navbar-dropdown py-2" aria-labelledby="LanguageDropdown">
                <a class="dropdown-item" href="client_report.php">
                  <div class="flag-icon-holder">
                    <i class="mdi mdi-account-box-multiple" aria-hidden="true"></i>
                  </div>Client Report
                </a>
                <a class="dropdown-item" href="loan_report.php">
                  <div class="flag-icon-holder">
                    <i class="mdi mdi-ballot" aria-hidden="true"></i>
                  </div>Monthly Loans
                </a>
                <a class="dropdown-item" href="collection_report.php">
                  <div class="flag-icon-holder">
                    <i class="mdi mdi-animation" aria-hidden="true"></i>
                  </div> Collection
                </a>
              </div>
            </li> -->
            <li class="nav-item dropdown language-dropdown">
               <a class="nav-link dropdown-toggle px-2 d-flex align-items-center" id="LanguageDropdown" href="#" data-toggle="dropdown" aria-expanded="false">
                <div class="d-inline-flex mr-0 mr-md-3">
                  <div class="flag-icon-holder">
                    <i class="mdi  mdi-account-details"></i>
                  </div>
                </div>
                <span class="profile-text font-weight-medium d-none d-md-block">Transaction</span>
              </a>
              <div class="dropdown-menu dropdown-menu-left navbar-dropdown py-2" aria-labelledby="LanguageDropdown">
                <a class="dropdown-item" href="debt_collection.php">
                  <div class="flag-icon-holder">
                    <i class="mdi mdi-plus-box-outline" aria-hidden="true"></i>
                  </div> Creation
                </a>
                <a class="dropdown-item" href="reverse.php">
                  <div class="flag-icon-holder">
                    <i class="mdi mdi-sync" aria-hidden="true"></i>
                  </div>Reverse 
                </a>
              </div>
            </li>
            <li class="nav-item dropdown language-dropdown">
              <a class="nav-link px-2 d-flex align-items-center" href="report.php">
                <div class="d-inline-flex mr-0 mr-md-3">
                  <div class="flag-icon-holder">
                    <i class="mdi mdi-file-document"></i>
                  </div>
                </div>
                <span class="profile-text font-weight-medium d-none d-md-block">Report</span>
              </a>
            </li>

          </ul>
           <ul class="navbar-nav ml-auto "> 
            <li class="nav-item dropdown d-none d-xl-inline-block user-dropdown">
              <a class="nav-link dropdown-toggle" id="UserDropdown" href="#" data-toggle="dropdown" aria-expanded="false">
                <img class="img-xs rounded-circle" src="../assets/images/faces/face8.png" alt="Profile image"> </a>
              <div class="dropdown-menu dropdown-menu-right navbar-dropdown" aria-labelledby="UserDropdown">
                <div class="dropdown-header text-center">
                  <img class="img-md rounded-circle" src="../assets/images/faces/face8.png" alt="Profile image">
                  <?php 
                  if(isset($_SESSION['username'])){
                    $user= $_SESSION['username'];
                    $sql=mysqli_query($conn,"SELECT * FROM user U, center C WHERE username='$user' AND C.id=U.center_id");
                    $row = mysqli_fetch_assoc($sql);
                    $name = $row['username'];
                    $center_name = $row['center_name'];
                  }
                  ?>
                  <p class="mb-1 mt-3 font-weight-semibold"><?php echo $name; ?></p>
                  <p class="font-weight-light text-muted mb-0">Center : <?php echo $center_name; ?></p>
                <p></p>
                <a class="dropdown-item" href="setting.php"><i class="mdi mdi-cogs"></i>&nbsp; Setting</a>
                <a class="dropdown-item" href="../logout.php"><i class="mdi mdi-power-settings"></i>&nbsp; Sign Out</a>
              </div>
            </li>
          </ul>
          <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-toggle="offcanvas">
            <a class="dropdown-item" href="../logout.php"><i class="mdi mdi-power-settings"></i></a>
          </button>
        </div>
      </nav>