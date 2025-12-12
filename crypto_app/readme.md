Berikut adalah **README.md lengkap**, dengan format **sama seperti contoh Sistem Manajemen Laundry**, tetapi **isinya disesuaikan 100% dengan project Manajemen Crypto milikmu**.

Kamu tinggal **copy–paste** ke file `README.md`.

---

# **Manajemen Crypto – Aplikasi Pengelolaan Aset Cryptocurrency**

Aplikasi web untuk mengelola data aset cryptocurrency berbasis **PHP** dan **MySQL**.
Mendukung CRUD lengkap untuk mencatat **simbol**, **nama crypto**, **harga masuk**, **total alokasi**, dan **kategori asset**, serta dilengkapi **login & register** agar hanya pengguna terdaftar yang dapat mengakses data.

---

# **Fitur Utama**

### ✔ **CRUD Data Crypto**

* Tambah data aset crypto
* Lihat detail aset
* Edit aset
* Hapus aset

### ✔ **Autentikasi Pengguna**

* Register akun baru
* Login dengan password terenkripsi
* Session-based authentication
* Logout

### ✔ **Manajemen Aset**

* Menyimpan simbol aset (ETH, BTC, dll.)
* Menyimpan harga masuk aset
* Menampilkan total alokasi dalam persen
* Menampilkan kategori crypto (misal: Layer 1, Meme, DeFi, CEX, dll.)

### ✔ **Keamanan**

* Password disimpan dengan `password_hash()`
* Akses halaman hanya untuk user yang sudah login

### ✔ **Tampilan Modern**

* Dark mode sederhana
* Tabel rapi menyerupai tampilan CoinStats
* Tombol CRUD dengan warna berbeda untuk memudahkan navigasi

---

# **Cara Setup**

## **1. Buat Database**

Buat database MySQL dengan nama:

```
manajemen_crypto
```

Atau gunakan nama lain, lalu sesuaikan pada file:

```
koneksi.php
```

---

## **2. Import Database**

Import file:

```
data.sql
```

ke dalam database melalui phpMyAdmin.

---

## **3. Letakkan Project ke XAMPP**

Copy folder project ke:

```
C:\xampp\htdocs\crypto_app
```

---

## **4. Atur Koneksi Database**

Buka file:

```
koneksi.php
```

Ubah jika diperlukan:

```php
$host = "localhost";
$user = "root";
$pass = "";
$db   = "manajemen_crypto";
```

---

## **5. Jalankan Aplikasi**

Buka browser dan akses:

```
http://localhost/crypto_app/index.php
```

Untuk login, akses:

```
http://localhost/crypto_app/auth.php
```

---

# **Struktur Database**

## **Tabel: users**

Menyimpan user login.

| Kolom      | Tipe         | Keterangan                  |
| ---------- | ------------ | --------------------------- |
| id         | INT          | Primary Key, Auto Increment |
| nama       | VARCHAR(100) | Username                    |
| password   | VARCHAR(255) | Password terenkripsi        |
| created_at | TIMESTAMP    | Tanggal dibuat              |

---

## **Tabel: crypto_assets**

Menyimpan data aset crypto.

| Kolom         | Tipe         | Keterangan                          |
| ------------- | ------------ | ----------------------------------- |
| id            | INT          | Primary Key                         |
| simbol        | VARCHAR(20)  | Simbol crypto (BTC, ETH, BNB, dll.) |
| nama_crypto   | VARCHAR(100) | Nama lengkap crypto                 |
| harga         | INT          | Harga masuk                         |
| total_alokasi | INT          | Alokasi portfolio (%)               |
| kategori      | VARCHAR(50)  | Kategori aset                       |
| created_at    | TIMESTAMP    | Waktu input                         |

---

# **Struktur File**

```
crypto_app/
├── index.php        # Halaman utama - daftar crypto
├── create.php       # Tambah crypto baru
├── read.php         # Lihat detail aset
├── update.php       # Edit aset
├── delete.php       # Hapus aset
├── auth.php         # Login & register
├── logout.php       # Logout user
├── koneksi.php      # Koneksi database
├── css/
│   └── style.css    # Desain tampilan
├── data.sql         # Struktur database
└── README.md        # Dokumentasi
```

---

# **Cara Penggunaan**

## **1. Login / Register**

* Masukkan nama & password
* Password disimpan terenkripsi dengan `password_hash()`

---

## **2. Tambah Data Crypto**

* Klik **“+ Tambah Crypto”**
* Isi simbol, nama, harga masuk, total alokasi, kategori
* Klik **Simpan**

---

## **3. Lihat Detail Aset**

* Klik tombol **Detail** pada baris data

---

## **4. Edit Data**

* Klik **Edit**
* Ubah data yang diperlukan
* Klik **Update**

---

## **5. Hapus Data**

* Klik **Hapus**
* Konfirmasi untuk menghapus dari database

---

# **Daftar Contoh Data**

| Simbol | Nama         | Harga Masuk   | Alokasi | Kategori      |
| ------ | ------------ | ------------- | ------- | ------------- |
| ETH    | Ethereum     | Rp 45.000.000 | 30%     | Layer 1       |
| BTC    | Bitcoin      | Rp 91.969.000 | 40%     | Proof-of-Work |
| BNB    | Binance Coin | Rp 8.500.000  | 10%     | CEX Token     |
| USDT   | Tether       | Rp 15.000     | 5%      | Stablecoin    |

---

# **Teknologi yang Digunakan**

* **PHP 8+**
* **MySQL 8+**
* **HTML5 & CSS3**
* **XAMPP / Apache**
* **Git & GitHub**

---

# **Author**

Kelompok:

* **Abdurrahman**
* **Dkk.**

Mata Praktikum: **Pemrograman Web**
Universitas: **Universitas Gunadarma**
Tahun: **2025**

---

