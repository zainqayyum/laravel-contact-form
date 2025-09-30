<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreContactRequest;
use App\Services\ContactService;
use Illuminate\Http\RedirectResponse;
use Illuminate\Contracts\View\View;


class ContactController extends Controller
{
    protected ContactService $service;


    public function __construct(ContactService $service)
    {
        $this->service = $service;
    }


    public function index(): View
    {
        return view('contact');
    }


    public function store(StoreContactRequest $request): RedirectResponse
    {
        $this->service->handle($request->validated(), $request->ip());


        return redirect()->route('contact.index')
            ->with('success', 'Your message was submitted successfully.');
    }
}
