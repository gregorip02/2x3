<?php

namespace App;

use App\Client;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Payment extends Model
{
    /**
     * Fillable attributes.
     *
     * @var array
     */
    protected $fillable = ['client_id'];

    /**
     * Attribute casting.
     *
     * @var array
     */
    protected $casts = [
        'clp_usd' => 'double'
    ];

    /**
     * Get author of a payment.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function client(): BelongsTo
    {
        return $this->belongsTo(Client::class);
    }
}
