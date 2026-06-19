<?php

namespace App\Http\Controllers;

use App\Exports\DafulExport;
use Illuminate\Http\Request;
use App\Models\Santris;
use App\Models\Daful;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Response;
use Maatwebsite\Excel\Facades\Excel;
use Carbon\Carbon;
use Illuminate\Support\Facades\Validator;

class DafulController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $formAction = "/daful";
        return view("daful", compact("formAction"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $santri = Santris::find($request->id);
        if(!$santri){
            return redirect()->back()->with('failed', 'No Pendaftaran tidak ditemukan');
        }
        $santri->update($request->all());
        $queries = DB::getQueryLog();
        // $santri->update(["no_wa"=> $request->no_wa]);
        // $existing_daful = Daful::find($santri->id)
        // ->where("verifikasi_akta_kelahiran", 1)
        // ->where("verifikasi_kk", 1)
        // ->where("verifikasi_skl", 1)
        // ->where("verifikasi_bukti_transfer", 1)
        // ->where("verifikasi_foto", 1);

        // if ($existing_daful) {
        //     return back()->with('success', 'Daftar ulang telah diverifikasi');
        // } else {
        

        $validator = Validator::make($request->all(), [
            'akta_kelahiran' => 'required|mimes:jpeg,jpg,png|max:2048',
            'kartu_keluarga' => 'required|mimes:jpeg,jpg,png|max:2048',
            // 'skl' => 'required|mimes:jpeg,jpg,png',
            'bukti_transfer' => 'required|mimes:jpeg,jpg,png|max:2048',
            'foto' => 'required|mimes:jpeg,jpg,png|max:2048',
        ]);

        if ($validator->fails()) {
            // return response($validator->errors());
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }
        $daful = Daful::create(["id_santris" => $santri->id]);

        if ($request->hasFile('akta_kelahiran')) {
            $daful->akta_kelahiran = $santri->nama_lengkap . time() . '-' . $request->file('akta_kelahiran')->getClientOriginalName();
            $request->file('akta_kelahiran')->move('uploads', $daful->akta_kelahiran);
            $daful->save();
        }
        if ($request->hasFile('kartu_keluarga')) {
            $daful->kartu_keluarga = $santri->nama_lengkap . time() . '-' . $request->file('kartu_keluarga')->getClientOriginalName();
            $request->file('kartu_keluarga')->move('uploads', $daful->kartu_keluarga);
            $daful->save();
        }
        // if ($request->hasFile('skl')) {
        //     $daful->skl = $santri->nama_lengkap . time() . '-' . $request->file('skl')->getClientOriginalName();
        //     $request->file('skl')->move('uploads', $daful->skl);
        //     $daful->save();
        // }
        if ($request->hasFile('bukti_transfer')) {
            $daful->bukti_transfer = $santri->nama_lengkap . time() . '-' . $request->file('bukti_transfer')->getClientOriginalName();
            $request->file('bukti_transfer')->move('uploads', $daful->bukti_transfer);
            $daful->save();
        }
        if ($request->hasFile('foto')) {
            $daful->foto = $santri->nama_lengkap . time() . '-' . $request->file('foto')->getClientOriginalName();
            $request->file('foto')->move('uploads', $daful->foto);
            $daful->save();
        }
        // }

        // return response($queries);
        return back()->with('success', 'Success create daftar ulang');

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $daful = Daful::where("id_santris", $id)->orderBy("updated_at", "desc")->first();
        $santri = Santris::find($id);
        if (!$daful) {
            return back()->with("error", $santri->nama_lengkap . " belum melakukan daftar ulang");
        } else {
        $formAction = "/admin/daful/" . $daful->id;
        $carbon = Carbon::class;
        return view('Admin.show_daful', compact('daful', 'formAction', 'carbon'));
        };
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $siswa = Santris::find($id);
        $formAction = "/daful";
        return view("daful", compact("formAction", "siswa"));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $daful = Daful::find($id)->update($request->all());
        return back()->with('success', 'Successfully updated');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    public function downloadImage(string $imagePath){
        return Response::download('/home/u346878522/domains/smaubp-tahfidz.sch.id/public_html/uploads/'.$imagePath);
    }

    public function export_excel()
    {
        $today = Carbon::now()->isoFormat('D MMMM Y');
        return Excel::download(new DafulExport, 'Daftar Ulang '.$today.'.xlsx');
    }

    public function format_ttl($raw) {
        if (empty($raw)) return '-';
        $parts = explode(',', $raw, 2);
        $place = trim($parts[0] ?? '');
        $date = isset($parts[1]) ? ltrim($parts[1]) : '';
        return $place . ($date !== '' ? ',' . Carbon::parse($date)->isoFormat('D MMMM Y') : '');
    }
}
