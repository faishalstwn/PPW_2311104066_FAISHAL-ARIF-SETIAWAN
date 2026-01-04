<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Mahasiswa;
class MahasiswaController extends Controller{
public function index(){
return "Index untuk mahasiswa";
}
public function insertSql() {
        $result1 = DB::insert("
            INSERT INTO mahasiswas
            (nim, nama_lengkap, tempat_lahir, tanggal_lahir, alamat, fakultas, jurusan)
            VALUES (?, ?, ?, ?, ?, ?, ?)
        ", ['11112222', 'Budi Santoso', 'Jakarta', '2001-03-15', 'Jl. Sudirman No. 5', 'Fakultas Teknik', 'Informatika']);
        
        return "Data mahasiswa berhasil ditambahkan";
    }
    public function insertQB()
{
$result2 = DB::table('mahasiswas')->insert([
'nim' => '33334444',
'nama_lengkap' => 'Siti Nurhaliza',
'tempat_lahir' => 'Bandung',
'tanggal_lahir' => '2002-08-20',
'alamat' => 'Jl. Melati No. 15',
'fakultas' => 'Fakultas Teknik',
'jurusan' => 'Sistem Informasi',
]);
return "Data mahasiswa berhasil ditambahkan dengan Query Builder";
}

// UPDATE - Query Builder
public function updateQB()
{
    $result = DB::table('mahasiswas')
        ->where('nim', '20104070')
        ->update([
            'nama_lengkap' => 'Aulia Putri Updated',
            'alamat' => 'Jl. Mawar No. 10 Updated',
        ]);
    return "Data mahasiswa berhasil diupdate";
}

// DELETE - Query Builder
public function deleteQB()
{
    $result = DB::table('mahasiswas')
        ->where('nim', '20104070')
        ->delete();
    return "Data mahasiswa berhasil dihapus";
}

// SELECT - Query Builder (Ambil semua data)
public function selectAllQB()
{
    $mahasiswas = DB::table('mahasiswas')->get();
    return view('mahasiswa.index', ['mahasiswas' => $mahasiswas]);
}

// SELECT - Query Builder (Dengan kondisi)
public function selectWhereQB()
{
    $mahasiswas = DB::table('mahasiswas')
        ->where('fakultas', 'Fakultas Teknik')
        ->get();
    return view('mahasiswa.index', ['mahasiswas' => $mahasiswas]);
}
// INSERT - Eloquent
public function insertEloquent()
{
    $mhs = Mahasiswa::create([
        'nim' => '55556666',
        'nama_lengkap' => 'Rizky Ananda',
        'tempat_lahir' => 'Malang',
        'tanggal_lahir' => '2002-09-12',
        'alamat' => 'Jl. Kenanga No. 7',
        'fakultas' => 'Fakultas Informatika',
        'jurusan' => 'Software Engineering',
    ]);
    return "Data mahasiswa berhasil ditambahkan dengan Eloquent";
}

// SELECT - Eloquent (Ambil semua data)
public function selectAllEloquent()
{
    $mahasiswas = Mahasiswa::all();
    return view('mahasiswa.index', ['mahasiswas' => $mahasiswas]);
}

// SELECT - Eloquent (Dengan kondisi)
public function selectWhereEloquent()
{
    $mahasiswas = Mahasiswa::where('fakultas', 'Fakultas Teknik')->get();
    return view('mahasiswa.index', ['mahasiswas' => $mahasiswas]);
}

// UPDATE - Eloquent
public function updateEloquent()
{
    $result = Mahasiswa::where('nim', '55556666')
        ->update([
            'nama_lengkap' => 'Rizky Ananda Updated',
            'alamat' => 'Jl. Kenanga No. 7 Updated',
        ]);
    return "Data mahasiswa berhasil diupdate dengan Eloquent";
}

// DELETE - Eloquent
public function deleteEloquent()
{
    $result = Mahasiswa::where('nim', '55556666')->delete();
    return "Data mahasiswa berhasil dihapus dengan Eloquent";
}
}