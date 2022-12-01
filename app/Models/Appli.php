<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Appli extends Model
{
    use HasFactory;
    protected $fillable = [
        'approved'
    ];

    public function schools()
    {
        return $this->belongsTo(Schools::class);
    }

}
