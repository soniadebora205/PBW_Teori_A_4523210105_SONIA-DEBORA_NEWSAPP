# PERTEMUAN TEORI: PANEL ADMIN UNTUK WARTAWAN, BERITA, DAN KOMENTAR PADA NEWSAPP

- **Nama:** Sonia Debora Napitupulu  
- **NPM:** 4523210105  
- **Mata Kuliah:** Pemrograman Berbasis Web (A)  
- **Dosen Pengampu:** Adi Wahyu Pribadi S.Si., M.Kom.

---

## PEMBELAJARAN HARI INI

Membangun dan Mempelajari CRUD Laravel dengan Filament. Filament itu sendiri merupakan framework yang dipakai untuk membuat admin panel dengan cepat tanpa perlu melakukan coding dari nol. Fitur-fitur yang disediakan langsung oleh Filament adalah admin panel instan dengan CRUD otomatis, UI/UX yang bagus (menggunakan Tailwind CSS) dan mempunyai mode light serta dark yang memberikan kenyamanan lebih bagi developer.

## TOOLS VERSION

Sesuai prasyarat tools version yang mendukung Filament v3.3, di sini saya menggunakan tools version sebagai berikut:

1. PHP v8.4.13
2. Composer v2.8.4
3. Node v22.12.0
4. npm v10.9.0
5. MySQL v8.4.3

---

## PANEL ADMIN KOMENTAR

Pertemuan hari ini melanjutkan progress NewsApp dengan membuat tiga panel admin, yaitu Wartawan, Karyawan dan Berita. Adapun yang menjadi tugas bagi mahasiswa adalah membuat panel admin komentar. Di posisi ini, admin bertindak sebagai "viewer" yang dapat juga menghapus komentar apabila komentar kurang berkenan untuk tertampil di publik.

### 1. DAFTAR KOMENTAR

<img width="1280" alt="Panel Komentar" src="https://github.com/user-attachments/assets/160b940d-38d3-45e0-9552-1e9f5c9a302a" />

Panel admin komentar menampilkan daftar seluruh komentar yang masuk dengan kolom: Judul Berita, Nama Komentator, Isi Komentar (dengan limit karakter), dan Tanggal Dibuat.

### 2. VIEW KOMENTAR

<img width="1280" alt="View Detail Komentar" src="https://github.com/user-attachments/assets/a639c770-a9cc-4884-9429-9783d0b7639a" />

Penambahan `Tables\Actions\ViewAction::make()` membuat admin dapat melihat komentar pengunjung secara detail. Sebab di dalam tabel daftar komentar keseluruhan, panjang komentar dikenakan limit supaya panjang kolom tampak efisien.

### 3. DELETE KOMENTAR

<img width="1280" alt="Konfirmasi Hapus Komentar" src="https://github.com/user-attachments/assets/020fef3b-ac1f-4be4-8f3b-1e82a828dbb2" />

<img width="1280" alt="Komentar Berhasil Dihapus" src="https://github.com/user-attachments/assets/9cf88e37-c5ab-4ee2-8058-6d2587b92998" />

Di sini saya simulasikan menghapus komentar dari Gelda Gulgowski. `Tables\Actions\DeleteAction::make()` memberikan action bagi user untuk menghapus komentar. Setelah tindakan dikonfirmasi, komentar tidak tampil di portal berita lagi karena otomatis komentar terhapus juga dari database.

### 4. SORTING KOMENTAR

<img width="1280" alt="Sorting Komentar" src="https://github.com/user-attachments/assets/c2a5c5e5-54ae-4dd0-88a0-8fbd64866ba5" />

Sorting dapat dilakukan ketika admin menekan tombol panah pada kolom tabel. Dengan `sortable()`, sorting bisa dilakukan pada kolom Nama Komentator, Judul Berita, dan Isi Komentar (berdasarkan abjad) serta Tanggal (bisa ascending maupun descending).

---

## KESIMPULAN

Panel admin komentar berhasil dibuat dengan fitur-fitur yang memungkinkan admin untuk:
- Melihat daftar seluruh komentar
- Melihat detail komentar secara lengkap
- Menghapus komentar yang tidak sesuai
- Melakukan sorting berdasarkan berbagai kolom

Implementasi ini memudahkan admin dalam mengelola komentar pada aplikasi NewsApp dengan antarmuka yang user-friendly berkat Filament.
