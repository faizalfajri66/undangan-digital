DB::table('undangans')->insert([
    'slug' => 'cream',
    'nama_undangan' => 'Andi & Sinta',
    'nama_pria' => 'Andi Saputra',
    'nama_wanita' => 'Sinta Maharani',
    'foto_pria' => 'https://example.com/images/andi.jpg',
    'foto_wanita' => 'https://example.com/images/sinta.jpg',
    'kata_pengantar' => 'Dengan memohon rahmat dan ridho Allah SWT, kami bermaksud menyelenggarakan pernikahan putra-putri kami.',
    'tanggal_acara' => '2025-09-20 10:00:00',
    'lokasi' => 'Gedung Serbaguna Cempaka, Jakarta Selatan',
    'link_maps' => 'https://maps.google.com/?q=Gedung+Serbaguna+Cempaka,+Jakarta+Selatan',
    'musik' => 'https://example.com/audio/love_song.mp3',
    'cover' => 'https://example.com/images/cover_wedding.jpg',
    'template' => 'classic-elegant',
    'quote' => 'Cinta sejati adalah ketika kamu tetap mencintainya meski dalam keadaan yang paling sulit.',
    'sumber_quote' => 'Anonim',
    'ayah_pria' => 'Bapak H. Suparman',
    'ayah_wanita' => 'Bapak H. Mahmud',
    'ibu_wanita' => 'Ibu Hj. Nurlailah',
    'rekening_bank' => 'BCA',
    'rekening_nomor' => '1234567890',
    'created_at' => now(),
    'updated_at' => now(),
]);

Update
DB::table('undangans')
    ->where('slug', 'andi-dan-sinta')
    ->update([
        'ayah_pria' => 'Muh. Tang',
        'ibu_pria' => 'Rusmiati',
        'ayah_wanita' => 'Azis',
        'ibu_wanita' => 'Nurwana',
        'musik' => 'musik_1.mp3',
        'updated_at' => now(),
    ]);
