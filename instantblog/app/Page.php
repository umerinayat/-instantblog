<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Page extends Model
{
	protected $fillable = [
        'page_title', 'page_slug','page_content'
    ];

    public $timestamps = false;

    //For firendly urls
    public function getRouteKeyName()
    {
        return 'page_slug';
    }

    //Convert url to slug format
    public function setPageSlugAttribute($value)
    {
        $this->attributes['page_slug'] = str_slug($value, '-');
    }
}
