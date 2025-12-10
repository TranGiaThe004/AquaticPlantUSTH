{{-- resources/views/plantlog/plant_log_form.blade.php --}}
@extends('layouts.site')

@section('title', 'Add plant growth log')

@section('content')
  <section class="section">
    <h1 class="section-title">Add plant growth log</h1>
    <p class="section-subtitle">
      Log the current height, health status and a quick photo of your plant.
    </p>

    <div class="card-soft" style="margin-top: 12px;">
      <div class="pl-header" style="margin-bottom: 10px;">
        <h2>60P Iwagumi — Micranthemum sp. "Monte Carlo"</h2>
        <p class="pl-meta">
          This is a static prototype. In the real app it will be tied to the plant
          you selected in your tank.
        </p>
      </div>

      <form id="plantLogForm" enctype="multipart/form-data">
        <div class="grid-2">
          <div class="form-group">
            <label for="log_date">Date *</label>
            <input type="date" id="log_date" class="form-control">
          </div>

          <div class="form-group">
            <label for="log_height">Height (cm)</label>
            <input type="number" step="0.1" id="log_height"
                   class="form-control" placeholder="e.g. 4.5">
          </div>

          <div class="form-group">
            <label for="log_status">Status *</label>
            <select id="log_status" class="form-control">
              <option value="">-- Select status --</option>
              <option value="healthy">Healthy / spreading well</option>
              <option value="slow">Slow growth</option>
              <option value="melting">Melting / yellowing</option>
              <option value="algae">Affected by algae</option>
            </select>
          </div>

          <div class="form-group">
            <label for="log_image">Photo (optional)</label>
            <input type="file" id="log_image" class="form-control">
          </div>
        </div>

        <div class="form-group">
          <label for="log_note">Note</label>
          <textarea id="log_note" rows="4" class="form-control"
                    placeholder="Short notes: trimming, replanting, fertilizer changes, etc."></textarea>
        </div>

        <div class="form-actions">
          <button type="submit" class="btn btn-primary">Save log</button>
          <button type="button" class="btn btn-secondary"
                  onclick="window.location.href='{{ route('plantlog.plant_logs_list') }}'">
            Cancel
          </button>
        </div>
      </form>
    </div>
  </section>

  {{-- Extra quick links giống footer cũ --}}
  <section class="section">
    <div class="card-soft"
         style="display:flex;justify-content:space-between;align-items:center;">
      <div>
        <div class="card-title">Navigation</div>
        <p class="card-subtitle">
          Jump back to the plant log or the overall tank overview.
        </p>
      </div>
      <div>
        <button class="btn btn-secondary"
                onclick="window.location.href='{{ route('plantlog.plant_logs_list') }}'">
          ← Back to plant log
        </button>
        <button class="btn btn-primary"
                onclick="window.location.href='{{ route('tanks.tank_detail') }}'">
          Tank overview
        </button>
      </div>
    </div>
  </section>
@endsection
