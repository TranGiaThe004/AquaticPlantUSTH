{{-- resources/views/auth/login_admin.blade.php --}}
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Admin Login – Aquatic Plant Advisor</title>
  <link rel="stylesheet" href="{{ asset('assets/css/main.css') }}">
</head>
<body class="body-auth">

<div class="auth-card">
  <h1 style="margin-bottom:4px;">Admin console</h1>
  <p style="font-size:13px;color:#9ca3af;margin-bottom:18px;">
    Restricted area. Admin accounts only.
  </p>

  {{-- demo form --}}
  <form>
    <div class="form-group">
      <label>Admin Email</label>
      <input type="email" class="form-control" placeholder="admin@example.com">
    </div>
    <div class="form-group">
      <label>Password</label>
      <input type="password" class="form-control">
    </div>
    <button type="submit" class="btn btn-primary" style="width:100%;margin-top:4px;">
      Login to admin
    </button>
  </form>
</div>

</body>
</html>
