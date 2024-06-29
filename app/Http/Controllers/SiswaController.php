<?php

namespace App\Http\Controllers;

use App\Models\Pengumuman;
use Illuminate\Http\Request;
use App\Models\Santris;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Facades\Excel;
use Carbon\Carbon;

class SiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $siswa = Santris::all();
        $tanggal_pengumuman = Pengumuman::find("2");
        $formAction = "/admin/siswa_baru/update_tanggal_pengumuman/2";
        return view("Admin.siswa_baru", compact('siswa', 'tanggal_pengumuman', 'formAction'));
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
            $siswa->foto = time() . '-' . $request->file('foto')->getClientOriginalName();
            $request->file('foto')->move('uploads', $siswa->foto);
            $siswa->save();
        }

        if ($request->hasFile('bukti_pembayaran')) {
            $siswa->bukti_pembayaran = time() . '-' . $request->file('bukti_pembayaran')->getClientOriginalName();
            $request->file('bukti_pembayaran')->move('uploads', $siswa->bukti_pembayaran);
            $siswa->save();
        }

        return back()->with('success', 'Santri created successfully')
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
        // DB::connection()->enableQueryLog();
        $siswa = Santris::find($id)->update($request->all());

        if (!Storage::exists('siswa_images')) {
            Storage::makeDirectory('siswa_images');
        }

        if ($request->hasFile('foto')) {
            $siswa->foto = time() . '-' . $request->file('foto')->getClientOriginalName();
            $request->file('foto')->move('uploads', $siswa->foto);
            $siswa->save();
        }

        if ($request->hasFile('bukti_pembayaran')) {
            $siswa->bukti_pembayaran = time() . '-' . $request->file('bukti_pembayaran')->getClientOriginalName();
            $request->file('bukti_pembayaran')->move('uploads', $siswa->bukti_pembayaran);
            $siswa->save();
        }
        // return response()->json(DB::getQueryLog());
        return redirect()->back()->with('success', 'Santri updated successfully')
            ->header('Content-Type', 'text/plain');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    public function redirectToWhatsapp(string $id)
    {
        $siswa = Santris::where('id', $id)->first();
        if ($siswa->no_pendaftaran != null) {
            $phoneNumber = $siswa->nomor_hp_ayah; // Replace with actual phone number
            $phoneNumber = preg_replace('/^\D+/', '', $phoneNumber);

            // Check if the phone number starts with "08"
            if (substr($phoneNumber, 0, 2) === '08') {
                // Prepend "+62" for Indonesia country code
                $phoneNumber = '+62' . substr($phoneNumber, 1);
            }

            $message = "No Pendaftaran :" . $siswa->no_pendaftaran . "\nNama Lengkap :" . $siswa->nama_lengkap . "\nEmail :" . $siswa->email . "\nJenis Kelamin :" . $siswa->jenis_kelamin . "\nTempat Lahir :" . $siswa->tempat_lahir . "\nTanggal Lahir :" . $siswa->tanggal_lahir . "\nAsal Sekolah :" . $siswa->asal_sekolah . "\nAlamat Sekolah :" . $siswa->alamat_sekolah . "\nNama Ayah :" . $siswa->nama_ayah . "\nNama Ibu :" . $siswa->nama_ibu . "\n"; // Replace with desired message

            $encodedMessage = urlencode($message);
            $whatsappUrl = "https://wa.me/$phoneNumber/?text=$encodedMessage";

            return redirect()->away($whatsappUrl);
        } else {
            return response()->json(["Harap isi No Pendaftaran dahulu"]);
        }
        // return redirect()->away($whatsappUrl);
    }

    public function export_excel()
    {
        return Excel::download(new SiswaExport, 'siswa.xlsx');
    }

    public function pengumuman(Request $request)
    {
        $siswa = Santris::where('no_pendaftaran', $request->no_pendaftaran)->first();
        $pengumuman = Pengumuman::find(2);
        if ($pengumuman->tanggal_pengumuman <= Carbon::now()) {
            if ($siswa->status == 1) {
                $st = 'Selamat';
                $color = 'success';
                $msg = 'Selamat, ' . $siswa->nama_lengkap . ' Diterima';
            } else {
                $st = 'Mohon Maaf';
                $color = 'danger';
                $msg = 'Mohon Maaf, ' . $siswa->nama_lengkap . ' Tidak diterima';
            }
        } else {
            $st = '';
            $color = 'warning';
            $msg = 'Pengumuman akan diumumkan pada tanggal ' . date('d M Y', strtotime($pengumuman->tanggal_pengumuman));
        }
        ;
        return view("pengumuman", compact(['msg', 'st', 'color']));
    }

    public function update_tanggal_pengumuman(Request $request, string $id)
    {
        DB::connection()->enableQueryLog();
        $pengumuman = Pengumuman::find($id)->update($request->all());
        $queries = DB::getQueryLog();
        // return dd($queries);
        // $pengumuman->save();
        // return response()->json($request);
        return back()->with('success', 'Successfully saved in database')
            ->header('Content-Type', 'text/plain');
    }
}
