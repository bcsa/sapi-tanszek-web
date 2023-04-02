<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreContactMessage;
use App\Models;
use Illuminate\Support\Facades\Mail;

class ContactMessageController extends Controller
{
    public function store(StoreContactMessage $request)
    {
        $contactMessage = new Models\ContactMessage;

        $contactMessage->name = $request->name;
        $contactMessage->email = $request->email;
        $contactMessage->message = $request->message;
        $contactMessage->source = $request->input('source', null);

        $contactMessage->save();

        Mail::to('csongiika@gmail.com')
            ->send(new \App\Mail\ContactMessageReceived($contactMessage));

        return true;
    }
}
