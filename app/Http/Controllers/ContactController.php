<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\Request;
use App\Models\PracticianEntity;
use Illuminate\Support\Facades\Auth;
use App\Models\PracticianEntityContact;

class ContactController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(PracticianEntity $practician)
    {
        // dd(Auth::user()->practician_entity);
        $user = Auth::user();

        if ($user->hasRole('super admin')) {

            $practice_contacts = Contact::whereHas('practice_entity')->get();

        } elseif ($user->hasRole('practician') && $user->practician_entity) {


            // $contacts = Contact::pratice_contacts($user->practician_entity);
            $practice_contacts = Contact::whereHas('practice_entity', function ($query) use ($user) {
                $query->where('practician_entity_id', $user->practician_entity->id);
            })->get()->fresh();
            // dd($medicus_contacts);
        }else{
            abort(403,'Unauthorized');
        }
        $medicus_contacts = Contact::doesntHave('practice_entity')->get()->fresh();


        // dd($contacts);
        return view('practician.contacts.index', compact('practice_contacts', 'medicus_contacts'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

        return view('practician.contacts.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'title' => 'required|unique:contacts,title',
            'email' => 'required|unique:contacts,email',
            'office_phone' => 'required',
            'direct_phone' => 'required',
            'prefered_method_of_contact' => 'required',
            'contact_type' => 'required',
        ]);

        if (Auth::user()->hasRole('super admin')) {
            // $request->validate([
            //     'practice_entity' => 'required',
            // ]);

            $data = [
                'first_name' => $request->first_name,
                'last_name' => $request->last_name,
                'title' => $request->title,
                'email' => $request->email,
                'phone_no' => $request->office_phone,
                'extension' => $request->extension,
                'direct_phone' => $request->direct_phone,
                'prefered_method_of_contact' => $request->prefered_method_of_contact,
                'contact_type' => $request->contact_type,
            ];

            $create_contact = Contact::create($data);

            if ($create_contact) {
                return redirect()->back()->with('success', 'Contact created successfully');
            } else {
                return redirect()->back()->with('error', 'Contact creation failed');
            }
        }
        // dd($request->all(), Auth::user()->hasRole('practician'));

        if (Auth::user()->hasRole('practician')) {

            $practice = PracticianEntity::find(Auth::user()->practician_entity->id);

            $data = [
                'first_name' => $request->first_name,
                'last_name' => $request->last_name,
                'title' => $request->title,
                'email' => $request->email,
                'phone_no' => $request->office_phone,
                'extension' => $request->extension,
                'direct_phone' => $request->direct_phone,
                'prefered_method_of_contact' => $request->prefered_method_of_contact,
                'contact_type' => $request->contact_type,
            ];

            $create_contact = Contact::create($data);

            if ($create_contact) {
                $data = [
                    'practician_entity_id' => $practice->id,
                    'contact_id' => $create_contact->id,
                ];

                $create_practice_contact = PracticianEntityContact::create($data);

                if ($create_practice_contact) {

                    return redirect()->back()->with('success', 'Contact created successfully');
                } else {
                    return redirect()->back()->with('error', 'Contact creation failed');
                }
            }
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Contact $contact)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Contact $contact)
    {
        if (Auth::user()->hasRole('super admin')) {

            $practice_entities = PracticianEntity::with('user')->get();
        } else {

            $practice_entities = '';
        }
        return view('practician.contacts.edit', compact('contact', 'practice_entities'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Contact $contact)
    {
        // dd($contact);
        $request->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'title' => 'required|unique:contacts,title,' . $contact->id . ',id',
            'email' => 'required|unique:contacts,email,' . $contact->id . ',id',
            'office_phone' => 'required',
            'direct_phone' => 'required',
            'prefered_method_of_contact' => 'required',
            'contact_type' => 'required',
        ]);




        $data = [
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'title' => $request->title,
            'email' => $request->email,
            'phone_no' => $request->office_phone,
            'extension' => $request->extension,
            'direct_phone' => $request->direct_phone,
            'prefered_method_of_contact' => $request->prefered_method_of_contact,
            'contact_type' => $request->contact_type,
        ];

        $update_contact = Contact::find($contact->id)->update($data);

        if ($update_contact) {
            return redirect()->back()->with('success', 'Contact updated successfully');
        } else {
            return redirect()->back()->with('error', 'Contact failed to update');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Contact $contact)
    {
        $delete_contact = Contact::find($contact->id)->delete();

        if ($delete_contact) {
            return redirect()->back()->with('success', 'Contact deleted successfully');
        } else {
            return redirect()->back()->with('error', 'Contact failed to delete');
        }
    }
}
