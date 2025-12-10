{{-- resources/views/admin/qa_moderation.blade.php --}}
@extends('layouts.admin')

@section('title', 'Q&A moderation – Admin')
@section('sidebar_qa_active', 'active')

@section('content')
  <div class="page-header">
    <div>
      <h1 class="page-title">Q&amp;A moderation</h1>
      <p class="page-subtitle">
        Review questions and answers, close threads, or remove inappropriate content.
      </p>
    </div>
  </div>

  <div class="page-content">
    <!-- Toolbar -->
    <div class="admin-toolbar">
      <div class="admin-toolbar-left">
        <input type="text" class="form-control admin-search"
               placeholder="Search by title or user...">
      </div>
      <div class="admin-toolbar-right">
        <select class="form-control" style="width:140px;">
          <option>All statuses</option>
          <option>Open</option>
          <option>Resolved</option>
          <option>Flagged</option>
          <option>Closed</option>
        </select>
        <select class="form-control" style="width:140px;">
          <option>Sort: Newest</option>
          <option>Sort: Oldest</option>
          <option>Most answers</option>
          <option>Most reports</option>
        </select>
      </div>
    </div>

    <!-- Table -->
    <section class="card">
      <div class="table-wrapper">
        <table class="table">
          <thead>
          <tr>
            <th>Title</th>
            <th>Owner</th>
            <th>Status</th>
            <th>Answers</th>
            <th>Created at</th>
            <th>Actions</th>
          </tr>
          </thead>
          <tbody>
          <!-- Row 1 -->
          <tr>
            <td>
              <div class="question-title-cell">
                <div class="question-title-row">
                  New Monte Carlo leaves melting after planting
                </div>
                <div class="question-meta">
                  Tank: 60P Iwagumi • Tags: carpet, CO₂
                </div>
              </div>
            </td>
            <td>Alex</td>
            <td>
              <span class="badge badge-open">Open</span>
            </td>
            <td>2</td>
            <td>2025-02-07</td>
            <td>
              <div class="table-actions">
                <button class="btn btn-secondary btn-xs">View</button>
                <button class="btn btn-secondary btn-xs">Close</button>
                <button class="btn btn-secondary btn-xs btn-danger-soft">Delete</button>
              </div>
            </td>
          </tr>

          <!-- Row 2 -->
          <tr>
            <td>
              <div class="question-title-cell">
                <div class="question-title-row">
                  [Flagged] Is bleach dip safe for all plants?
                </div>
                <div class="question-meta">
                  Flag reason: “dangerous advice”
                </div>
              </div>
            </td>
            <td>Guest123</td>
            <td>
              <span class="badge badge-resolved">Flagged</span>
            </td>
            <td>5</td>
            <td>2025-02-05</td>
            <td>
              <div class="table-actions">
                <button class="btn btn-secondary btn-xs">Review</button>
                <button class="btn btn-secondary btn-xs">Hide question</button>
                <button class="btn btn-secondary btn-xs btn-danger-soft">Ban user</button>
              </div>
            </td>
          </tr>

          <!-- Row 3 -->
          <tr>
            <td>
              <div class="question-title-cell">
                <div class="question-title-row">
                  How long to run lights for a low-tech tank?
                </div>
              </div>
            </td>
            <td>Huy Phong</td>
            <td>
              <span class="badge badge-resolved">Resolved</span>
            </td>
            <td>3</td>
            <td>2025-01-30</td>
            <td>
              <div class="table-actions">
                <button class="btn btn-secondary btn-xs">View</button>
                <button class="btn btn-secondary btn-xs">Re-open</button>
              </div>
            </td>
          </tr>

          </tbody>
        </table>
      </div>
    </section>
  </div>
@endsection
