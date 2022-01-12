<?php 

namespace App\Helper;

class SettingHelper
{
    public static function getSetting()
    {
        $settings = \App\Models\Website::get()->first();
        return $settings;
    }

}