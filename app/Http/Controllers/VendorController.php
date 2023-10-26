<?php

namespace App\Http\Controllers;

use App\Models\Vendor;
use Illuminate\Http\Request;

class VendorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $vendors = Vendor::all();

        return view('admin.vendors.index', compact('vendors'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.vendors.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|unique:vendors,name,',
        ]);



        $data = [
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'city' => $request->city,
            'state' => $request->state,
            'country' => $request->country,
            'address' => $request->address,
        ];

        $created = Vendor::create($data);

        if ($created) {

            return redirect()->back()->with('success', 'Vendor created successfully!');
        } else {
            return redirect()->back()->with('error', 'Vendor has failed to create!');
        }
    }
    /**
     * Display the specified resource.
     */
    public function show(Vendor $vendor)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Vendor $vendor)
    {
        // dd($vendor);
        return view('admin.vendors.edit', compact('vendor'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Vendor $vendor)
    {
        $request->validate([
            'name' => 'required|unique:vendors,name,'.$vendor->id.',id',

        ]);


        $data = [
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'city' => $request->city,
            'state' => $request->state,
            'country' => $request->country,
            'address' => $request->address,
        ];

        $updated = Vendor::find($vendor->id)->update($data);

        if ($updated) {

            return redirect()->back()->with('success', 'Vendor updated successfully!');
        } else {
            return redirect()->back()->with('error', 'Vendor has failed to update!');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Vendor $vendor)
    {
        if($vendor){
            $deleted = Vendor::find($vendor->id)->delete();

            if ($deleted) {

                return redirect()->back()->with('success', 'Vendor deleted successfully!');
            } else {
                return redirect()->back()->with('error', 'Vendor has failed to delete!');
            }
        }
    }
}
