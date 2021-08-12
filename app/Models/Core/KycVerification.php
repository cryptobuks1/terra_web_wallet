<?php

namespace App\Models\Core;

use App\Models\User;
use App\Override\Eloquent\LaraframeModel as Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class KycVerification extends Model
{

    protected $fillable = ['id', 'user_id', 'type', 'card_image', 'status', 'reason'];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
