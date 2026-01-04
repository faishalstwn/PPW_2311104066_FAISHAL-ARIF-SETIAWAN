<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Product;
use App\Models\Category;

class ProductController extends Controller
{
    
    public function insertRawSQL()
    {
        // Insert category terlebih dahulu
        DB::insert("
            INSERT INTO categories (name, description, created_at, updated_at)
            VALUES (?, ?, NOW(), NOW())
        ", ['Sofa', 'Koleksi sofa berkualitas tinggi']);

        // Get category_id yang baru saja diinsert
        $categoryId = DB::getPdo()->lastInsertId();

        // Insert product
        $result = DB::insert("
            INSERT INTO products 
            (category_id, product_code, name, description, price, stock, material, dimensions, color, created_at, updated_at)
            VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, NOW(), NOW())
        ", [
            $categoryId,
            'FRN-SF-001',
            'Sofa Minimalis Modern',
            'Sofa dengan desain minimalis cocok untuk ruang tamu modern',
            5500000,
            10,
            'Kayu Jati, Busa Premium',
            '200x80x75 cm',
            'Coklat Tua'
        ]);

        return "Data produk berhasil ditambahkan menggunakan Raw SQL";
    }

    // 2. INSERT menggunakan Query Builder
    public function insertQueryBuilder()
    {
        
        $categoryId = DB::table('categories')->insertGetId([
            'name' => 'Meja',
            'description' => 'Berbagai jenis meja untuk rumah dan kantor',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

    
        $result = DB::table('products')->insert([
            'category_id' => $categoryId,
            'product_code' => 'FRN-MJ-001',
            'name' => 'Meja Makan Kayu Jati',
            'description' => 'Meja makan minimalis dengan bahan kayu jati solid',
            'price' => 3500000,
            'stock' => 15,
            'material' => 'Kayu Jati Solid',
            'dimensions' => '150x90x75 cm',
            'color' => 'Natural Wood',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        return "Data produk berhasil ditambahkan menggunakan Query Builder";
    }

    // 3. INSERT menggunakan Eloquent ORM
    public function insertEloquent()
    {
        // Insert category menggunakan Eloquent
        $category = Category::create([
            'name' => 'Lemari',
            'description' => 'Lemari pakaian dan lemari hias',
        ]);

        // Insert product menggunakan Eloquent
        $product = Product::create([
            'category_id' => $category->id,
            'product_code' => 'FRN-LM-001',
            'name' => 'Lemari Pakaian 3 Pintu',
            'description' => 'Lemari pakaian dengan 3 pintu sliding dan cermin',
            'price' => 4200000,
            'stock' => 8,
            'material' => 'Kayu Mahoni',
            'dimensions' => '180x60x200 cm',
            'color' => 'Coklat Mahoni',
        ]);

        return "Data produk berhasil ditambahkan menggunakan Eloquent ORM (ID: {$product->id})";
    }

    // Fungsi tambahan untuk melihat semua produk
    public function index()
    {
        $products = Product::with('category')->get();
        return response()->json($products);
    }
}
