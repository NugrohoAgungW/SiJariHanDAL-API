<?php

namespace App\Http\Controllers;

use App\Models\Feedbackbuku;
use Illuminate\Http\Request;

class FeedbackBukuController extends Controller
{
    //
    function index($id)
    {
        return Feedbackbuku::select('users.name', 'users.email', 'users.avatar', 'feedbackbukus.isi', 'feedbackbukus.created_at', 'feedbackbukus.buku_id', 'feedbackbukus.id')
            ->join('users', 'feedbackbukus.user_id', '=', 'users.id')
            ->where('buku_id', $id)
            ->orderBy('feedbackbukus.id', 'DESC')
            ->get();
    }

    function store(Request $request, $id)
    {
        $masuk['user_id'] = $request->user_id;
        $masuk['isi'] = $request->isi;
        $masuk['buku_id'] = $id;

        Feedbackbuku::create($masuk);
    }
}
