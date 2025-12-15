<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Program PHP - Kalkulator</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            min-height: 100vh;
            padding: 20px;
        }
        .container {
            max-width: 800px;
            margin: 0 auto;
        }
        h1 {
            text-align: center;
            color: white;
            margin-bottom: 30px;
            font-size: 2.5em;
            text-shadow: 2px 2px 4px rgba(0,0,0,0.2);
        }
        .card {
            background: white;
            border-radius: 15px;
            padding: 30px;
            margin-bottom: 30px;
            box-shadow: 0 10px 30px rgba(0,0,0,0.3);
        }
        .card h2 {
            color: #667eea;
            margin-bottom: 20px;
            border-bottom: 3px solid #667eea;
            padding-bottom: 10px;
        }
        .form-group {
            margin-bottom: 20px;
        }
        label {
            display: block;
            margin-bottom: 8px;
            font-weight: 600;
            color: #333;
        }
        input[type="number"] {
            width: 100%;
            padding: 12px;
            border: 2px solid #ddd;
            border-radius: 8px;
            font-size: 16px;
            transition: border-color 0.3s;
        }
        input[type="number"]:focus {
            outline: none;
            border-color: #667eea;
        }
        button {
            width: 100%;
            padding: 14px;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
            border: none;
            border-radius: 8px;
            font-size: 16px;
            font-weight: 600;
            cursor: pointer;
            transition: transform 0.2s;
        }
        button:hover {
            transform: translateY(-2px);
        }
        .result {
            margin-top: 20px;
            padding: 15px;
            background: #f0f4ff;
            border-radius: 8px;
            border-left: 4px solid #667eea;
        }
        .result p {
            margin: 8px 0;
            color: #333;
        }
        .result strong {
            color: #667eea;
        }
        .info-box {
            background: #fff3cd;
            padding: 15px;
            border-radius: 8px;
            margin-bottom: 20px;
            border-left: 4px solid #ffc107;
        }
        .info-box p {
            margin: 5px 0;
            font-size: 14px;
            color: #856404;
        }
        .array-display {
            background: #e9ecef;
            padding: 15px;
            border-radius: 8px;
            margin-bottom: 20px;
            font-family: monospace;
            font-size: 14px;
            color: #333;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>📊 Program PHP - Kalkulator</h1>

        
        <div class="card">
            <h2>🌡️ 1. Program Konversi Suhu</h2>
            <form method="POST" action="">
                <div class="form-group">
                    <label for="suhu">Masukkan Suhu:</label>
                    <input type="number" step="0.01" id="suhu" name="suhu" placeholder="Contoh: 25" required>
                </div>
                <button type="submit" name="konversi_suhu">Konversi Suhu</button>
            </form>

            <?php
            if (isset($_POST['konversi_suhu'])) {
                $suhu = floatval($_POST['suhu']);
                
                // Celsius ke Fahrenheit
                $celciusToFahrenheit = ($suhu * 9/5) + 32;
                
                // Fahrenheit ke Celsius
                $fahrenheitToCelcius = ($suhu - 32) * 5/9;
                
                // Celsius ke Kelvin
                $celciusToKelvin = $suhu + 273.15;
                
                echo '<div class="result">';
                echo '<p><strong>Celsius ke Fahrenheit:</strong> ' . number_format($celciusToFahrenheit, 2) . '°F</p>';
                echo '<p><strong>Fahrenheit ke Celsius:</strong> ' . number_format($fahrenheitToCelcius, 2) . '°C</p>';
                echo '<p><strong>Celsius ke Kelvin:</strong> ' . number_format($celciusToKelvin, 2) . 'K</p>';
                echo '</div>';
            }
            ?>
        </div>

        
        <div class="card">
            <h2>💰 2. Kalkulator Diskon</h2>
            
            <div class="info-box">
                <p><strong>Ketentuan Diskon:</strong></p>
                <p>• Diskon 10% jika belanja ≥ Rp 100.000</p>
                <p>• Diskon 20% jika belanja ≥ Rp 500.000</p>
                <p>• Diskon 30% jika belanja ≥ Rp 1.000.000</p>
            </div>

            <form method="POST" action="">
                <div class="form-group">
                    <label for="total_belanja">Total Belanja (Rp):</label>
                    <input type="number" id="total_belanja" name="total_belanja" placeholder="Contoh: 750000" required>
                </div>
                <button type="submit" name="hitung_diskon">Hitung Diskon</button>
            </form>

            <?php
            if (isset($_POST['hitung_diskon'])) {
                $totalBelanja = floatval($_POST['total_belanja']);
                $diskon = 0;
                $persenDiskon = 0;
                
                if ($totalBelanja >= 1000000) {
                    $persenDiskon = 30;
                    $diskon = $totalBelanja * 0.30;
                } elseif ($totalBelanja >= 500000) {
                    $persenDiskon = 20;
                    $diskon = $totalBelanja * 0.20;
                } elseif ($totalBelanja >= 100000) {
                    $persenDiskon = 10;
                    $diskon = $totalBelanja * 0.10;
                }
                
                $totalBayar = $totalBelanja - $diskon;
                
                echo '<div class="result">';
                echo '<p><strong>Total Belanja:</strong> Rp ' . number_format($totalBelanja, 0, ',', '.') . '</p>';
                echo '<p><strong>Diskon (' . $persenDiskon . '%):</strong> Rp ' . number_format($diskon, 0, ',', '.') . '</p>';
                echo '<p><strong>Total Bayar:</strong> Rp ' . number_format($totalBayar, 0, ',', '.') . '</p>';
                echo '</div>';
            }
            ?>
        </div>


        <div class="card">
            <h2>📈 3. Manipulasi Array</h2>
            
            <?php
            $nilaiMahasiswa = [75, 89, 65, 90, 85, 70, 98, 65, 69, 70, 12];
            
            echo '<div class="array-display">';
            echo '<strong>Data Nilai Mahasiswa:</strong><br>';
            echo '[' . implode(', ', $nilaiMahasiswa) . ']';
            echo '</div>';
            ?>

            <form method="POST" action="">
                <button type="submit" name="analisis_nilai">Analisis Nilai</button>
            </form>

            <?php
            if (isset($_POST['analisis_nilai'])) {
                // Nilai Tertinggi
                $nilaiTertinggi = max($nilaiMahasiswa);
                
                // Nilai Terendah
                $nilaiTerendah = min($nilaiMahasiswa);
                
                // Rata-rata Nilai
                $rataRata = array_sum($nilaiMahasiswa) / count($nilaiMahasiswa);
                
                // Jumlah Mahasiswa yang Lulus (≥70)
                $jumlahLulus = 0;
                foreach ($nilaiMahasiswa as $nilai) {
                    if ($nilai >= 70) {
                        $jumlahLulus++;
                    }
                }
                
                // Urutkan nilai dari tertinggi ke terendah
                $nilaiUrut = $nilaiMahasiswa;
                rsort($nilaiUrut);
                
                echo '<div class="result">';
                echo '<p><strong>Nilai Tertinggi:</strong> ' . $nilaiTertinggi . '</p>';
                echo '<p><strong>Nilai Terendah:</strong> ' . $nilaiTerendah . '</p>';
                echo '<p><strong>Rata-rata Nilai:</strong> ' . number_format($rataRata, 2) . '</p>';
                echo '<p><strong>Jumlah Mahasiswa yang Lulus (≥70):</strong> ' . $jumlahLulus . ' mahasiswa</p>';
                echo '<p><strong>Nilai (Tertinggi ke Terendah):</strong><br>[' . implode(', ', $nilaiUrut) . ']</p>';
                echo '</div>';
            }
            ?>
        </div>
    </div>
</body>
</html>