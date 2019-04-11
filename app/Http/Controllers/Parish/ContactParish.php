<?php

namespace App\Http\Controllers\Parish;

use App\Mail\Parish\ParishContacted;
use App\Parish;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Mail;

class ContactParish extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request, Parish $parish)
    {
        $this->validate($request, [
            'name' => 'required|string|max:100',
            'email' => 'required|email',
            'body' => 'required|string|max:5000'
        ]);

        try {
            Mail::to($parish->main_email)
                ->send(new ParishContacted($request->all()));

            return back()->with('success', 'Message sent successfully.');
        } catch (\Exception $e) {
            // TODO: Log this problem
            return back()->with('error', 'Sorry, could not send email at this time.');
        }
    }
}
