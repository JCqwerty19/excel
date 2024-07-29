<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\Photo;
use App\Models\Additional;

class Product extends Model
{
    use HasFactory;

    protected $guarded = false;

    public function photos()
    {
        return $this->hasMany(Photo::class);
    }

    public function additional()
    {
        return $this->hasMany(Additional::class);
    }
}
