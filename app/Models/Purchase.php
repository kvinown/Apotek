<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Purchase extends Model
{
    use HasFactory;
    protected $table = 'purchasing';
    public $incrementing = false;
    protected $fillable = [
        'purchase_id',
        'user_id',
        'date',
        'address',
        'status_order',
        'total_purchase',
        'total_payment',
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
