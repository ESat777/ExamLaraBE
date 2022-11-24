<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Schools extends Model
{
    use HasFactory;

    protected $fillable = [
        'name', 'code', 'image', 'city', 'address'
    ];
    public function applications()
    {
        return $this->hasMany(Appli::class);
    }
}
