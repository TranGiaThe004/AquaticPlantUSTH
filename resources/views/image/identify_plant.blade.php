{{-- resources/views/image/identify_plant.blade.php --}}
@extends('layouts.site')

@section('title', 'Identify plant from photo')

@section('content')

  <section class="section">
    <h1 class="section-title">Identify plants from your tank photos</h1>
    <p class="section-subtitle">
      Upload a clear photo of a single plant or a close-up from your aquascape. The system compares it with the
      master plant library and suggests the most likely matches.
    </p>

    <!-- Layout: upload (left) + results (right) -->
    <div class="ir-layout">
      <!-- LEFT: upload form -->
      <section class="card">
        <h2 class="card-title">Upload plant photo</h2>
        <p class="card-subtitle">
          Use natural or white light, avoid heavy reflections, and make sure the plant is in focus.
        </p>

        <form id="ir-form" class="form-grid-2">
          <div class="form-group form-group-full">
            <label for="ir-file">Plant image</label>
            <input id="ir-file" type="file" accept="image/*" class="form-control">
          </div>

          <div class="form-group form-group-full">
            <label for="ir-note">Short note (optional)</label>
            <textarea id="ir-note" rows="3" class="form-control"
                      placeholder="e.g. foreground carpet, medium light, soft water"></textarea>
          </div>

          <div class="form-group">
            <label for="ir-tank">Related tank (optional)</label>
            <select id="ir-tank" class="form-control">
              <option value="">-- Choose one of your tanks --</option>
              <option>60P Iwagumi</option>
              <option>Nano Shrimp Tank</option>
            </select>
          </div>

          <div class="form-group">
            <label>Preview</label>
            <div class="ir-upload-preview">
              <img id="ir-preview-img" alt="Preview">
              <div class="ir-upload-info" id="ir-preview-text">
                No image selected yet. Choose a clear photo of the plant – single species in frame works best.
              </div>
            </div>
          </div>

          <div class="form-actions">
            <button type="submit" class="btn btn-primary">Upload &amp; identify</button>
            <button type="reset" class="btn btn-secondary" id="ir-reset">Reset</button>
          </div>
        </form>

        <p class="metric-note" style="margin-top: 10px;">
          This is a UI prototype. In the final system, the photo is sent to the ImageRetrievalService
          which compares color and texture features with the plant library.
        </p>
      </section>

      <!-- RIGHT: suggestion results -->
      <section class="card">
        <h2 class="card-title">Suggested matches</h2>
        <p class="card-subtitle" id="ir-result-subtitle">
          Upload a photo to see the top matches from the plant library.
        </p>

        <div id="ir-result-empty" class="card-soft">
          No search has been run yet. Once you upload an image, suggested plants will appear here with
          similarity scores and links to care information.
        </div>

        <div id="ir-result-list" class="ir-result-grid" style="display:none;">
          <!-- Demo result 1 -->
          <article class="ir-result-card">
            <img src="{{ asset('assets/img/demo_plant1.jpg') }}" alt="Demo plant 1">
            <div class="ir-result-body">
              <div class="ir-plant-name">Hemianthus callitrichoides "Cuba"</div>
              <div class="ir-plant-meta">
                Foreground carpeting plant • High light, CO₂ recommended.
              </div>
              <div class="ir-score-chip">Similarity: 92%</div>
              <button class="btn btn-secondary btn-xs" style="margin-top:6px;">
                View plant details
              </button>
            </div>
          </article>

          <!-- Demo result 2 -->
          <article class="ir-result-card">
            <img src="{{ asset('assets/img/demo_plant2.jpg') }}" alt="Demo plant 2">
            <div class="ir-result-body">
              <div class="ir-plant-name">Micranthemum "Monte Carlo"</div>
              <div class="ir-plant-meta">
                Easy carpeting plant • Medium–high light, CO₂ strongly recommended.
              </div>
              <div class="ir-score-chip">Similarity: 86%</div>
              <button class="btn btn-secondary btn-xs" style="margin-top:6px;">
                View plant details
              </button>
            </div>
          </article>

          <!-- Demo result 3 -->
          <article class="ir-result-card">
            <img src="{{ asset('assets/img/demo_plant3.jpg') }}" alt="Demo plant 3">
            <div class="ir-result-body">
              <div class="ir-plant-name">Eleocharis acicularis mini</div>
              <div class="ir-plant-meta">
                Fine grass-like carpet • Medium light, appreciates CO₂.
              </div>
              <div class="ir-score-chip">Similarity: 78%</div>
              <button class="btn btn-secondary btn-xs" style="margin-top:6px;">
                View plant details
              </button>
            </div>
          </article>
        </div>
      </section>
    </div>
  </section>

  {{-- PAGE JS (preview + demo results) --}}
  <script>
    const fileInput      = document.getElementById('ir-file');
    const previewImg     = document.getElementById('ir-preview-img');
    const previewText    = document.getElementById('ir-preview-text');
    const form           = document.getElementById('ir-form');
    const resetBtn       = document.getElementById('ir-reset');
    const resultEmpty    = document.getElementById('ir-result-empty');
    const resultList     = document.getElementById('ir-result-list');
    const resultSubtitle = document.getElementById('ir-result-subtitle');

    // Preview image when user chooses a file
    fileInput.addEventListener('change', function () {
      const file = this.files && this.files[0];
      if (!file) {
        previewImg.src = '';
        previewText.textContent =
          'No image selected yet. Choose a clear photo of the plant – single species in frame works best.';
        return;
      }

      const reader = new FileReader();
      reader.onload = e => {
        previewImg.src = e.target.result;
        previewText.textContent = file.name + ' (' + Math.round(file.size / 1024) + ' KB)';
      };
      reader.readAsDataURL(file);
    });

    // Fake submit: just show demo results
    form.addEventListener('submit', function (e) {
      e.preventDefault();

      // In real app: send to backend via fetch/axios here
      resultEmpty.style.display = 'none';
      resultList.style.display  = 'grid';
      resultSubtitle.textContent =
        'These are demo matches based on visual similarity. In the real system, scores come from ImageRetrievalService.';

      resultList.scrollIntoView({ behavior: 'smooth', block: 'start' });
    });

    // Reset preview & results
    resetBtn.addEventListener('click', function () {
      previewImg.src = '';
      previewText.textContent =
        'No image selected yet. Choose a clear photo of the plant – single species in frame works best.';
      resultList.style.display  = 'none';
      resultEmpty.style.display = 'block';
      resultSubtitle.textContent =
        'Upload a photo to see the top matches from the plant library.';
    });
  </script>

@endsection
