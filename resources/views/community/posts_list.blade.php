{{-- resources/views/community/posts_list.blade.php --}}
@extends('layouts.site')

@section('title', 'Community posts')

@section('content')
  <section class="section">
    <h1 class="section-title">Community stories &amp; guides</h1>
    <p class="section-subtitle">
      Read aquascaping journals, maintenance tips and success stories from other hobbyists.
      Share your own experience to inspire the community.
    </p>

    <!-- Toolbar -->
    <div class="com-toolbar">
      <div class="com-toolbar-left">
        <input id="com-search" class="form-control com-search" placeholder="Search posts…">
        <select id="com-category" class="form-control form-control-sm">
          <option value="all">All categories</option>
          <option value="diary">Tank diary</option>
          <option value="guides">How-to guides</option>
          <option value="algae">Algae control</option>
        </select>
      </div>
      <div class="com-toolbar-right">
        <button class="btn btn-primary"
                onclick="location.href='{{ route('community.create_post') }}'">
          + Write a post
        </button>
      </div>
    </div>

    <!-- Cards -->
    <section class="posts-grid" id="posts-grid">
      <!-- Demo card 1 -->
      <article class="post-card" data-category="diary">
        <div class="post-card-title">
          <a href="{{ route('community.post_detail') }}">My first Iwagumi – 90 days journal</a>
        </div>
        <div class="post-card-meta">
          by <strong>Alex</strong> • Tank: 60P Iwagumi • 2025-02-06
        </div>
        <p class="post-card-excerpt">
          From bare glass box to fully grown carpet – lessons learned about CO₂, trimming and algae control…
        </p>
        <div class="post-card-tags">
          <span class="tag-pill">tank diary</span>
          <span class="tag-pill">carpeting</span>
        </div>
      </article>

      <!-- Demo card 2 -->
      <article class="post-card" data-category="guides">
        <div class="post-card-title">
          <a href="{{ route('community.post_detail') }}">Beginner guide to balanced fertilizing</a>
        </div>
        <div class="post-card-meta">
          by <strong>Huy</strong> • Expert • 2025-01-30
        </div>
        <p class="post-card-excerpt">
          A simple routine to keep plants fed without triggering algae – with example schedules for low and high-tech tanks.
        </p>
        <div class="post-card-tags">
          <span class="tag-pill">guide</span>
          <span class="tag-pill">fertilizing</span>
        </div>
      </article>

      <!-- Demo card 3 -->
      <article class="post-card" data-category="algae">
        <div class="post-card-title">
          <a href="{{ route('community.post_detail') }}">How I beat green spot algae on slow growers</a>
        </div>
        <div class="post-card-meta">
          by <strong>Lan</strong> • 2025-01-20
        </div>
        <p class="post-card-excerpt">
          Adjusting phosphate levels, light intensity and cleaning routine to keep Anubias leaves clean and healthy.
        </p>
        <div class="post-card-tags">
          <span class="tag-pill">algae</span>
          <span class="tag-pill">anubias</span>
        </div>
      </article>
    </section>
  </section>

  <script>
    const comSearch   = document.getElementById('com-search');
    const comCategory = document.getElementById('com-category');
    const comCards    = document.querySelectorAll('#posts-grid .post-card');

    function applyComFilter() {
      const term = comSearch.value.toLowerCase();
      const cat  = comCategory.value;

      comCards.forEach(card => {
        const text = card.textContent.toLowerCase();
        const cCat = card.dataset.category || 'all';
        const matchText = text.includes(term);
        const matchCat  = (cat === 'all') || (cat === cCat);
        card.style.display = (matchText && matchCat) ? '' : 'none';
      });
    }

    comSearch.addEventListener('input', applyComFilter);
    comCategory.addEventListener('change', applyComFilter);
  </script>
@endsection
