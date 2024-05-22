<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Santris;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;

class SiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $siswa = Santris::all();
        return view("Admin.siswa_baru", compact('siswa'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $formAction = "/admin/siswa_baru";
        return view("Admin.manage_siswa", compact(['formAction']));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required|email|unique:santris',
            'nama_lengkap' => 'required|string|max:255',
            'jenis_kelamin' => 'required|in:OP,OL',
            'tempat_lahir' => 'required|string|max:255',
            'tanggal_lahir' => 'required|date',
            'asal_sekolah' => 'required|string|max:255',
            'alamat_sekolah' => 'required|string|max:255',
            'nama_ayah' => 'required|string|max:255',
            'nama_ibu' => 'required|string|max:255',
            'nomor_hp_ayah' => 'required|string|max:255',
            'nomor_hp_ibu' => 'required|string|max:255',
            'pekerjaan_ayah' => 'required|string|max:255',
            'pekerjaan_ibu' => 'required|string|max:255',
            'penghasilan_ayah' => 'required|in:0-1.000.000,1.000.000-3.000.000,3.000.000-6.000.000,6.000.000-10.000.000,>10.000.000',
            'penghasilan_ibu' => 'required|in:0-1.000.000,1.000.000-3.000.000,3.000.000-6.000.000,6.000.000-10.000.000,>10.000.000',
            'jalur_masuk' => 'required|in:reguler',
            'foto' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'bukti_pembayaran' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
    
        // if ($validator->fails()) {
        //     return $validator;
        //     // return redirect()->back()
        //     //     ->withErrors($validator)
        //     //     ->withInput();
        // }
    
        $siswa = Santris::create($request->all());

        if (!Storage::exists('siswa_images')) {
            Storage::makeDirectory('siswa_images');
        }
    
        if ($request->hasFile('foto')) {
            $siswa->foto = time().'-'.$request->file('foto')->getClientOriginalName();
            $request->file('foto')->move('uploads', $siswa->foto);
            $siswa->save();
        }
    
        if ($request->hasFile('bukti_pembayaran')) {
            $siswa->bukti_pembayaran = time().'-'.$request->file('bukti_pembayaran')->getClientOriginalName();
            $request->file('bukti_pembayaran')->move('uploads', $siswa->bukti_pembayaran);
            $siswa->save();
        }
    
        return redirect()->back()->with('success', 'Santri created successfully')
            ->header('Content-Type', 'text/plain');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $siswa = Santris::where('id', $id)->first();
        return view('', [$siswa]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $formAction = "/admin/siswa_baru/$id";
        $siswa = Santris::where('id', $id)->first();
        return view('Admin.manage_siswa', compact(['siswa', 'formAction']));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $siswa = Santris::find($id)->update($request->all());

        if (!Storage::exists('siswa_images')) {
            Storage::makeDirectory('siswa_images');
        }
    
        if ($request->hasFile('foto')) {
            $siswa->foto = time().'-'.$request->file('foto')->getClientOriginalName();
            $request->file('foto')->move('uploads', $siswa->foto);
            $siswa->save();
        }
    
        if ($request->hasFile('bukti_pembayaran')) {
            $siswa->bukti_pembayaran = time().'-'.$request->file('bukti_pembayaran')->getClientOriginalName();
            $request->file('bukti_pembayaran')->move('uploads', $siswa->bukti_pembayaran);
            $siswa->save();
        }
    
        return redirect()->back()->with('success', 'Santri created successfully')
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
