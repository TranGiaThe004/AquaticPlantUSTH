{{-- resources/views/auth/forgot_password.blade.php --}}
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <title>Forgot Password - Aquatic Plant Advisor</title>
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

  <h1 class="auth-title">Reset password</h1>
  <p class="auth-subtitle">
    Enter the email associated with your account and we'll send you a reset link.
  </p>

  {{-- demo form --}}
  <form id="form-forgot" novalidate>
    <div class="form-group">
      <label for="forgot-email">Email</label>
      <input
        type="email"
        id="forgot-email"
        name="email"
        class="form-control"
        placeholder="you@example.com"
        required
      />
    </div>

    <button type="submit" class="btn btn-primary" style="width:100%;margin-top:4px;">
      Send reset link
    </button>

    <div class="auth-footer">
      <div style="margin-top:6px;">
        Remember your password?
        <a href="{{ url('/login') }}">Back to login</a>
      </div>
    </div>
  </form>
</div>

</body>
</html>
