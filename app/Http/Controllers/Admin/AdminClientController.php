<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\ClientStoreRequest;
use App\Http\Requests\TransactionStoreRequest;
use App\Models\Admin\ClientNote;
use App\Models\Currencies;
use App\Models\PaymentMethods;
use App\Models\Transaction;
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
        $paymentMethods = PaymentMethods::all();
        return view('admin.pages.clients.create', compact('countries', 'currencies', 'paymentMethods'));
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
        $clients = User::role('client')->get();
        $user_transactions = Transaction::where('user_id', $id)->get();
        $totalAmountIn = Transaction::where('user_id', $id)->sum('amount_in');
        $totalAmountOut = Transaction::where('user_id', $id)->sum('amount_out');
        $totalFees = Transaction::where('user_id', $id)->sum('fees');
        $balance = $totalAmountIn - $totalAmountOut - $totalFees;
        $paymentMethods = PaymentMethods::all();
        $expenses = $totalFees + $totalAmountOut;
        $netIncome = $totalAmountIn - $totalAmountOut - $totalFees;
        $clientNote = ClientNote::where('user_id', $id)->get();
        return view('admin.pages.clients.show', compact('client', 'user_transactions', 'totalAmountIn', 'totalAmountOut', 'totalFees', 'balance', 'paymentMethods', 'clients', 'expenses', 'netIncome', 'clientNote'));
    }

    public function transactionStore(TransactionStoreRequest $request)
    {
        Transaction::create([
            'date_time' => $request->date_time,
            'payment_method' => $request->payment_method,
            'description' => $request->description,
            'amount_in' => $request->amount_in,
            'amount_out' => $request->amount_out,
            'fees' => $request->fees,
            'transaction_id' => $request->transaction_id,
            'invoice_ids' => $request->invoice_ids,
            'user_id' => $request->input('user_id'),
        ]);

        activity()->log(auth()->user()->first_name . ' ' . auth()->user()->last_name . ' has added transaction #' . $request->transaction_id);

        return redirect()->back()->with('success', 'Transaction added successfully!');

    }
    public function transactionDelete($id){
        $transaction = Transaction::where('id', $id);
        $transaction->delete();
        activity()->log(auth()->user()->first_name . ' ' . auth()->user()->last_name . ' has deleted a transaction');
        return redirect()->back()->with('success', 'Transaction deleted successfully');
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
