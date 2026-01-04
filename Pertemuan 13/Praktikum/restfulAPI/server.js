const express = require('express');
const bodyParser = require('body-parser');
const cors = require('cors');
const db = require('./db');

const app = express();
const PORT = 3000;

// Middleware
app.use(cors());
app.use(bodyParser.json());
app.use(bodyParser.urlencoded({ extended: true }));

// GET all mahasiswa
app.get('/api/mahasiswa', (req, res) => {
    const query = 'SELECT * FROM mahasiswa';
    db.query(query, (err, results) => {
        if (err) {
            res.status(500).json({ error: err.message });
            return;
        }
        res.json(results);
    });
});

// GET mahasiswa by ID
app.get('/api/mahasiswa/:id', (req, res) => {
    const query = 'SELECT * FROM mahasiswa WHERE id = ?';
    db.query(query, [req.params.id], (err, results) => {
        if (err) {
            res.status(500).json({ error: err.message });
            return;
        }
        if (results.length === 0) {
            res.status(404).json({ message: 'Mahasiswa tidak ditemukan' });
            return;
        }
        res.json(results[0]);
    });
});

// POST create new mahasiswa
app.post('/api/mahasiswa', (req, res) => {
    const { nama, nim, jurusan, email } = req.body;
    const query = 'INSERT INTO mahasiswa (nama, nim, jurusan, email) VALUES (?, ?, ?, ?)';
    db.query(query, [nama, nim, jurusan, email], (err, result) => {
        if (err) {
            res.status(500).json({ error: err.message });
            return;
        }
        res.status(201).json({ 
            message: 'Mahasiswa berhasil ditambahkan',
            id: result.insertId 
        });
    });
});

// PUT update mahasiswa
app.put('/api/mahasiswa/:id', (req, res) => {
    const { nama, nim, jurusan, email } = req.body;
    const query = 'UPDATE mahasiswa SET nama = ?, nim = ?, jurusan = ?, email = ? WHERE id = ?';
    db.query(query, [nama, nim, jurusan, email, req.params.id], (err, result) => {
        if (err) {
            res.status(500).json({ error: err.message });
            return;
        }
        if (result.affectedRows === 0) {
            res.status(404).json({ message: 'Mahasiswa tidak ditemukan' });
            return;
        }
        res.json({ message: 'Mahasiswa berhasil diupdate' });
    });
});

// DELETE mahasiswa
app.delete('/api/mahasiswa/:id', (req, res) => {
    const query = 'DELETE FROM mahasiswa WHERE id = ?';
    db.query(query, [req.params.id], (err, result) => {
        if (err) {
            res.status(500).json({ error: err.message });
            return;
        }
        if (result.affectedRows === 0) {
            res.status(404).json({ message: 'Mahasiswa tidak ditemukan' });
            return;
        }
        res.json({ message: 'Mahasiswa berhasil dihapus' });
    });
});

app.listen(PORT, () => {
    console.log(`Server running on http://localhost:${PORT}`);
});
