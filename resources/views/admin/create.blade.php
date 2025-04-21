<form action="{{ route('undangan.store') }}" method="POST" enctype="multipart/form-data" style="max-width: 600px; margin: auto;">
    @csrf

    <h2>Form Buat Undangan</h2>

    <div style="margin-bottom: 1rem;">
        <label>Slug (contoh: serenade-moss)</label>
        <input type="text" name="slug" required class="form-control">
    </div>

    <div style="margin-bottom: 1rem;">
        <label>Nama Tamu (optional)</label>
        <input type="text" name="nama_tamu" class="form-control">
    </div>

    <div style="margin-bottom: 1rem;">
        <label>Nama Pria</label>
        <input type="text" name="nama_pria" required class="form-control">
    </div>

    <div style="margin-bottom: 1rem;">
        <label>Foto Pria</label>
        <input type="file" name="foto_pria" class="form-control-file">
    </div>

    <div style="margin-bottom: 1rem;">
        <label>Nama Wanita</label>
        <input type="text" name="nama_wanita" required class="form-control">
    </div>

    <div style="margin-bottom: 1rem;">
        <label>Foto Wanita</label>
        <input type="file" name="foto_wanita" class="form-control-file">
    </div>

    <div style="margin-bottom: 1rem;">
        <label>Kata Pengantar</label>
        <textarea name="kata_pengantar" class="form-control" rows="3"></textarea>
    </div>

    <div style="margin-bottom: 1rem;">
        <label>Tanggal Acara</label>
        <input type="datetime-local" name="tanggal_acara" required class="form-control">
    </div>

    <div style="margin-bottom: 1rem;">
        <label>Lokasi</label>
        <input type="text" name="lokasi" required class="form-control">
    </div>

    <div style="margin-bottom: 1rem;">
        <label>Link Google Maps</label>
        <textarea name="link_maps" class="form-control" rows="2"></textarea>
    </div>

    <hr>

    <div style="margin-bottom: 1rem;">
        <label>🎵 Pilih Musik dari Database</label>
        <select name="musik" class="form-control">
            <option value="">-- Pilih Musik --</option>
            @foreach ($musics as $music)
                <option value="{{ $music->file_path }}">{{ $music->title }}</option>
            @endforeach
        </select>
    </div>

    <div style="margin-bottom: 1rem;">
        <label>Atau Upload Musik Baru (MP3)</label>
        <input type="file" name="musik_upload" accept=".mp3" class="form-control-file">
    </div>

    <div style="text-align: right;">
        <button type="submit" class="btn btn-primary">💾 Simpan</button>
    </div>
</form>
