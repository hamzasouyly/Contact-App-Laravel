<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Resources\ContactCollection;
use App\Http\Resources\ContactResource;

class ContactController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $contacts = Contact::All();
        // return response()->json($contacts);
        return new ContactCollection($contacts);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
        $this->validate($request, [
            'title' => 'required|max:255',
            'number' => 'required|min:10|max:10',
            'body' => 'required|min:5'
        ]);
        $contact = Contact::create([
            'title' => $request->title,
            'number' => $request->number,
            'body' => $request->body,
            'slug' => Str::slug($request->title),
        ]);

        // return response()->json($contact);
        // return new ContactResource($contact);
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
        // $data['title'] = $contact->title;
        // $data['number'] = $contact->number;
        // $data['body'] = $contact->body;
        // return response()->json($data);
        return new ContactResource($contact);
        
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
    public function update(Request $request, Contact $contact)
    {
        //
        $this->validate($request, [
            'title' => 'required|max:255',
            'number' => 'required|min:10|max:10',
            'body' => 'required|min:5'
        ]);
        $contact->update([
            'title' => $request->title,
            'number' => $request->number,
            'body' => $request->body,
            'slug' => Str::slug($request->title),
        ]);

        // return response()->json($contact);
        return new ContactResource($contact);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Contact  $contact
     * @return \Illuminate\Http\Response
     */
    public function destroy(Contact $contact)
    {
        //
        $contact->delete();
        return response()->json([
            'message' => 'contact deleted'
        ]);
    }
}
