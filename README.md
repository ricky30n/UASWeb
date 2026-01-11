# UASWeb

<img width="1920" height="1080" alt="Screenshot (191)" src="https://github.com/user-attachments/assets/b7cb4de8-5332-4d62-bba8-8542d28c716d" />

## 🛡️ Modul Login & Security

Implementasi sistem autentikasi untuk membatasi akses ke dalam *Inventory Management System*.

- **Frontend:** Desain responsif menggunakan CSS Framework (Bootstrap/Tailwind) dengan layout *centered card*.
- **Backend:** - Verifikasi kredensial user menggunakan database.
    - Penerapan *Session Handling* untuk menjaga state login pengguna.
    - *Error Handling* jika username/password salah.
- **Roles:** Mendukung peran ganda (Admin & User) yang akan diarahkan ke dashboard masing-masing setelah login berhasil.

### 🔑 Akun Demo (Untuk Pengujian)

Gunakan kredensial berikut untuk mencoba aplikasi:

| Role | Username | Password |
| :--- | :--- | :--- |
| **Admin** | `admin` | `admin123` |
| **User** | `user` | `user123` |

<img width="1920" height="1080" alt="Screenshot (192)" src="https://github.com/user-attachments/assets/bb3109aa-3f46-4361-bf08-7bdd717c4c26" />

## ⚙️ Modul Data & Operasi CRUD

Implementasi logika backend untuk manipulasi data (Create, Read, Update, Delete) yang terhubung langsung ke database.

* **Read (Data View):** Menampilkan data dari database MySQL ke dalam tabel HTML dinamis menggunakan `mysqli_fetch_assoc` / `PDO`.
* **Search Engine:** Menggunakan *query SQL* dengan klausa `LIKE` untuk memfilter hasil berdasarkan kata kunci input user.
* **Create & Update:** Form input untuk menambah dan memperbarui data stok.
* **Delete:** Mekanisme penghapusan data dengan konfirmasi keamanan (opsional: *JavaScript confirmation*) untuk mencegah penghapusan tidak sengaja.
* **Session Check:** Memastikan halaman ini hanya bisa diakses jika user sudah login sebagai 'Admin'.

## 👤 Dashboard User (Staff View)

Halaman antarmuka khusus untuk pengguna dengan level akses **User**. Tampilan ini dirancang untuk kebutuhan monitoring dan pengecekan ketersediaan barang tanpa risiko perubahan data yang tidak disengaja.

**Fitur & Batasan:**
* **Akses Baca Saja (Read-Only):** User dapat melihat daftar lengkap barang dan jumlah stok, namun **tidak memiliki opsi** untuk Menambah, Mengedit, atau Menghapus data.
* **Pencarian Barang:** Memudahkan User mencari lokasi atau status stok barang tertentu menggunakan fitur *Search*.
* **Antarmuka Bersih:** Kolom "Aksi" (Edit/Hapus) dan tombol "Tambah Barang" secara otomatis disembunyikan untuk menyederhanakan tampilan dan menjaga keamanan data.

**Struktur Data (Contoh):**
* `kode_barang` (Primary Key, Varchar)
* `nama_barang` (Varchar)
* `kategori` (Varchar/Enum)
* `harga` (Int/Decimal)
* `stok` (Int)

### 📋 Matriks Hak Akses

| Fitur | Admin | User |
| :--- | :---: | :---: |
| Login & Logout | ✅ | ✅ |
| Lihat Daftar Barang | ✅ | ✅ |
| Cari Barang | ✅ | ✅ |
| Tambah Barang | ✅ | ❌ |
| Edit Data | ✅ | ❌ |
| Hapus Data | ✅ | ❌ |

<img width="593" height="127" alt="Screenshot 2026-01-11 124502" src="https://github.com/user-attachments/assets/63f405bc-0244-4073-bc2a-0ebe9e86bd9d" />

## 📑 Fitur Pagination

Untuk menjaga performa aplikasi dan kenyamanan tampilan saat data barang berjumlah banyak, sistem dilengkapi dengan navigasi halaman (Pagination).

* **Navigasi Intuitif:** Tombol *Previous*, *Next*, dan penomoran halaman memudahkan pengguna berpindah antar data.
* **Active State:** Indikator visual (warna biru) menunjukkan halaman mana yang sedang aktif diakses pengguna.
* **Data Limiting:** Membatasi jumlah data yang ditampilkan per halaman agar loading aplikasi tetap cepat.

<img width="1920" height="1080" alt="Screenshot (193)" src="https://github.com/user-attachments/assets/d8fad154-def6-48fc-b515-b2466451a22c" />

## 📝 Fitur Input Data Barang

Halaman formulir khusus bagi Admin untuk mendaftarkan inventaris baru ke dalam sistem. Dirancang dengan antarmuka yang bersih untuk meminimalkan kesalahan input.

**Detail Fitur:**
* **Formulir Terstruktur:** Kolom input yang jelas meliputi Kode Barang, Nama Barang, Kategori, Harga, dan Stok awal.
* **Panduan Input:** Dilengkapi dengan *placeholder* (contoh teks samar) di dalam kolom isian untuk memberikan petunjuk format data yang benar kepada pengguna (misal: format kode barang).
* **Navigasi:** Tersedia tombol "Batal" untuk kembali ke dashboard jika pengguna berubah pikiran, dan tombol "Simpan Data" untuk memproses penyimpanan ke database.

### Fitur Unggulan Lainnya

| Tambah Barang | Pagination |
| :---: | :---: |
| [Masukkan Gambar Form Tambah Barang] | [Masukkan Gambar Pagination] |
| Formulir intuitif untuk input stok baru dengan validasi data. | Navigasi halaman untuk mengelola tampilan data dalam jumlah besar. |

<img width="549" height="144" alt="Screenshot 2026-01-11 125454" src="https://github.com/user-attachments/assets/5ee8af00-150e-451b-ad1a-ae20589385b9" />

### 🔍 Pencarian Cepat (Quick Search)

Fitur pencarian responsif yang terletak di dashboard utama. Memudahkan admin maupun user untuk menemukan barang spesifik secara instan.
* **Fleksibel:** Mendukung pencarian berdasarkan **Nama Barang** atau **Kode Barang** (misal: "Laptop" atau "BRG001").
* **Efisiensi:** Menghemat waktu tanpa harus mencari satu per satu di dalam tabel yang panjang.

## 🚀 Fitur Unggulan

| Pencarian Cepat | Pagination |
| :---: | :---: |
| ![Search Bar](path/to/search-image.png) | ![Pagination](path/to/pagination-image.png) |
| Cari barang via Nama/Kode | Navigasi data per halaman |

| Form Input Barang |
| :---: |
| ![Tambah Barang](path/to/tambah-barang.png) |
| Form input data stok baru dengan validasi |

<img width="149" height="145" alt="Screenshot 2026-01-11 130233" src="https://github.com/user-attachments/assets/6156e9bb-e316-438a-963b-8af21b51a002" />

## 🔒 Fitur Logout (Keamanan Akun)

Tombol **Logout** berfungsi sebagai mekanisme keamanan esensial untuk mengakhiri akses pengguna ke dalam sistem.

* **Terminasi Sesi:** Memastikan sesi (*session*) pengguna benar-benar berakhir sehingga dashboard tidak dapat diakses kembali melalui tombol *Back* pada browser.
* **Akses Cepat:** Tombol diletakkan di posisi strategis (pojok kanan atas) agar mudah dijangkau kapan saja.
* **Redirection:** Pengguna akan otomatis diarahkan kembali ke halaman **Login** setelah berhasil keluar.
