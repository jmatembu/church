<?php

namespace App\Http\Controllers;

use App\Mail\FeedbackReceived;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ReceiveFeedback extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
        try {
            Mail::to(config('settings.feedback.email'))
                ->send(new FeedbackReceived($request->all()));

            return response()->json([
                'message' => 'Thank you for your feedback.'
            ], 200);

        } catch (\Exception $e) {
            return response()->json([
                'error' => $e->getMessage(),
                'message' => 'Could not send email at this time.'
            ], 500);
        }
    }
}
