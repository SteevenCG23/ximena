<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Diet extends Model
{
    use HasFactory;
    
    protected $table = 'diets';

    
    protected $fillable = [
        'name',
        'description',
        'status',
    ];

    public function users()
    {
        return $this->hasMany(User::class, 'dietId');
    }
}
