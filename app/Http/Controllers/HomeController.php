<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Artikel;
use App\Models\KategoriArtikel;

class HomeController extends Controller
{
    public function index(Request $request)
    {
        // Get categories with count of their articles
        $kategori = KategoriArtikel::withCount('artikel')
            ->orderBy('nama_kategori', 'asc')
            ->get();
            
        // Get total articles count
        $total_artikel_count = Artikel::count();
        
        // Build article query
        $query = Artikel::with(['penulis', 'kategori']);
        
        $active_kategori = null;
        if ($request->filled('kategori')) {
            $kategoriId = $request->kategori;
            $query->where('id_kategori', $kategoriId);
            $active_kategori = KategoriArtikel::find($kategoriId);
        }
        
        // Limit to 5 articles, ordered by newest id
        $artikel = $query->orderBy('id', 'desc')->take(5)->get();
        
        return view('visitor.index', compact('kategori', 'total_artikel_count', 'artikel', 'active_kategori'));
    }

    public function show(string $id)
    {
        $artikel = Artikel::with(['penulis', 'kategori'])->findOrFail($id);
        
        // Fetch 5 related articles in the same category, excluding current article
        $artikel_terkait = Artikel::with(['penulis', 'kategori'])
            ->where('id_kategori', $artikel->id_kategori)
            ->where('id', '!=', $artikel->id)
            ->orderBy('id', 'desc')
            ->take(5)
            ->get();
            
        return view('visitor.show', compact('artikel', 'artikel_terkait'));
    }
}
