<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Company extends Model
{
    use HasFactory;


    /**
     * Get the author that wrote the book.
     */
    public function users()
    {
        return $this->hasMany(User::class);
    }
        protected $fillable = [
        'name',
        'email',
        'location',
        'website',
        'email',
        'description',
        'logo'

    ];
}
