<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\TransactionStoreRequest;
use App\Models\PaymentMethods;
use App\Models\Transaction;
use App\Models\User;
use Faker\Provider\Payment;
use Illuminate\Http\Request;

class AdminTransactionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $transactions = Transaction::all();
        $clients = User::role('client')->get();
        $paymentMethods = PaymentMethods::get();
        return view('admin.pages.transactions.index', compact('transactions', 'clients', 'paymentMethods'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $clients = User::role('client')->get();
        $paymentMethods = PaymentMethods::get();
        return view('admin.pages.transactions.create', compact('clients', 'paymentMethods'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(TransactionStoreRequest $request)
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

        return redirect('admin/transactions')->with('success', 'Transaction added successfully!');

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $transaction = Transaction::find($id);
        $clients = User::role('client')->get();
        $paymentMethods = PaymentMethods::get();
        return view('admin.pages.transactions.edit', compact('transaction', 'clients', 'paymentMethods'));
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
        Transaction::where('id', $id)->update([
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

        activity()->log(auth()->user()->first_name . ' ' . auth()->user()->last_name . ' has updated transaction #' . $request->transaction_id);

        return redirect('admin/transactions')->with('success', 'Transaction updated successfully!');
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
