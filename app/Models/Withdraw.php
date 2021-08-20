<?php

namespace App\Models;

use App\Models\User;
use App\Override\Eloquent\LaraframeModel as Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Withdraw extends Model
{

    protected $table = 'wallet_withdraws';

    protected $fillable = ['id', 'user_id', 'wallet_id', 'amount', 'status'];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
