{{-- resources/views/admin/plant_form.blade.php --}}
@extends('layouts.admin')

@section('title', 'Admin – Plant form')
@section('sidebar_plants_active', 'active')

@section('content')
  <div class="page-header">
    <div>
      <h1 class="page-title">Plant details</h1>
      <p class="page-subtitle">
        Create or update a plant in the master library used by all tanks and the image retrieval module.
      </p>
    </div>
    <div class="page-actions">
      <button class="btn btn-secondary"
              onclick="window.location.href='{{ url('/admin/plants') }}'">
        ← Back to plant list
      </button>
    </div>
  </div>

  <div class="page-content">
    <section class="card">
      <!-- dùng grid 2 cột cho gọn, giống user_form -->
      <form id="plantForm" class="form-grid-2">
        <!-- Cột trái: thông tin chung -->
        <div class="form-group">
          <label for="pl_name">Name *</label>
          <input type="text" id="pl_name" class="form-control"
                 placeholder="Example: Rotala rotundifolia">
        </div>

        <div class="form-group">
          <label for="pl_difficulty">Difficulty *</label>
          <select id="pl_difficulty" class="form-control">
            <option value="">-- Select difficulty --</option>
            <option value="easy">Easy</option>
            <option value="medium">Medium</option>
            <option value="hard">Hard</option>
          </select>
        </div>

        <div class="form-group form-group-full">
          <label for="pl_description">Short description</label>
          <textarea id="pl_description" rows="3" class="form-control"
                    placeholder="General description of the plant (growth form, color, etc.)."></textarea>
        </div>

        <div class="form-group form-group-full">
          <label for="pl_care">Care guide</label>
          <textarea id="pl_care" rows="6" class="form-control"
                    placeholder="Detailed notes about light, CO₂, trimming, fertilization..."></textarea>
        </div>

        <!-- Cột phải: thông số kỹ thuật + hình ảnh -->
        <div class="form-group">
          <label for="pl_light">Light level *</label>
          <select id="pl_light" class="form-control">
            <option value="">-- Select light level --</option>
            <option value="low">Low</option>
            <option value="medium">Medium</option>
            <option value="high">High</option>
          </select>
        </div>

        <div class="form-group">
          <label>pH range *</label>
          <div style="display:flex;gap:8px;">
            <input type="number" id="pl_ph_min" step="0.1" class="form-control"
                   placeholder="Min (e.g. 6.0)">
            <input type="number" id="pl_ph_max" step="0.1" class="form-control"
                   placeholder="Max (e.g. 7.5)">
          </div>
        </div>

        <div class="form-group">
          <label>Temperature range (°C) *</label>
          <div style="display:flex;gap:8px;">
            <input type="number" id="pl_temp_min" class="form-control"
                   placeholder="Min (e.g. 20)">
            <input type="number" id="pl_temp_max" class="form-control"
                   placeholder="Max (e.g. 28)">
          </div>
        </div>

        <div class="form-group">
          <label for="pl_image">Sample image</label>
          <input type="file" id="pl_image" class="form-control">
          <p style="font-size:12px;color:#6b7280;margin-top:4px;">
            JPG/PNG, &lt; 2MB. Used as reference in plant library and image retrieval.
          </p>
        </div>

        <!-- Hàng cuối: nút hành động, span full width -->
        <div class="form-actions">
          <button type="submit" class="btn btn-primary">Save plant</button>
          <button type="button" class="btn btn-secondary"
                  onclick="window.location.href='{{ url('/admin/plants') }}'">
            Cancel
          </button>
        </div>
      </form>
    </section>
  </div>
@endsection
