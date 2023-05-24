<!DOCTYPE html>
<html lang="en">

<head>
    <title>@yield('title')</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="keywords" content="ADIDAS" />
    <meta charset utf="8">

    @include('frontend.frontend_layout.body.style')
    <style>
        p{
            font-size: 15px;
        }
        h1{
            font-style: bolder; 
        }
    </style>

</head>

<body>
    @include('frontend.frontend_layout.body.header')

    @if (request()->routeIs('home'))
    @else
        @include('frontend.frontend_layout.body.breadcrumb')
    @endif
    <div class="container ">
    <h1>SYARAT DAN KETENTUAN PENGGUNAAN SITUS WEB</h1><br>
    <p> Penggunaan situs web ini tunduk pada syarat dan ketentuan berikut, Pemberitahuan Privasi, Ketentuan Pengiriman
        serta syarat dan ketentuan tambahan, peraturan, pelepasan tanggung jawab dan pemberitahuan yang ditampilkan di
        halaman lain di situs ini dari waktu ke waktu (selanjutnya secara kolektif disebut sebagai "Syarat dan
        Ketentuan"). Silakan baca Syarat dan Ketentuan dengan cermat sebelum menggunakan situs ini. Syarat dan Ketentuan
        berlaku untuk semua kunjungan, penggunaan situs web ini, dan juga Konten (seperti yang didefinisikan di bawah
        ini), informasi, rekomendasi, produk dan/atau layanan yang diberikan kepada Anda di atau melalui situs web ini

        Dengan mengakses dan menggunakan situs ini (atau bagian dari situs ini), Anda setuju untuk terikat oleh Syarat
        dan Ketentuan secara menyeluruh disamping hukum atau peraturan lain yang berlaku dan diterapkan di web ini dan
        Internet. Jika Anda tidak menyetujui Syarat dan Ketentuan secara menyeluruh, Anda dapat meninggalkan situs ini.

        Untuk tujuan penerapan Syarat dan Ketentuan, “adidas” mengacu pada “PT adidas Indonesia dan grup perusahaan
        adidas AG”.</p><br>

    <h3>KONTEN DI SITUS WEB INI</h3><br>
    <p> Semua konten yang terlihat atau ditampilkan di situs ini, termasuk namun tidak terbatas pada, logo, ikon, merek
        dagang, teks, grafis, foto, gambar, gambar bergerak, suara, ilustrasi dan perangkat lunak, (selanjutnya disebut
        “Konten”) dimiliki oleh adidas, pemberi lisensi dan/atau penyedia konten mereka. Situs web termasuk, namun tidak
        terbatas pada, desain umum dan Konten, dilindungi oleh hak cipta, hak moral, merek dagang, dan hak kekayaan
        intelektual lainnya. Kecuali diizinkan secara eksplisit oleh undang-undang hak cipta yang berlaku atau
        berdasarkan Syarat dan Ketentuan atau perjanjian lain antara Anda dan adidas, tidak ada bagian atau elemen dari
        situs ini atau Kontennya yang dapat disalin atau diproduksi ulang dalam bentuk apa pun atau dikirim ulang
        melalui cara apa pun. Situs ini, Konten, dan semua hak terkait tetap menjadi hak eksklusif adidas, dan/atau
        pemberi lisensinya kecuali jika disetujui secara tegas. Semua hak cipta dilindungi undang-undang.</p>
        <br>
    <h3>HAK CIPTA DAN MEREK DAGANG</h3><br>
    <p> Hak cipta dalam semua Konten dimiliki dan akan tetap menjadi milik adidas, dan/atau pemberi lisensinya. Kecuali
        jika ada pernyataan lain di situs ini atau diatur berdasarkan undang-undang hak cipta yang berlaku dan tunduk
        pada Bagian 9, Anda berhak untuk melihat, memutar, mencetak dan men-download Konten yang ada di situs ini hanya
        untuk tujuan pribadi, informasi, dan nonkomersial. Sebaliknya, kecuali jika diizinkan oleh undang-undang hak
        cipta yang berlaku, Anda tidak boleh mengubah Konten apa pun, Anda tidak diperbolehkan untuk menyalin,
        mendistribusikan, mengirim, menampilkan, melakukan, mereproduksi, menerbitkan, memberi lisensi, membuat karya
        turunan, mentransfer, atau menjual Konten apa pun, dan Anda tidak diperbolehkan untuk menggunakan kembali Konten
        apa pun tanpa terlebih dahulu memperoleh persetujuan dari adidas. Untuk tujuan penerapan Syarat dan Ketentuan,
        penggunaan Konten apa pun di situs web lain atau lingkungan komputer berjaringan tidak diperbolehkan. Anda tidak
        diperbolehkan untuk menghapus hak cipta, merek dagang, atau pernyataan kepemilikan lainnya dari Konten yang ada
        di situs ini.

        Jika Anda men-download perangkat lunak (termasuk namun tidak terbatas pada screensaver, aplikasi ponsel pintar,
        ikon, video dan wallpaper) dari situs web ini, perangkat lunak, termasuk file, gambar yang digabungkan atau
        dihasilkan oleh perangkat lunak, dan data yang disertakan dengan perangkat lunak (selanjutnya secara kolektif
        disebut sebagai "Perangkat Lunak") dilisensikan kepada Anda oleh adidas. adidas tidak mentransfer hak
        kepemilikan Perangkat Lunak kepada Anda. Anda memiliki hak akses ke media lokasi penyimpanan Perangkat Lunak
        ini, namun adidas dan/atau pemegang lisensinya tetap sepenuhnya memiliki hak cipta Perangkat Lunak ini, dan
        semua hak atas kekayaan intelektual di dalamnya. Kecuali diizinkan oleh undang-undang hak cipta yang berlaku,
        Anda tidak diperbolehkan untuk mendistribusikan, menjual, mendekompilasi, merekayasa balik, membongkar, atau
        mengurangi Perangkat Lunak ke dalam bentuk yang dapat dibaca/dimengerti oleh manusia.

        Semua merek dagang, merek layanan, logo dan nama dagang yang muncul pada produk adidas, kemasan produk dan/atau
        di situs ini, baik yang terdaftar atau tidak (termasuk namun tidak terbatas pada: lambang kata "adidas", "logo
        3-bar","logo Trefoil", "the Globe", "tanda 3-Stripes") ("Merek Dagang") tetap merupakan hak eksklusif adidas,
        dan/atau pemberi lisensinya dan dilindungi oleh undang-undang perdagangan dan perjanjian yang berlaku.
        Menyimpang dari Klausul 7 di atas, Anda tidak boleh menggunakan, menyalin, memperbanyak, menerbitkan ulang,
        meng-upload, mem-posting, mengirim, mendistribusikan, atau memodifikasi Merek Dagang dengan cara apa pun,
        termasuk dalam periklanan atau publikasi yang berkaitan dengan pendistribusian materi di situs ini, tanpa
        persetujuan tertulis dari adidas sebelumnya. Penggunaan salah satu Merek Dagang di situs web lain atau
        lingkungan komputer jaringan, misalnya penyimpanan atau reproduksi (bagian dari) situs web ini di situs internet
        eksternal atau pembuatan link, hypertext, atau deeplink antara situs web ini dan situs internet lainnya dilarang
        tanpa persetujuan tertulis dari adidas.</p><br>

    <h3>PENYANGKALAN JAMINAN</h3><br>
    <p> Situs web dan Konten disediakan secara gratis dan 'sebagaimana mestinya', kecuali sejauh yang disyaratkan oleh
        hukum, tanpa jaminan apa pun. Informasi di situs ini hanya untuk tujuan informasi umum dan bukan merupakan
        saran.

        Kecuali sejauh yang disyaratkan oleh hukum, adidas tidak mewakili atau menjamin bahwa informasi dan/atau
        fasilitas yang terdapat dalam situs web ini akurat, lengkap atau terkini, atau bahwa situs web ini atau server
        yang menghadirkan situs web ini bebas dari virus atau komponen berbahaya lainnya. Selanjutnya, adidas tidak akan
        menyediakan infrastruktur atau konektivitas TI khusus. Dengan demikian adidas tidak mewakili atau menjamin bahwa
        situs ini tidak akan terganggu atau bebas dari error. Kecuali sejauh yang disyaratkan oleh hukum, adidas tidak
        memberi jaminan atau pernyataan apa pun mengenai penggunaan Konten di situs ini dalam hal kebenaran, akurasi,
        kecukupan, kegunaan, ketepatan waktu, keandalan, atau hal lainnya.
    </p><br>
    <h3>PEMBATASAN TANGGUNG JAWAB</h3><br>
    <p> Anda menanggung sendiri risiko dari penggunaan situs web ini. Jika ketentuan, jaminan, atau jaminan konsumen
        yang tersirat atau diterapkan oleh hukum tidak dapat dikesampingkan, adidas membatasi tanggung jawab untuk
        melakukan hal sebagai berikut: sehubungan dengan layanan, untuk mendapatkan kembali layanan yang relevan atau
        membayar biaya tersebut; dan, sehubungan dengan barang, perbaikan atau penggantian barang terkait atau membayar
        biaya perbaikan atau penggantian tersebut. Jika tidak, sejauh diizinkan oleh hukum, baik adidas, maupun
        karyawan, pejabat, direktur, atau agen, kontraktor, atau pihak lain yang terlibat dalam pembuatan, produksi atau
        pengiriman situs ini atau Konten apa pun tidak bertanggung jawab (dan dengan ini Anda melepaskan entitas
        tersebut dari segala kewajiban) atas kerugian, atau kerusakan, baik langsung, tidak langsung, khusus,
        konsekuensial maupun kerugian lain atas orang atau entitas manapun, yang disebabkan (baik dengan kelalaian atau
        lainnya) yang diakibatkan oleh penggunaan, atau ketidakmampuan untuk menggunakan, situs web atau Konten ini atau
        materi atau produk lain yang diberikan kepada Anda melalui situs ini, termasuk kerusakan yang disebabkan oleh
        virus atau kesalahan atau ketidaklengkapan informasi di situs web ini, atau berkaitan dengan kinerja produk yang
        diperoleh melalui situs web ini atau timbul dari atau sehubungan dengan situs web ini atau Syarat dan Ketentuan,
        meskipun adidas telah diberitahu tentang kemungkinan adanya kerugian atau kerusakan tersebut.
    </p><br>
    <h3>LINK KE PIHAK KETIGA</h3><br>
    <p> Demi kenyamanan Anda dan untuk meningkatkan penggunaan situs ini, link ke situs web yang dimiliki dan dikontrol
        oleh pihak ketiga dapat diberikan dari waktu ke waktu. Link ini membawa Anda ke luar layanan adidas dan di luar
        situs ini serta berada di luar kendali adidas. Hal ini meliputi link ke mitra yang mungkin menggunakan Merek
        Dagang sebagai bagian dari perjanjian co-branding. Situs yang link-nya dapat Anda buka mungkin memiliki syarat
        dan ketentuan serta kebijakan privasi tersendiri. adidas tidak bertanggung jawab dan tidak dapat dimintai
        pertanggungjawaban atas isi dan aktivitas situs-situs tersebut. Oleh karena itu, sepenuhnya Anda
        mengunjungi/mengakses situs ini dengan risiko yang Anda tanggung sendiri.

        Perhatikan bahwa situs lain tersebut mungkin mengirimkan cookie mereka sendiri kepada pengguna, mengumpulkan
        data atau meminta informasi pribadi, dan karena itu Anda disarankan untuk memeriksa syarat penggunaan dan/atau
        kebijakan privasi di situs web tersebut sebelum menggunakannya.
    </p><br>
    <h3>PENYALAHGUNAAN SITUS WEB INI</h3><br>
    <p> Anda dilarang menggunakan situs web ini untuk mem-posting atau mengirim Konten yang Dihasilkan Pengguna
        (sebagaimana didefinisikan di bawah ini) yang melanggar atau mungkin melanggar hak kekayaan intelektual pihak
        ketiga atau yang mengancam, memalsukan, menyesatkan, menghasut, memfitnah, melanggar privasi, tidak senonoh,
        pornografi, kasar, diskriminatif, ilegal atau yang dapat dikategorikan atau mendorong tindakan yang dianggap
        sebagai tindak pidana, melanggar hak pihak mana pun atau menyebabkan timbulnya tanggung jawab perdata atau
        melanggar hukum. adidas dapat menolak akses Anda ke situs ini kapan pun atas kebijakannya sendiri, baik dalam
        situasi di mana adidas yakin bahwa penggunaan situs web ini melanggar Syarat dan Ketentuan dan/atau hukum dan
        peraturan yang berlaku dan/atau hal lainnya.

        Anda juga dilarang menggunakan situs ini untuk mengiklankan atau melakukan permintaan komersial apa pun.
    </p><br>
    <h3>KONTEN YANG DIHASILKAN PENGGUNA</h3><br>
    <p> Semua pendapat, ucapan, komentar, karya seni, grafis, foto, link, pertanyaan, saran, informasi, video dan materi
        lainnya yang Anda atau pengguna lain posting ke situs web ini atau kirimkan menggunakan situs ini (selanjutnya
        disebut “Konten yang Dihasilkan Pengguna”) akan dianggap bukan rahasia dan tidak eksklusif. adidas berhak dan
        memiliki lisensi untuk menggunakan, menyalin, mendistribusikan dan mengungkapkan Konten nonekslusif, bebas
        royalti yang Dihasilkan Pengguna kepada pihak ketiga di seluruh dunia untuk tujuan apa pun, dengan media apa
        pun.

        Anda menjamin bahwa Konten yang Dihasilkan Pengguna tidak bersifat rahasia atau eksklusif. Anda memberi dan
        menjamin bahwa Anda memiliki keabsahan untuk memberikan hak noneksklusif, tidak dapat dibatalkan, dapat
        dipindahtangankan, bebas royalti, dan terus-menerus, di seluruh dunia kepada adidas untuk menggunakan Konten
        yang Dihasilkan Pengguna Anda dengan cara atau media yang sekarang atau yang nanti dikembangkan, untuk tujuan
        apa pun, baik komersial, periklanan, atau lainnya, termasuk hak untuk menerjemahkan, menampilkan, mereproduksi,
        memodifikasi, membuat karya turunan, sublisensi, mendistribusikan, menetapkan dan mengkomersilkan tanpa
        kewajiban pembayaran apa pun kepada Anda.

        Anda mengetahui dan menyetujui bahwa adidas hanya bertindak sebagai saluran pasif untuk distribusi Konten yang
        Dihasilkan Pengguna dan tidak bertanggung jawab atau dikenai tanggung jawab oleh Anda atau pihak ketiga atas
        konten, keakuratan atau konten yang menyinggung, melanggar hukum atau hal tidak patut yang mungkin Anda temui di
        Konten yang Dihasilkan Pengguna. adidas tidak terus-menerus memantau Konten yang Dihasilkan Pengguna yang
        dipublikasikan oleh Anda atau moderasi di antara pengguna, dan juga adidas tidak berkewajiban untuk melakukan
        hal tersebut. Tanpa membatasi faktor umum dari hal tersebut di atas, Anda mengetahui dan menyetujui bahwa setiap
        ucapan, pendapat, komentar, saran dan informasi lainnya yang diungkapkan atau disertakan dalam Konten yang
        Dihasilkan Pengguna tidak harus mewakili adidas. Anda sepenuhnya menanggung risiko penggunaan apa pun dari
        Konten yang Dihasilkan Pengguna. Anda menyatakan dan menjamin bahwa Konten yang Dihasilkan Pengguna atau Anda
        kirimkan adalah asli dan tidak menyalin karya pihak ketiga atau melanggar hak kekayaan intelektual pihak ketiga,
        hak privasi atau hak kepribadian dan tidak mengandung fitnah atau pernyataan yang meremehkan. Selanjutnya, Anda
        menyatakan dan menjamin bahwa Anda memiliki kemampuan untuk memberikan lisensi sebagaimana diatur dalam paragraf
        ini. Anda setuju untuk mengganti kerugian adidas dan memastikan agar adidas mendapat ganti rugi terhadap semua
        biaya, pengeluaran, kerusakan, kerugian dan kewajiban yang muncul atau dialami oleh adidas terkait dengan Konten
        yang Dihasilkan Pengguna yang Anda atau pengguna dari situs ini posting atau kirimkan.

        adidas memiliki hak atas kebijakannya sendiri untuk memblokir, menghapus (secara keseluruhan atau sebagian) atau
        membatasi Konten yang Dihasilkan Pengguna yang Anda posting atau kirimkan dan yang menurut adidas tidak sesuai
        dengan Syarat dan Ketentuan (termasuk materi yang melanggar atau mungkin melanggar hak kekayaan intelektual
        pihak ketiga, hak privasi atau hak pribadi), atau tidak dapat diterima oleh adidas tanpa pemberitahuan, dan
        tanpa kewajiban kepada Anda atau orang lain.

        Anda setuju untuk segera memberi tahu adidas secara tertulis (lihat Cara Menghubungi Kami di bawah ini untuk
        mengetahui detail kontak) mengenai Konten yang Dihasilkan Pengguna (atau Konten Lainnya) yang melanggar Syarat
        dan Ketentuan. Anda setuju untuk memberikan adidas informasi yang memadai agar adidas dapat menyelidiki apakah
        Konten yang Dihasilkan Pengguna tersebut (atau Konten Lainnya) melanggar Syarat dan Ketentuan. adidas setuju
        untuk melakukan usaha dengan itikad baik untuk menyelidiki keluhan tersebut dan harus mengambil tindakan sesuai
        dengan keputusannya sendiri. Namun, adidas tidak menjamin atau menyatakan bahwa situs web-nya akan memblokir
        atau menghapus (keseluruhan atau sebagian) Konten yang Dihasilkan Pengguna atau Konten lainnya.
    </p><br>
    <h3>GAGASAN YANG TIDAK DIMINTA SECARA SUKARELA</h3><br>
    <p> Adidas mempertahankan kebijakan untuk tidak me-review atau menerima pengajuan gagasan, penemuan, desain dan/atau
        materi lain yang terkait dengan bisnis adidas (termasuk namun tidak terbatas pada sepatu, pakaian, produk
        perlengkapan olahraga, dan layanan) baik yang terdiri dari teks, gambar, suara, perangkat lunak, informasi atau
        sebaliknya (Materi) dari orang-orang yang berada di luar adidas. Oleh karena itu Anda tidak boleh mem-posting
        Materi apa pun di situs ini atau mengirimkannya ke adidas melalui e-mail atau sebaliknya.
    </p><br>
    <h3>Cara menghubungi kami</h3><br>
    <p>
        Jika Anda memiliki pertanyaan atau komentar tentang situs ini atau Syarat dan Ketentuan atau jika Anda ingin
        mengajukan keluhan terkait dengan situs web ini (atau Kontennya), mohon hubungi kami. Rincian kontaknya adalah:

        customercare@id-adidas.com
    </p><br>
    <h3>PERUBAHAN PERSYARATAN</h3><br>
    <p> Setiap saat adidas berhak, atas pertimbangannya sendiri, untuk mengubah, memodifikasi, menambah, atau menghapus
        sebagian Syarat dan Ketentuan. Anda dapat mengecek Syarat dan Ketentuan secara berkala untuk melihat perubahan.
        Jika Anda terus menggunakan situs ini setelah postingan perubahan pada Syarat dan Ketentuan berarti Anda
        menerima perubahan tersebut.
    </p><br>
    <h3>PEMISAHAN KETETAPAN</h3><br>
    <p> Setiap ketetapan dalam Syarat dan Ketentuan ditafsirkan secara terpisah dan independen satu sama lain. Jika ada
        ketetapan yang dianggap tidak sah, tidak berlaku atau tidak dapat diterapkan, ketetapan tersebut dianggap dapat
        dipisahkan dan tidak memengaruhi penerapan ketetapan-ketatapan lain dalam Syarat dan Ketentuan.
    </p><br>
    <h3> PEMBELIAN</h3><br>
    <p> Jika Anda ingin memesan produk melalui situs web ini, harap baca juga Ketentuan Pengiriman.
    </p><br>
    <h3>HUKUM DAN YURISDIKSI YANG BERLAKU</h3><br>
    <p> Syarat dan Ketentuan diatur oleh undang-undang Indonesia, dan Anda dan adidas dengan ini tunduk pada yurisdiksi
        noneksklusif pengadilan Indonesia.</p><br>
    </div>
    <!--  FOOTER  -->
    @include('frontend.frontend_layout.body.footer')

    @include('frontend.frontend_layout.body.script')


    <!-- Add to Cart Product Modal -->

</body>

</html>
