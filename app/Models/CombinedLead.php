<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CombinedLead extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id', // ← Add this!

        // Quotation fields
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

        // Lead fields
        'stage',
        'assigned_rep',
        'wedding_date',
        'lead_source',
    ];

    /**
     * The sales rep assigned to this lead.
     */
    public function assignedRep()
    {
        return $this->belongsTo(User::class, 'assigned_rep')->withDefault();
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    
}
