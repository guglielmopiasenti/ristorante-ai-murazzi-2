<?php

namespace App\Http\Controllers\Api;

use App\Mail\ContactMessageMail;
use Illuminate\Support\Facades\Mail;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ContactController extends Controller
{
    public function message(Request $request)
    {
        // Validate the request
        $request->validate([
            'first-name' => 'required|string|max:255',
            'last-name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone-number' => 'required|string|max:255',
            'message' => 'required|string',
            'cv' => 'required|mimes:pdf,doc,docx'
        ]);
        $data = $request->all();
        $cv = $request->file('cv');

        // Move the CV to the storage
        $cv->storeAs('public/cvs', $cv->getClientOriginalName());

        // Get the path to the stored CV
        $cvPath = storage_path("app/public/cvs/{$cv->getClientOriginalName()}");

        // Send the email
        Mail::to('ristoranteaimurazzi@gmail.com')->send(new ContactMessageMail($data, $cvPath));

        return response()->json(['message' => 'Candidatura inviata con successo.']);
    }
}
