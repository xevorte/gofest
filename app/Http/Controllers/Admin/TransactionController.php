<?php

namespace App\Http\Controllers\Admin;

use Exception;
use App\Payment;
use App\Transaction;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class TransactionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('pages.admin.transaction.index', [
            'active' => 'transactions',
            'transactions' => Transaction::with(['travel_package'])->paginate(10)
        ]);
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
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return view('pages.admin.transaction.detail', [
            'active' => 'transactions',
            'data' => Transaction::findOrFail($id),
            'payment' => Payment::where('transaction_travel_packages_id', $id)->first()
        ]);
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
    public function update($id)
    {
        try {
            Transaction::findOrFail($id)->update(['transaction_status' => 'SUCCESSFUL']);
            $queryStatus = "Success Approved Transaction";
        } catch (Exception $e) {
            $queryStatus = "Failed Approved Transaction";
        }

        return redirect()->route('transaction-destinations.index')->with(['message' => $queryStatus]);
    }

    public function cancel($id)
    {
        try {
            Transaction::findOrFail($id)->update(['transaction_status' => 'FAILED']);
            $queryStatus = "Success Cancel Transaction";
        } catch (Exception $e) {
            $queryStatus = "Failed Cancel Transaction";
        }

        return redirect()->route('transaction-destinations.index')->with(['message' => $queryStatus]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
            Transaction::findOrFail($id)->delete();
            $queryStatus = "Success Delete Transaction";
        } catch (Exception $e) {
            $queryStatus = "Failed Delete Transaction";
        }

        return redirect()->route('transaction-destinations.index')->with(['message' => $queryStatus]);
    }
}
