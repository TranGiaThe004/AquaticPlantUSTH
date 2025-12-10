{{-- resources/views/community/my_posts.blade.php --}}
@extends('layouts.site')

@section('title', 'My posts')

@section('content')
  <section class="section">
    <h1 class="section-title">My posts</h1>
    <p class="section-subtitle">
      Quickly review and edit the stories and guides you have shared with the community.
    </p>

    <div class="com-toolbar">
      <div class="com-toolbar-left">
        <input id="mypost-search" class="form-control com-search" placeholder="Search in my posts…">
        <select id="mypost-category" class="form-control form-control-sm">
          <option value="all">All categories</option>
          <option value="diary">Tank diary</option>
          <option value="guides">How-to guides</option>
          <option value="algae">Algae control</option>
        </select>
      </div>
      <div class="com-toolbar-right">
        <button class="btn btn-primary"
                onclick="location.href='{{ route('community.create_post') }}'">
          + New post
        </button>
      </div>
    </div>

    <section class="card">
      <div class="table-wrapper">
        <table class="table table-posts" id="mypost-table">
          <thead>
          <tr>
            <th style="width: 45%;">Title</th>
            <th style="width: 18%;">Category</th>
            <th style="width: 12%;">Comments</th>
            <th style="width: 15%;">Last updated</th>
            <th>Actions</th>
          </tr>
          </thead>
          <tbody>
          <!-- demo rows -->
          <tr data-category="diary">
            <td class="title-cell">
              <a href="{{ route('community.post_detail') }}" class="question-title-link">
                My first Iwagumi – 90 days journal
              </a>
            </td>
            <td>Tank diary</td>
            <td>5</td>
            <td>2025-02-06</td>
            <td class="table-actions">
              <button class="btn btn-secondary btn-xs">Edit</button>
              <button class="btn btn-secondary btn-xs">Delete</button>
            </td>
          </tr>

          <tr data-category="guides">
            <td class="title-cell">
              <a href="{{ route('community.post_detail') }}" class="question-title-link">
                Beginner guide to balanced fertilizing
              </a>
            </td>
            <td>How-to guide</td>
            <td>8</td>
            <td>2025-01-30</td>
            <td class="table-actions">
              <button class="btn btn-secondary btn-xs">Edit</button>
              <button class="btn btn-secondary btn-xs">Delete</button>
            </td>
          </tr>

          <tr data-category="algae">
            <td class="title-cell">
              <a href="{{ route('community.post_detail') }}" class="question-title-link">
                How I beat green spot algae on slow growers
              </a>
            </td>
            <td>Algae control</td>
            <td>3</td>
            <td>2025-01-20</td>
            <td class="table-actions">
              <button class="btn btn-secondary btn-xs">Edit</button>
              <button class="btn btn-secondary btn-xs">Delete</button>
            </td>
          </tr>
          </tbody>
        </table>
      </div>
    </section>
  </section>

  <script>
    const myPostSearch   = document.getElementById('mypost-search');
    const myPostCategory = document.getElementById('mypost-category');
    const myPostRows     = document.querySelectorAll('#mypost-table tbody tr');

    function applyMyPostFilter() {
      const term = myPostSearch.value.toLowerCase();
      const cat  = myPostCategory.value;

      myPostRows.forEach(row => {
        const title = row.querySelector('.title-cell').textContent.toLowerCase();
        const rCat  = row.dataset.category || 'all';
        const matchText = title.includes(term);
        const matchCat  = (cat === 'all') || (cat === rCat);
        row.style.display = (matchText && matchCat) ? '' : 'none';
      });
    }

    myPostSearch.addEventListener('input', applyMyPostFilter);
    myPostCategory.addEventListener('change', applyMyPostFilter);
  </script>
@endsection
