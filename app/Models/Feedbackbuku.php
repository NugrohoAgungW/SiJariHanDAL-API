<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Feedbackbuku extends Model
{
    use HasFactory;

    protected $fillable = ['buku_id', 'user_id', 'isi'];
}
