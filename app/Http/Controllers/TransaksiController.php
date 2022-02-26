<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use App\Models\Transaksi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TransaksiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $transaksis = Transaksi::latest()->paginate(5);

        return view('transaksi.index', compact('transaksis'))
                    ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $transaksis = Transaksi::all();
        $menus = Menu::get(['id', 'nama_menu']);
        $hargas = Menu::get('harga');

        return view('transaksi.create', compact('transaksis', 'menus', 'hargas'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama_pelanggan' => 'required',
            'menu_id' => 'required',
            'jumlah' => 'required',
            // 'pegawai_id' => 'required'
        ]);
        $menu= Menu::findOrFail($request->menu_id);
        $total_harga = $menu->harga * $request->jumlah;
        $pegawai_id = Auth::user()->id;

        $ketersediaan = $menu->ketersediaan - $request->jumlah;

        Transaksi::create([
            'nama_pelanggan' => $request->nama_pelanggan,
            'menu_id' => $request->menu_id,
            'jumlah' => $request->jumlah,
            'total_harga' => $total_harga,
            'pegawai_id' => $pegawai_id,
        ]);

        $menu->update([
            'ketersediaan' => $ketersediaan
        ]);

        return redirect()->route('transaksi.index')->with('success', 'Berhasil Membuat Transaksi!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $transaksi = Transaksi::find($id);
        $menus = Menu::get(['id', 'nama_menu']);

        return view('transaksi.edit', compact('transaksi', 'menus'));
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
        $request->validate([
            'nama_pelanggan' => 'required',
            'menu_id' => 'required',
            'jumlah' => 'required',
        ]);

        $transaksi = Transaksi::find($id);
        $jumlah_lama = $transaksi->jumlah;
        $jumlah_baru = $request->jumlah;

        $menu = Menu::findOrFail($request->menu_id);
        $total_harga = $menu->harga * $request->jumlah;
        // $transaksi->update($request->all());
        $transaksi->update([
            'nama_pelanggan' => $request->nama_pelanggan,
            'menu_id' => $request->menu_id,
            'jumlah' => $request->jumlah,
            'total_harga' => $total_harga
        ]);
        
        $ket_ada = $menu->ketersediaan;

        $selisih = $jumlah_lama - $jumlah_baru;
        $ket_ada_new = $ket_ada + $selisih;

        $menu->update([
            'ketersediaan' => $ket_ada_new
        ]);


        return redirect()->route('transaksi.index')->with('success', 'Berhasil Mengedit Transaksi!');
    }

    /**
     * Remove the specified resource from storage.
     * 
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $transaksi = Transaksi::find($id);
        $transaksi->delete();

        return redirect()->route('transaksi.index')->with('success', 'Berhasil Menghapus Transaksi!');
    }
}
