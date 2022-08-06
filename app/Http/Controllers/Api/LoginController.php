<?php

namespace App\Http\Controllers\Api;

use App\Helpers\Common;
use App\Http\Controllers\Controller;
use App\Http\FormsRequests\User\LoginRequest;
use App\Models\User;
use const HTTP_BAD_REQUEST;
use const HTTP_OK;
use const PASSWORD_MISMATCH;
use const USER_NOT_FOUND;

class LoginController extends Controller
{

    function __construct()
    {
    }

    public function login(LoginRequest $request){
        $input = $request->safe()->only(['name', 'email']);

        $user = (new User)->hasAccess($input['username']);
        if (is_null($user)) {
            return $this->response(false, USER_NOT_FOUND, NULL, HTTP_BAD_REQUEST);
        } else {
            $authenticated = User::CheckPassword($input['password'], $user->password);
            if ($authenticated) {
                $access_token = Common::getAccessToken($input['username'], $input['password']);
                //$access_token = Common::generateAccessToken($user);
                return $this->response(true,  NULL,$access_token, HTTP_OK);
            } else {
                return $this->response(false, PASSWORD_MISMATCH, NULL, HTTP_BAD_REQUEST);
            }
        }
    }
}

