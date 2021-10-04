<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    protected $fillable = [
        'site_name', 'site_desc', 'site_title', 'allow_comments', 'allow_users', 'check_cont', 'site_logo',
        'site_extra', 'post_ads', 'page_ads', 'between_ads', 'fb_publishing', 'fb_theme', 'fb_ads_code', 'fb_page_token', 'amp_ad_server', 'amp_adscode', 'footer', 'site_analytic'
    ];

    public $timestamps = false;
}
