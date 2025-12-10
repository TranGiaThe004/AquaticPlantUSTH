{{-- resources/views/tanks/my_tanks.blade.php --}}
@extends('layouts.site')

@section('title', 'My Tanks – Aquatic Plant Advisor')
@section('nav_tanks_active', 'active')

@section('content')
  <section class="section">
    <h1 class="section-title">My tanks</h1>
    <p class="section-subtitle">
      Manage all your planted tanks in one place. Create a tank, attach plants and track their water parameters over time.
    </p>

    <div class="page-actions" style="margin-bottom: 12px;">
      <button class="btn btn-primary"
              onclick="window.location.href='{{ route('tanks.tank_form') }}'">
        + Create new tank
      </button>
    </div>

    <section class="card">
      <div class="card-header card-header-inline">
        <div>
          <h2 class="card-title">Tank list</h2>
          <p class="card-subtitle">Quick overview of all tanks you are monitoring.</p>
        </div>
        <div>
          <input id="tank-search" class="form-control form-control-sm" placeholder="Search by name…">
        </div>
      </div>

      <div class="table-wrapper">
        <table class="table">
          <thead>
          <tr>
            <th style="width: 26%">Name</th>
            <th style="width: 18%">Size</th>
            <th style="width: 14%">Volume (L)</th>
            <th style="width: 14%">Created</th>
            <th style="width: 10%">Plants</th>
            <th>Actions</th>
          </tr>
          </thead>
          <tbody id="tank-table-body">
          <!-- demo rows – sau này sẽ lặp qua danh sách $tanks -->
          <tr>
            <td>60P Iwagumi</td>
            <td>60 × 30 × 36 cm</td>
            <td>~65</td>
            <td>2025-01-10</td>
            <td><span class="badge badge-soft-green">6 plants</span></td>
            <td>
              <div class="table-actions">
                <button class="btn btn-xs btn-secondary"
                        onclick="window.location.href='{{ route('tanks.tank_detail') }}'">
                  View
                </button>
                <button class="btn btn-xs btn-secondary"
                        onclick="window.location.href='{{ route('tanks.tank_form') }}'">
                  Edit
                </button>
                <button class="btn btn-xs btn-secondary"
                        onclick="window.location.href='{{ route('tanks.add_plant_to_tank') }}'">
                  Add plant
                </button>
                <button class="btn btn-xs btn-secondary">Delete</button>
              </div>
            </td>
          </tr>
          <tr>
            <td>Nano Shrimp Tank</td>
            <td>30 × 20 × 20 cm</td>
            <td>~12</td>
            <td>2025-02-02</td>
            <td><span class="badge badge-soft-green">3 plants</span></td>
            <td>
              <div class="table-actions">
                <button class="btn btn-xs btn-secondary"
                        onclick="window.location.href='{{ route('tanks.tank_detail') }}'">
                  View
                </button>
                <button class="btn btn-xs btn-secondary"
                        onclick="window.location.href='{{ route('tanks.tank_form') }}'">
                  Edit
                </button>
                <button class="btn btn-xs btn-secondary"
                        onclick="window.location.href='{{ route('tanks.add_plant_to_tank') }}'">
                  Add plant
                </button>
                <button class="btn btn-xs btn-secondary">Delete</button>
              </div>
            </td>
          </tr>
          </tbody>
        </table>
      </div>
    </section>
  </section>

  <script>
    // simple search filter demo
    const tankSearch = document.getElementById('tank-search');
    const tankTbody  = document.getElementById('tank-table-body');

    if (tankSearch && tankTbody) {
      tankSearch.addEventListener('input', function () {
        const term = this.value.toLowerCase();
        Array.from(tankTbody.rows).forEach(row => {
          const name = row.cells[0].textContent.toLowerCase();
          row.style.display = name.includes(term) ? '' : 'none';
        });
      });
    }
  </script>
@endsection
