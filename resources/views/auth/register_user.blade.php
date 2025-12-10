{{-- resources/views/auth/register_user.blade.php --}}
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <title>Register - Aquatic Plant Advisor</title>
  <link rel="stylesheet" href="{{ asset('assets/css/main.css') }}" />
  <script defer src="{{ asset('assets/js/main.js') }}"></script>
</head>
<body class="body-auth">

<div class="auth-card">
  <div class="logo" style="margin-bottom: 16px;">
    <div class="logo-icon"
         style="display:inline-block;width:24px;height:24px;border-radius:999px;
                background:linear-gradient(135deg,#22c55e,#0ea5e9);margin-right:6px;"></div>
    <span>Aquatic Plant Advisor</span>
  </div>

  <h1 class="auth-title">Create account</h1>
  <p class="auth-subtitle">Join the community and start tracking your tanks.</p>

  {{-- demo form, sau này gắn action / csrf / validate --}}
  <form id="form-register" novalidate>
    <div class="form-group">
      <label for="reg-name">Full name</label>
      <input
        type="text"
        id="reg-name"
        name="name"
        class="form-control"
        placeholder="Your name"
        required
      />
    </div>

    <div class="form-group">
      <label for="reg-email">Email</label>
      <input
        type="email"
        id="reg-email"
        name="email"
        class="form-control"
        placeholder="you@example.com"
        required
      />
    </div>

    <div class="form-group">
      <label for="reg-password">Password</label>
      <input
        type="password"
        id="reg-password"
        name="password"
        class="form-control"
        placeholder="At least 8 characters"
        required
      />
    </div>

    <div class="form-group">
      <label for="reg-password-confirm">Confirm password</label>
      <input
        type="password"
        id="reg-password-confirm"
        name="password_confirmation"
        class="form-control"
        placeholder="Re-type your password"
        required
      />
    </div>

    <button type="submit" class="btn btn-primary" style="width:100%;margin-top:4px;">
      Sign up
    </button>

    <div class="auth-footer">
      <div style="margin-top:6px;">
        Already have an account?
        <a href="{{ url('/login') }}">Login</a>
      </div>
    </div>
  </form>
</div>

</body>
</html>
