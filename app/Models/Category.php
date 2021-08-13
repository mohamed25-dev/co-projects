<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    public function projects ()
    {
        return $this->hasMany(Project::class);
    }

    public function getNameAttribute ()
    {
        $lang = request()->session()->get('lang', 'ar');
                
        if ($lang == 'ar') {
            return $this->ar_name;
        } 
        return $this->en_name;
    }
}
