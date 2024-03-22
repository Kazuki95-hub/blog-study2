<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Mail;
use Illuminate\Http\Request;
use App\Mail\ContactsSendmail;


class ContactsController extends Controller
{
    public function index()
    {
        return view('contact.index');
    }
    public function confirm(Request $request)
    {
        $request->validate([
        'email' => 'required|email',
        'sender' => 'required',
        'body' => 'required',
        ]);
        
        $inputs = $request->all();
        
        return view('contact.confirm', [
            'inputs' => $inputs,
            ]);
    }
    public function send(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'sender' => 'required',
            'body' => 'required'
            ]);
            
        $action = $request->input('action');
        
        $inputs = $request->except('action');
        
        
        if($action !== 'submit'){
            return redirect()
            ->route('contact.index')
            ->withInput($inputs);
        } else {
            Mail::to($inputs['email'])->send(new ContactsSendmail($inputs));
            Mail::to('km4524771@gmail.com')->send(new ContactsSendmail($inputs));
            
            $request->session()->regenerateToken();
            
            return view('contact.thanks');
        }
    }
}
