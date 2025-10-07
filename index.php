<!doctype html>
<!-- Deklarasi tipe dokumen HTML5 untuk memastikan browser merender dokumen dengan standar modern -->
<html lang="en">
  <!-- Tag pembuka HTML dengan atribut bahasa 'en' (English) -->
  <head>
    <!-- Bagian <head> berisi metadata, judul halaman, dan pemanggilan file CSS -->

    <meta charset="utf-8">
    <!-- Menentukan encoding karakter UTF-8 agar semua karakter (termasuk simbol & huruf internasional) dapat ditampilkan -->

    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Membuat tampilan responsif sesuai ukuran layar perangkat (desktop, tablet, mobile) -->

    <title>Tugas 3 - Kalkulator Sederhana</title>
    <!-- Judul halaman yang akan muncul di tab browser -->

    <link href="./css/bootstrap.min.css" rel="stylesheet">
    <!-- Memanggil file CSS Bootstrap lokal untuk menggunakan komponen dan gaya Bootstrap -->
  </head>

  <body>
    <!-- Bagian utama konten halaman web -->

    <div class="container mt-5">
			<!-- Judul Project Tugas 3 -->
			<h1>Data Customer</h1>

			<!-- Pembatas line -->
			<hr>

      <!-- Container Bootstrap untuk mengatur tata letak konten agar responsif -->

      <!-- Form input data customer -->
      <form action="" method="post">
        <!-- Atribut action kosong berarti data form dikirim ke halaman ini sendiri -->
        <!-- method="post" digunakan agar data dikirim secara aman tanpa tampil di URL -->

        <table class="table">
          <!-- Menggunakan tabel untuk menyusun form agar lebih terstruktur -->

          <tr>
            <td>Nama</td>
            <td> : </td>
            <td>
              <input class="form-control" type="text" name="nama" placeholder="Nama" autofocus require>
              <!-- Input untuk nama pengguna, dengan placeholder dan fokus otomatis -->
            </td>
          </tr>

          <tr>
            <td>Jenis Kelamin</td>
            <td> : </td>
            <td>
              <input class="form-control" type="text" name="jenis_kelamin" placeholder="Jenis Kelamin" require>
              <!-- Input untuk jenis kelamin -->
            </td>
          </tr>

          <tr>
            <td>
              <button type="submit" class="btn btn-primary w-100" name="kirim">Kirim</button>
              <!-- Tombol kirim data, dengan styling Bootstrap -->
            </td>
            <td></td>
            <td></td>
          </tr>
        </table>
      </form>

      <?php
        // ===============================
        // Bagian PHP: Proses Data JSON
        // ===============================

        // Fungsi untuk menampilkan data dalam bentuk tabel HTML
        function sajikan_data($data_array){
          // Melakukan perulangan untuk setiap elemen array data_customer
          foreach($data_array as $key => $value){
            $no = $key + 1; // Nomor urut otomatis dimulai dari 1

            // Membuat baris HTML untuk setiap data customer
            $row[] = "<tr>
              <td>{$no}</td>
              <td>{$value['nama']}</td>
              <td>{$value['jenis_kelamin']}</td>
            </tr>";
          }

          // Menggabungkan semua baris tabel menjadi satu string HTML
          $data_customer = implode("", $row);

          // Mengembalikan struktur tabel lengkap dengan header dan body
          return "<table class='table table-bordered'>
            <thead>
              <tr class='table-active'>
                <th>No.</th>
                <th>Nama</th>
                <th>Jenis Kelamin</th>
              </tr>
            </thead>
            <tbody>
              {$data_customer}
            </tbody>
          </table>";
        }

        // Inisialisasi variabel array kosong untuk menampung data customer
        $data_customer = array();

        // Nama file penyimpanan data JSON
        $file = 'data_customer.json';

        // Membaca isi file JSON ke dalam variabel string
        $json = file_get_contents($file);

        // Mengubah data JSON menjadi array PHP (associative array)
        $data_customer = json_decode($json, true);

        // Cek apakah form dikirim dengan tombol 'kirim'
        if (isset($_POST['kirim']) && isset($_POST['nama']) && isset($_POST['jenis_kelamin'])) {
          // Menyimpan data form POST ke variabel
          $items = $_POST;

          // Membuat array baru untuk data yang dikirim dari form
          $data_baru = array(
            'nama' => $items['nama'],
            'jenis_kelamin' => $items['jenis_kelamin'],
          );

          // Menambahkan data baru ke array utama
          array_push($data_customer, $data_baru);

          // Mengubah array kembali ke format JSON dengan format yang rapi (pretty print)
          $data_json = json_encode($data_customer, JSON_PRETTY_PRINT);

          // Menyimpan kembali data JSON ke dalam file
          file_put_contents($file, $data_json);

          // Menampilkan data customer dalam bentuk tabel
          echo sajikan_data($data_customer);

          // Menghentikan eksekusi script agar halaman tidak lanjut diproses dua kali
          exit;
        } else {
          // Jika belum ada data baru dikirim, tampilkan data dari file JSON
          echo sajikan_data($data_customer);
          exit;
        }
      ?>
    </div>

    <!-- Menyertakan file JavaScript Bootstrap agar komponen interaktif (modal, alert, dll.) dapat berfungsi -->
    <script src="./js/bootstrap.bundle.min.js"></script>
  </body>
</html>