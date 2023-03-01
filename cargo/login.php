<?php 
session_start();

include('./db_connect.php');

  
?>
<?php 
if(isset($_SESSION['login_id']))
header("location:index.php?page=home");

?>
<?php include 'header.php' ?>
<body>
<section class="login-page dashboard">
  <div class="container py-2">
    <div class="row d-flex justify-content-center align-items-center h-100">
      <div class="col col-xl-9">
        <div class="card" style="border-radius: 1rem;">
          <div class="row g-0">
            <div class="col-md-6 d-none d-md-block img-block p-0">
              <img src="./assets/uploads/IMG.jpg"
                alt="login form" class="img-fluid" style="border-radius: 1rem 0 0 1rem;" />
                <div class="logo">
                <img src="./assets/uploads/logo-2.png" id="logo" class="img-fluid" alt="">
                </div>
            </div>
            <div class="col-md-6 d-flex align-items-center">
              <div class="card-body p-4 p-lg-5 text-black">

                <form action="" id="login-form">
                  <div class="d-flex justify-content-center align-items-center mb-1 pb-1">
                    <span class="h3 fw-bold mb-0">Admin</span>
                  </div>

                  <h5 class="fw-normal mb-3 pb-3 text-center" style="letter-spacing: 1px;">Sign into your account</h5>

                  <div class="error"></div>

                  <div class="form-outline mb-4">
                    <div class="input-icon">
                    <i class="bi bi-person-fill"></i>
                    </div>
                    <input id="form2Example17" placeholder="Email address" class="form-control" type="email" name="email" />
                  </div>

                  <div class="form-outline mb-3">
                  <div class="input-icon">
                  <i class="bi bi-lock-fill"></i>
                    </div>
                  
                    <input type="password" name="password" id="form2Example27" placeholder="Password" class="form-control" />
                  </div>

                  <div class="pt-1 mb-3 d-flex align-items-center">
                    <input type="checkbox" name="remember-me" id="remember_me">
                    <label for="remember_me">Remember Me</label>
                  </div>

                  <div class="pt-1 mb-4">
                    <button class="btn btn-lg btn-block" type="submit">Login</button>
                  </div>

                  <!-- <p class="mb-5 pb-lg-2">Don't have an account? <a href="#!" >Register here</a></p> -->
                </form>

              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
<script>
  $(document).ready(function(){
    $('#login-form').submit(function(e){
    e.preventDefault()
    start_load()
    if($(this).find('.alert-danger').length > 0 )
      $(this).find('.alert-danger').remove();
    $.ajax({
      url:'ajax.php?action=login',
      method:'POST',
      data:$(this).serialize(),
      error:err=>{
        console.log(err)
        end_load();

      },
      success:function(resp){
        if(resp == 1){
          location.href ='index.php?page=home';
        }else{
          $('.error').prepend('<div class="col-12 m-auto"><div class="alert text-danger text-center p-0">** Username or password is incorrect.</div></div>')
          end_load();

          $(".fw-normal").removeClass("mb-3 pb-3");
        }
      }
    })
  })
  })
</script>
<?php include 'footer.php' ?>

</body>
</html>
