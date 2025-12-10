{{-- resources/views/qa/questions_list.blade.php --}}
@extends('layouts.site')

@section('title', 'Q&A – Aquatic Plant Advisor')
@section('nav_qa_active', 'active')

@section('content')
  <section class="section">
    <h1 class="section-title">Q&amp;A – Ask aquascaping experts</h1>
    <p class="section-subtitle">
      Browse questions from other hobbyists, filter by status and ask your own when you need help with plants or water issues.
    </p>

    <div class="qa-toolbar">
      <div class="qa-toolbar-left">
        <input id="qa-search" class="form-control qa-search" placeholder="Search questions…">
        <select id="qa-status-filter" class="form-control form-control-sm">
          <option value="all">All statuses</option>
          <option value="open">Open</option>
          <option value="resolved">Resolved</option>
        </select>
      </div>

      <div class="qa-toolbar-right">
        <button class="btn btn-primary"
                onclick="window.location.href='{{ route('qa.ask_question') }}'">
          + Ask a question
        </button>
      </div>
    </div>

    <section class="card">
      <div class="table-wrapper">
        <table class="table table-qa" id="qa-table">
          <thead>
          <tr>
            <th style="width: 40%;">Question</th>
            <th style="width: 14%;">Tank</th>
            <th style="width: 12%;">Status</th>
            <th style="width: 10%;">Answers</th>
            <th style="width: 14%;">Asked by</th>
            <th>Created</th>
          </tr>
          </thead>
          <tbody>
          <!-- demo rows – sau này sẽ lặp qua danh sách $questions -->
          <tr data-status="open">
            <td class="title-cell">
              <a href="{{ route('qa.question_detail') }}" class="question-title-link">
                Monte Carlo turning yellow after 3 weeks
              </a>
              <div class="question-meta">
                Tags: carpeting, CO₂, fertilizing
              </div>
            </td>
            <td>60P Iwagumi</td>
            <td class="status-cell">
              <span class="badge badge-open">Open</span>
            </td>
            <td>3</td>
            <td>Alex</td>
            <td>2025-02-08</td>
          </tr>

          <tr data-status="resolved">
            <td class="title-cell">
              <a href="{{ route('qa.question_detail') }}" class="question-title-link">
                Brown algae on glass in new tank
              </a>
              <div class="question-meta">
                Tags: diatoms, new tank, algae
              </div>
            </td>
            <td>Nano Shrimp Tank</td>
            <td class="status-cell">
              <span class="badge badge-resolved">Resolved</span>
            </td>
            <td>4</td>
            <td>Huy</td>
            <td>2025-01-28</td>
          </tr>

          <tr data-status="open">
            <td class="title-cell">
              <a href="{{ route('qa.question_detail') }}" class="question-title-link">
                Is my CO₂ level safe for shrimp?
              </a>
              <div class="question-meta">
                Tags: CO₂, livestock safety
              </div>
            </td>
            <td>Shrimp jungle</td>
            <td class="status-cell">
              <span class="badge badge-open">Open</span>
            </td>
            <td>1</td>
            <td>Minh</td>
            <td>2025-02-05</td>
          </tr>
          </tbody>
        </table>
      </div>
    </section>

    <p class="page-subtitle" style="margin-top: 10px;">
      Tip: When you create a tank in <strong>My Tanks</strong>, you can attach it to your question
      so experts see its setup and water history.
    </p>
  </section>

  <script>
    // client-side search + filter demo
    const qaSearch = document.getElementById('qa-search');
    const qaFilter = document.getElementById('qa-status-filter');
    const qaRows   = document.querySelectorAll('#qa-table tbody tr');

    function applyQaFilter() {
      const term   = qaSearch.value.toLowerCase();
      const status = qaFilter.value;

      qaRows.forEach(row => {
        const title     = row.querySelector('.title-cell').textContent.toLowerCase();
        const rowStatus = row.dataset.status;

        const matchText   = title.includes(term);
        const matchStatus = (status === 'all') || (status === rowStatus);

        row.style.display = (matchText && matchStatus) ? '' : 'none';
      });
    }

    if (qaSearch && qaFilter) {
      qaSearch.addEventListener('input', applyQaFilter);
      qaFilter.addEventListener('change', applyQaFilter);
    }
  </script>
@endsection
