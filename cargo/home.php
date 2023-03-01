<?php include('db_connect.php') ?>
<?php
$twhere ="";
if($_SESSION['login_type'] != 1)
  $twhere = "  ";
?>
<!-- Info boxes -->
<?php if($_SESSION['login_type'] == 1): ?>
        <div class="row">
          <div class="col-lg-4 col-md-6">
                <a href="./index.php?page=branch_list" class="card info-card">
                    <div class="d-flex align-items-center px-3 py-4 card-hover">
                        <div class="card-icon d-flex align-items-center justify-content-center">
                          <img src="./assets/uploads/Total Branches.svg" class="img-fluid" alt="">
                        </div>
                        <div>
                            <h5 class="card-title">Total Branches</h5>
                            <h6><?php echo $conn->query("SELECT * FROM branches")->num_rows; ?></h6>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-lg-4 col-md-6">
                <a href="./index.php?page=franchise_list" class="card info-card">
                    <div class="d-flex align-items-center px-3 py-4 card-hover">
                        <div class="card-icon d-flex align-items-center justify-content-center">
                          <img src="./assets/uploads/Total Franchise.svg" class="img-fluid" alt="">
                        </div>
                        <div>
                            <h5 class="card-title">Total Franchise</h5>
                            <h6><?php echo $conn->query("SELECT * FROM franchise")->num_rows; ?></h6>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-lg-4 col-md-6">
                <a href="./index.php?page=parcel_list" class="card info-card">
                    <div class="d-flex align-items-center px-3 py-4 card-hover">
                        <div class="card-icon d-flex align-items-center justify-content-center">
                          <img src="./assets/uploads/Total Parcels.svg" class="img-fluid" alt="">
                        </div>
                        <div>
                            <h5 class="card-title">Total Parcels</h5>
                            <h6>
                                <?php echo $conn->query("SELECT * FROM parcels")->num_rows; ?>  
                            </h6>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-lg-4 col-md-6">
                <a href="./index.php?page=staff_list" class="card info-card">
                    <div class="d-flex align-items-center px-3 py-4 card-hover">
                        <div class="card-icon d-flex align-items-center justify-content-center">
                          <img src="./assets/uploads/Total Staff.svg" class="img-fluid" alt="">
                        </div>
                        <div>
                            <h5 class="card-title">Total Staff</h5>
                            <h6>
                            <?php echo $conn->query("SELECT * FROM users where type != 1")->num_rows; ?> 
                            </h6>
                        </div>
                    </div>
                </a>
            </div>
          <?php 
              $status_arr = array(
                'Item Accepted by Courier','In-Transit',
                'Forwarded To Next Location',
                'In Custom',
                'Accepted By Airlines',
                'Arrived At Destination',
                'Arrived At Hub',
                'Out For Delivery',
                'Delivered',
                'Delayed Due To Custom',
                "Other",
              );
               foreach($status_arr as $k =>$v):
          ?>
          <div class="col-lg-4 col-md-6">
              <a href="./index.php?page=parcel_list&s=<?php echo $v ?>" class="card info-card">
                  <div class="d-flex align-items-center px-3 py-4 card-hover">
                      <div class="card-icon d-flex align-items-center justify-content-center">
                        <img src="./assets/uploads/<?php echo $v; ?>.svg" class="img-fluid" alt="">
                      </div>
                      <div>
                          <h5 class="card-title"><?php echo $v ?></h5>
                          <h6>
                          <?php echo $conn->query("SELECT * FROM parcels where status = '" . $v . "' ")->num_rows; ?>
                          </h6>
                      </div>
                  </div>
              </a>
          </div>
          <?php 
            endforeach;
           ?>
      </div>

<?php else: ?>
	 <div class="col-12">
          <div class="card">
          	<div class="card-body">
          		Welcome <?php echo $_SESSION['login_name'] ?>!
          	</div>
          </div>
      </div>
          
<?php endif; ?>
