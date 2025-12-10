{{-- resources/views/admin/plants_list.blade.php --}}
@extends('layouts.admin')

@section('title', 'Admin – Plant Library')
@section('sidebar_plants_active', 'active')

@section('content')
  <div class="page-header">
    <div>
      <h1 class="page-title">Master Plant Library</h1>
      <p class="page-subtitle">
        Central list of plants used by all tanks and the image retrieval module.
      </p>
    </div>
    <div class="page-actions">
      <button
        class="btn btn-primary"
        onclick="window.location.href='{{ url('/admin/plants/create') }}'">
        + Add new plant
      </button>
    </div>
  </div>

  <div class="page-content">
    <!-- Filters -->
    <div class="admin-toolbar">
      <div class="admin-toolbar-left">
        <input
          type="text"
          class="form-control admin-search"
          id="plantSearchInput"
          placeholder="Search by name..."
        >
      </div>
      <div class="admin-toolbar-right">
        <select id="filterDifficulty" class="form-control" style="width:150px;">
          <option value="">All difficulty</option>
          <option value="easy">Easy</option>
          <option value="medium">Medium</option>
          <option value="hard">Hard</option>
        </select>
        <select id="filterLight" class="form-control" style="width:150px;">
          <option value="">All light levels</option>
          <option value="low">Low</option>
          <option value="medium">Medium</option>
          <option value="high">High</option>
        </select>
      </div>
    </div>

    <!-- Table -->
    <section class="card">
      <div class="table-wrapper">
        <table class="table" id="plantTable">
          <thead>
          <tr>
            <th>Name</th>
            <th>Difficulty</th>
            <th>Light</th>
            <th>pH range</th>
            <th>Temp (°C)</th>
            <th>Actions</th>
          </tr>
          </thead>
          <tbody>
          <tr data-difficulty="easy" data-light="low">
            <td>Microsorum pteropus (Java fern)</td>
            <td><span class="badge badge-easy">Easy</span></td>
            <td><span class="badge badge-light-low">Low–Medium</span></td>
            <td>6.0 – 7.5</td>
            <td>20 – 28</td>
            <td>
              <button
                class="btn btn-secondary btn-xs"
                onclick="window.location.href='{{ url('/admin/plants/create') }}'">
                Edit
              </button>
              <button class="btn btn-secondary btn-xs btn-danger-soft">
                Delete
              </button>
            </td>
          </tr>

          <tr data-difficulty="medium" data-light="medium">
            <td>Rotala rotundifolia</td>
            <td><span class="badge badge-medium">Medium</span></td>
            <td><span class="badge badge-light-medium">Medium–High</span></td>
            <td>6.0 – 7.5</td>
            <td>22 – 28</td>
            <td>
              <button
                class="btn btn-secondary btn-xs"
                onclick="window.location.href='{{ url('/admin/plants/create') }}'">
                Edit
              </button>
              <button class="btn btn-secondary btn-xs btn-danger-soft">
                Delete
              </button>
            </td>
          </tr>

          <tr data-difficulty="hard" data-light="high">
            <td>Hemianthus callitrichoides 'Cuba'</td>
            <td><span class="badge badge-hard">Hard</span></td>
            <td><span class="badge badge-light-high">High</span></td>
            <td>5.0 – 7.0</td>
            <td>20 – 26</td>
            <td>
              <button
                class="btn btn-secondary btn-xs"
                onclick="window.location.href='{{ url('/admin/plants/create') }}'">
                Edit
              </button>
              <button class="btn btn-secondary btn-xs btn-danger-soft">
                Delete
              </button>
            </td>
          </tr>
          </tbody>
        </table>
      </div>
    </section>
  </div>
@endsection
