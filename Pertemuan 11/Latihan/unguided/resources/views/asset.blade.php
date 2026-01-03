<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tugas 2.1 - View Asset</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<body>
    <div class="container">
        <h1>Tugas 2.1 - Pengelolaan Asset</h1>
        
        <h2>1. Gambar dari folder img</h2>
        <img src="{{ asset('img/sample.jpg') }}" alt="Sample Image">
        <p>Gambar ini berasal dari folder public/img</p>
        
        <h2>2. CSS dari folder css</h2>
        <div class="result">
            <p>CSS berhasil dimuat dari folder public/css/style.css</p>
            <p>Anda dapat melihat styling pada halaman ini.</p>
        </div>
        
        <h2>3. JavaScript dari folder js</h2>
        <div class="result">
            <button onclick="showMessage()">Klik untuk test JavaScript</button>
            <p>JavaScript berhasil dimuat dari folder public/js/script.js</p>
        </div>
    </div>
    
    <script src="{{ asset('js/script.js') }}"></script>
</body>
</html>
