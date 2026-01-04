# 📚 APLIKASI PENGELOLAAN DATA MAHASISWA
### Node.js + Express.js + MySQL + HTML/CSS/JavaScript

**Dibuat oleh:** Faishal Arif Setiawan - 2311104066  
**Pertemuan:** 13 - RESTful API & Web Application

---

## 📋 DESKRIPSI PROYEK

Aplikasi web sederhana untuk mengelola data mahasiswa yang dibangun menggunakan:
- **Backend:** Node.js dengan Express.js
- **Database:** MySQL
- **Frontend:** HTML, CSS, JavaScript (Vanilla)
- **API:** RESTful API dengan metode CRUD

---

## 🗂️ STRUKTUR FOLDER

```
Latihan/
├── public/
│   ├── index.html      # Halaman web utama
│   ├── style.css       # Styling aplikasi
│   └── script.js       # JavaScript untuk interaksi dengan API
├── app.js              # Server Express & Route API
├── db.js               # Konfigurasi koneksi database
├── crud.js             # Operasi CRUD
├── database.sql        # Script SQL untuk membuat database & tabel
├── package.json        # Dependencies Node.js
└── README.md           # Dokumentasi (file ini)
```

---

## 🚀 TAHAPAN PENGERJAAN APLIKASI SECARA SISTEMATIS

### **TAHAP 1: PERSIAPAN PROYEK**

#### 1.1 Inisialisasi Proyek Node.js
```bash
cd "C:\PPW_2311104066_FaishalArifSetiawan\Pertemuan 13\Latihan"
npm init -y
```

#### 1.2 Install Dependencies
```bash
npm install express mysql2 body-parser cors
```

**Penjelasan Dependencies:**
- `express`: Framework web untuk Node.js
- `mysql2`: Driver untuk koneksi ke MySQL
- `body-parser`: Parsing request body
- `cors`: Cross-Origin Resource Sharing (agar frontend bisa akses API)

---

### **TAHAP 2: MEMBUAT DATABASE & TABEL**

#### 2.1 Buka phpMyAdmin atau MySQL CLI
Akses: `http://localhost/phpmyadmin`

#### 2.2 Jalankan Script SQL
Buka file `database.sql` dan jalankan query berikut:

```sql
CREATE DATABASE IF NOT EXISTS akademik_latihan;
USE akademik_latihan;

CREATE TABLE IF NOT EXISTS mahasiswa (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nama VARCHAR(100) NOT NULL,
    nim VARCHAR(20) NOT NULL UNIQUE,
    jurusan VARCHAR(50) NOT NULL,
    email VARCHAR(100) NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

INSERT INTO mahasiswa (nama, nim, jurusan, email) VALUES
('Faishal Arif Setiawan', '2311104066', 'Teknik Informatika', 'faishal@gmail.com'),
('Ahmad Rizki', '2311104001', 'Sistem Informasi', 'ahmad.rizki@gmail.com'),
('Siti Nurhaliza', '2311104002', 'Teknik Informatika', 'siti.nur@gmail.com');
```

#### 2.3 Verifikasi Database
```sql
SELECT * FROM mahasiswa;
```

---

### **TAHAP 3: KONFIGURASI DATABASE (db.js)**

File ini menghubungkan aplikasi Node.js dengan MySQL.

**Fitur:**
- Koneksi ke database MySQL
- Handle error connection
- Export connection untuk digunakan di file lain

**Konfigurasi:**
```javascript
host: 'localhost'
user: 'root'
password: ''  // Sesuaikan dengan password MySQL
database: 'akademik_latihan'
```

---

### **TAHAP 4: MEMBUAT OPERASI CRUD (crud.js)**

File ini berisi 5 fungsi CRUD:

1. **createMahasiswa()** - Menambah data mahasiswa baru
2. **getAllMahasiswa()** - Mengambil semua data mahasiswa
3. **getMahasiswaById()** - Mengambil data berdasarkan ID
4. **updateMahasiswa()** - Memperbarui data mahasiswa
5. **deleteMahasiswa()** - Menghapus data mahasiswa

