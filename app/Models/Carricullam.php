<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Carricullam extends Model
{
    use HasFactory;
    protected $fillable = ['title', 'description', 'course_id'];
}
