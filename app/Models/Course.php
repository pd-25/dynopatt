<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'type', 'price', 'status', 'enroll_url', 'category_id', 'slug', 'overview', 'cover_image', 'objective_fo', 'objective_t', 'objective_s', 'objective_f'];

    public function faqs()
    {
        return $this->hasMany(Faq::class, 'course_id', 'id');
    }

    public function carriculams()
    {
        return $this->hasMany(Carricullam::class, 'course_id', 'id');
    }

    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id', 'id');
    }
}
