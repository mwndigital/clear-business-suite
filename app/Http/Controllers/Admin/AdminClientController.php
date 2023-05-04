<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\ClientStoreRequest;
use App\Models\Currencies;
use App\Models\User;
use App\Models\UserDetails;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Monarobase\CountryList\CountryListFacade;
use Torann\Currency\Currency;

class AdminClientController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $clients = User::with('userDetail')->whereHas('roles', function ($query) {
            $query->where('name', 'client');
        })->get();
        return view('admin.pages.clients.index', compact('clients'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $countries = CountryListFacade::getList('en');
        $currencies = Currencies::all();
        return view('admin.pages.clients.create', compact('countries', 'currencies'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ClientStoreRequest $request)
    {
        $user = User::create([
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'status' => 'active',
        ])->assignRole('client');

        $userDetails = UserDetails::create([
            'company_name' => $request->company_name,
            'default_language' => $request->default_language,
            'address_line_one' => $request->address_line_one,
            'address_line_two' => $request->address_line_two,
            'town_city' => $request->town_city,
            'state_region' => $request->state_region,
            'zip_postcode' => $request->zip_postcode,
            'country' => $request->country,
            'phone_number' => $request->phone_number,
            'default_payment_method' => $request->default_payment_method,
            'default_currency' => $request->default_currency,
            'default_currency_symbol' => $request->default_currency_symbol,
            'website' => $request->website,
            'user_id' => $user->id
        ]);
        activity()->log(auth()->user()->first_name . ' ' . auth()->user()->last_name . ' has created a new client ' . $request->first_name . ' ' . $request->last_name);
        return redirect('admin/clients')->with('success', 'New client has been added.');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $client = User::find($id);

        return view('admin.pages.clients.show', compact('client'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
