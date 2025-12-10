{{-- resources/views/community/create_post.blade.php --}}
@extends('layouts.site')

@section('title', 'Create post')

@section('content')
  <section class="section">
    <button class="btn btn-secondary btn-xs" onclick="history.back()">← Back to Community</button>

    <section class="card" style="margin-top: 12px;">
      <h1 class="section-title" style="margin-bottom: 4px;">Share a new story or guide</h1>
      <p class="section-subtitle">
        Write about your tank journey, a step-by-step guide, or tips that helped you solve a problem.
      </p>

      <form class="form-grid-2">
        <div class="form-group form-group-full">
          <label for="post-title">Title</label>
          <input id="post-title" class="form-control"
                 placeholder="e.g. How I kept my carpet healthy during summer heat">
        </div>

        <div class="form-group form-group-full">
          <label for="post-content">Content</label>
          <textarea id="post-content" rows="8" class="form-control"
                    placeholder="Tell your story or explain your method step by step…"></textarea>
        </div>

        <div class="form-group">
          <label for="post-category">Category</label>
          <select id="post-category" class="form-control">
            <option>Tank diary</option>
            <option>How-to guide</option>
            <option>Algae control</option>
            <option>Equipment review</option>
          </select>
        </div>

        <div class="form-group">
          <label for="post-tags">Tags (comma separated)</label>
          <input id="post-tags" class="form-control"
                 placeholder="e.g. carpeting, CO₂, heat, summer">
        </div>

        <div class="form-group">
          <label for="post-tank">Related tank (optional)</label>
          <select id="post-tank" class="form-control">
            <option value="">-- Choose one of your tanks --</option>
            <option>60P Iwagumi</option>
            <option>Nano Shrimp Tank</option>
          </select>
        </div>

        <div class="form-group">
          <label for="post-media">Cover image / video</label>
          <input id="post-media" type="file" class="form-control">
        </div>

        <div class="form-actions">
          <button type="submit" class="btn btn-primary">Publish post</button>
          <button type="button" class="btn btn-secondary" onclick="history.back()">Cancel</button>
        </div>
      </form>
    </section>
  </section>
@endsection
