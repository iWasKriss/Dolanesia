<?php

namespace App\Http\Controllers;

use App\Models\Destination;
use App\Models\Transaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BuyController extends Controller
{
    public function checkout(Request $request)
    {
        $destination = Destination::findOrFail($request->destination);
        $request->validate([
            'destination' => 'required|integer',
            'ticket_qty' => 'required|integer|min:1'
        ]);

        if ($request->ticket_qty > $destination->ticket) {
            return redirect()->route('destination.show', $destination->id)->with('error_message', 'Only ' . $destination->ticket . ' tickets left');
        }

        Transaction::create([
            'user_id' => Auth::user()->id,
            'destination_id' => $destination->id,
            'ticket_qty' => $request->ticket_qty,
            'subtotal' => $request->ticket_qty * $destination->price
        ]);

        $destination->update([
            'ticket' => $destination->ticket - $request->ticket_qty
        ]);

        return redirect('/history')->with('message', 'ticket successfully purchased');
    }

    public function history()
    {
        if (Auth::user()->status == 'admin') {
            $histories = Transaction::all();
        } else {
            $histories = Transaction::where('user_id', Auth::user()->id)->get();
        }
        return view('history', [
            'histories' => $histories
        ]);
    }
}
