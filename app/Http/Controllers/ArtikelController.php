<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Artikel;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;

class ArtikelController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view("Admin.artikel_index");
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $formAction = "/admin/artikel";
        return view("Admin.manage_artikel", compact(['formAction']));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $artikel = Artikel::create($request->all());

        if (!Storage::exists('artikel_images')) {
            Storage::makeDirectory('artikel_images');
        }

        if ($request->hasFile('gambar')) {
            $artikel->gambar = time() . '-' . $request->file('gambar')->getClientOriginalName();
            $request->file('gambar')->move('uploads', $artikel->gambar);
            $artikel->save();
        }

        // if ($request->hasFile('bukti_pembayaran')) {
        //     $artikel->bukti_pembayaran = time() . '-' . $request->file('bukti_pembayaran')->getClientOriginalName();
        //     $request->file('bukti_pembayaran')->move('uploads', $artikel->bukti_pembayaran);
        //     $artikel->save();
        // }

        return back()->with('success', 'Santri created successfully')
            ->header('Content-Type', 'text/plain');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $formAction = "/admin/artikel/$id";
        $artikel = Artikel::where('id', $id)->first();
        return view('Admin.manage_artikel', compact(['artikel', 'formAction']));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $artikel = Artikel::find($id)->update($request->all());

        if (!Storage::exists('artikel_images')) {
            Storage::makeDirectory('artikel_images');
        }

        if ($request->hasFile('gambar')) {
            $artikel->gambar = time() . '-' . $request->file('gambar')->getClientOriginalName();
            $request->file('gambar')->move('uploads', $artikel->gambar);
            $artikel->save();
        }

        return redirect()->back()->with('success', 'Artikel updated successfully')
            ->header('Content-Type', 'text/plain');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
