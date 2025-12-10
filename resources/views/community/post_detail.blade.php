{{-- resources/views/community/post_detail.blade.php --}}
@extends('layouts.site')

@section('title', 'Post detail')

@section('content')
  <section class="section">
    <button class="btn btn-secondary btn-xs" onclick="history.back()">← Back to posts</button>

    <!-- Post content -->
    <section class="card" style="margin-top: 12px;">
      <header class="post-header">
        <h2>My first Iwagumi – 90 days journal</h2>
        <div class="post-meta-row">
          <span>by <strong>Alex</strong></span>
          <span>Tank: 60P Iwagumi</span>
          <span>Posted: 2025-02-06</span>
          <span>Category: <strong>Tank diary</strong></span>
        </div>
      </header>

      <div class="post-cover">
        <img src="{{ asset('assets/img/demo_iwagumi.jpg') }}" alt="Iwagumi aquascape demo image">
      </div>

      <article class="post-content">
        <p>
          This journal covers the first 90 days of my 60P Iwagumi tank – from planting day to a fully grown
          carpet. I hope it helps other beginners understand what to expect when starting a high-tech tank.
        </p>

        <p>
          <strong>Day 0 – Setup &amp; planting.</strong> I used ADA Amazonia, Seiryu stones and Monte Carlo +
          Eleocharis mini. CO₂ was set to 1 bubble per second and twin-star style LED at 80% for 6 hours.
        </p>

        <p>
          <strong>Week 2.</strong> First signs of diatoms appeared on stones and glass. I increased water
          changes to 3× per week and added more fast-growing stems in the back to help stabilize nutrients.
        </p>

        <p>
          <strong>Week 6.</strong> Carpet started to fill in, and I performed the first major trim. I also
          switched to daily macro dosing instead of 2× per week to keep NO₃ stable around 15ppm.
        </p>

        <p>
          <strong>Week 12.</strong> The layout reached the look in the photo above. Trimming every 10–14 days
          keeps the carpet low and fresh. If you’re patient with water changes and consistent with CO₂,
          an Iwagumi can be surprisingly low-maintenance.
        </p>
      </article>
    </section>

    <!-- Comments -->
    <section class="card">
      <div class="comments-header">
        <h3 class="card-title">Comments</h3>
        <p class="card-subtitle">Join the discussion or share your own experience.</p>
      </div>

      <!-- Demo comments -->
      <article class="comment-item">
        <div class="comment-meta">
          <strong>Huy</strong> • 2025-02-07
        </div>
        <div class="comment-body">
          Great journal! I like how you tracked NO₃ – many beginners underestimate how important
          consistent macros are once the carpet starts taking off.
        </div>
      </article>

      <article class="comment-item">
        <div class="comment-meta">
          <strong>Lan</strong> • 2025-02-07
        </div>
        <div class="comment-body">
          Did you notice any CO₂ issues with fish once the carpet grew dense? I sometimes need to reduce
          my bubble rate after heavy trims.
        </div>
      </article>

      <!-- Comment form -->
      <form style="margin-top: 12px;">
        <div class="form-group">
          <label for="comment-text">Add a comment</label>
          <textarea id="comment-text" rows="3" class="form-control"
                    placeholder="Be kind and constructive. Share what has worked for you."></textarea>
        </div>
        <div class="form-group">
          <label for="comment-image">Attach photo (optional)</label>
          <input id="comment-image" type="file" class="form-control">
        </div>
        <div class="form-actions">
          <button type="submit" class="btn btn-primary">Post comment</button>
          <button type="button" class="btn btn-secondary">Cancel</button>
        </div>
      </form>
    </section>
  </section>
@endsection
