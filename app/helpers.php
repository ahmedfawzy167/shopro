<?php

use App\Models\Setting;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Auth;


if (!function_exists('get_current_lang')) {
    function get_current_lang(): string
    {
        return app()->getLocale();
    }
}

if (!function_exists('uploadMedia')) {
    function uploadMedia($name, $files, ?Model $model, $clearMedia = true)
    {
        if ($clearMedia) {
            $model?->clearMediaCollection($name);
        }
        if (is_array($files)) {
            foreach ($files as $file) {
                if ($file instanceof UploadedFile) {
                    $model->addMedia($file)->toMediaCollection($name);
                }
            }
        }
        if ($files instanceof UploadedFile) {
            $model->addMedia($files)->toMediaCollection($name);
        }
    }
}



if (!function_exists('getSetting')) {
    function getSetting()
    {
        return Setting::first();
    }
}

if (!function_exists('setting')) {
    function setting($key)
    {
        return data_get(Setting::first(), $key);
    }
}

if (!function_exists('priceAfterCom')) {
    function priceAfterCom($price): float|int
    {
        $setting = getSetting()->zakat + getSetting()->tax + getSetting()->site_commission;

        return (1 + $setting / 100) * $price;
    }
}

if (!function_exists('priceBeforeCom')) {
    function priceBeforeCom($price): float|int
    {
        $setting = getSetting()->zakat + getSetting()->tax + getSetting()->site_commission;

        return $price / (1 + $setting / 100);
    }
}

// Active Guard Function
if (!function_exists('activeGuard')) {
    function activeGuard()
    {
        foreach (array_keys(config('auth.guards')) as $guard) {
            if (auth()->guard($guard)->check()) {
                return $guard;
            }
        }

        return null;
    }
}


function settings()
{
    $setting = Setting::first();
    return $setting;
}
