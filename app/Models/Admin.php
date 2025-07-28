<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Admin extends Model
{
    use HasFactory;

    protected $table = 'admins';

    public $incrementing = false; // because no ID column

    protected $fillable = [
        'phone',
        'user_id',
    ];

    protected $hidden = [
        'created_at',
        'updated_at',
    ];

    // Relationship to user
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
