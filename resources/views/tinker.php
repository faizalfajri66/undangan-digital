Membuat 
use App\Models\Undangan;

Undangan::create([
    'slug' => 'mutminnah&rahmat',
    'nama_undangan' => 'mutmainnnah&rahmat',
    'nama_pria' => 'Rahmat',
    'nama_wanita' => 'Mutmainnah',
    'foto_pria' => 'https://example.com/images/andi.jpg',
    'foto_wanita' => 'https://example.com/images/sinta.jpg',
    'kata_pengantar' => 'Dengan memohon rahmat dan ridho Allah SWT, kami bermaksud menyelenggarakan pernikahan putra-putri kami.',
    'tanggal_acara' => '2025-08-04 10:00:00',
    'lokasi' => 'Bontomatene, Kel. Segeri, Kec. Segeri',
    'link_maps' => 'https://www.google.com/maps/embed?pb=...',
    'musik' => 'musik_1.mp3',
    'cover' => 'https://example.com/images/cover_wedding.jpg',
    'template' => 'classic-elegant',
    'quote' => 'Dan di antara tanda-tanda kekuasaan-Nya ialah Dia menciptakan untukmu pasangan hidup agar kamu merasa tenteram di sampingnya.',
    'sumber_quote' => 'QS. Ar-Rum: 21',
    'ayah_pria' => 'Sakkatang',
    'ibu_pria' => 'Sani',
    'ayah_wanita' => 'Iwan',
    'ibu_wanita' => 'Amina',
    'rekening_nama' => 'Mutmainnah',
    'rekening_bank' => 'BRI',
    'rekening_nomor' => '123456789',
]);

menambahkan
DB::table('undangans')->insert([
    'slug' => 'mutaminnah&rahmat',
    'nama_undangan' => 'mutmainnnah&rahmat',
    'nama_pria' => 'Rahmat',
    'nama_wanita' => 'Mutmainnah',
    'foto_pria' => 'https://example.com/images/andi.jpg',
    'foto_wanita' => 'https://example.com/images/sinta.jpg',
    'kata_pengantar' => 'Dengan memohon rahmat dan ridho Allah SWT, kami bermaksud menyelenggarakan pernikahan putra-putri kami.',
    'tanggal_acara' => '2025-08-04 10:00:00',
    'lokasi' => 'Bontomatene, Kel. Segeri, Kec. Segeri',
    'link_maps' => 'https://www.google.com/maps/embed?pb=...',
    'musik' => 'musik_1.mp3',
    'cover' => 'https://example.com/images/cover_wedding.jpg',
    'template' => 'classic-elegant',
    'quote' => 'Dan di antara tanda-tanda kekuasaan-Nya ialah Dia menciptakan untukmu pasangan hidup agar kamu merasa tenteram di sampingnya.',
    'sumber_quote' => 'QS. Ar-Rum: 21',
    'ayah_pria' => 'Sakkatang',
    'ibu_pria' => 'Sani',
    'ayah_wanita' => 'Iwan',
    'ibu_wanita' => 'Amina',
    'rekening_nama' => 'Mutmainnah',
    'rekening_bank' => 'BRI',
    'rekening_nomor' => '123456789',
]);

Update
$u = App\Models\Undangan::where('slug', 'mutmainnah&rahmat')->first();
$u->ayah_pria = 'Sakkatang';
$u->ayah_wanita = 'Iwan';
$u->ibu_wanita = 'Hafsani';
$u->ibu_pria = 'Amina';
$u->save();

$u = App\Models\Undangan::where('slug', 'eva-sadhy')->first();
$u->musik = 'lagu123.mp3';

Hapus 
App\Models\Rsvp::where('id', 29)->delete();
App\Models\Rsvp::where('id', 30)->delete();
App\Models\Rsvp::where('id', 31)->delete();
App\Models\Rsvp::where('id', 14)->delete();

Lihat 
App\Models\Rsvp::all();

Gambar
use App\Models\Galeri;

// Contoh: Tambahkan 3 foto untuk undangan_id = 1
Galeri::create([
    'undangan_id' => 1,
    'gambar' => 'eva-sadhy_1.jpg'
]);

Galeri::create([
    'undangan_id' => 1,
    'gambar' => 'eva-sadhy_2.jpg'
]);

Galeri::create([
    'undangan_id' => 1,
    'gambar' => 'eva-sadhy_3.jpg'
]);

Galeri::create([
    'undangan_id' => 1,
    'gambar' => 'eva-sadhy_4.jpg'
]);

Galeri::create([
    'undangan_id' => 1,
    'gambar' => 'eva-sadhy_5.jpg'
]);

Galeri::create([
    'undangan_id' => 1,
    'gambar' => 'eva-sadhy_6.jpg'
]);

Galeri::create([
    'undangan_id' => 1,
    'gambar' => 'eva-sadhy_17.jpg'
]);

Galeri::create([
    'undangan_id' => 1,
    'gambar' => 'eva-sadhy_18.jpg'
]);


Love story
use App\Models\LoveStory;

LoveStory::create([
    'undangan_id' => 1,
    'judul' => 'First Chapter : Encounter',
    'cerita' => 'Tidak ada suatu kebetulan di dunia ini, semua sudah tersusun rapih oleh sang maha kuasa. Siapa sangka berawal dari hobi bermain game, sebuah pertemuan biasa justru menjadi awal dari kisah luar biasa.',
]);

LoveStory::create([
    'undangan_id' => 1,
    'judul' => 'Second Chapter : Destiny',
    'cerita' => 'Seiring berjalannya waktu, mulai dari obrolan ringan hingga diskusi mendalam, kami menemukan bahwa kami saling melengkapi. Setiap langkah dalam perjalanan takdir ini, telah membawa kami lebih dekat satu sama lain.',
]);

LoveStory::create([
    'undangan_id' => 1,
    'judul' => 'Final Chapter : Forever Start Here',
    'cerita' => 'Percayalah, bukan karena bertemu lalu berjodoh tapi karena berjodohlah kami di pertemukan. Dengan penuh rasa syukur, kami ingin merayakan cinta kami di hari yang istimewa. Tepat pada tanggal 2 agustus 2025 kami akan melangsungkan pernikahan. Cinta yang sakral, cinta yang bermuara pada cinta-Nya. Semoga Allah swt. Senantiasa memberkahi pernikahan ini. Aamiin... Mohon doa baiknya untuk kami:) #forEVArwithSADHY',
]);