Setiap fungsi menggunakan callback untuk menangani asynchronous operations.

---

### **TAHAP 5: MEMBUAT REST API (app.js)**

#### 5.1 Setup Server Express
- Import dependencies
- Setup middleware (CORS, body-parser)
- Serve static files untuk frontend

#### 5.2 Definisi Endpoint API

| Method | Endpoint | Deskripsi |
|--------|----------|-----------|
| GET | `/api/mahasiswa` | Ambil semua data mahasiswa |
| GET | `/api/mahasiswa/:id` | Ambil data berdasarkan ID |
| POST | `/api/mahasiswa` | Tambah mahasiswa baru |
| PUT | `/api/mahasiswa/:id` | Update data mahasiswa |
| DELETE | `/api/mahasiswa/:id` | Hapus data mahasiswa |

#### 5.3 Response Format
```json
{
    "success": true/false,
    "message": "Pesan sukses/error",
    "data": {...}  // optional
}
```

---

### **TAHAP 6: MEMBUAT HALAMAN WEB**

#### 6.1 HTML (index.html)
**Komponen:**
- Header aplikasi
- Form input/edit data mahasiswa
- Tabel untuk menampilkan data
- Footer

**Fitur Form:**
- Input: Nama, NIM, Jurusan, Email
- Mode: Tambah atau Edit
- Tombol: Submit dan Batal

#### 6.2 CSS (style.css)
**Styling:**
- Gradient background
- Card-based layout
- Responsive design
- Button hover effects
- Toast notification styling

#### 6.3 JavaScript (script.js)
**Fungsi-fungsi:**

1. **loadMahasiswa()** - Load data dari API dan tampilkan di tabel
2. **handleSubmit()** - Handle form submit (Create/Update)
3. **editMahasiswa()** - Isi form dengan data yang akan diedit
4. **deleteMahasiswa()** - Hapus data dengan konfirmasi
5. **resetForm()** - Reset form ke mode tambah
6. **showToast()** - Tampilkan notifikasi sukses/error

**Teknologi:**
- Fetch API untuk HTTP requests
- Async/Await untuk handling promises
- DOM Manipulation
- Event Listeners

---

## 🔧 CARA MENJALANKAN APLIKASI

### **Langkah 1: Pastikan Database Sudah Dibuat**
Jalankan script `database.sql` di phpMyAdmin.

### **Langkah 2: Install Dependencies**
```bash
npm install
```

### **Langkah 3: Jalankan Server**
```bash
npm start
# atau
node app.js
```

### **Langkah 4: Buka Browser**
Akses aplikasi di: **http://localhost:3000**

**Output di Terminal:**
```
✅ Connected to MySQL database: akademik_latihan
=================================
🚀 Server running on:
   http://localhost:3000
=================================
```

---

## 🧪 TESTING API

### 1. Menggunakan Browser
Langsung akses **http://localhost:3000** dan gunakan form yang tersedia.

### 2. Menggunakan Postman

#### GET - Semua Data
```
GET http://localhost:3000/api/mahasiswa
```

#### GET - By ID
```
GET http://localhost:3000/api/mahasiswa/1
```

#### POST - Tambah Data
```
POST http://localhost:3000/api/mahasiswa
Content-Type: application/json

{
    "nama": "John Doe",
    "nim": "2311104999",
    "jurusan": "Teknik Informatika",
    "email": "john@gmail.com"
}
```

#### PUT - Update Data
```
PUT http://localhost:3000/api/mahasiswa/1
Content-Type: application/json

{
    "nama": "John Doe Updated",
    "nim": "2311104999",
    "jurusan": "Sistem Informasi",
    "email": "john.updated@gmail.com"
}
```

#### DELETE - Hapus Data
```
DELETE http://localhost:3000/api/mahasiswa/1
```

### 3. Menggunakan cURL

