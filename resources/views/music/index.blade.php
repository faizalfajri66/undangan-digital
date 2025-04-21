<form action="{{ route('undangans.updateMusik', $undangans->slug) }}" method="POST">
    @csrf
    @method('PUT')
    
    <label for="musik">Pilih Musik:</label>
    <select name="musik" id="musik">
        <option value="">-- Pilih Musik --</option>
        <option value="lagu1.mp3" {{ $undangan->musik == 'lagu1.mp3' ? 'selected' : '' }}>Lagu Romantis 1</option>
        <option value="lagu2.mp3" {{ $undangan->musik == 'lagu2.mp3' ? 'selected' : '' }}>Lagu Romantis 2</option>
        <option value="lagu3.mp3" {{ $undangan->musik == 'lagu3.mp3' ? 'selected' : '' }}>Lagu Romantis 3</option>
    </select>

    <button type="submit">Simpan</button>
</form>
