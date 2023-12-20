<?php

namespace App\Http\Controllers;

use App\Models\Listing;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class ListingController extends Controller
{
    public function index()
    {
        return view('listings.index', [
            'listings' => Listing::latest()
                ->filter(request(['tag', 'search']))
                ->paginate(6),
        ]);
    }

    public function show(Listing $listing)
    {
        return view('listings.show', [
            'listing' => $listing,
        ]);
    }

    public function create()
    {
        return view('listings.create');
    }

    public function store(Request $request)
    {
        $formFields = $request->validate([
            'title'       => 'required',
            'company'     => ['required', Rule::unique('listings', 'company')],
            'description' => 'required',
            'location'    => 'required',
            'website'     => 'required',
            'email'       => 'required|email',
            'tags'        => 'required',
            //'image'       => 'required|image|max:5000',
        ]);

        if ($request->hasFile('logo')) {
            $formFields['logo'] = $request->file('logo')->store('logos', 'public');
        }
        $listing = Listing::create($formFields);

        return redirect('/listings/' . $listing->id)->with('message', 'Listing created successfully');
    }

    public function edit(Listing $listing)
    {
        return view('listings.edit', [
            'listing' => $listing,
        ]);
    }

    public function update(Request $request, Listing $listing)
    {
        $formFields = request()->validate([
            'title'       => 'required',
            'company'     => ['required'],
            'description' => 'required',
            'location'    => 'required',
            'website'     => 'required',
            'email'       => 'required|email',
            'tags'        => 'required',
        ]);

        if (request()->hasFile('logo')) {
            $formFields['logo'] = request()->file('logo')->store('logos', 'public');
        }

        $listing->update($formFields);

        return back()->with('message', 'Listing updated successfully');
    }
}
