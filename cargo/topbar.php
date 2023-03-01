<header id="header" class="header fixed-top d-flex align-items-center">
    <div class="d-flex align-items-center justify-content-between">
      <a aria-current="page" class="logo d-flex align-items-center active" href="./">
        <img src="./assets/uploads/logo.png" alt="">
      </a>
      <i class="bi bi-list toggle-sidebar-btn ml-2"></i>
    </div>
    <nav class="header-nav ml-auto">
        <ul class="d-flex align-items-center">
            <li class="nav-item dropdown pr-3">
              <div class="nav-link nav-profile d-flex align-items-center p-0">
                <a class="dropdown menu pl-2 text-dark" href="javascript:void(0)">
                <img src="./assets/uploads/download.jfif" alt="Profile" class="rounded-circle profile-img">
                  <span class="d-md-inline-block d-none ml-1">
                    <?php echo ucwords($_SESSION['login_firstname']) ?>
                    <i class="bi bi-caret-down-fill"></i>
                  </span>
                </a>
                  <ul class="dropdown-menu profile" x-placement="bottom-start">
                    <li class="dropdown-header">
                        <h6><?php echo ucwords($_SESSION['login_firstname']) ?></h6>
                        <span><?php echo $_SESSION['system']['name'] ?></span>
                    </li>
                    <li>
                        <hr class="dropdown-divider">
                    </li>
                    <li>
                      <a class="dropdown-item d-flex align-items-center" href="/profile">
                        <i class="bi bi-person"></i>
                        <span>Profile</span>
                      </a>
                    </li>
                    <li>
                        <hr class="dropdown-divider">
                    </li>
                    <li>
                      <a class="dropdown-item d-flex align-items-center" href="ajax.php?action=logout">
                        <i class="bi bi-box-arrow-right"></i>
                        <span>Sign Out</span>
                      </a>
                    </li>
                </ul>
              </div>
            </li>
        </ul>
    </nav>
</header>

<!-- Navbar -->
   <script>
     $('#manage_account').click(function(){
        uni_modal('Manage Account','manage_user.php?id=<?php echo $_SESSION['login_id'] ?>')
      })
      $('.dropdown.menu').click(function(event) {
        if ($('.dropdown-menu.profile').hasClass('show')) {
          $('.dropdown-menu.profile').removeClass('show');
        } else {
          $('.dropdown-menu.profile').addClass('show');
        }
        event.stopPropagation();
      });

      $(document).click(function() {
        if ($('.dropdown-menu.profile').hasClass('show')) {
          $('.dropdown-menu.profile').removeClass('show');
        }
      });
  </script>
