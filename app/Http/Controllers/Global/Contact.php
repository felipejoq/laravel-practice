<?php

namespace App\Http\Controllers\Global;

use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class Contact extends Controller
{
    function index(): RedirectResponse {
        return redirect()
            ->route('contact.2')
            ->setStatusCode(301);
    }

    function contact2(): View {
        $data = [
            'name' => 'Jane Doe',
            'arr' => ['one', 'two', 'three'],
        ];

        return view('contact2', $data);
    }
}
