<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Role extends Model
{
    use HasFactory;

    protected $table = 'role';
    public $incrementing = false;

    protected $fillable = [
        'role_id',
        'role_name',
    ];

    public function user(): HasMany
    {
        return $this->hasMany(User::class);
    }
}
