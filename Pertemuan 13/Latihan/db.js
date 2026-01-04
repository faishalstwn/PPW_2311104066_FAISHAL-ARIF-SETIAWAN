const mysql = require('mysql2');

const connection = mysql.createConnection({
    host: 'localhost',
    user: 'root',
    password: '', 
    database: 'akademik_latihan'
});

connection.connect((err) => {
    if (err) {
        console.error('❌ Error connecting to database:', err.message);
        return;
    }
    console.log('✅ Connected to MySQL database: akademik_latihan');
});

module.exports = connection;
