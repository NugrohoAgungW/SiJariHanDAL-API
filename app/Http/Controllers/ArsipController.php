<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Arsip;

class ArsipController extends Controller
{
    //

    public function index()
    {
        return Arsip::all();
    }

    public function cari(Request $request)
    {
        $skip = ($request->page - 1) * 10;

        return Arsip::where('item_title', 'LIKE', "%{$request->keyword}%")
            // ->orWhere('file_title', 'LIKE', "%{$request->keyword}%")
            // ->orWhere('subfile_title', 'LIKE', "%{$request->keyword}%")
            // ->orWhere('berkas_title', 'LIKE', "%{$request->keyword}%")
            // ->orWhere('subserie_title', 'LIKE', "%{$request->keyword}%")
            // ->orWhere('serie_title', 'LIKE', "%{$request->keyword}%")
            // ->orWhere('subfond_title', 'LIKE', "%{$request->keyword}%")
            // ->orWhere('fond_title', 'LIKE', "%{$request->keyword}%")
            ->skip($skip)->take(10)->get();
    }
    public function totalcari(Request $request)
    {
        return Arsip::where('item_title', 'LIKE', "%{$request->keyword}%")
            // ->orWhere('file_title', 'LIKE', "%{$request->keyword}%")
            // ->orWhere('subfile_title', 'LIKE', "%{$request->keyword}%")
            // ->orWhere('berkas_title', 'LIKE', "%{$request->keyword}%")
            // ->orWhere('subserie_title', 'LIKE', "%{$request->keyword}%")
            // ->orWhere('serie_title', 'LIKE', "%{$request->keyword}%")
            // ->orWhere('subfond_title', 'LIKE', "%{$request->keyword}%")
            // ->orWhere('fond_title', 'LIKE', "%{$request->keyword}%")
            ->get();
    }

    public function detail($id)
    {
        return Arsip::find($id);
    }

    public function tahun($tahun)
    {
        return Arsip::where('archive_date', 'LIKE', "%{$tahun}%")->get();
    }

    function search(Request $request)
    {
        $skip = ($request->page - 1) * 10;

        $title = $request->input('title');
        $tahun = $request->input('tahun');

        $arsip = Arsip::when($title, function ($query, $title) {
            return $query->where('item_title', 'LIKE', "%{$title}%");
        })
            ->when($tahun, function ($query, $tahun) {
                return $query->where('archive_date', 'LIKE', "%{$tahun}%");
            })
            ->skip($skip)->take(10)->get();

        return $arsip;
    }

    function totalsearch(Request $request)
    {
        $title = $request->input('title');
        $tahun = $request->input('tahun');

        $arsip = Arsip::when($title, function ($query, $title) {
            return $query->where('item_title', 'LIKE', "%{$title}%");
        })
            ->when($tahun, function ($query, $tahun) {
                return $query->where('archive_date', 'LIKE', "%{$tahun}%");
            })
            ->get();

        return $arsip;
    }
}
