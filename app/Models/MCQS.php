<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MCQS extends Model
{
    use HasFactory;
    protected $fillable = ['quiz_id', 'question', 'option_a', 'option_b', 
    'option_c', 'option_d', 'answer', 'updated_at', 'deleted_at'];
}
