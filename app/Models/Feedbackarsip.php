<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Feedbackarsip extends Model
{
    use HasFactory;

    protected $fillable = ['arsip_id', 'user_id', 'isi'];
}
