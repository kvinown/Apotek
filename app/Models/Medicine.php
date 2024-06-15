<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Medicine extends Model
{
    use HasFactory;
    protected $table = 'medicines';
    public $incrementing = false;
    protected $fillable = [
        'med_id',
        'med_name',
        'description',
        'price',
        'med_quantity',
        'exp_date',
        'file_photo',
    ];

    public function purchaseDetails(): HasMany
    {
        return $this->hasMany(PurchaseDetail::class);
    }
}
