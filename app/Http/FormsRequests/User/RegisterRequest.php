<?php

namespace App\Http\FormsRequests\User;

use App\Models\User;

class RegisterRequest
{
    public function rules(): array
    {
        return [
            User::USERNAME => 'required',
            User::PASSWORD => 'required|min:6',
        ];
    }
}
