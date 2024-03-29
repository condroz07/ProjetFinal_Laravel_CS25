<?php

namespace App\Http\Controllers;

use App\Mail\ContactMail;
use App\Models\Adresse;
use App\Models\Contact;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $contacts = Adresse::all();
        return view('pages.front.contact', compact('contacts'));
    }

    public function mail(){
        $mail = Contact::paginate(9);
        return view('pages.back.pages.mailbox.mailbox', compact('mail'));
    }

    public function showMail($id){
        $mail = Contact::find($id);
        return view('pages.back.pages.mailbox.showMail', compact('mail'));
    }

    public function vuMail($id){
        $lu = Contact::find($id);
        $lu->isShow = 1;
        $lu->save();
        return redirect()->route('show-mail', [$id]);
    }

    public function archiveMail(Request $request, $id){
        $mail = Contact::find($id);
        $mail->isValidated = true;
        $mail->save();
        return redirect()->back()->with('success', 'Mail archiver');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $contact = new Contact();
        $contact->email = $request->email;
        $contact->name = $request->name;
        $contact->sujet = $request->sujet;
        $contact->msg = $request->msg;
        $contact->save();
        Mail::to('projetlaravelcs25@gmail.com')->send(new ContactMail);
        return redirect()->back()->with('success', 'Votre formulaire a été envoyer');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Contact  $contact
     * @return \Illuminate\Http\Response
     */
    public function show(Contact $contact)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Contact  $contact
     * @return \Illuminate\Http\Response
     */
    public function edit(Contact $contact)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Contact  $contact
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $edit = Adresse::find($id);
        $edit->entreprise = $request->entreprise;
        $edit->ville = $request->ville;
        $edit->adresse = $request->adresse;
        $edit->postale = $request->postale;
        $edit->phone = $request->phone;
        $edit->email = $request->email;
        $edit->save();
        return redirect()->back()->with('success', 'Modification effectuer');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Contact  $contact
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $delete = Contact::find($id);
        $delete->delete();
        return redirect()->back()->with('success', 'Mail supprimer');
    }
}
