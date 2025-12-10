{{-- resources/views/tanks/tank_form.blade.php --}}
@extends('layouts.site')

@section('title', 'Create / Edit Tank – Aquatic Plant Advisor')
@section('nav_tanks_active', 'active')

@section('content')
  <section class="section">
    <h1 class="section-title">Create a new tank</h1>
    <p class="section-subtitle">
      Define the basic setup for your aquarium: size, substrate, light and CO₂. You can attach plants and logs later.
    </p>

    <section class="card">
      <form class="form-grid-2">
        <!-- left column -->
        <div class="form-group">
          <label for="tank-name">Tank name</label>
          <input id="tank-name" class="form-control" placeholder="e.g. 60P Iwagumi">
        </div>

        <div class="form-group">
          <label for="tank-size">Size (L × W × H in cm)</label>
          <input id="tank-size" class="form-control" placeholder="e.g. 60 × 30 × 36">
        </div>

        <div class="form-group">
          <label for="tank-volume">Volume (L)</label>
          <input id="tank-volume" type="number" step="0.1" class="form-control" placeholder="e.g. 64">
        </div>

        <div class="form-group">
          <label for="tank-substrate">Substrate</label>
          <input id="tank-substrate" class="form-control" placeholder="e.g. ADA Amazonia, sand, etc.">
        </div>

        <div class="form-group">
          <label for="tank-light">Light</label>
          <input id="tank-light" class="form-control" placeholder="e.g. Chihiros WRGB II 60">
        </div>

        <div class="form-group">
          <label for="tank-co2">CO₂</label>
          <select id="tank-co2" class="form-control">
            <option>Pressurized CO₂ system</option>
            <option>Liquid carbon only</option>
            <option>No CO₂</option>
          </select>
        </div>

        <div class="form-group form-group-full">
          <label for="tank-desc">Description / notes (optional)</label>
          <textarea id="tank-desc" rows="3" class="form-control"
                    placeholder="Short description of hardscape, livestock or goals for this tank."></textarea>
        </div>

        <div class="form-actions">
          <button type="submit" class="btn btn-primary">Save tank</button>
          <button type="button" class="btn btn-secondary"
                  onclick="window.location.href='{{ url('/tanks') }}'">
            Cancel
          </button>
        </div>
      </form>
    </section>
  </section>
@endsection
