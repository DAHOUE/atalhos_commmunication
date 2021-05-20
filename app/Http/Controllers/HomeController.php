<?php

namespace App\Http\Controllers;

use App\Mail\Gmail;
use App\Mail\GmailMessageToAdmin;
use App\Mail\GmailToAdmin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class HomeController extends Controller
{
    public function index()
    {
    return view('home');
    }

    public function registerFormation(Request $request)
    {
        $emailAdmin = 'isaacdahoue1@gmail.com';
        $request->validate(
            [
                'name' => 'required',
                'firstName' => 'required',
                'email' => ['email', 'required'],
                'phone' => 'required',
                'formation' => 'required'
            ]);
            $details = [
                'title' => "Salut ".$request->firstName. '  '.$request->name,
                'body' => $request->formation,
            ];

            $detailsToAdmin = [
                'name' => $request->name,
                'firstName' => $request->firstName,
                'email' => $request->email,
                'phone' => $request->phone,
                'formation' => $request->formation,
                'message' => $request->message,
            ];

            Mail::to($request->email)->send(new Gmail($details));

            Mail::to($emailAdmin)->send(new GmailToAdmin($detailsToAdmin));

            return back()->with('info', "Votre inscription a été enregistré avec succès");
    }

    public function sendMessage(Request $request)
    {
        $emailAdmin = 'isaacdahoue1@gmail.com';
        $request->validate(
            [
                'name2' => 'required',
                'subject' => 'required',
                'email2' => ['email', 'required'],
                'message2' => 'required',

            ]);

            $detailsToAdmin = [
                'name' => $request->name2,
                'email' => $request->email2,
                'subject' => $request->subject,
                'message' => $request->message2,
            ];

            Mail::to($emailAdmin)->send(new GmailMessageToAdmin($detailsToAdmin));

            return back()->with('info', "Votre message a été envoyé avec succès");


    }
}
