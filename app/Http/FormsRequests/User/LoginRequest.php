<?php

namespace App\Http\FormsRequests\User;

use App\Models\User;

class LoginRequest
{
    public function rules(): array
    {
        return [
            User::USERNAME => 'required',
            User::PASSWORD => 'required|min:6',
        ];
    }
}
