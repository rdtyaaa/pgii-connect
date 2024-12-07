
# Sistem Informasi Penerimaan Siswa Baru (SIPSB)

SIPSB adalah sebuah sistem informasi berbasis web yang dirancang untuk mempermudah proses pendaftaran siswa baru, mulai dari pendaftaran awal hingga pembayaran administrasi. Sistem ini terintegrasi dengan Midtrans sebagai gateway pembayaran dan mendukung proses registrasi multi-tahap.

---

## Fitur Utama

1. **Pendaftaran Online**
   - Formulir pendaftaran lengkap dengan validasi data.
   - Proses pengisian data diri siswa.

2. **Pembayaran Online**
   - Terintegrasi dengan Midtrans untuk pembayaran aman.
   - Mendukung beberapa jenis pembayaran, seperti biaya formulir, uang muka, dan SPP.

3. **Dashboard Multi-Tahap**
   - Tahap 1: Input Data Diri.
   - Tahap 2: Pembayaran Formulir.
   - Tahap 3: Upload Dokumen.
   - Tahap 4: Informasi Wawancara.
   - Tahap 5: Pembayaran Uang Muka.
   - Indikator visual untuk menampilkan status tiap tahap.

4. **Manajemen Pembayaran**
   - Update otomatis untuk pembayaran dengan status `pending`.
   - Tidak ada duplikasi data pembayaran.

5. **Autentikasi dan Keamanan**
   - Login hanya bisa dilakukan di satu perangkat pada satu waktu.
   - Menggunakan Laravel session bawaan untuk mengelola login unik.

---

## Teknologi yang Digunakan

- **Frontend**: HTML, CSS (TailwindCSS), JavaScript.
- **Backend**: Laravel Framework.
- **Database**: MySQL.
- **Payment Gateway**: Midtrans.
- **Authentication**: Laravel Breeze dengan role-based access control (RBAC).
- **Versioning**: Git.

---

## Instalasi

1. Clone repository:
   ```bash
   git clone https://github.com/username/sipsb.git
   cd sipsb
   ```

2. Install dependencies:
   ```bash
   composer install
   npm install
   ```

3. Buat file `.env`:
   ```bash
   cp .env.example .env
   ```

4. Atur konfigurasi di file `.env`:
   - **Database**:
     ```env
     DB_DATABASE=sipsb
     DB_USERNAME=root
     DB_PASSWORD=password
     ```
   - **Midtrans**:
     ```env
     MIDTRANS_SERVER_KEY=your-server-key
     MIDTRANS_IS_PRODUCTION=false
     ```

5. Jalankan migrasi database:
   ```bash
   php artisan migrate
   ```

6. Jalankan server:
   ```bash
   php artisan serve
   ```

7. Buka aplikasi di browser:
   ```
   http://127.0.0.1:8000
   ```

---

## Penggunaan

### 1. Pendaftaran Siswa Baru
- Isi formulir pendaftaran.
- Lanjutkan ke tahap pembayaran formulir.

### 2. Pembayaran
- Sistem akan memproses pembayaran melalui Midtrans.
- Status pembayaran dapat dilihat di dashboard.

### 3. Proses Tahapan
- Ikuti setiap tahap yang ditampilkan di dashboard.

---

## Struktur Database

### Tabel `students`
| Kolom        | Tipe Data  | Keterangan                       |
|--------------|------------|-----------------------------------|
| id           | BIGINT     | Primary key                     |
| user_id      | BIGINT     | Foreign key ke tabel users       |
| name         | VARCHAR    | Nama lengkap siswa               |
| email        | VARCHAR    | Email siswa                      |
| phone        | VARCHAR    | Nomor telepon siswa              |
| status       | ENUM       | Tahap registrasi (Tahap 1-5)     |

### Tabel `payments`
| Kolom         | Tipe Data  | Keterangan                           |
|---------------|------------|---------------------------------------|
| id            | BIGINT     | Primary key                          |
| order_id      | VARCHAR    | ID transaksi unik                    |
| user_id       | BIGINT     | Foreign key ke tabel users           |
| amount        | DECIMAL    | Nominal pembayaran                   |
| payment_type  | VARCHAR    | Jenis pembayaran                     |
| status        | ENUM       | Status pembayaran (pending/success)  |
| snap_token    | TEXT       | Token transaksi Midtrans             |
| payment_date  | DATETIME   | Tanggal pembayaran                   |
| description   | TEXT       | Keterangan transaksi                 |

---

## Kontribusi

1. Fork repository ini.
2. Buat branch baru untuk fitur atau bug fix.
   ```bash
   git checkout -b fitur-anda
   ```
3. Commit perubahan Anda:
   ```bash
   git commit -m "Menambahkan fitur baru"
   ```
4. Push branch Anda:
   ```bash
   git push origin fitur-anda
   ```
5. Ajukan pull request.

---

## Lisensi

Proyek ini dilisensikan di bawah [MIT License](LICENSE).

---

## Kontak

Jika ada pertanyaan, silakan hubungi:
- **Nama**: Yoga Raditya Nugraha Sukma Pradana
- **Email**: yogaradit123@gmail.com
