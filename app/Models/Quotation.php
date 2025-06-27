<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Quotation extends Model
{
    use HasFactory;

    protected $fillable = [
        'quotation_id',
        'cust_name',
        'cust_phone',
        'cust_email',
        'communication_method',
        'target_wedding_date',
        'budget_range',
        'guest_count',
        'package_deal',
        'catering',
        'hair_makeup',
        'live_band',
    ];

    public function lead() {
        return $this->hasOne(Lead::class);
    }

}
