<?php

namespace App\Http\Controllers\Contact;

use App\Http\Controllers\Controller;
use App\Http\Requests\Contact\StoreContactRequest;
use App\Jobs\StoreContactJob;
use App\Models\Contact;
use App\Models\User;

class ContactController extends Controller
{
    public function showForm()
    {
        return view('index');
    }

    public function store(StoreContactRequest $request)
    {
        $data = $request->validated();;

        $contact = new Contact($data);

        $contact->save();

        $adminEmail = User::where('role', User::ROLE_ADMIN)->pluck('email')->toArray();

        StoreContactJob::dispatch($adminEmail, $contact);

        return response()->json(['message' => 'Данные успешно сохранены']);
    }
}
