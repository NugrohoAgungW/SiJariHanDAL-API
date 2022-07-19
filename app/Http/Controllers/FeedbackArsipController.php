<?php

namespace App\Http\Controllers;

use App\Models\Feedbackarsip;
use Illuminate\Http\Request;

class FeedbackArsipController extends Controller
{
    function index($id)
    {
        return Feedbackarsip::join('users', 'feedbackarsips.user_id', '=', 'users.id')->where('arsip_id', $id)->get();
    }

    function store(Request $request, $id)
    {
        $masuk['user_id'] = $request->user_id;
        $masuk['isi'] = $request->isi;
        $masuk['arsip_id'] = $id;

        Feedbackarsip::create($masuk);
    }
}
