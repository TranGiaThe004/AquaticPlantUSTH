{{-- resources/views/common/home.blade.php --}}
@extends('layouts.site')

@section('title', 'Aquatic Plant Advisor – Home')
@section('nav_home_active', 'active')

@section('content')
  <!-- HERO -->
  <section class="hero">
    <div class="hero-left">
      <p class="hero-kicker">Smart assistant for aquarium lovers</p>
      <h1 class="hero-title">
        Design your dream <span>aquascape</span> with real-time guidance
      </h1>
      <p class="hero-text">
        Track water parameters, check plant requirements, ask experts and
        identify unknown plants – all in a single web app designed for planted tanks.
      </p>

      <div class="hero-cta">
        {{-- Đăng ký user --}}
        <a href="{{ url('/register') }}" class="btn-hero-primary">Start your first tank</a>

        {{-- Trang identify --}}
        <a href="{{ route('image.identify_plant') }}" class="btn-hero-secondary">
          Try plant identification
        </a>
      </div>

      <p class="hero-note">
        No installation needed. Works in your browser and syncs across devices.
      </p>
    </div>

    <!-- HERO STATS CARD -->
    <div class="hero-right">
      <div class="hero-card">
        <div class="hero-card-header">
          <span class="card-dot"></span>
          <span class="card-header-text">Live tank health overview*</span>
        </div>

        <div class="hero-stats-grid">
          <div class="hero-stat">
            <div class="hero-stat-label">Active tanks</div>
            <div class="hero-stat-value">12</div>
          </div>
          <div class="hero-stat">
            <div class="hero-stat-label">Plants in library</div>
            <div class="hero-stat-value">120+</div>
          </div>
          <div class="hero-stat">
            <div class="hero-stat-label">Water logs this week</div>
            <div class="hero-stat-value">48</div>
          </div>
          <div class="hero-stat">
            <div class="hero-stat-label">Community answers</div>
            <div class="hero-stat-value">320+</div>
          </div>
        </div>

        <p class="hero-quote">
          “Since using Aquatic Plant Advisor, my tanks stay stable and I can fix issues
          before plants melt or algae explode.”
        </p>
        <p class="hero-footnote">*Demo numbers for illustration.</p>
      </div>
    </div>
  </section>

  <!-- FEATURES -->
  <section class="features">
    <h2 class="features-title">Everything you need for a healthy planted tank</h2>
    <p class="features-text">
      From water monitoring to Q&amp;A with experts – all features are integrated around your tanks.
    </p>

    <div class="features-grid">
      <div class="feature-card">
        <h3>Smart tank monitoring</h3>
        <p>
          Log pH, temperature and nutrients, then receive instant advice
          if something goes outside the range your plants like.
        </p>
      </div>
      <div class="feature-card">
        <h3>Plant library &amp; care guides</h3>
        <p>
          Browse curated plant profiles with light, CO₂ and water
          parameters, then attach them directly to your tanks.
        </p>
      </div>
      <div class="feature-card">
        <h3>Community &amp; expert support</h3>
        <p>
          Ask questions, upload photos and receive best-answer feedback
          from experienced aquascapers and moderators.
        </p>
      </div>
    </div>
  </section>
@endsection
