<?php

namespace App\Http\Controllers;

use App\Team;
use App\Equipment;
use Illuminate\Http\Request;

class EquipmentController extends Controller
{
    public function transaction() {
        $team = Team::all();
        $equipment = Equipment::all();

        return view('equipment.transaction', compact('team', 'equipment'));
    }

    public function processTransaction(Request $request) {
        $team = Team::find($request->get('select_team'));
        $equipment = Equipment::find($request->get('select_equipment'));
        $type = $request->get('select_transaction');
        $amount = $request->get('amount');

        // Input validation
        if ($team == null || $equipment == null || $type == null) {
            return redirect()->route('transaction')->with('error', 'Make sure fill all of the input');
        }

        // Transaction process
        if ($type == "buy") {
            $buy_price = $equipment->buy_price * $amount;

            if ($team->coins >= $buy_price) {
                $exist = $team->equipments()->where('equipments_id', $equipment->id)->exists();
                if ($exist) {
                    // Menambah jumlah produk dari tim terkait di bridge equipment_team jika row yang bersangkutan sudah ada
                    $team->equipments()->where('equipments_id', $equipment->id)->increment('amount', $amount);
                } else {
                    // Menambahkan row baru di bridge equipment_team jika row yang bersangkutan belum ada
                    $team->equipments()->attach($equipment->id, ['amount' => $amount]);
                }

                // Mengurangi saldo coin team
                $team->decrement('coins', $buy_price);
            } else {
                // Saldo tidak cukup untuk membeli
                return redirect()->route('transaction')->with('error', 'Insufficient Coins!');
            }
        } else {
            $equipment_team = $team->equipments()->where('equipments_id', $equipment->id);
            
            if ($equipment_team->exists()) {
                if ($equipment_team->first()->pivot->amount >= $amount) {
                    // Mengurangi stok yang dimiliki
                    $equipment_team->decrement('amount', $amount);

                    // Menambah saldo coin team
                    $team->increment('coins', $equipment->sell_price * $amount);
                } else {
                    return redirect()->route('transaction')->with('error', "$team->name doesn't have enough equipment to sell");
                }
            } else {
                return redirect()->route('transaction')->with('error', "$team->name doesn't have $equipment->name");
            }
        }

        return redirect()->route('transaction')->with('status', 'Transaction Success');
    }
}
