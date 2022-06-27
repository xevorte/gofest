<?php

namespace App\Http\Controllers;

use App\Payment;
use App\Transaction;
use Illuminate\Http\Request;
use App\TransactionTransportation;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\PaymentRequest;
use Exception;

class RetrieveController extends Controller
{
    public function all()
    {
        return view('pages.retrieve', [
            'active' => 'retrieve-all',
            'data' => Transaction::with(['travel_package', 'user']),
            'datatransportation' => TransactionTransportation::with(['transportation', 'user'])->where('users_id', Auth::user()->id)->paginate(5)
        ]);
    }

    public function cancel_destination(Request $request)
    {
        Transaction::findOrFail($request->id)->delete();
        return redirect()->route('retrieve.all');
    }

    public function cancel_transportation(Request $request)
    {
        TransactionTransportation::findOrFail($request->id)->delete();
        return redirect()->route('retrieve.all');
    }

    public function voucher_destination()
    {
        return view('pages.voucher', [
            'data' => Transaction::with(['travel_package', 'user'])->where('transaction_code', request('kode'))->firstOrFail()
        ]);
    }

    public function voucher_transportation()
    {
        return view('pages.voucher-transportation', [
            'data' => TransactionTransportation::with(['transportation', 'user'])->where('transaction_code', request('kode'))->firstOrFail()
        ]);
    }

    public function payment()
    {
        return view('pages.payment', [
            'destinations' => Transaction::with(['travel_package', 'user'])->where('users_id', Auth::user()->id)->where('transaction_status', 'PENDING')->get(),
            'transportations' => TransactionTransportation::with(['transportation', 'user'])->where('users_id', Auth::user()->id)->where('transaction_status', 'PENDING')->get(),
        ]);
    }

    public function payment_lodging(PaymentRequest $request)
    {
        $data = $request->all();
        $data['image'] = $request->file('image')->store(
            'assets/payment',
            'public'
        );

        try {
            Payment::create($data);
            Transaction::findOrFail($request->transaction_travel_packages_id)->update(['transaction_status' => 'WAITING']);

            $queryStatus = "SUCCESS SEND PAYMENT";
        } catch (Exception $e) {
            $queryStatus = "FAILED SEND PAYMENT";
        }

        return redirect()->route('retrieve.all')->with(['message' => $queryStatus]);
    }

    public function payment_transportation(PaymentRequest $request)
    {
        $data = $request->all();
        $data['image'] = $request->file('image')->store(
            'assets/payment',
            'public'
        );

        try {
            Payment::create($data);
            TransactionTransportation::findOrFail($request->transaction_transportations_id)->update(['transaction_status' => 'WAITING']);

            $queryStatus = "SUCCESS SEND PAYMENT";
        } catch (Exception $e) {
            $queryStatus = "FAILED SEND PAYMENT";
        }

        return redirect()->route('retrieve.all')->with(['message' => $queryStatus]);
    }
}
