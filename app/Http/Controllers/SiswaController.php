<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Siswa;
use Illuminate\Support\Facades\Validator;

class SiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $siswa = Siswa::all();
        return view("Admin.siswa_baru", compact($siswa));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("Admin.manage_siswa");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required|email|unique:siswas',
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
    
        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }
    
        $siswa = Siswa::create($request->all());
    
        if ($request->hasFile('foto')) {
            $siswa->foto = $request->file('foto')->store('siswa_images');
            $siswa->save();
        }
    
        if ($request->hasFile('bukti_pembayaran')) {
            $siswa->bukti_pembayaran = $request->file('bukti_pembayaran')->store('siswa_images');
            $siswa->save();
        }
    
        return redirect()->route('siswa.index')
                        ->with('success','siswa created successfully.');
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
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
