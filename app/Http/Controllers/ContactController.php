<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ContactController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        // $Contacts = Contact::all()->where('user_id', auth()->user()->id);
        // $chars = [];
        // $listed = [];

        // foreach ($Contacts as $contact) {
        //     $skip = false;
        //     foreach ($chars as $char) {
        //         if ($char == $contact->first_name) {
        //             $skip = true;
        //             break;
        //         }
        //     }
        //     if ($skip) {
        //         continue;
        //     }
        //     $char = substr($contact->first_name, 0, 1);
        //     $chars[] = $char;
        // }

        // foreach ($chars as $char) {

        // }

        // return view('contact.index', [
        //     'current' => 'contacts',
        //     'contacts' => $Contacts,
        //     'chars' => $chars
        // ]);

        $contacts = Contact::select('*', DB::raw("SUBSTRING(upper(first_name), 1, 1) as first_letter"))
            ->orderBy('first_name')
            ->where('user_id', auth()->user()->id);

        if (!empty($request->search)) {
            $contacts = $contacts->where(DB::raw('CONCAT_WS(" ", first_name, last_name)'), 'like', '%' . $request->search . '%');
        }

        $search = $request->search ?? null;
        $current = 'contacts';

        $contacts = $contacts->get()
            ->groupBy('first_letter');

        return view('contact.index', compact('contacts', 'search', 'current'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('contact.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        if ($request->has('photo')) {
            $file_name = time() . rand(0, 100) . '.' . $request->photo->extension();
            $request->photo->storeAs('public/images', $file_name);
        }

        // bg-[url('')]

        $Contact = Contact::create([
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'number' => $request->number,
            'email' => $request->email,
            'address' => $request->address ?? null,
            'notes' => $request->notes ?? null,
            'photo' => $file_name ?? null,
            'user_id' => auth()->user()->id ?? null,
        ]);
        return redirect('/contacts')
            ->with('contact', $Contact)
            ->with('created', true);
    }


    /**
     * Display the specified resource.
     */
    public function show(Contact $Contact)
    {
        return view('contact.show')
            ->with('contact', $Contact);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Contact $Contact)
    {
        return view('contact.edit')
            ->with('contact', $Contact);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Contact $Contact)
    {
        if ($request->has('photo')) {
            $file_name = time() . rand(0, 100) . '.' . $request->photo->extension();
            $request->photo->storeAs('public/images', $file_name);
        }

        $Contact->update([
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'number' => $request->number,
            'email' => $request->email,
            'address' => $request->address ?? null,
            'notes' => $request->notes ?? null,
            'photo' => $file_name ?? null,
        ]);

        return redirect('/contacts/' . $Contact->id)
            ->with('updated', true);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Contact $Contact)
    {
        $Contact->delete();
        return redirect('/contacts')->with('deleted', true);
    }
}
