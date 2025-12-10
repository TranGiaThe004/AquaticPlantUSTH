{{-- resources/views/plantlog/plant_logs_list.blade.php --}}
@extends('layouts.site')

@section('title', 'Plant growth log')
@section('nav_tanks_active', 'active')

@section('content')

  {{-- Tank / plant header --}}
  <section class="section" style="margin-top: 8px;">
    <p class="section-subtitle" style="margin-bottom: 4px;">
      Tank: <strong>60P Iwagumi</strong> ·
      Plant: <strong>Micranthemum sp. "Monte Carlo"</strong>
    </p>
  </section>

  {{-- Title + toolbar --}}
  <section class="section">
    <h1 class="section-title">Plant growth log</h1>
    <p class="section-subtitle">
      Track height and health status of each plant in your tank over time.
    </p>

    <div class="admin-toolbar">
      <div class="admin-toolbar-left">
        <select class="form-control" style="max-width: 260px;">
          <option>Monte Carlo (foreground carpet)</option>
          <option>Rotala rotundifolia (background stem)</option>
          <option>Eleocharis parvula (hair grass)</option>
        </select>
      </div>
      <div class="admin-toolbar-right">
        <select class="form-control form-control-sm" style="width: 150px;">
          <option>Last 30 days</option>
          <option>Last 90 days</option>
          <option>All logs</option>
        </select>
        <button class="btn btn-primary"
                onclick="window.location.href='{{ route('plantlog.plant_log_form') }}'">
          + Add log
        </button>
      </div>
    </div>
  </section>

  {{-- Table logs --}}
  <section class="section">
    <div class="card-soft">
      <h2 class="card-title" style="margin-bottom: 6px;">Recent logs</h2>
      <p class="card-subtitle">
        Use this log to see how the plant responds to changes in light, CO₂ and fertilizing.
      </p>

      <div class="table-wrapper" style="margin-top: 10px;">
        <table class="table">
          <thead>
          <tr>
            <th>Date</th>
            <th>Height (cm)</th>
            <th>Status</th>
            <th>Note</th>
            <th>Photo</th>
            <th>Actions</th>
          </tr>
          </thead>
          <tbody>
          <tr>
            <td>2025-02-08</td>
            <td>4.5</td>
            <td><span class="pl-status-chip pl-status-healthy">Healthy</span></td>
            <td>Carpet filling in nicely, no algae.</td>
            <td>
              <img src="{{ asset('assets/img/demo_plantlog_01.jpg') }}"
                   alt="plant" class="table-img">
            </td>
            <td class="table-actions">
              <button class="btn btn-secondary btn-xs"
                      onclick="window.location.href='{{ route('plantlog.plant_log_form') }}'">
                Edit
              </button>
              <button class="btn btn-secondary btn-xs btn-danger-soft">Delete</button>
            </td>
          </tr>
          <tr>
            <td>2025-02-01</td>
            <td>3.8</td>
            <td><span class="pl-status-chip pl-status-warning">Slow growth</span></td>
            <td>Lower CO₂ last week, trimmed lightly.</td>
            <td>
              <img src="{{ asset('assets/img/demo_plantlog_02.jpg') }}"
                   alt="plant" class="table-img">
            </td>
            <td class="table-actions">
              <button class="btn btn-secondary btn-xs"
                      onclick="window.location.href='{{ route('plantlog.plant_log_form') }}'">
                Edit
              </button>
              <button class="btn btn-secondary btn-xs btn-danger-soft">Delete</button>
            </td>
          </tr>
          <tr>
            <td>2025-01-24</td>
            <td>2.5</td>
            <td><span class="pl-status-chip pl-status-poor">Melting</span></td>
            <td>Just planted, some melting after transition.</td>
            <td>
              <img src="{{ asset('assets/img/demo_plantlog_03.jpg') }}"
                   alt="plant" class="table-img">
            </td>
            <td class="table-actions">
              <button class="btn btn-secondary btn-xs"
                      onclick="window.location.href='{{ route('plantlog.plant_log_form') }}'">
                Edit
              </button>
              <button class="btn btn-secondary btn-xs btn-danger-soft">Delete</button>
            </td>
          </tr>
          </tbody>
        </table>
      </div>
    </div>
  </section>

  {{-- Back links --}}
  <section class="section">
    <div class="card-soft"
         style="display:flex;justify-content:space-between;align-items:center;">
      <div>
        <div class="card-title">Back to tank monitoring</div>
        <p class="card-subtitle">
          Switch to water parameters history and AI advisory for this tank.
        </p>
      </div>
      <div>
        <button class="btn btn-secondary"
                onclick="window.location.href='{{ route('monitoring.water_logs') }}'">
          ← Water logs
        </button>
        <button class="btn btn-primary"
                onclick="window.location.href='{{ route('tanks.tank_detail') }}'">
          View tank overview
        </button>
      </div>
    </div>
  </section>

@endsection
