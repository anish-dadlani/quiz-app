<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class QuizDescription extends Model
{
    use HasFactory;
    protected $fillable = ['title', 'description', 'updated_at', 'deleted_at'];
}
