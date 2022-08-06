<?php

namespace App\Http\Controllers\Api;

use App\Helpers\Common;
use App\Http\Controllers\Controller;
use App\Http\FormsRequests\User\RegisterRequest;
use App\Models\User;
use App\Models\UserRole;
use App\Patterns\Repository;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use const HTTP_BAD_REQUEST;
use const HTTP_OK;
use const RULES_REGISTER;
use const USERNAME_ALREADY_EXISTS;


class RegisterController extends Controller
{
    protected  $model, $repository;

    function __construct( User $model)
    {
        $this->repository = new Repository($model);
        $this->model = $model;
    }

    function register(RegisterRequest $request)
    {
        $input = $request->only(['username', 'password']);

        $user = User::exists($input['username']);
        if ($user != null) {
            return $this->response(false, USERNAME_ALREADY_EXISTS, NULL, HTTP_BAD_REQUEST);
        }

        $inserted = $this->repository->create($request->validated());

        if($inserted) {
            $access_token = Common::getAccessToken($input['username'], $input['password']);
            return $this->response(true, null, $access_token, HTTP_OK);
        }else{
            return $this->response(true, REGISTRATION_ERROR, null, HTTP_BAD_REQUEST);
        }

     }
}
