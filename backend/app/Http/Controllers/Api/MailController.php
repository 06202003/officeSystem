<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Controllers\MessagesController;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Mailjet\Client;
use Mailjet\Resources;

class MailController extends Controller
{

    public function sendMail(Request $request): JsonResponse
    {
        $validator = Validator::make($request->all(), [
            'from_email' => 'required|string',
            'from_name' => 'required|string',
            'to_email' => 'required|string',
            'to_name' => 'required|string',
            'subject' => 'required|string',
            'title' => 'required|string',
            'content' => 'required|string',
        ], MessagesController::messages());

        if ($validator->fails()) {
            return ResponseController::getResponse(null, 422, $validator->errors()->first());
        }

        $firstname = strtok($request->get('to_name'), " ");
        $mj = new Client(
            env('MAILJET_API_KEY'),
            env('MAILJET_SECRET_KEY'),
            true,
            ['version' => 'v3.1']
        );
        $body = [
            'Messages' => [
                [
                    'From' => [
                        'Email' => $request->get('from_email'),
                        'Name' => $request->get('from_name')
                    ],
                    'To' => [
                        [
                            'Email' => $request->get('to_email'),
                            'Name' => $request->get('to_name')
                        ]
                    ],
                    'TemplateID' => 4451740,
                    'TemplateLanguage' => true,
                    'Subject' => $request->get('subject'),
                    'CustomID' => $request->get('custom_id'),
                    'Variables' => json_decode('{
                        "title": "' . $request->get('title') . '",
                        "firstname": "' . $firstname . '",
                        "content": "' . $request->get('content') . '"
                      }', true)
                ]
            ]
        ];
        $response = $mj->post(Resources::$Email, ['body' => $body]);

        return ResponseController::getResponse($response->getData(), $response->getStatus(), $response->getReasonPhrase());
    }
}
