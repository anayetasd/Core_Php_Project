<div class="login-box" style="opacity:.8">
  <div class="card card-outline card-success">
    <div class="card-header text-center">
      <a href="#" class="h1"><b>E</b>RP Login</a>
      <div style="text-align:center;color:orange;font-weight:bold">
        <?php echo isset($error) ? $error : ""; ?>
      </div>
    </div>
    <div class="card-body">
<<<<<<< HEAD
      <p class="login-box-msg">Sign in to start your session</p>
      <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" autocomplete="off">
        
=======
      <p class="login-box-msg">Sign in to start your session</p>       
      <form action="<?php echo $_SERVER['PHP_SELF']?>" method="post" autocomplete="off">

>>>>>>> 117d8b9e25007b45fb9f0e7fc55c33ef9117707b
        <div class="input-group mb-3">
          <input type="text" class="form-control" value="anayet" name="username" id="txtUsername" placeholder="User name">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-envelope"></span>
            </div>
          </div>
        </div>

        <div class="input-group mb-3">
          <input type="password" class="form-control" value="111111" name="password" id="txtPassword" placeholder="Password">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>

        <div class="row">
          <div class="col-8">
            <div class="icheck-primary">
              <input type="checkbox" id="chkRemember">
              <label for="chkRemember">Remember Me</label>
            </div>
          </div>
          <div class="col-4">
            <button type="submit" name="SignIn" class="btn btn-primary btn-block">Sign In</button>
          </div>
        </div>
      </form>

      <p class="mb-1"><a href="forgot-password.html">I forgot my password</a></p>
      <p class="mb-0"><a href="register.html" class="text-center">Register a new membership</a></p>
    </div>
  </div>
</div>

<<<<<<< HEAD
<!-- ✅ এই JS অংশটি অবশ্যই body এর নিচে বা শেষে রাখো -->
<script>
  window.onload = function() {
    document.getElementById('txtUsername').value = 'anayet';
    document.getElementById('txtPassword').value = '111111';
  };
</script>
=======

<script>

  window.onload=function(){
    document.getElementById("txtUsername").value="anayet";
    document. getElementById("txtPassword").value="111111";
  };
</script>
>>>>>>> 117d8b9e25007b45fb9f0e7fc55c33ef9117707b
