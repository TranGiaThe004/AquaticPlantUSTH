{{-- resources/views/qa/question_detail.blade.php --}}
@extends('layouts.site')

@section('title', 'Question detail – Aquatic Plant Advisor')
@section('nav_qa_active', 'active')

@section('content')
  <section class="section">
    <button class="btn btn-secondary btn-xs"
            onclick="window.location.href='{{ url('/qa') }}'">
      ← Back to list
    </button>

    <!-- Question card -->
    <section class="card" style="margin-top: 12px;">
      <div class="question-header">
        <h2>Monte Carlo turning yellow after 3 weeks</h2>
        <div class="qa-meta-row">
          <span>Asked by <strong>Alex</strong></span>
          <span>Tank: <strong>60P Iwagumi</strong></span>
          <span>Created: 2025-02-08</span>
          <span>Status:
            <span class="badge badge-open">Open</span>
          </span>
        </div>
      </div>

      <div class="question-body">
        I planted Monte Carlo carpet three weeks ago, using CO₂ and strong light. The plants are still
        rooted but many leaves are turning pale yellow. I dose all-in-one fertilizer twice a week.
        Is this normal melt, or am I missing something?
      </div>

      <div class="question-tags">
        <span class="badge badge-soft-green">carpeting</span>
        <span class="badge badge-soft">CO₂</span>
        <span class="badge badge-soft">fertilizing</span>
      </div>
    </section>

    <!-- Answers card -->
    <section class="card">
      <div class="answers-header">
        <h3 class="card-title">3 answers</h3>
        <p class="card-subtitle">Best answer is highlighted at the top.</p>
      </div>

      <!-- Best answer -->
      <article class="answer-item answer-best">
        <div class="answer-body">
          For Monte Carlo in a high-tech tank, yellowing usually points to low nitrogen or iron.
          Because your CO₂ and light seem fine, try increasing your macro dosing slightly and make
          sure NO₃ stays above 10 ppm. Also check that your carpet is not shaded by hardscape.
        </div>
        <div class="answer-meta">
          <span>Answered by <strong>Huy</strong> <span class="badge badge-expert">Expert</span></span>
          <span>2025-02-09</span>
          <span class="badge badge-best">Best answer</span>
        </div>
      </article>

      <!-- Other answers -->
      <article class="answer-item">
        <div class="answer-body">
          Early yellowing could also be related to new-tank instability. Keep doing weekly water
          changes and avoid trimming too aggressively until the carpet is fully rooted.
        </div>
        <div class="answer-meta">
          <span>Answered by <strong>Minh</strong></span>
          <span>2025-02-09</span>
        </div>
      </article>

      <article class="answer-item">
        <div class="answer-body">
          Double-check your CO₂ drop checker – if it’s light green only right before lights off,
          you may not have enough CO₂ during most of the photoperiod.
        </div>
        <div class="answer-meta">
          <span>Answered by <strong>Lan</strong></span>
          <span>2025-02-10</span>
        </div>
      </article>
    </section>

    <!-- Answer form -->
    <section class="card">
      <div class="answer-form-header">
        <h3>Post your answer</h3>
        <p class="card-subtitle">
          Share your experience. Please describe your reasoning and any measurements you rely on.
        </p>
      </div>

      <form>
        <div class="form-group">
          <label for="answer-content">Your answer</label>
          <textarea id="answer-content" rows="5" class="form-control"
                    placeholder="Write a clear step-by-step suggestion or explanation…"></textarea>
        </div>

        <div class="form-group">
          <label for="answer-image">Attach image (optional)</label>
          <input id="answer-image" type="file" class="form-control">
        </div>

        <div class="form-actions">
          <button type="submit" class="btn btn-primary">Submit answer</button>
          <button type="button" class="btn btn-secondary"
                  onclick="window.location.href='{{ url('/qa') }}'">
            Cancel
          </button>
        </div>
      </form>
    </section>
  </section>
@endsection
