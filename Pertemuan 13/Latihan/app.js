const express = require('express');
const bodyParser = require('body-parser');
const cors = require('cors');
const path = require('path');
const dbOperations = require('./crud');

const app = express();
const PORT = 3000;

app.use(cors());
app.use(bodyParser.json());
app.use(bodyParser.urlencoded({ extended: true }));

app.use(express.static(path.join(__dirname, 'public')));


app.get('/api/mahasiswa', (req, res) => {
    dbOperations.getAllMahasiswa((error, results) => {
        if (error) {
            return res.status(500).json({ 
                success: false, 
                message: 'Error fetching data', 
                error: error.message 
            });
        }
        res.json({ 
            success: true, 
            data: results 
        });
    });
});

app.get('/api/mahasiswa/:id', (req, res) => {
    const { id } = req.params;
    dbOperations.getMahasiswaById(id, (error, result) => {
        if (error) {
            return res.status(500).json({ 
                success: false, 
                message: 'Error fetching data', 
                error: error.message 
            });
        }
        if (!result) {
            return res.status(404).json({ 
                success: false, 
                message: 'Mahasiswa tidak ditemukan' 
            });
        }
        res.json({ 
            success: true, 
            data: result 
        });
    });
});

app.post('/api/mahasiswa', (req, res) => {
    const { nama, nim, jurusan, email } = req.body;
    
    // Validasi input
    if (!nama || !nim || !jurusan || !email) {
        return res.status(400).json({ 
            success: false, 
            message: 'Semua field harus diisi!' 
        });
    }
    
    dbOperations.createMahasiswa(nama, nim, jurusan, email, (error, result) => {
        if (error) {
            return res.status(500).json({ 
                success: false, 
                message: 'Error creating data', 
                error: error.message 
            });
        }
        res.status(201).json({ 
            success: true, 
            message: 'Mahasiswa berhasil ditambahkan', 
            id: result.insertId 
        });
    });
});

app.put('/api/mahasiswa/:id', (req, res) => {
    const { id } = req.params;
    const { nama, nim, jurusan, email } = req.body;
    
    if (!nama || !nim || !jurusan || !email) {
        return res.status(400).json({ 
            success: false, 
            message: 'Semua field harus diisi!' 
        });
    }
    
    dbOperations.updateMahasiswa(id, nama, nim, jurusan, email, (error, result) => {
        if (error) {
            return res.status(500).json({ 
                success: false, 
                message: 'Error updating data', 
                error: error.message 
            });
        }
        if (result.affectedRows === 0) {
            return res.status(404).json({ 
                success: false, 
                message: 'Mahasiswa tidak ditemukan' 
            });
        }
        res.json({ 
            success: true, 
            message: 'Data mahasiswa berhasil diupdate' 
        });
    });
});

app.delete('/api/mahasiswa/:id', (req, res) => {
    const { id } = req.params;
    
    dbOperations.deleteMahasiswa(id, (error, result) => {
        if (error) {
            return res.status(500).json({ 
                success: false, 
                message: 'Error deleting data', 
                error: error.message 
            });
        }
        if (result.affectedRows === 0) {
            return res.status(404).json({ 
                success: false, 
                message: 'Mahasiswa tidak ditemukan' 
            });
        }
        res.json({ 
            success: true, 
            message: 'Data mahasiswa berhasil dihapus' 
        });
    });
});

app.get('/', (req, res) => {
    res.sendFile(path.join(__dirname, 'public', 'index.html'));
});

// Jalankan Server
app.listen(PORT, () => {
    console.log('=================================');
    console.log('🚀 Server running on:');
    console.log(`   http://localhost:${PORT}`);
    console.log('=================================');
});
