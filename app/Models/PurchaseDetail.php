<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class PurchaseDetail extends Model
{
    use HasFactory;
    protected $table = 'purchasing_details';
    public $incrementing = false;
    protected $fillable = [
        'detail_id',
        'med_id',
        'purchase_id',
        'qty',
        'price',
        'total_price',
        'rating',
    ];
    public function medicine(): BelongsTo
    {
        return $this->belongsTo(Medicine::class, 'med_id');
    }

    public  function purchase(): BelongsTo
    {
        return $this->belongsTo(Purchase::class, 'purchase_id');
    }
}
