<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SalesRep extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'leads_assigned_to',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function leads()
    {
        return $this->hasMany(Lead::class, 'assigned_rep', 'user_id');
    }

    public function getNoOfLeadsAssignedAttribute()
    {
        return $this->leads()->count();
    }
}

