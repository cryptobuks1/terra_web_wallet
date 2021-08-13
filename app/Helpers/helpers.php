<?php

use Illuminate\Support\Facades\Auth;

if (!function_exists('profile_path')) {

    function profile_path($path)
    {
        return asset('public/storage/profile/' . $path);
    }


}
if (!function_exists('is_verified')) {
    function is_verified()
    {
        if (Auth::check()) {
            if (Auth::user()->isUser()) {
                if (Auth::user()->google2fa_enable && Auth::user()->profile_path && Auth::user()->kycVerification) {
                    return true;
                }
            } else {
                return true;
            }

        }
        return false;
    }
}
if (!function_exists('asset_url')) {
    function asset_url($path)
    {
        return asset('public/' . $path);
    }
}
if (!function_exists('generateRandomString')) {

    function generateRandomString($length)
    {
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charactersLength = strlen($characters);
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, $charactersLength - 1)];
        }
        return $randomString;
    }
}
