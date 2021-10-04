<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Embed extends Model
{
    public $table = "embeds";
    protected $fillable = [
        'short_url', 'url', 'embedcode'
    ];
    public $timestamps = false;
}
