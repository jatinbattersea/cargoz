<aside class="main-sidebar sidebar-dark-primary elevation-4">
  <!-- <div class="dropdown">
     <a href="./" class="brand-link">
        <?php //if($_SESSION['login_type'] == 1): ?>
        <h3 class="text-center p-0 m-0"><b>ADMIN</b></h3>
        <?php //else: ?>
        <h3 class="text-center p-0 m-0"><b>STAFF</b></h3>
        <?php //endif; ?>
    </a>
      
    </div> -->
  <div class="sidebar pb-4 mb-4 mt-4 pt-5">
    <nav class="mt-2">
      <ul class="nav nav-pills nav-sidebar flex-column nav-flat" data-widget="treeview" role="menu"
        data-accordion="false">
        <li class="nav-item dropdown">
          <a href="./" class="nav-link nav-home">
            <img src="./assets/uploads/Dashboard.svg" alt="">
            <p>
              Dashboard
            </p>
          </a>
        </li>
        <?php if ($_SESSION['login_type'] == 1): ?>
          <li class="nav-item">
            <a href="#" class="nav-link nav-edit_branch">
              <img src="./assets/uploads/Branch.svg" alt="">
              <p>
                Branch
                <i class="bi bi-caret-right-fill right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="./index.php?page=new_branch" class="nav-link nav-new_branch tree-item">
                  <img src="./assets/uploads/add-new.svg" alt="">
                  <p>Add New</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="./index.php?page=branch_list" class="nav-link nav-branch_list tree-item">
                  <img src="./assets/uploads/List.svg" alt="">
                  <p>List</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link nav-edit_staff">
              <img src="./assets/uploads/Branch-Staff.svg" alt="">
              <p>
                Branch Staff
                <i class="bi bi-caret-right-fill right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="./index.php?page=new_staff" class="nav-link nav-new_staff tree-item">
                  <img src="./assets/uploads/add-new.svg" alt="">
                  <p>Add New</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="./index.php?page=staff_list" class="nav-link nav-staff_list tree-item">
                  <img src="./assets/uploads/List.svg" alt="">
                  <p>List</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link nav-franchise_branch">
              <img src="./assets/uploads/Franchise.svg" alt="">
              <p>
                Franchise
                <i class="bi bi-caret-right-fill right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="./index.php?page=new_franchise" class="nav-link nav-new_franchise tree-item">
                  <img src="./assets/uploads/add-new.svg" alt="">
                  <p>Add New</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="./index.php?page=franchise_list" class="nav-link nav-franchise_list tree-item">
                  <img src="./assets/uploads/List.svg" alt="">
                  <p>List</p>
                </a>
              </li>
            </ul>
          </li>
        <?php endif; ?>
        <li class="nav-item">
          <a href="#" class="nav-link nav-edit_parcel">
            <img src="./assets/uploads/Parcel.svg" alt="">
            <p>
              Parcels
              <i class="bi bi-caret-right-fill right"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="./index.php?page=new_parcel" class="nav-link nav-new_parcel tree-item">
                <img src="./assets/uploads/add-new.svg" alt="">
                <p>Add New</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="./index.php?page=parcel_list" class="nav-link nav-parcel_list nav-sall tree-item">
                <img src="./assets/uploads/List.svg" alt="">
                <p>List All</p>
              </a>
            </li>
            <?php
            $status_arr = array('Item Accepted by Courier', 'In-Transit', 'Forwarded To Next Location', 'In Custom', 'Accepted By Airlines', 'Arrived At Destination', 'Arrived At Hub', 'Out For Delivery', 'Delivered', 'Delayed Due To Custom', "Other");
            foreach ($status_arr as $k => $v):
              ?>
              <li class="nav-item">
                <a href="./index.php?page=parcel_list&s=<?php echo $v ?>"
                  class="nav-link nav-parcel_list_<?php echo str_replace(' ', '_', $v); ?> tree-item">
                  <img src="./assets/uploads/<?php echo str_replace(' ', '-', $v); ?>-side.svg" alt="">
                  <p>
                    <?php
                    if ($v === "Item Accepted by Courier") {
                      $v = 'Item Accepted by <br/>Courier';
                      echo $v;
                    } else if ($v === "Forwarded To Next Location") {
                      $v = 'Forwarded To Next <br/>Location';
                      echo $v;
                    } else {
                      echo $v;
                    }
                    ?>
                  </p>
                </a>
              </li>
            <?php endforeach; ?>
          </ul>
        </li>
        <li class="nav-item dropdown">
          <a href="./index.php?page=track" class="nav-link nav-track">
            <img src="./assets/uploads/Track-Parcel.svg" alt="">
            <p>
              Track Parcel
            </p>
          </a>
        </li>
        <li class="nav-item dropdown">
          <a href="./index.php?page=reports" class="nav-link nav-reports">
            <img src="./assets/uploads/report.svg" alt="">
            <p>
              Reports
            </p>
          </a>
        </li>
      </ul>
    </nav>
  </div>
</aside>
<script>
  $(document).ready(function () {
    var page = '<?php echo isset($_GET['page']) ? $_GET['page'] : 'home' ?>';
    var s = '<?php echo isset($_GET['s']) ? $_GET['s'] : '' ?>';
    if (s != '') {
      if (s.includes(' ')) {
        const slug = s.replace(/ /g, '_');
        page = page + '_' + slug;
      } else {
        page = page + '_' + s;
      }
    }

    if ($('.nav-link.nav-' + page).length > 0) {
      $('.nav-link.nav-' + page).addClass('active')
      if ($('.nav-link.nav-' + page).hasClass('tree-item') == true) {
        $('.nav-link.nav-' + page).closest('.nav-treeview').siblings('a').addClass('active')
        $('.nav-link.nav-' + page).closest('.nav-treeview').parent().addClass('menu-open')
      }
      if ($('.nav-link.nav-' + page).hasClass('nav-is-tree') == true) {
        $('.nav-link.nav-' + page).parent().addClass('menu-open')
      }

    }

  })
</script>