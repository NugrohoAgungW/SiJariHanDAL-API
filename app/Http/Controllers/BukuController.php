<?php

namespace App\Http\Controllers;

use App\Models\Buku;
use Illuminate\Http\Request;

class BukuController extends Controller
{
    //
    public function index()
    {
        return Buku::all();
    }
    public function cari(Request $request)
    {
        $skip = ($request->page - 1) * 10;
        return Buku::where('judul', 'LIKE', "%{$request->keyword}%")->skip($skip)->take(10)->get();
    }
    public function totalcari(Request $request)
    {
        return Buku::where('judul', 'LIKE', "%{$request->keyword}%")->get();
    }
    public function detail($id)
    {
        return Buku::where('id', $id)->first();
    }
    public function author($author)
    {
        return Buku::where('author', 'LIKE', "%{$author}%")->get();
    }
    public function tahun($tahun)
    {
        return Buku::where('tahun', $tahun)->get();
    }
    public function publisher($publisher)
    {
        $publisher = urldecode($publisher);
        return Buku::where('publisher', 'LIKE', "%{$publisher}%")->get();
    }
    public function koleksi($koleksi)
    {
        $koleksi = urldecode($koleksi);
        return Buku::where('koleksi', 'LIKE', "%{$koleksi}%")->get();
    }
    public function topik($topik)
    {
        $topik = urldecode($topik);
        return Buku::where('topik', 'LIKE', "%{$topik}%")->get();
    }

    function search(Request $request)
    {
        $skip = ($request->page - 1) * 10;

        $judul = $request->input('judul');
        $author = $request->input('author');
        $publisher = $request->input('publisher');
        $tahun = $request->input('tahun');

        $buku = Buku::when($judul, function ($query, $judul) {
            return $query->where('judul', 'LIKE', "%{$judul}%");
        })
            ->when($author, function ($query, $author) {
                return $query->where('author', 'LIKE', "%{$author}%");
            })
            ->when($publisher, function ($query, $publisher) {
                return $query->where('publisher', 'LIKE', "%{$publisher}%");
            })
            ->when($tahun, function ($query, $tahun) {
                return $query->where('tahun', 'LIKE', "%{$tahun}%");
            })
            ->skip($skip)->take(10)->get();

        return $buku;
    }

    function totalsearch(Request $request)
    {
        $judul = $request->input('judul');
        $author = $request->input('author');
        $publisher = $request->input('publisher');
        $tahun = $request->input('tahun');

        $buku = Buku::when($judul, function ($query, $judul) {
            return $query->where('judul', 'LIKE', "%{$judul}%");
        })
            ->when($author, function ($query, $author) {
                return $query->where('author', 'LIKE', "%{$author}%");
            })
            ->when($publisher, function ($query, $publisher) {
                return $query->where('publisher', 'LIKE', "%{$publisher}%");
            })
            ->when($tahun, function ($query, $tahun) {
                return $query->where('tahun', 'LIKE', "%{$tahun}%");
            })
            ->get();

        return $buku;
    }
}
