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

    // Get photos
    public function photos()
    {
        return $this->hasMany(Photo::class);
    }

    // Get additional information
    public function additional()
    {
        return $this->hasMany(Additional::class);
    }
}
