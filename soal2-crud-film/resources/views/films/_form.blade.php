@csrf

@if ($errors->any())
    <div class="alert alert-error">
        <strong>Data belum bisa disimpan:</strong>
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<div class="field">
    <label for="judul">Judul Film</label>
    <input type="text" id="judul" name="judul" value="{{ old('judul', $film->judul) }}"
           class="@error('judul') is-invalid @enderror" placeholder="Contoh: Laskar Pelangi" required>
    @error('judul') <div class="error">{{ $message }}</div> @enderror
</div>

<div class="field">
    <label for="durasi">Durasi <span class="hint">(dalam menit)</span></label>
    <input type="number" id="durasi" name="durasi" value="{{ old('durasi', $film->durasi) }}"
           class="@error('durasi') is-invalid @enderror" min="1" max="600" placeholder="124" required>
    @error('durasi') <div class="error">{{ $message }}</div> @enderror
</div>

<div class="field">
    <label for="deskripsi">Deskripsi <span class="hint">(sinopsis singkat)</span></label>
    <textarea id="deskripsi" name="deskripsi" rows="6"
              class="@error('deskripsi') is-invalid @enderror"
              placeholder="Ceritakan sedikit tentang film ini..." required>{{ old('deskripsi', $film->deskripsi) }}</textarea>
    @error('deskripsi') <div class="error">{{ $message }}</div> @enderror
</div>

<div class="form-actions">
    <button type="submit" class="btn btn-primary">{{ $submitLabel }}</button>
    <a href="{{ route('films.index') }}" class="btn btn-ghost">Batal</a>
</div>
