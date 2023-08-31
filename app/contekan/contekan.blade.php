{{-- Jadi ada yang nama folder nya itu partials untuk menyimpan bagian bagian yang spesifik dalam sebuah halaman
    yang nantinya dianggap sebagai komponen ada halaman yang pengen ada, ada juga yang gak pengen ada kita bisa
    bongkar pasang lah istilahnya --}}

{{-- pluck('value') bertujuan untuk mencari apa contohnya admin hanya ingin mencari judul maka akan seperti berikut
$posts->pluck('title') --}}

{{-- {!! $post->body !!} ini untuk menjalan kan yang tidak menggunakan htmlspesialchars --}}

{{-- protected $fillable = ['value'] untuk memperbolehkan diisi dengan apa nantinya ketika mebuat model menggunkan
$post->create(['value']) --}}

{{-- protected $guarded = ['id'] untuk memperbolehkan apa saja yang akan di isi oleh model terkecuali id, 
biasanya ini lebih efisien di banding menggunakan fillable--}}