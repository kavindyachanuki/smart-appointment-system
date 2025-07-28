<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customers extends Model
{
    use HasFactory;

    protected $table = 'customers';

    protected $primaryKey = 'cus_id';

    protected $fillable = [
        'phone',
        'loyalty_points',
        'profile_img',
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
