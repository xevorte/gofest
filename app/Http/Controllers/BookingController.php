<?php

namespace App\Http\Controllers;

use App\TravelPackage;
use App\Transportation;
use App\Transaction;
use App\TransactionTransportation;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Payment;
use Exception;
use Faker\Core\Number;
use Illuminate\Mail\Transport\Transport;

class BookingController extends Controller
{
    public function filldata(TravelPackage $travelpackage, Request $request)
    {
        $durationPrice = round($travelpackage->price / 4) * $request->duration;
        $roomPrice = $travelpackage->price * $request->rooms + $durationPrice;
        $taxPrice = $roomPrice * 0.04;

        if ($request->type_trip == 'Open Trip') {
            $typePrice = $roomPrice * 0.6;
        } else if ($request->type_trip == 'Adventure Trip') {
            $typePrice = $roomPrice * 0.10;
        } else {
            $typePrice = $roomPrice * 0.12;
        }

        return view('pages.booking.filldata', [
            'active' => 'fill-in-data',
            'data' => $request,
            'destination' => $travelpackage,
            'roomPrice' => $roomPrice,
            'durationPrice' => $durationPrice,
            'typePrice' => $typePrice,
            'taxPrice' => $taxPrice,
            'totalPrice' => $roomPrice + $typePrice + $taxPrice
        ]);
    }

    public function filldatatransportation(Transportation $transportation, Request $request)
    {
        $price = 70;

        if ($request->type == 'Trains') {
            $price = 40;
        } else if ($request->type == 'Bus') {
            $price = 18;
        }

        $taxPrice = $price * 0.04;

        return view('pages.booking_transportation.filldata', [
            'active' => 'fill-in-data',
            'data' => $request,
            'transportation' => $transportation,
            'price' => $price,
            'taxPrice' => $taxPrice,
            'totalPrice' => ($price * $request->guests) + $taxPrice
        ]);
    }

    public function review(TravelPackage $travelpackage, Request $request)
    {
        return view('pages.booking.review', [
            'active' => 'review',
            'data' => $request,
            'destination' => $travelpackage
        ]);
    }

    public function pay_later(Request $request)
    {
        Transaction::create($request->all());
        return redirect()->route('retrieve.all');
    }

    public function pay_later_transportation(Request $request)
    {
        TransactionTransportation::create($request->all());
        return redirect()->route('retrieve.all');
    }

    public function payment(TravelPackage $travelpackage, Request $request)
    {
        Transaction::create($request->all());

        return view('pages.booking.payment', [
            'active' => 'payment',
            'data' => $request,
            'destination' => $travelpackage,
            'other_fees' => $request->transaction_total - ($travelpackage->price * $request->rooms)
        ]);
    }

    public function paymenttransportation(Transportation $transportation, Request $request)
    {
        TransactionTransportation::create($request->all());

        return view('pages.booking_transportation.payment', [
            'active' => 'payment',
            'data' => $request,
            'transportation' => $transportation
        ]);
    }

    public function payment_process(TravelPackage $travelpackage, Request $request)
    {
        $data = Transaction::where('transaction_code', $request->transaction_code)->firstOrFail();

        return view('pages.booking.payment_process', [
            'active' => 'process',
            'data' => $request,
            'datas' => $data,
            'destination' => $travelpackage
        ]);
    }

    public function payment_process_transportation(Transportation $transportation, Request $request)
    {
        $data = TransactionTransportation::where('transaction_code', $request->transaction_code)->firstOrFail();

        return view('pages.booking_transportation.payment_process', [
            'active' => 'process',
            'data' => $request,
            'datas' => $data,
            'transportation' => $transportation
        ]);
    }

    public function checkout(Request $request)
    {
        $data = $request->all();
        $data['image'] = $request->file('image')->store(
            'assets/payment',
            'public'
        );
        Payment::create($data);

        $datas = Transaction::findOrFail($request->transaction_travel_packages_id);
        $datas->update([
            'transaction_status' => 'WAITING'
        ]);

        $data = TravelPackage::findOrFail($datas->travel_packages_id);
        $contact = 'https://api.whatsapp.com/send?phone=6281310481842&text=Halo,%20Saya%20' . $datas->name . '%20sudah%20melakukan%20pembayaran%20untuk%20' . $data->type . '%20yaitu%20' . $data->title . '.%20Berikut%20saya%20lampirkan%20bukti%20pembayaran%20:';

        return redirect()->route('checkout-progress')->with(['contact' => $contact]);
    }

    public function checkout_transportation(Request $request)
    {
        $data = $request->all();
        $data['image'] = $request->file('image')->store(
            'assets/payment',
            'public'
        );
        Payment::create($data);

        $datas = TransactionTransportation::findOrFail($request->transaction_transportations_id);
        $datas->update([
            'transaction_status' => 'WAITING'
        ]);

        $data = Transportation::findOrFail($datas->transportations_id);
        $contact = 'https://api.whatsapp.com/send?phone=6281310481842&text=Halo,%20Saya%20' . $datas->name . '%20sudah%20melakukan%20pembayaran%20untuk%20' . $data->type . '%20yaitu%20' . $data->company_name . '.%20Berikut%20saya%20lampirkan%20bukti%20pembayaran%20:';

        return redirect()->route('checkout-progress')->with(['contact' => $contact]);
    }
}
