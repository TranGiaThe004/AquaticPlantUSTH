{{-- resources/views/admin/dashboard_admin.blade.php --}}
@extends('layouts.admin')

@section('title', 'Admin Dashboard – Aquatic Plant Advisor')
@section('sidebar_dashboard_active', 'active')

@section('content')
  <div class="page-header">
    <div>
      <h1 class="page-title">Admin dashboard</h1>
      <p class="page-subtitle">
        Overview of users, tanks and community activity across the system.
      </p>
    </div>
  </div>

  <div class="page-content">
    <!-- Hàng card số liệu -->
    <section class="grid-4">
      <article class="card">
        <div class="card-title">Total users</div>
        <div class="card-metric">234</div>
        <p class="card-subtitle">including 6 admins &amp; 14 experts</p>
      </article>

      <article class="card">
        <div class="card-title">Active tanks</div>
        <div class="card-metric">87</div>
        <p class="card-subtitle">tanks with logs in the last 30 days</p>
      </article>

      <article class="card">
        <div class="card-title">Questions</div>
        <div class="card-metric">142</div>
        <p class="card-subtitle">23 open, 119 resolved</p>
      </article>

      <article class="card">
        <div class="card-title">Community posts</div>
        <div class="card-metric">96</div>
        <p class="card-subtitle">4 pending review / flagged</p>
      </article>
    </section>

    <!-- 2 cột: Q&A & Community cần review -->
    <section class="grid-2" style="margin-top:16px;">
      <!-- Q&A -->
      <article class="card">
        <div class="card-header card-header-inline">
          <div>
            <h2 class="card-title">Questions needing attention</h2>
            <p class="card-subtitle">Open questions or flagged for moderation.</p>
          </div>
          <div>
            <a href="{{ url('/admin/qa') }}" class="btn btn-secondary btn-xs">View all</a>
          </div>
        </div>

        <div class="table-wrapper">
          <table class="table">
            <thead>
            <tr>
              <th>Title</th>
              <th>Owner</th>
              <th>Status</th>
              <th>Answers</th>
            </tr>
            </thead>
            <tbody>
            <tr>
              <td>New Monte Carlo turning yellow</td>
              <td>Alex</td>
              <td><span class="badge badge-open">Open</span></td>
              <td>1</td>
            </tr>
            <tr>
              <td>Is my CO₂ too high for shrimp?</td>
              <td>Huy</td>
              <td><span class="badge badge-open">Open</span></td>
              <td>0</td>
            </tr>
            <tr>
              <td>[Flagged] Algae treatment advice</td>
              <td>Guest123</td>
              <td><span class="badge badge-resolved">Flagged</span></td>
              <td>4</td>
            </tr>
            </tbody>
          </table>
        </div>
      </article>

      <!-- Community -->
      <article class="card">
        <div class="card-header card-header-inline">
          <div>
            <h2 class="card-title">Posts / comments flagged</h2>
            <p class="card-subtitle">Content reported by users for review.</p>
          </div>
          <div>
            <a href="{{ url('/admin/community-posts') }}" class="btn btn-secondary btn-xs">View all</a>
          </div>
        </div>

        <div class="table-wrapper">
          <table class="table">
            <thead>
            <tr>
              <th>Post</th>
              <th>Author</th>
              <th>Reason</th>
              <th>Reports</th>
            </tr>
            </thead>
            <tbody>
            <tr>
              <td>Iwagumi layout with dragon stone</td>
              <td>Phong</td>
              <td>Off-topic</td>
              <td>2</td>
            </tr>
            <tr>
              <td>CO₂ DIY guide</td>
              <td>Anh Tuan</td>
              <td>Safety concern</td>
              <td>1</td>
            </tr>
            </tbody>
          </table>
        </div>
      </article>
    </section>

  </div>
@endsection
