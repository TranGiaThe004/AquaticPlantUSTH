{{-- resources/views/layouts/admin.blade.php --}}
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>@yield('title', 'Admin – Aquatic Plant Advisor')</title>
  <link rel="stylesheet" href="{{ asset('assets/css/main.css') }}">
  <script defer src="{{ asset('assets/js/main.js') }}"></script>
</head>
<body class="app">

<header class="app-header">
  <div class="logo">Aquatic Plant Advisor – Admin</div>
  <div class="header-right">
    <span class="user-name">Admin</span>
    <div class="user-menu">
      <img src="{{ asset('assets/img/avatar-default.png') }}" class="avatar" alt="Admin avatar">
      <span class="user-menu-arrow">▼</span>
    </div>
  </div>
</header>

<div class="app-body">
  <aside class="sidebar">
    <nav>
      <div class="sidebar-section">ADMIN</div>
      <a href="{{ url('/admin/dashboard') }}"
         class="sidebar-link @yield('sidebar_dashboard_active')">
        Dashboard
      </a>

      <div class="sidebar-section">Users &amp; access</div>
      <a href="{{ url('/admin/users') }}"
         class="sidebar-link @yield('sidebar_users_active')">
        Users &amp; roles
      </a>

      <div class="sidebar-section">Content</div>
      <a href="{{ url('/admin/qa') }}"
         class="sidebar-link @yield('sidebar_qa_active')">
        Q&amp;A moderation
      </a>
      <a href="{{ url('/admin/community-posts') }}"
         class="sidebar-link @yield('sidebar_posts_active')">
        Community posts
      </a>

      <div class="sidebar-section">Domain data</div>
      <a href="{{ url('/admin/plants') }}"
         class="sidebar-link @yield('sidebar_plants_active')">
        Plant library
      </a>
    </nav>
  </aside>

  <main class="content">
    @yield('content')
  </main>
</div>

</body>
</html>
