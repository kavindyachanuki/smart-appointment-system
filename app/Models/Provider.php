<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Provider extends Model
{
    use HasFactory;

    protected $table = 'providers';

    protected $primaryKey = 'p_id';

    protected $fillable = [
        'phone',
        'service_type',
        'organization_name',
        'address',
        'nic_number',
        'license_number',
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
