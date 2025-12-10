{{-- resources/views/layouts/site.blade.php --}}
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>@yield('title', 'Aquatic Plant Advisor')</title>
  <link rel="stylesheet" href="{{ asset('assets/css/main.css') }}">
</head>
<body class="landing-body">

<header class="landing-header">
  <div class="landing-header-inner">
    <div class="landing-logo">
      <span class="logo-badge">AQ</span>
      <span class="logo-text">Aquatic Plant Advisor</span>
    </div>

    <nav class="landing-nav">
      <a href="{{ route('home') }}"
         class="nav-link @yield('nav_home_active')">
        Home
      </a>

      <a href="{{ route('tanks.my_tanks') }}"
         class="nav-link @yield('nav_tanks_active')">
        My Tanks
      </a>

      <a href="{{ route('qa.questions_list') }}"
         class="nav-link @yield('nav_qa_active')">
        Q&amp;A
      </a>

      <a href="{{ route('community.posts_list') }}"
         class="nav-link @yield('nav_com_active')">
        Community
      </a>

      <a href="{{ route('image.identify_plant') }}"
         class="nav-link @yield('nav_identify_active')">
        Identify
      </a>
    </nav>

    <div class="landing-auth">
      <a href="{{ url('/login') }}"    class="btn-nav">Login</a>
      <a href="{{ url('/register') }}" class="btn-nav btn-nav-primary">Sign up free</a>
    </div>
  </div>
</header>

<main class="landing-main">
  @yield('content')
</main>

<footer class="landing-footer">
  <div class="landing-footer-inner">
    <span>© {{ date('Y') }} Aquatic Plant Advisor. All rights reserved.</span>
    <span class="footer-links">
      <a href="#">Terms</a>
      <a href="#">Privacy</a>
    </span>
  </div>
</footer>

</body>
</html>
