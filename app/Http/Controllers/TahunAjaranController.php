<?php

namespace App\Http\Controllers;

use App\Models\TahunAjaran;
use Illuminate\Http\Request;
use Carbon\Carbon;

class TahunAjaranController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $tahunAjaran = TahunAjaran::where('deleted_at', '=', null)->get();
        $title = "Tahun Ajaran";
        $base_url = "/tahun_ajaran";
        return view('Admin.tahun_ajaran_index', compact(['tahunAjaran', 'title', 'base_url']));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $formAction = "/tahun_ajaran";
        return view("Admin.manage_tahun_ajaran", compact(['formAction']));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        if ($request->status == 'active') {
            $result = TahunAjaran::where('deleted_at', '=', null)->where('status', '=', 'active')->count();
            if ($result == 0) {
                $tahunAjaran = TahunAjaran::create($request->all());
                return back()->with('success', 'Tahun ajaran created successfully')
                    ->header('Content-Type', 'text/plain');
            } else {
                return back()->with('failed', 'Tahun ajaran sudah ada yang aktif')
                    ->header('Content-Type', 'text/plain');
            }
        } else {
            $tahunAjaran = TahunAjaran::create($request->all());
            return back()->with('success', 'Tahun ajaran created successfully')
                ->header('Content-Type', 'text/plain');
        }
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
        $tahunAjaran = TahunAjaran::find($id);
        $formAction = "/tahun_ajaran/$id";
        return view("Admin.manage_tahun_ajaran", compact(['formAction', 'tahunAjaran']));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        if ($request->status == 'active') {
            $result = TahunAjaran::where('deleted_at', '=', null)->where('status', '=', 'active')->count();
            if ($result == 0) {
                $tahunAjaran = TahunAjaran::find($id);
                $tahunAjaran->update($request->all());
                return redirect()->back()->with('success', 'Tahun ajaran updated successfully')
                    ->header('Content-Type', 'text/plain');
            } else {
                return back()->with('failed', 'Tahun ajaran sudah ada yang aktif')
                    ->header('Content-Type', 'text/plain');
            }
        } else {
            $tahunAjaran = TahunAjaran::find($id);
        $tahunAjaran->update($request->all());
        return redirect()->back()->with('success', 'Tahun ajaran updated successfully')
            ->header('Content-Type', 'text/plain');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $tahunAjaran = TahunAjaran::find($id);
        $tahunAjaran->update(['deleted_at' => Carbon::now()]);
        return redirect()->back()->with('success', 'Tahun ajaran deleted successfully')
            ->header('Content-Type', 'text/plain');
    }
}
