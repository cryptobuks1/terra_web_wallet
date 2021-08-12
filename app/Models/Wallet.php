<?php

namespace App\Models;

use App\Models\User;
use App\Override\Eloquent\LaraframeModel as Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Wallet extends Model
{

    protected $fillable = ['id', 'user_id', 'symbol', 'address', 'passpharse', 'balance'];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
