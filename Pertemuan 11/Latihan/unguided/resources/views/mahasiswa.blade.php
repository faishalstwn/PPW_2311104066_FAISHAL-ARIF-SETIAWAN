<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tugas 3.1 - Blade Template Engine</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<body>
    <div class="container">
        <h1>Tugas 3.1 - Blade Template Engine</h1>
        
        <h2>1. Perulangan FOR (Bilangan 1 s.d 10)</h2>
        <div class="result">
            <ul>
                @for ($i = 1; $i <= 10; $i++)
                    <li>Bilangan ke-{{ $i }}</li>
                @endfor
            </ul>
        </div>
        
        <h2>2. Perulangan WHILE (Bilangan 1 s.d 10)</h2>
        <div class="result">
            <ul>
                @php $j = 1; @endphp
                @while ($j <= 10)
                    <li>Angka: {{ $j }}</li>
                    @php $j++; @endphp
                @endwhile
            </ul>
        </div>
        
        <h2>3. Perulangan FOREACH (Nilai Mahasiswa)</h2>
        <div class="result">
            <ul>
                @foreach ($nilai as $index => $n)
                    <li>Nilai ke-{{ $index + 1 }}: {{ $n }}</li>
                @endforeach
            </ul>
        </div>
    </div>
    
    <script src="{{ asset('js/script.js') }}"></script>
</body>
</html>
