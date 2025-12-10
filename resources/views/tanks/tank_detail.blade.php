{{-- resources/views/tanks/tank_detail.blade.php --}}
@extends('layouts.site')

@section('title', 'Tank detail – Aquatic Plant Advisor')
@section('nav_tanks_active', 'active')

@section('content')
  <section class="section">
    <h1 class="section-title">60P Iwagumi</h1>
    <p class="section-subtitle">
      High-light CO₂ tank focused on carpeting plants and stones. Below is an overview of plants and water history.
    </p>

    <!-- Tank summary card -->
    <section class="card-soft" style="margin-bottom: 18px;">
      <div class="grid-2" style="grid-template-columns: 1.8fr 1.2fr;">
        <div>
          <h3 class="card-title">Tank setup</h3>
          <p class="card-subtitle">Basic configuration and notes.</p>
          <ul class="simple-list" style="margin-top: 6px;">
            <li><strong>Size:</strong> 60 × 30 × 36 cm (~65 L)</li>
            <li><strong>Substrate:</strong> ADA Amazonia + cosmetic sand</li>
            <li><strong>Light:</strong> Chihiros WRGB II 60 – 6h/day</li>
            <li><strong>CO₂:</strong> Pressurized, 1 bps</li>
          </ul>
        </div>
        <div>
          <h3 class="card-title">Health snapshot (demo)</h3>
          <p class="card-subtitle">Latest 7-day averages.</p>
          <div class="metrics-row">
            <div class="metric-item">
              <div class="metric-label">Avg pH</div>
              <div class="metric-value">6.6</div>
              <span class="metric-chip ok">Within range for all plants</span>
            </div>
            <div class="metric-item">
              <div class="metric-label">Temperature</div>
              <div class="metric-value">24.2 °C</div>
              <span class="metric-chip ok">Stable</span>
            </div>
            <div class="metric-item">
              <div class="metric-label">NO₃ trend</div>
              <div class="metric-value">10 → 15 ppm</div>
              <span class="metric-chip warn">Slightly rising</span>
            </div>
          </div>
        </div>
      </div>
    </section>

    <!-- Tabs -->
    <div class="tabs">
      <button class="tab-link active" data-tab="plants">Plants in this tank</button>
      <button class="tab-link" data-tab="water">Water overview</button>
    </div>

    <!-- Tab: plants -->
    <section id="tab-plants" class="tab-panel active">
      <section class="card">
        <div class="card-header card-header-inline">
          <div>
            <h2 class="card-title">Plants currently in this tank</h2>
            <p class="card-subtitle">
              Attached from the master plant library. Use this list to track requirements and growth.
            </p>
          </div>
          <div class="page-actions">
            <button class="btn btn-primary"
                    onclick="window.location.href='{{ route('tanks.add_plant_to_tank') }}'">
              + Add plant
            </button>
          </div>
        </div>

        <div class="table-wrapper">
          <table class="table">
            <thead>
            <tr>
              <th style="width: 24%;">Plant</th>
              <th style="width: 16%;">Position</th>
              <th style="width: 14%;">Difficulty</th>
              <th style="width: 18%;">Added</th>
              <th>Notes</th>
            </tr>
            </thead>
            <tbody>
            <tr>
              <td>Micranthemum 'Monte Carlo'</td>
              <td>Foreground carpet</td>
              <td><span class="badge badge-medium">Medium</span></td>
              <td>2025-01-15</td>
              <td>Primary carpet; trimmed every 2 weeks.</td>
            </tr>
            <tr>
              <td>Eleocharis acicularis mini</td>
              <td>Foreground / mid</td>
              <td><span class="badge badge-hard">Hard</span></td>
              <td>2025-01-20</td>
              <td>Requires higher CO₂; watch for melting.</td>
            </tr>
            <tr>
              <td>Anubias nana petite</td>
              <td>On stones</td>
              <td><span class="badge badge-easy">Easy</span></td>
              <td>2025-01-25</td>
              <td>Low light tolerant; avoid burying rhizome.</td>
            </tr>
            </tbody>
          </table>
        </div>
      </section>
    </section>

    <!-- Tab: water -->
    <section id="tab-water" class="tab-panel">
      <section class="card">
        <div class="card-header card-header-inline">
          <div>
            <h2 class="card-title">Water logs &amp; charts</h2>
            <p class="card-subtitle">
              View the detailed table and chart of this tank’s water parameters.
            </p>
          </div>
          <div class="page-actions">
            <button class="btn btn-secondary"
                    onclick="window.location.href='{{ route('plantlog.plant_logs_list') }}'">
              Plant growth log
            </button>
            <button class="btn btn-primary"
                    onclick="window.location.href='{{ route('monitoring.water_logs') }}'">
              Open water monitoring
            </button>
          </div>
        </div>

        <p style="font-size: 14px; color:#4b5563; margin-bottom:10px;">
          This demo view shows a compact summary. The full monitoring page lets you add new logs
          and see line charts for pH, temperature and NO₃ over time.
        </p>

        <div class="table-wrapper">
          <table class="table">
            <thead>
            <tr>
              <th>Measured at</th>
              <th>pH</th>
              <th>Temp (°C)</th>
              <th>NO₃ (ppm)</th>
              <th>GH</th>
              <th>KH</th>
              <th>Note</th>
            </tr>
            </thead>
            <tbody>
            <tr>
              <td>2025-02-08 21:00</td>
              <td>6.6</td>
              <td>24.3</td>
              <td>12</td>
              <td>6</td>
              <td>3</td>
              <td>Weekly water change</td>
            </tr>
            <tr>
              <td>2025-02-05 21:15</td>
              <td>6.5</td>
              <td>24.1</td>
              <td>10</td>
              <td>6</td>
              <td>3</td>
              <td>Added fertilizer</td>
            </tr>
            <tr>
              <td>2025-02-02 20:50</td>
              <td>6.7</td>
              <td>23.9</td>
              <td>9</td>
              <td>6</td>
              <td>3</td>
              <td>All good</td>
            </tr>
            </tbody>
          </table>
        </div>
      </section>
    </section>
  </section>

  <script>
    // Simple tab switching
    const tabButtons = document.querySelectorAll('.tab-link');
    const tabPanels  = {
      plants: document.getElementById('tab-plants'),
      water:  document.getElementById('tab-water')
    };

    tabButtons.forEach(btn => {
      btn.addEventListener('click', () => {
        const target = btn.dataset.tab;

        tabButtons.forEach(b => b.classList.remove('active'));
        btn.classList.add('active');

        Object.keys(tabPanels).forEach(key => {
          tabPanels[key].classList.toggle('active', key === target);
        });
      });
    });
  </script>
@endsection
