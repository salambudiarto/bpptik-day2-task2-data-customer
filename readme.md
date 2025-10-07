# Day 2 - Tugas 2 - Aplikasi CRUD Data Customer (PHP + JSON)

## Deskripsi Proyek

Proyek ini merupakan aplikasi **CRUD sederhana berbasis PHP** yang menyimpan data pelanggan dalam **file JSON** tanpa menggunakan database. Aplikasi memungkinkan pengguna untuk menambahkan data berupa **nama** dan **jenis kelamin**, lalu menampilkannya dalam bentuk tabel menggunakan **Bootstrap**.


[![PHP](https://img.shields.io/badge/PHP-8%2B-blue?logo=php)](https://www.php.net/) [![Bootstrap](https://img.shields.io/badge/Bootstrap-5.3.8-purple?logo=bootstrap)](https://getbootstrap.com/) [![License: MIT](https://img.shields.io/badge/License-MIT-green.svg)](https://opensource.org/licenses/MIT)
### DEMO
[![Demo](https://img.shields.io/badge/Live%20Demo-Click%20Here-brightgreen?style=for-the-badge)](https://iyo.biz.id/bpptik-day2-task2-data-customer/)


---

## Fitur Utama

[x] **Membaca data** dari file JSON (`data_customer.json`)
[x] **Menambah data baru** melalui form input
[x] **Menyimpan perubahan** secara langsung ke file JSON
[x] **Menampilkan data dalam tabel responsif** dengan Bootstrap
[x] **Struktur kode rapi dan mudah dipahami**

---

## Struktur File Proyek

```bash
proyek-crud-json
├── index.php              # File utama aplikasi
├── data_customer.json     # File penyimpanan data customer (format JSON)
├── css
│   └── bootstrap.min.css  # File CSS Bootstrap lokal
└── js
│   └── bootstrap.bundle.min.js  # File JS Bootstrap lokal
└── readme.md              # File Readme (dokumentasi / penjelasan project)
```

---

## Alur Program

1. **Inisialisasi dan Import Bootstrap**

   * Mengatur struktur HTML dan menyertakan file CSS Bootstrap untuk tampilan modern.

2. **Form Input Data**

   * Pengguna memasukkan *nama* dan *jenis kelamin*.
   * Setelah tombol **Kirim** ditekan, data dikirim ke server melalui metode `POST`.

3. **Proses Data di PHP**

   * File JSON dibaca menggunakan `file_get_contents()`.
   * Data diubah dari format JSON ke array PHP (`json_decode()`).
   * Jika form dikirim, data baru ditambahkan ke array dan disimpan kembali ke file JSON (`json_encode()` dan `file_put_contents()`).

4. **Menampilkan Data**

   * Fungsi `sajikan_data()` membuat tabel HTML dari data array.
   * Data tampil secara otomatis di bawah form.

---

## Fungsi Utama: `sajikan_data()`

Fungsi ini menerima parameter berupa **array data customer**, lalu mengubahnya menjadi **baris tabel HTML** dengan nomor urut otomatis.

### Contoh Output:

| No. | Nama | Jenis Kelamin |
| --- | ---- | ------------- |
| 1   | Agus | Laki-laki     |
| 2   | Adel | Perempuan     |

---

## Teknologi yang Digunakan

| Teknologi       | Deskripsi                                                              |
| --------------- | ---------------------------------------------------------------------- |
| **PHP**         | Bahasa pemrograman sisi server untuk memproses data form dan file JSON |
| **Bootstrap 5** | Framework CSS untuk tampilan responsif dan modern                      |
| **JSON**        | Format penyimpanan data ringan sebagai alternatif database             |

---

## Cara Menjalankan Aplikasi

1. Pastikan Anda memiliki **server lokal** seperti XAMPP atau Laragon.
2. Simpan seluruh file proyek dalam folder `htdocs` atau `www`.
3. Jalankan server Apache dari kontrol panel XAMPP/Laragon.
4. Akses aplikasi melalui browser di URL:

   ```
   http://localhost/proyek-crud-json/index.php
   ```
5. Isi form dengan data baru dan klik **Kirim** untuk menambah data ke file JSON.

---

## Catatan Penting

* Pastikan file `data_customer.json` memiliki izin tulis (write permission) agar data dapat disimpan.
* Gunakan format JSON yang valid agar tidak terjadi error saat membaca file.
* Jika data tidak muncul, periksa kembali struktur JSON dan hak akses file.

---

## Lisensi

Proyek ini dibuat untuk tujuan **pembelajaran dasar PHP dan manajemen data berbasis file JSON**. Anda dapat memodifikasi, menyalin, dan mengembangkan proyek ini secara bebas.

---

## Pembuat

| **Keterangan** | **Detail** |
|----------------|-------------|
| **Nama**       | Salam Budiarto |
| **Kelas**      | B |
| **Tugas**      | Day 2 - Tugas 2 - Data Customer |
| **Tanggal**    | 05 Oktober 2025, 13:00 WIB |

