<?php

namespace App\Http\Controllers;

use App\Models\ContactRequest;
use Illuminate\Http\Request;

class ContactRequestController extends Controller
{
    /**
     * Store a newly created contact request.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'inquiry_type'   => 'required|string|max:255',
            'first_name'     => 'required|string|max:255',
            'last_name'      => 'required|string|max:255',
            'phone_number'   => 'required|string|max:20',
            'email'          => 'required|email|max:255',
            'organization'   => 'required|string|max:255',
            'role'           => 'required|string|max:255',
            'help_message'   => 'nullable|string',
            'heard_from'     => 'nullable|array',
            'heard_from.*'   => 'string|max:255',
        ]);

        ContactRequest::create($validated);

        return redirect()->back()->with('message', 'Contact request successfully placed.');
    }
}
