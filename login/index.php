<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="generator" content="Jekyll v4.1.1">
    <title>Login</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/4.5/examples/floating-labels/">

    <!-- Bootstrap core CSS -->
<link href="assets/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
.form-signin {
  background-color: #f5f5f5;
  padding: 2rem;
  border-radius: 0.5rem;
  box-shadow: 0 0.25rem 0.5rem rgba(0, 0, 0, 0.1);
}

.form-signin .form-label-group {
  margin-bottom: 1rem;
}

.form-signin .form-control {
  background-color: #fff;
  border: 1px solid #ced4da;
  border-radius: 0.25rem;
  padding: 0.5rem 0.75rem;
  font-size: 1rem;
  line-height: 1.5;
  transition: border-color 0.15s ease-in-out, box-shadow 0.15s ease-in-out;
}

.form-signin .form-control:focus {
  border-color: #80bdff;
  box-shadow: 0 0 0 0.2rem rgba(0, 123, 255, 0.25);
}

.form-signin .btn-lg {
  padding: 0.75rem 1.5rem;
  font-size: 1.25rem;
  border-radius: 0.5rem;
}

.form-signin .btn-lg:hover {
  background-color: #e8e8e8;
}
    </style>
    <!-- Custom styles for this template -->
    <link href="assets/dist/css/floating-labels.css" rel="stylesheet">
  </head>
  <body> 
    <form class="form-signin" method="POST" action="ceklogin.php">
  <div class="text-center mb-4">
    <h1 class="h3 mb-3 font-weight-normal">Form Login</h1>
    <p>Masukkan Username dan Password Anda</p>
  </div>

  <div class="form-label-group">
    <input type="text" class="form-control" name="username" placeholder="Masukkan Username Anda" required autofocus>
    <label>Username</label>
  </div>

  <div class="form-label-group">
    <input type="password" class="form-control" name="password" placeholder="Masukkan Password Anda" required autofocus>
    <label>Password</label>
  </div>

  <div class="checkbox mb-3">
    <label>
      <input type="checkbox" value="remember-me"> Remember me
    </label>
  </div>
  <button class="btn btn-lg btn-primary btn-block" type="submit">Sign in</button>
  <p class="mt-5 mb-3 text-muted text-center">&copy; 2024-<?=date('Y')?></p>
</form>
</body>
</html>
