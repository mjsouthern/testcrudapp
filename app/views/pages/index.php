<?php require APPROOT . '/views/inc/header.php'; ?>
<body>
<div class="container">
<div class="login-box">
  <div class="login-logo">
    <h2>Welcome to Simple MVC CRUD App using PHP</h2>
  </div>

  <div class="card">
    <div class="card-body login-card-body">
      <p class="login-box-msg"><b>LOG-IN</b></p>

      <form action="<?php echo URLROOT ;?>/users/login" method="post">
        <div class="input-group mb-3">
          <input type="username" name="username" class="form-control <?php echo (!empty($data['username_err'])) ? 'is-invalid' : '' ;?>" value="<?php echo $data['username'] ;?>" placeholder="Username">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-user"></span>
            </div>
          </div>
          <span class="invalid-feedback"><?php echo $data['username_err'] ;?> </span>
        </div>  
        <div class="input-group mb-3">
          <input type="password" name="password" class="form-control <?php echo (!empty($data['password_err'])) ? 'is-invalid' : '' ;?>" value="<?php echo $data['password'] ;?>" placeholder="Password">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
          <span class="invalid-feedback"><?php echo $data['password_err'] ;?> </span>
        </div>

      
      <div class="social-auth-links text-center mb-3">
        <input type="submit" class="btn btn-block btn-primary" value="Login"> 
        <input type="reset" class="btn btn-block btn-danger" value="Cancel">
    
      </div>

      </form>

    </div>

  </div>
</div>
</div>
</body>
<?php require APPROOT . '/views/inc/footer.php'; ?>
