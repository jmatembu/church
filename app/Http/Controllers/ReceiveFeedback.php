<?php

namespace App\Http\Controllers;

use App\Mail\FeedbackReceived;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;

class ReceiveFeedback extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     * @throws \Illuminate\Validation\ValidationException
     */
    public function __invoke(Request $request)
    {
        $this->validate($request, [
            'email' => 'required|email',
            'body' => 'required|max:5000',
        ]);

        if ($request->filled('phone_number') || $this->isBlocked()) {
            return response()->json([
                'message' => 'Thank you for your feedback.'
            ], 200);
        }

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

    protected function isBlocked()
    {
        return in_array(request('name'), $this->blockedNames()) ||
            Str::contains(request('body'), $this->blockedContent());
    }

    protected function blockedNames()
    {
        return [
            'HenryOraby'
        ];
    }

    protected function blockedContent()
    {
        return [
            'http://www.google.com/url?q='
        ];
    }
}
