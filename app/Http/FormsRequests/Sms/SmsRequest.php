<?php

namespace App\Http\FormsRequests\Sms;

use App\Models\Sms;

class SmsRequest
{
    public function rules(): array
    {
        return [
            Sms::USERNAME => 'required',
            Sms::PASSWORD => 'required|min:6',
        ];
    }
}
