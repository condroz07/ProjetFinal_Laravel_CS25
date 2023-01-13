<?php

namespace App\Http\Controllers;

use App\Mail\NewsletterMail;
use App\Models\Newsletter;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class NewsletterController extends Controller
{
    public function sub(Request $request)
    {
        if (Newsletter::all()->where('email', $request->email)->count() == 0) {
            $store = new Newsletter();
            $store->email = $request->email;
            $store->save();
            Mail::to($request->email)->send(new NewsletterMail);
            return back()->with('success', 'Merci de vous être abonnée !');
        }else {
            return back()->with('danger', 'Vous étes déjà abonné !');
        }
    }
}
