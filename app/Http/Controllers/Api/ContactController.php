<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Contact;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try {
            $contacts = Contact::paginate(10);
            return response()->json([
                'status' => true,
                'contacts' => $contacts,
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'status' => false,
                'message' => "Something went wrong. Please try after some time."
            ]);
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try {
            $contact = Contact::create($request->all());

            return response()->json([
                'status' => true,
                'message' => 'Contact Created Successfully',
                'contact' => $contact
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'status' => false,
                'message' => "Something went wrong. Please try after some time."
            ]);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Contact  $contact
     * @return \Illuminate\Http\Response
     */
    public function show(Contact $contact)
    {
        try {
            return response()->json([
                'status' => true,
                'message' => 'Date Retrieved Successfully',
                'contact' => $contact
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'status' => false,
                'message' => "Something went wrong. Please try after some time."
            ]);
        }
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Contact  $contact
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Contact $contact)
    {
        try {
            $contact->update($request->all());
            return response()->json([
                'status' => true,
                'message' => 'Contact Updated Successfully',
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'status' => false,
                'message' => "Something went wrong. Please try after some time."
            ]);
        }
    }

    public function addMultipleContacts(Request $request)
    {
        try {
            $contacts = Contact::insert($request->all());
            return response()->json([
                'status' => true,
                'message' => 'Contacts Added Successfully',
                'company' => $contacts
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'status' => false,
                'message' => "Something went wrong. Please try after some time."
            ]);
        }
    }
}
