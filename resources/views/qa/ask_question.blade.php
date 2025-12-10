{{-- resources/views/qa/ask_question.blade.php --}}
@extends('layouts.site')

@section('title', 'Ask a question – Aquatic Plant Advisor')
@section('nav_qa_active', 'active')

@section('content')
  <section class="section">
    <button class="btn btn-secondary btn-xs"
            onclick="window.location.href='{{ url('/qa') }}'">
      ← Back to Q&amp;A
    </button>

    <section class="card" style="margin-top: 12px;">
      <h1 class="section-title" style="margin-bottom: 4px;">Ask a new question</h1>
      <p class="section-subtitle">
        Describe your issue as clearly as possible. Attach your tank so experts can see its setup and logs.
      </p>

      <form class="form-grid-2">
        <div class="form-group form-group-full">
          <label for="q-title">Question title</label>
          <input id="q-title" class="form-control"
                 placeholder="e.g. Why is my Monte Carlo carpet turning yellow?">
        </div>

        <div class="form-group form-group-full">
          <label for="q-content">Details</label>
          <textarea id="q-content" rows="5" class="form-control"
                    placeholder="Describe your tank size, light, CO₂, fertilizing schedule, and what changed recently."></textarea>
        </div>

        <div class="form-group">
          <label for="q-tank">Related tank (optional)</label>
          <select id="q-tank" class="form-control">
            <option value="">-- Choose one of your tanks --</option>
            <option>60P Iwagumi</option>
            <option>Nano Shrimp Tank</option>
          </select>
        </div>

        <div class="form-group">
          <label for="q-tags">Tags (comma separated)</label>
          <input id="q-tags" class="form-control"
                 placeholder="e.g. carpeting, CO₂, yellowing leaves">
        </div>

        <div class="form-group">
          <label for="q-image">Upload photo (optional)</label>
          <input id="q-image" type="file" class="form-control">
        </div>

        <div class="form-group">
          <label for="q-category">Category (optional)</label>
          <select id="q-category" class="form-control">
            <option>General plant care</option>
            <option>Algae issues</option>
            <option>CO₂ &amp; fertilizing</option>
            <option>Hardscape &amp; layout</option>
          </select>
        </div>

        <div class="form-actions">
          <button type="submit" class="btn btn-primary">Post question</button>
          <button type="button" class="btn btn-secondary"
                  onclick="window.location.href='{{ url('/qa') }}'">
            Cancel
          </button>
        </div>
      </form>
    </section>
  </section>
@endsection
