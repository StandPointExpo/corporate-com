<?php

namespace App\Validators;

use GuzzleHttp\Client;

class ReCaptcha
{

    public function validate($attribute, $value, $parameters, $validator)
    {


        $client = new Client(  [
            'headers' => [
                'X-Foo' => 'Bar'
            ]
        ]);
        $response = $client->post('https://www.google.com/recaptcha/api/siteverify',
            [
                'form_params' => [
                    'secret' => config('services.GOOGLE_RECAPTCHA_SECRET'),
                    'response' => $value
                ],
                'headers' => [
                    'X-First' => 'foo',
                    'X-Second' => 'bar'
                ]
            ]
            );
        $body = json_decode((string) $response->getBody());

        return $body->success;

    }
}
