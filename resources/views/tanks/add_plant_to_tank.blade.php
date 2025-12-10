{{-- resources/views/tanks/add_plant_to_tank.blade.php --}}
@extends('layouts.site')

@section('title', 'Add plant to tank – Aquatic Plant Advisor')
@section('nav_tanks_active', 'active')

@section('content')
  <section class="section">
    <h1 class="section-title">Add plant to tank</h1>
    <p class="section-subtitle">
      Tank: <strong>60P Iwagumi</strong>. Pick a plant from the library, then set the planting date and note.
    </p>

    <div class="grid-2" style="grid-template-columns: 2fr 1.3fr;">
      <!-- Library list -->
      <section class="card">
        <div class="card-header card-header-inline">
          <div>
            <h2 class="card-title">Plant library</h2>
            <p class="card-subtitle">Search curated plants and attach them to this tank.</p>
          </div>
          <input id="plant-search" class="form-control form-control-sm" placeholder="Search plant…">
        </div>

        <div class="table-wrapper">
          <table class="table" id="plant-table">
            <thead>
            <tr>
              <th style="width: 26%;">Plant</th>
              <th style="width: 14%;">Difficulty</th>
              <th style="width: 14%;">Light</th>
              <th style="width: 22%;">pH range</th>
              <th>Actions</th>
            </tr>
            </thead>
            <tbody>
            <tr data-plant-name="Micranthemum 'Monte Carlo'">
              <td>Micranthemum 'Monte Carlo'</td>
              <td><span class="badge badge-medium">Medium</span></td>
              <td><span class="badge badge-light-medium">Medium</span></td>
              <td>6.0 – 7.2</td>
              <td><button type="button" class="btn btn-xs btn-secondary select-plant">Select</button></td>
            </tr>
            <tr data-plant-name="Hemianthus callitrichoides 'Cuba'">
              <td>Hemianthus callitrichoides 'Cuba'</td>
              <td><span class="badge badge-hard">Hard</span></td>
              <td><span class="badge badge-light-high">High</span></td>
              <td>5.5 – 7.0</td>
              <td><button type="button" class="btn btn-xs btn-secondary select-plant">Select</button></td>
            </tr>
            <tr data-plant-name="Anubias nana petite">
              <td>Anubias nana petite</td>
              <td><span class="badge badge-easy">Easy</span></td>
              <td><span class="badge badge-light-low">Low</span></td>
              <td>6.0 – 7.5</td>
              <td><button type="button" class="btn btn-xs btn-secondary select-plant">Select</button></td>
            </tr>
            </tbody>
          </table>
        </div>
      </section>

      <!-- Placement form -->
      <section class="card">
        <h2 class="card-title">Plant placement</h2>
        <p class="card-subtitle">
          Confirm which plant you’re adding and when it was planted.
        </p>

        <div class="metric-item" style="margin-bottom:10px;">
          <div class="metric-label">Selected plant</div>
          <div id="selected-plant" class="metric-value" style="font-size:16px;">None selected</div>
        </div>

        <form>
          <div class="form-group">
            <label for="planted-at">Planted at</label>
            <input type="date" id="planted-at" class="form-control">
          </div>

          <div class="form-group">
            <label for="plant-position">Position (optional)</label>
            <input id="plant-position" class="form-control" placeholder="Foreground, midground, on wood…">
          </div>

          <div class="form-group">
            <label for="plant-note">Note (optional)</label>
            <textarea id="plant-note" rows="3" class="form-control"
                      placeholder="Special care notes, trimming schedule, etc."></textarea>
          </div>

          <div class="form-actions">
            <button type="submit" class="btn btn-primary">Add to tank</button>
            <button type="button" class="btn btn-secondary"
                    onclick="window.location.href='{{ url('/tanks/1') }}'">
              Cancel
            </button>
          </div>
        </form>
      </section>
    </div>
  </section>

  <script>
    // search filter in plant library
    const plantSearch = document.getElementById('plant-search');
    const plantTableBody = document.querySelector('#plant-table tbody');

    if (plantSearch) {
      plantSearch.addEventListener('input', function () {
        const term = this.value.toLowerCase();
        Array.from(plantTableBody.rows).forEach(row => {
          const name = row.dataset.plantName.toLowerCase();
          row.style.display = name.includes(term) ? '' : 'none';
        });
      });
    }

    // demo: clicking "Select" updates selected plant name
    const selectedLabel = document.getElementById('selected-plant');
    document.querySelectorAll('.select-plant').forEach(btn => {
      btn.addEventListener('click', () => {
        const row = btn.closest('tr');
        selectedLabel.textContent = row.dataset.plantName;
      });
    });
  </script>
@endsection
