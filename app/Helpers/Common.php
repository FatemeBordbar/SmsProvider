<?php

namespace App\Helpers;

use App\Models\User;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Request;

class Common
{
    public static function getHostRequestAuthApi(): string
    {
        $host = request()->getHttpHost();
        if ($host == '127.0.0.1:8000') {
            $host = '127.0.0.1:8001';
        }
        return $host;
    }

    public static function getAccessToken($username, $password): array
    {
        $url = Common::getHostRequestAuthApi() . "/" . config()->get('uploader.oauth_path_get_token');
        $response = Http::asForm()->post($url, [
            'grant_type' => 'password',
            'client_id' => config()->get('uploader.oauth_client_id'),
            'client_secret' => config()->get('uploader.oauth_client_secret'),
            'username' => $username,
            'password' => $password,
            'scope' => '',
        ]);

        return $response->json();
    }

    public static function generateAccessToken(User $user): string|array
    {
        return $user->createToken('access token')->accessToken;

    }

}
