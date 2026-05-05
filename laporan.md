
## 1. Deskripsi Fitur
Fitur ini menyediakan endpoint API untuk menampilkan **Rekap Kunjungan Dokter**. Data yang ditampilkan mencakup:
* Nama Dokter & Spesialisasi
* Total Kunjungan per periode
* Total Pendapatan
* Rata-rata Kepuasan (Rating)

## 2. Struktur File
Proyek didevelop dengan memisahkan tanggung jawab kode (Clean Code):
1. `db_connection.php`: Konfigurasi database menggunakan PDO.
2. `dokterrepository.php`: Class Repository untuk query data ke database.
3. `laporan_dokter.php`: Endpoint utama yang menghasilkan output JSON.

## 3. Implementasi Kode
Sistem menggunakan **PHP PDO** dengan **Prepared Statements** untuk mencegah *SQL Injection*, memastikan data ditarik secara aman berdasarkan parameter bulan dan tahun.

## 4. Hasil Uji Coba
Berikut adalah hasil running program yang menampilkan data dalam format JSON:

![Hasil Running](<Screenshot 2026-05-05 145719.png>)
