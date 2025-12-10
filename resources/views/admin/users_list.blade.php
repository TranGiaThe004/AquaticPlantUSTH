{{-- resources/views/admin/users_list.blade.php --}}
@extends('layouts.admin')

@section('title', 'Admin – Users & Roles')
@section('sidebar_users_active', 'active')

@section('content')
  <div class="page-header">
    <div>
      <h1 class="page-title">User accounts</h1>
      <p class="page-subtitle">
        View users and manage their roles (User, Expert, Admin).
      </p>
    </div>
    <div class="page-actions">
      <!-- Prototype: mở form tạo user -->
      <button class="btn btn-primary"
              onclick="window.location.href='{{ url('/admin/users/create') }}'">
        + Add new user
      </button>
    </div>
  </div>

  <div class="page-content">
    <!-- filters -->
    <div class="admin-toolbar">
      <div class="admin-toolbar-left">
        <input type="text" id="userSearchInput"
               class="form-control admin-search"
               placeholder="Search by name or email...">
      </div>
      <div class="admin-toolbar-right">
        <select id="filterRole" class="form-control" style="width:150px;">
          <option value="">All roles</option>
          <option value="user">User</option>
          <option value="expert">Expert</option>
          <option value="admin">Admin</option>
        </select>
      </div>
    </div>

    <!-- table -->
    <section class="card">
      <div class="table-wrapper">
        <table class="table" id="usersTable">
          <thead>
          <tr>
            <th style="width:60px;">ID</th>
            <th>Name</th>
            <th>Email</th>
            <th>Roles</th>
            <th>Registered at</th>
            <th>Last login</th>
            <th>Actions</th>
          </tr>
          </thead>
          <tbody>
          <tr data-role="admin">
            <td>1</td>
            <td>System Admin</td>
            <td>admin@example.com</td>
            <td>
              <span class="role-pill role-pill-admin">Admin</span>
            </td>
            <td>2024-09-01</td>
            <td>2025-02-07</td>
            <td>
              <div class="table-actions">
                <button class="btn btn-secondary btn-xs edit-roles-btn"
                        data-user="System Admin">Edit roles</button>
              </div>
            </td>
          </tr>

          <tr data-role="expert">
            <td>2</td>
            <td>Huy Phong</td>
            <td>huy@example.com</td>
            <td>
              <span class="role-pill">User</span>
              <span class="role-pill role-pill-expert">Expert</span>
            </td>
            <td>2024-10-10</td>
            <td>2025-02-06</td>
            <td>
              <div class="table-actions">
                <button class="btn btn-secondary btn-xs edit-roles-btn"
                        data-user="Huy Phong">Edit roles</button>
              </div>
            </td>
          </tr>

          <tr data-role="user">
            <td>3</td>
            <td>Alex</td>
            <td>alex@example.com</td>
            <td>
              <span class="role-pill">User</span>
            </td>
            <td>2024-12-01</td>
            <td>2025-02-05</td>
            <td>
              <div class="table-actions">
                <button class="btn btn-secondary btn-xs edit-roles-btn"
                        data-user="Alex">Edit roles</button>
              </div>
            </td>
          </tr>
          </tbody>
        </table>
      </div>
    </section>
  </div>

  <!-- Modal edit roles -->
  <div class="modal-backdrop" id="editRolesModal">
    <div class="modal">
      <div class="modal-header">
        <div class="modal-title">Edit roles</div>
        <button class="modal-close" type="button" id="closeRolesModal">&times;</button>
      </div>
      <div class="modal-body">
        <p id="editRolesUserName"
           style="font-weight:500;margin-bottom:6px;"></p>
        <div class="form-group">
          <label>Assign roles</label>
          <div style="display:flex;flex-direction:column;gap:4px;margin-top:4px;">
            <label><input type="checkbox" id="role_user" checked> User</label>
            <label><input type="checkbox" id="role_expert"> Expert</label>
            <label><input type="checkbox" id="role_admin"> Admin</label>
          </div>
        </div>
        <p style="font-size:12px;color:#6b7280;margin-top:6px;">
          Note: At least one Admin must remain in the system.
        </p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" id="cancelRolesBtn">Cancel</button>
        <button type="button" class="btn btn-primary" id="saveRolesBtn">Save</button>
      </div>
    </div>
  </div>
@endsection
