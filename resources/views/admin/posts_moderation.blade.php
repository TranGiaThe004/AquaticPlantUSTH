{{-- resources/views/admin/posts_moderation.blade.php --}}
@extends('layouts.admin')

@section('title', 'Community posts – Admin moderation')
@section('sidebar_posts_active', 'active')

@section('content')
  <div class="page-header">
    <div>
      <h1 class="page-title">Community posts moderation</h1>
      <p class="page-subtitle">
        Review posts and comments, handle reports, and keep the community clean.
      </p>
    </div>
  </div>

  <div class="page-content">
    <!-- Toolbar -->
    <div class="admin-toolbar">
      <div class="admin-toolbar-left">
        <input type="text" class="form-control admin-search"
               placeholder="Search posts or authors...">
      </div>
      <div class="admin-toolbar-right">
        <select class="form-control form-control-sm">
          <option>All statuses</option>
          <option>Published</option>
          <option>Draft</option>
          <option>Hidden</option>
          <option>Flagged</option>
        </select>
        <select class="form-control form-control-sm">
          <option>Sort: Newest</option>
          <option>Oldest</option>
          <option>Most comments</option>
          <option>Most reports</option>
        </select>
      </div>
    </div>

    <!-- Table posts -->
    <section class="card">
      <div class="table-wrapper">
        <table class="table table-posts">
          <thead>
          <tr>
            <th>Title</th>
            <th>Author</th>
            <th>Status</th>
            <th>Comments</th>
            <th>Reports</th>
            <th>Created at</th>
            <th>Actions</th>
          </tr>
          </thead>
          <tbody>
          <tr>
            <td class="title-cell">
              Iwagumi with ADA Amazonia and dragon stone
              <div class="post-card-meta">
                Tags: iwagumi, beginner layout
              </div>
            </td>
            <td>Phong</td>
            <td><span class="badge badge-open">Published</span></td>
            <td>12</td>
            <td>0</td>
            <td>2025-01-20</td>
            <td class="table-actions">
              <button class="btn btn-secondary btn-xs">View</button>
              <button class="btn btn-secondary btn-xs">Hide</button>
            </td>
          </tr>

          <tr>
            <td class="title-cell">
              [Flagged] DIY CO₂ without safety valve
              <div class="post-card-meta">
                Flag reason: dangerous instructions
              </div>
            </td>
            <td>DIYlover</td>
            <td><span class="badge badge-resolved">Flagged</span></td>
            <td>3</td>
            <td>4</td>
            <td>2025-02-01</td>
            <td class="table-actions">
              <button class="btn btn-secondary btn-xs">Review</button>
              <button class="btn btn-secondary btn-xs">Hide</button>
              <button class="btn btn-secondary btn-xs">Delete</button>
            </td>
          </tr>

          <tr>
            <td class="title-cell">
              My first low-tech jungle style tank
            </td>
            <td>Alex</td>
            <td><span class="badge badge-open">Published</span></td>
            <td>5</td>
            <td>1</td>
            <td>2025-01-28</td>
            <td class="table-actions">
              <button class="btn btn-secondary btn-xs">View</button>
              <button class="btn btn-secondary btn-xs">Warn author</button>
            </td>
          </tr>
          </tbody>
        </table>
      </div>
    </section>
  </div>
@endsection
