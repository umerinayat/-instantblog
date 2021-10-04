<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Content extends Model
{
    public $table = "contents";
    protected $casts = [
      'content' => 'array',
    ];
    protected $fillable = [
        'post_id', 'embed_id', 'type', 'body'
    ];
    public $timestamps = false;

    public function embed()
    {
        return $this->hasOne('App\Embed', 'id', 'embed_id');
    }
}
