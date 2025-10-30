<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    protected $fillable = [
        'store_id',
        'first_name',
        'last_name',
        'username',
        'password',
        'roles',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts = [
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];

    public function store(): BelongsTo
    {
        return $this->belongsTo(Store::class);
    }

    public function registeredMemberships(): HasMany
    {
        return $this->hasMany(Membership::class, 'registered_by_user_id');
    }

    public function requestedStockRequests(): HasMany
    {
        return $this->hasMany(StockRequest::class, 'requested_by_user_id');
    }

    public function approvedStockRequests(): HasMany
    {
        return $this->hasMany(StockRequest::class, 'approved_by_user_id');
    }

    public function orders(): HasMany
    {
        return $this->hasMany(Order::class, 'cashier_user_id');
    }
}
