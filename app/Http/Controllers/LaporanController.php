<?php

namespace App\Http\Controllers;

use App\Models\Transaksi;
use Carbon\Carbon;
use Illuminate\Http\Request;

class LaporanController extends Controller
{
    public function index(Request $request) {
        $transaksis = Transaksi::all();
        if(!is_null($request->tanggalawal) && !is_null($request->tanggalakhir)){
            $transaksis =  Transaksi::whereBetween('created_at', [Carbon::parse($request->tanggalawal), Carbon::parse(date($request->tanggalakhir). ' 23:59:59')])->get();
        }
        return view('laporan.laporan', compact('transaksis'))
        ->with('i', (request()->input('page', 1) - 1) * 5);
    }
}
