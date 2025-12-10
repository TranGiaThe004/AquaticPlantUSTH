{{-- resources/views/auth/login_user.blade.php --}}
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>User Login – Aquatic Plant Advisor</title>
  <link rel="stylesheet" href="{{ asset('assets/css/main.css') }}">
</head>
<body class="body-auth">

<div class="auth-card">
  <h1 style="margin-bottom:4px;">Welcome back</h1>
  <p style="font-size:13px;color:#9ca3af;margin-bottom:18px;">
    Log in to manage your tanks and join the community.
  </p>

  {{-- demo form --}}
  <form>
    <div class="form-group">
      <label>Email</label>
      <input type="email" class="form-control" placeholder="you@example.com">
    </div>
    <div class="form-group">
      <label>Password</label>
      <input type="password" class="form-control" placeholder="••••••••">
    </div>
    <div class="form-group" style="display:flex;justify-content:space-between;align-items:center;">
      <label style="font-size:13px;">
        <input type="checkbox"> Remember me
      </label>
      <a href="{{ url('/forgot-password') }}" style="font-size:13px;color:#38bdf8;">
        Forgot password?
      </a>
    </div>
    <button type="submit" class="btn btn-primary" style="width:100%;margin-top:4px;">
      Login
    </button>
  </form>

  <p style="margin-top:14px;font-size:13px;color:#9ca3af;">
    New here?
    <a href="{{ url('/register') }}" style="color:#f97316;">Create an account</a>
  </p>
</div>

</body>
</html>
