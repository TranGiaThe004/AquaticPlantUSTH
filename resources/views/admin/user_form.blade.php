{{-- resources/views/admin/user_form.blade.php --}}
@extends('layouts.admin')

@section('title', 'Admin – User form')
@section('sidebar_users_active', 'active')

@section('content')
  <div class="page-header">
    <div>
      <h1 class="page-title">User form</h1>
      <p class="page-subtitle">
        Create a new user account or edit an existing one.
      </p>
    </div>
  </div>

  <div class="page-content">
    <section class="card">
      <form class="form-grid-2">
        <!-- LEFT COLUMN -->
        <div class="form-group">
          <label for="user_name">Full name</label>
          <input id="user_name" type="text" class="form-control"
                 placeholder="e.g. Alex Nguyen">
        </div>

        <div class="form-group">
          <label for="user_email">Email</label>
          <input id="user_email" type="email" class="form-control"
                 placeholder="name@example.com">
        </div>

        <div class="form-group">
          <label for="user_password">Password</label>
          <input id="user_password" type="password" class="form-control"
                 placeholder="Set or reset password">
        </div>

        <div class="form-group">
          <label for="user_password_confirm">Confirm password</label>
          <input id="user_password_confirm" type="password" class="form-control"
                 placeholder="Re-type password">
        </div>

        <div class="form-group form-group-full">
          <label for="user_bio">Short bio (optional)</label>
          <textarea id="user_bio" rows="2" class="form-control"
                    placeholder="Short introduction, experience, etc."></textarea>
        </div>

        <!-- RIGHT COLUMN – roles & status -->
        <div class="form-group">
          <label>Roles</label>
          <div style="display:flex;flex-direction:column;gap:4px;margin-top:4px;">
            <label><input type="checkbox" checked> User</label>
            <label><input type="checkbox"> Expert</label>
            <label><input type="checkbox"> Admin</label>
          </div>
          <p style="font-size:12px;color:#6b7280;margin-top:6px;">
            Note: At least one Admin must remain in the system.
          </p>
        </div>

        <div class="form-group">
          <label for="user_status">Status</label>
          <select id="user_status" class="form-control">
            <option value="active">Active</option>
            <option value="blocked">Blocked</option>
          </select>
        </div>

        <div class="form-actions">
          <button type="button" class="btn btn-primary"
                  onclick="window.location.href='{{ url('/admin/users') }}'">
            Save user
          </button>
          <button type="button" class="btn btn-secondary"
                  onclick="window.location.href='{{ url('/admin/users') }}'">
            Cancel
          </button>
        </div>
      </form>
    </section>
  </div>
@endsection
