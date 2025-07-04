<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ContactForm;

class ContactFormController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $contacts = ContactForm::select('id','name','title','gender','created_at')->get();
        //
        // if($contacts->gender === 0){
        //     $gender = '男性';
        // }else{
        //     $gender = '女性';
        // }
        return view('contacts.index',compact('contacts'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('contacts.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        // dd($request->age);
        ContactForm::create([
        'name'=> $request->name,
        'title'=> $request->title,
        'email'=> $request->email,
        'url'=> $request->url,
        'gender'=> $request->gender,
        'age'=> $request->age,
        'contact'=> $request->contact,
        ]);
        return to_route('contacts.index'); 
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
        $contact = ContactForm::findOrFail($id);

        if($contact->gender === 0){
            $gender = '男性';
        }else{
            $gender = '女性';
        }
        return view('contacts.show',compact('contact','gender'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
        $contact = ContactForm::findOrFail($id);

        if($contact->gender === 0){
            $gender = '男性';
        }else{
            $gender = '女性';
        }
        return view('contacts.edit',compact('contact','gender'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        $before_contact = ContactForm::findOrFail($id);
        $before_contact->name = $request->name;
        $before_contact->title = $request->title;
        $before_contact->email = $request->email;
        $before_contact->url = $request->url;
        $before_contact->gender = $request->gender;
        $before_contact->age = $request->age;
        $before_contact->contact = $request->contact;
        $before_contact->save();
        return to_route('contacts.index');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
