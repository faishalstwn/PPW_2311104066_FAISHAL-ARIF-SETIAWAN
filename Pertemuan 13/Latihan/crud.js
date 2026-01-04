const connection = require('./db');

function createMahasiswa(nama, nim, jurusan, email, callback) {
    const query = 'INSERT INTO mahasiswa (nama, nim, jurusan, email) VALUES (?, ?, ?, ?)';
    connection.query(query, [nama, nim, jurusan, email], (error, results) => {
        if (error) {
            callback(error, null);
        } else {
            callback(null, results);
        }
    });
}

function getAllMahasiswa(callback) {
    const query = 'SELECT * FROM mahasiswa ORDER BY id DESC';
    connection.query(query, (error, results) => {
        if (error) {
            callback(error, null);
        } else {
            callback(null, results);
        }
    });
}

function getMahasiswaById(id, callback) {
    const query = 'SELECT * FROM mahasiswa WHERE id = ?';
    connection.query(query, [id], (error, results) => {
        if (error) {
            callback(error, null);
        } else {
            callback(null, results[0]);
        }
    });
}

function updateMahasiswa(id, nama, nim, jurusan, email, callback) {
    const query = 'UPDATE mahasiswa SET nama = ?, nim = ?, jurusan = ?, email = ? WHERE id = ?';
    connection.query(query, [nama, nim, jurusan, email, id], (error, results) => {
        if (error) {
            callback(error, null);
        } else {
            callback(null, results);
        }
    });
}

function deleteMahasiswa(id, callback) {
    const query = 'DELETE FROM mahasiswa WHERE id = ?';
    connection.query(query, [id], (error, results) => {
        if (error) {
            callback(error, null);
        } else {
            callback(null, results);
        }
    });
}

module.exports = {
    createMahasiswa,
    getAllMahasiswa,
    getMahasiswaById,
    updateMahasiswa,
    deleteMahasiswa
};