```bash
# GET All
curl http://localhost:3000/api/mahasiswa

# POST Create
curl -X POST http://localhost:3000/api/mahasiswa ^
  -H "Content-Type: application/json" ^
  -d "{\"nama\":\"Test User\",\"nim\":\"2311104888\",\"jurusan\":\"Teknik Informatika\",\"email\":\"test@gmail.com\"}"

# PUT Update
curl -X PUT http://localhost:3000/api/mahasiswa/1 ^
  -H "Content-Type: application/json" ^
  -d "{\"nama\":\"Updated Name\",\"nim\":\"2311104066\",\"jurusan\":\"Sistem Informasi\",\"email\":\"updated@gmail.com\"}"

# DELETE
curl -X DELETE http://localhost:3000/api/mahasiswa/1
```

---

## 📱 FITUR APLIKASI WEB

### ✅ Fitur yang Tersedia:
1. **Tambah Mahasiswa** - Form input dengan validasi
2. **Lihat Data** - Tabel data mahasiswa dengan nomor urut
3. **Edit Data** - Klik tombol Edit untuk mengubah data
4. **Hapus Data** - Klik tombol Hapus dengan konfirmasi
5. **Refresh Data** - Tombol refresh untuk reload data
6. **Toast Notification** - Notifikasi sukses/error
7. **Responsive Design** - Tampilan menyesuaikan layar

### 🎨 Tampilan UI:
- Modern card-based design
- Gradient purple background
- Interactive buttons dengan hover effect
- Color-coded action buttons (Edit: Orange, Delete: Red)
- Clean table layout

---

## 🛠️ TROUBLESHOOTING

### Problem 1: Error connecting to database
**Solusi:**
- Pastikan MySQL service running
- Cek konfigurasi di `db.js` (host, user, password)
- Pastikan database `akademik_latihan` sudah dibuat

### Problem 2: CORS Error
**Solusi:**
- Pastikan `cors` sudah terinstall
- Middleware CORS sudah di-setup di `app.js`

### Problem 3: Port sudah digunakan
**Solusi:**
- Ubah PORT di `app.js` (default: 3000)
- Atau stop aplikasi lain yang menggunakan port tersebut

### Problem 4: npm not recognized
**Solusi:**
- Set execution policy: `Set-ExecutionPolicy -ExecutionPolicy RemoteSigned -Scope CurrentUser`

---

## 📚 TEKNOLOGI & KONSEP YANG DIPELAJARI

### Backend:
- Node.js fundamentals
- Express.js routing & middleware
- RESTful API design
- MySQL database operations
- Async/Await & Callbacks
- Error handling

### Frontend:
- HTML5 semantic elements
- CSS3 styling & animations
- JavaScript ES6+
- Fetch API
- DOM manipulation
- Event handling
- Responsive design

### Database:
- MySQL DDL & DML
- CRUD operations
- Primary key & Auto increment
- Timestamps

---

## 📝 CATATAN PENTING

1. **Validasi Input:** Form memiliki validasi HTML5 (required)
2. **Error Handling:** Semua operasi API memiliki try-catch
3. **User Feedback:** Toast notification untuk setiap aksi
4. **Konfirmasi Delete:** Dialog konfirmasi sebelum menghapus
5. **NIM Unique:** NIM harus unique di database

---

## 🎯 KESIMPULAN

Aplikasi ini mendemonstrasikan:
- **Full-stack development** dengan Node.js, Express, dan MySQL
- **RESTful API** dengan operasi CRUD lengkap
- **Frontend integration** dengan Vanilla JavaScript
- **Best practices** dalam error handling dan user experience
- **Clean code** dengan struktur file yang terorganisir

---

## 📧 KONTAK

**Nama:** Faishal Arif Setiawan  
**NIM:** 2311104066  
**Mata Kuliah:** Pemrograman Perangkat Web  
**Pertemuan:** 13

---

**© 2026 - Aplikasi Pengelolaan Data Mahasiswa**
