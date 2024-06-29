<html>
<head>
<meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  
    <!-- Bootstrap css CDN link -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

    <!-- Awesome Fonts CDN link -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <!-- Stylesheet link -->
    <link rel="stylesheet" href="style.css">
  <script>
    function show() {
  let y = document.getElementById("password");
  if (y.type === "password") {
    y.type = "text";
  } else {
    y.type = "password";
  }
}
</script>
<?php
include 'connect.php';
?>
</head>

<body>
<section class="p-3 p-md-4 p-xl-5">
  <div class="container justify-content-center w-50">
        <div class="card border-dark-subtle shadow-sm ">
                <div class="card-body p-3 p-md-4 p-xl-5">
                      <div class="mb-5">
                        <h4 class="text-center">Register to Unknown Gamers</h4>
                      </div>

                  <form name="m" method="post" action="sign_up.php">
                    <div class="row overflow-hidden">
                      <div class="col-12">
                        <div class="form-floating mb-3">
                          <input type="text" class="form-control" name="username" id="username" value="" placeholder="Username" 
                          required onkeypress="return alpha(event)" maxlength="25">
                          <label for="username" class="form-label">Username</label>
                        </div>

                        <div class="form-floating mb-3">
                          <input type="text" class="form-control" name="email" id="email" value="" placeholder="email" 
                          required onkeypress="return alpha(event)" maxlength="25">
                          <label for="username" class="form-label">Email</label>
                        </div>

                      </div>
                      <div class="col-12">
                        <div class="form-floating mb-3">
                          <input type="password" class="form-control" name="password" id="password" value="" placeholder="Password" 
                          required onkeypress="return alpha(event)" maxlength="25">
                          <label for="password" class="form-label">Password</label>
                          <div class="invalid-feedback">Please fill out this field</div>
                        </div>

                        <div class="form-floating mb-3">
                          <input type="password" class="form-control" name="cpassword" id="cpassword" value="" placeholder="Password" 
                          required onkeypress="return alpha(event)" maxlength="25">
                          <label for="password" class="form-label">Confirm Password</label>
                          <div class="invalid-feedback">Please fill out this field</div>
                        </div>

                        <div class="pb-3">
                                <input type="checkbox" class="form-check-input" onclick="show()">
                                <label class="form-check-label">Show Password</label>
                        </div>      
                      </div>

                      <div class="col-12">
                        <div class="d-grid">
                          <input type="submit" class="btn btn-dark btn-lg" name="btn" value="Register">
                        </div>
                      </div>
                    </div>
                  </form>
    </div>

</section>
</body>
</html>