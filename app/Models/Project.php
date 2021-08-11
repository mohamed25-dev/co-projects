<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory;

    protected $fillable = ['image', 'title', 'description', 'user_id', 'category_id'];

    public function getImageAttribute ($value)
    {
        return "storage/images/{$value}";
    }
}
