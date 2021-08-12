<?php

namespace App\Models\Core;

use App\Models\User;
use App\Override\Eloquent\LaraframeModel as Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Invitations extends Model
{

    protected $fillable = ['id', 'email', 'invite_code'];

}
