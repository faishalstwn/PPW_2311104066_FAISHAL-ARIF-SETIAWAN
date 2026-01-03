<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MahasiswaController extends Controller
{
    /**
     * Menampilkan view asset
     */
    public function showAsset()
    {
        return view('asset');
    }
    
    /**
     * Menampilkan view mahasiswa dengan data nilai
     */
    public function showMahasiswa()
    {
        $nilai = [80, 64, 30, 76, 95];
        return view('mahasiswa', ['nilai' => $nilai]);
    }
    
    /**
     * Menampilkan halaman index
     */
    public function index()
    {
        return view('welcome');
    }
}
