<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lead extends Model
{
    use HasFactory;

    protected $fillable = [
        'quotation_id',
        'stage',
        'assigned_rep',
        'wedding_date',
        'lead_source',
    ];

    public function quotation()
    {
        return $this->belongsTo(Quotation::class);
    }

    public function assignedRep()
    {
        return $this->belongsTo(User::class, 'assigned_rep')->withDefault();
    }
}
