<nav class="sidebar sidebar-offcanvas" id="sidebar">
          <ul class="nav">
            <li class="nav-item nav-profile">
              <a href="#" class="nav-link">
                <div class="profile-image">
                  <img class="img-xs rounded-circle" src="../assets/images/faces/face8.png" alt="profile image">
                  <div class="dot-indicator bg-success"></div>
                </div>
                <?php 
                if(isset($_SESSION['username'])){
                    $user= $_SESSION['username'];
                    $sql=mysqli_query($conn,"SELECT * FROM user U, center C WHERE username='$user' AND C.id=U.center_id");
                    $row = mysqli_fetch_assoc($sql);
                    $name = $row['username'];
                    $center_name = $row['center_name'];
                }
                ?>
                <div class="text-wrapper">
                  <p class="profile-name"><?php echo $name; ?></p>
                  <p class="center_name"><?php echo $center_name; ?></p>
                </div>
              </a>
            </li>
            <!--+++++++++++++++++++++++++++++++++++++++ Admin Module  +++++++++++++++++++++++++++++++++++++++-->
            <?php if ($_SESSION['user_role']==1): ?>
            <li class="nav-item">
              <a class="nav-link" href="home.php">
                <i class="menu-icon typcn typcn-document-text"></i>
                <span class="menu-title">Dashboard</span>
              </a>
            </li>
            <?php else: ?>
            <?php endif ?>
             <?php if ($_SESSION['user_role']==1): ?>
              <li class="nav-item">
                <a class="nav-link" href="customer.php">
                  <i class="menu-icon typcn typcn-shopping-bag"></i>
                  <span class="menu-title">Borrowers</span>
                </a>
              </li>
            <?php else: ?>
            <?php endif ?>
            

            <?php if ($_SESSION['user_role']==1): ?>
            <li class="nav-item">
              <a class="nav-link" href="loan.php">
                <i class="menu-icon typcn typcn-shopping-bag"></i>
                <span class="menu-title" style="color: chartreuse;">Loans</span>
              </a>
            </li>

            <?php else: ?>
            <?php endif ?>

            <?php if ($_SESSION['user_role']==1): ?>
            <li class="nav-item">
              <a class="nav-link" href="collection.php">
                <i class="menu-icon typcn typcn-shopping-bag"></i>
                <span class="menu-title" style="color: chartreuse;">Collection</span>
              </a>
            </li>

            <?php else: ?>
            <?php endif ?>
            
            <?php if ($_SESSION['user_role']==1): ?>

            <li class="nav-item">
              <a class="nav-link" data-toggle="collapse" href="#ui-style" aria-expanded="false" aria-controls="ui-style">
                <i class="menu-icon typcn typcn-coffee"></i>
                <span class="menu-title">Reports</span>
                <i class="menu-arrow"></i>
              </a>
              <div class="collapse" id="ui-style">
                <ul class="nav flex-column sub-menu">
                  <li class="nav-item">
                    <a class="nav-link" href="borrower_report.php">Borrower Reports</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="loan_report.php">Monthly Loans</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="collection_report.php">Monthly Collections</a>
                  </li>
                </ul>
              </div>
            </li>
            <?php else: ?>
            <?php endif ?>


            <?php if ($_SESSION['user_role']== 1 || $_SESSION['user_role']==  2): ?>

            <li class="nav-item">
              <a class="nav-link" data-toggle="collapse" href="#ui-buyer" aria-expanded="false" aria-controls="ui-buyer">
                <i class="menu-icon typcn typcn-coffee"></i>
                <span class="menu-title">Setting</span>
                <i class="menu-arrow"></i>
              </a>
              <div class="collapse" id="ui-buyer">
                <ul class="nav flex-column sub-menu">
                    <?php if ($_SESSION['user_role']== 1 || $_SESSION['user_role']==  2): ?>
                    <li class="nav-item">
                      <a class="nav-link" href="setting.php">User Settings</a>
                    </li>
                    <?php else: ?>
                    <?php endif ?>
                    <?php if ($_SESSION['user_role']== 1 ): ?>
                    <li class="nav-item">
                      <a class="nav-link" href="center.php">Create center</a>
                    </li>
                    <?php else: ?>
                    <?php endif ?>
                </ul>
              </div>
            </li>
            <?php else: ?>
            <?php endif ?>

          </ul>
        </nav>