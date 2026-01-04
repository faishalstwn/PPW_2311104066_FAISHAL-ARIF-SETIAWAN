# RESTful API - Mahasiswa

REST API untuk manajemen data mahasiswa menggunakan Node.js, Express, dan MySQL.

## Instalasi

1. Install dependencies:
```bash
npm install
```

2. Buat database di MySQL:
```bash
# Jalankan query dari file database.sql di phpMyAdmin atau MySQL client
```

3. Konfigurasi database di `db.js`:
- Host: localhost
- User: root
- Password: (kosong atau sesuai konfigurasi)
- Database: akademik

## Menjalankan Server

```bash
node server.js
```

Server akan berjalan di `http://localhost:3000`

## API Endpoints

### GET - Semua Mahasiswa
```
GET http://localhost:3000/api/mahasiswa
```

### GET - Mahasiswa by ID
```
GET http://localhost:3000/api/mahasiswa/:id
```

### POST - Tambah Mahasiswa
```
POST http://localhost:3000/api/mahasiswa
Content-Type: application/json

{
    "nama": "John Doe",
    "nim": "2311104099",
    "jurusan": "Teknik Informatika",
    "email": "john@gmail.com"
}
```

### PUT - Update Mahasiswa
```
PUT http://localhost:3000/api/mahasiswa/:id
Content-Type: application/json

{
    "nama": "John Doe Updated",
    "nim": "2311104099",
    "jurusan": "Sistem Informasi",
    "email": "john.updated@gmail.com"
}
```

### DELETE - Hapus Mahasiswa
```
DELETE http://localhost:3000/api/mahasiswa/:id
```

## Testing dengan cURL

### GET All
```bash
curl http://localhost:3000/api/mahasiswa
```

### POST Create
```bash
curl -X POST http://localhost:3000/api/mahasiswa -H "Content-Type: application/json" -d "{\"nama\":\"Test User\",\"nim\":\"2311104999\",\"jurusan\":\"Teknik Informatika\",\"email\":\"test@gmail.com\"}"
```

### PUT Update
```bash
curl -X PUT http://localhost:3000/api/mahasiswa/1 -H "Content-Type: application/json" -d "{\"nama\":\"Updated Name\",\"nim\":\"2311104066\",\"jurusan\":\"Sistem Informasi\",\"email\":\"updated@gmail.com\"}"
```

### DELETE
```bash
curl -X DELETE http://localhost:3000/api/mahasiswa/1
```
