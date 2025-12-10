{{-- resources/views/monitoring/water_logs.blade.php --}}
@extends('layouts.site')

@section('title', 'Water monitoring')
@section('nav_tanks_active', 'active')

@section('content')

  {{-- Tank info --}}
  <section class="section" style="margin-top: 8px;">
    <p class="section-subtitle" style="margin-bottom: 4px;">
      Tank: <strong>60P Iwagumi</strong> – live water parameter tracking &amp; advisor.
    </p>
  </section>

  {{-- Header + back button --}}
  <section class="section">
    <div class="page-header">
      <div>
        <h1 class="page-title">Water monitoring</h1>
        <p class="page-subtitle">
          Log pH, temperature and nutrients, then receive instant advice when values drift
          outside your plants’ preferred range.
        </p>
      </div>
      <div class="page-actions">
        <button class="btn btn-secondary"
                onclick="window.location.href='{{ route('tanks.tank_detail') }}'">
          ← Back to tank
        </button>
      </div>
    </div>
  </section>

  {{-- FORM + QUICK STATS --}}
  <section class="section">
    <div class="grid-2">
      {{-- Card: Add water log --}}
      <section class="card">
        <div class="card-header">
          <h2 class="card-title">Add water log</h2>
          <p class="card-subtitle">Record today’s water parameters for this tank.</p>
        </div>

        <form id="form-water-log" class="form-grid-2">
          <div class="form-group">
            <label for="logged_at">Measured at</label>
            <input type="datetime-local" id="logged_at" class="form-control">
          </div>

          <div class="form-group">
            <label for="ph">pH</label>
            <input type="number" step="0.1" id="ph" class="form-control" placeholder="e.g. 6.5">
          </div>

          <div class="form-group">
            <label for="temp">Temperature (°C)</label>
            <input type="number" step="0.1" id="temp" class="form-control" placeholder="e.g. 24.5">
          </div>

          <div class="form-group">
            <label for="no3">NO₃ (ppm)</label>
            <input type="number" step="0.1" id="no3" class="form-control" placeholder="e.g. 10">
          </div>

          <div class="form-group">
            <label for="gh">GH (optional)</label>
            <input type="number" step="0.1" id="gh" class="form-control" placeholder="e.g. 6">
          </div>

          <div class="form-group">
            <label for="kh">KH (optional)</label>
            <input type="number" step="0.1" id="kh" class="form-control" placeholder="e.g. 3">
          </div>

          <div class="form-group form-group-full">
            <label for="note">Note (optional)</label>
            <textarea id="note" rows="2" class="form-control"
                      placeholder="Short note about water change, fertilizing, etc."></textarea>
          </div>

          <div class="form-actions">
            <button type="submit" class="btn btn-primary">Save log &amp; get advice</button>
            <button type="reset" class="btn btn-secondary">Reset</button>
          </div>
        </form>
      </section>

      {{-- Card: quick metrics --}}
      <section class="card card-metrics">
        <div class="card-header">
          <h2 class="card-title">Current status (demo)</h2>
          <p class="card-subtitle">Simple summary from recent logs.</p>
        </div>

        <div class="metrics-row">
          <div class="metric-item">
            <div class="metric-label">Avg pH (7 days)</div>
            <div class="metric-value">6.6</div>
            <div class="metric-chip ok">Within range</div>
          </div>
          <div class="metric-item">
            <div class="metric-label">Temp range</div>
            <div class="metric-value">23.8 – 24.7 °C</div>
            <div class="metric-chip ok">Stable</div>
          </div>
          <div class="metric-item">
            <div class="metric-label">NO₃ today</div>
            <div class="metric-value">12 ppm</div>
            <div class="metric-chip warn">Slightly high</div>
          </div>
        </div>

        <p class="metric-note">
          *Data is static demo. In the real app these values will come from AdvisorService
          based on your actual logs.
        </p>
      </section>
    </div>
  </section>

  {{-- HISTORY TABLE --}}
  <section class="section">
    <section class="card">
      <div class="card-header card-header-inline">
        <div>
          <h2 class="card-title">Water log history</h2>
          <p class="card-subtitle">Last measurements for this tank.</p>
        </div>
        <div class="waterlog-filters">
          <select class="form-control form-control-sm">
            <option>Last 7 days</option>
            <option>Last 30 days</option>
            <option>All logs</option>
          </select>
        </div>
      </div>

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

  {{-- CHART --}}
  <section class="section">
    <section class="card card-chart">
      <div class="card-header">
        <h2 class="card-title">Water parameters chart (demo)</h2>
        <p class="card-subtitle">
          Visualizing how pH, temperature and NO₃ change over time.
        </p>
      </div>
      <div class="chart-container">
        <canvas id="waterlogChart"></canvas>
      </div>
    </section>
  </section>

  {{-- Script Chart.js (CDN) + init --}}
  <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
  <script>
    document.addEventListener('DOMContentLoaded', function () {
      const ctx = document.getElementById('waterlogChart');
      if (!ctx) return;

      new Chart(ctx, {
        type: 'line',
        data: {
          labels: ['02-02', '02-05', '02-08'],
          datasets: [
            {
              label: 'pH',
              data: [6.7, 6.5, 6.6],
              yAxisID: 'y1'
            },
            {
              label: 'Temp (°C)',
              data: [23.9, 24.1, 24.3],
              yAxisID: 'y2'
            },
            {
              label: 'NO₃ (ppm)',
              data: [9, 10, 12],
              yAxisID: 'y3'
            }
          ]
        },
        options: {
          responsive: true,
          scales: {
            y1: { position: 'left', display: true },
            y2: { position: 'right', display: false },
            y3: { position: 'right', display: false }
          }
        }
      });
    });
  </script>

@endsection
