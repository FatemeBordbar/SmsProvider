<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\SMS\SmsRequest;
use App\Jobs\SendSmsJob;
use App\Models\SMS\Sms;
use Illuminate\Http\Request;

class SmsController extends Controller
{
    public function send_sms(SmsRequest $request): JsonResponse
    {
        $input = $request->safe()->only(['cell_number', 'message']);

        dispatch(new SendSingleSMS($input['cell_number'], $input['message']));

        return $this->response(true,  'message sent!',null, HTTP_OK);
    }
}
