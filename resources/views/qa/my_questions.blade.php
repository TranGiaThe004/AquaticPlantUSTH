{{-- resources/views/qa/my_questions.blade.php --}}
@extends('layouts.site')

@section('title', 'My questions – Aquatic Plant Advisor')
@section('nav_qa_active', 'active')

@section('content')
  <section class="section">
    <h1 class="section-title">My questions</h1>
    <p class="section-subtitle">
      Track all questions you have posted and quickly see which ones already have a best answer.
    </p>

    <div class="qa-toolbar">
      <div class="qa-toolbar-left">
        <input id="myqa-search" class="form-control qa-search" placeholder="Search in my questions…">
        <select id="myqa-status-filter" class="form-control form-control-sm">
          <option value="all">All statuses</option>
          <option value="open">Open</option>
          <option value="resolved">Resolved</option>
        </select>
      </div>
      <div class="qa-toolbar-right">
        <button class="btn btn-primary"
                onclick="window.location.href='{{ url('/qa/ask') }}'">
          + Ask new question
        </button>
      </div>
    </div>

    <section class="card">
      <div class="table-wrapper">
        <table class="table" id="myqa-table">
          <thead>
          <tr>
            <th style="width: 40%;">Question</th>
            <th style="width: 14%;">Tank</th>
            <th style="width: 12%;">Status</th>
            <th style="width: 10%;">Answers</th>
            <th>Created</th>
          </tr>
          </thead>
          <tbody>
          <!-- demo rows – sau này @foreach($myQuestions as $q) -->
          <tr data-status="open">
            <td class="title-cell">
              <a href="{{ url('/qa/3') }}" class="question-title-link">
                Is my CO₂ level safe for shrimp?
              </a>
              <div class="question-meta">
                Waiting for more answers
              </div>
            </td>
            <td>Shrimp jungle</td>
            <td class="status-cell">
              <span class="badge badge-open">Open</span>
            </td>
            <td>1</td>
            <td>2025-02-05</td>
          </tr>

          <tr data-status="resolved">
            <td class="title-cell">
              <a href="{{ url('/qa/2') }}" class="question-title-link">
                Brown algae on glass in new tank
              </a>
              <div class="question-meta">
                Best answer selected
              </div>
            </td>
            <td>Nano Shrimp Tank</td>
            <td class="status-cell">
              <span class="badge badge-resolved">Resolved</span>
            </td>
            <td>4</td>
            <td>2025-01-28</td>
          </tr>

          <tr data-status="open">
            <td class="title-cell">
              <a href="{{ url('/qa/4') }}" class="question-title-link">
                Rotala leaves curling at the top
              </a>
              <div class="question-meta">
                2 answers so far
              </div>
            </td>
            <td>High-tech Dutch</td>
            <td class="status-cell">
              <span class="badge badge-open">Open</span>
            </td>
            <td>2</td>
            <td>2025-01-20</td>
          </tr>
          </tbody>
        </table>
      </div>
    </section>
  </section>

  <script>
    // search + filter for "My questions"
    const mySearch  = document.getElementById('myqa-search');
    const myFilter  = document.getElementById('myqa-status-filter');
    const myRows    = document.querySelectorAll('#myqa-table tbody tr');

    function applyMyFilter() {
      const term   = mySearch.value.toLowerCase();
      const status = myFilter.value;

      myRows.forEach(row => {
        const title = row.querySelector('.title-cell').textContent.toLowerCase();
        const rowStatus = row.dataset.status;
        const matchText   = title.includes(term);
        const matchStatus = (status === 'all') || (status === rowStatus);
        row.style.display = (matchText && matchStatus) ? '' : 'none';
      });
    }

    mySearch.addEventListener('input', applyMyFilter);
    myFilter.addEventListener('change', applyMyFilter);
  </script>
@endsection
