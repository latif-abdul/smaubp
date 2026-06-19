<?php

namespace App\Http\Controllers;

use App\Models\Batch;
use App\Models\TahunAjaran;
use Carbon\Carbon;
use Illuminate\Http\Request;

class BatchController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $batch = Batch::where('deleted_at', '=', null)->get();
        $title = "Gelombang Pendaftaran";
        $base_url = "/batch";
        return view('Admin.batch_index', compact(['batch', 'title', 'base_url']));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $formAction = "/batch";
        $tahunAjaran = TahunAjaran::where('deleted_at', '=', null)->get();
        return view("Admin.manage_batch", compact(['formAction', 'tahunAjaran']));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $batch = Batch::create($request->all());
        return back()->with('success', 'Batch created successfully')
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
        $batch = Batch::find($id);
        $formAction = "/batch/$id";
        $tahunAjaran = TahunAjaran::where('deleted_at', '=', null)->get();
        return view("Admin.manage_batch", compact(['formAction', 'batch', 'tahunAjaran']));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $batch = Batch::find($id);
        $batch->update($request->all());
        return redirect()->back()->with('success', 'Batch updated successfully')
            ->header('Content-Type', 'text/plain');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $batch = Batch::find($id);
        $batch->update(['deleted_at' => Carbon::now()]);
        return redirect()->back()->with('success', 'Tahun ajaran deleted successfully')
            ->header('Content-Type', 'text/plain');
    }
}
