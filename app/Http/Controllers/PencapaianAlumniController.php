<?php

namespace App\Http\Controllers;
use App\Imports\PencapaianAlumniImports;
use App\Models\PencapaianAlumni;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Http\Request;
use Carbon\Carbon;

class PencapaianAlumniController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $siswa = PencapaianAlumni::where('deleted_at', '=', null)->get();
        $formAction = '/admin/pencapaian_alumni/import';
        return view("Admin.pencapaian_alumni_index", compact('siswa', 'formAction'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $formAction = "/admin/pencapaian_alumni";
        return view("Admin.pencapaian_alumni_manage", compact(['formAction']));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
            $siswa = PencapaianAlumni::create($request->all());
            return back()->with('success', 'Santri created successfully')
                ->header('Content-Type', 'text/plain');
        } catch (\Exception $e) {
            return back()->with('failed', $e->getMessage());
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        // $siswa = PencapaianAlumni::where('id', $id)->first();
        // return view('', [$siswa]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $formAction = "/admin/pencapaian_alumni/$id";
        $siswa = PencapaianAlumni::where('id', $id)->first();
        return view('Admin.pencapaian_alumni_manage', compact(['siswa', 'formAction']));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        try {
            // DB::connection()->enableQueryLog();
            $siswa = PencapaianAlumni::find($id)->update($request->all());
            return redirect()->back()->with('success', 'Santri updated successfully')
                ->header('Content-Type', 'text/plain');
        } catch (\Exception $e) {
            return redirect()->back()->with('failed', $e->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $pencapaianAlumni = PencapaianAlumni::find($id);
        $pencapaianAlumni->update(['deleted_at' => Carbon::now()]);
        return back()->with('delete', 'Successfully delete');
    }

    public function import_excel(Request $request)
    {
        // validasi
        $this->validate($request, [
            'file' => 'required|mimes:csv,xls,xlsx'
        ]);

        // menangkap file excel
        $file = $request->file('file');

        // membuat nama file unik
        $nama_file = rand() . $file->getClientOriginalName();

        // upload ke folder file_siswa di dalam folder public
        $file->move('file_siswa', $nama_file);

        // import data
        Excel::import(new PencapaianAlumniImports, '/home/u346878522/domains/smaubp-tahfidz.sch.id/public_html/file_siswa/' . $nama_file);
        // Excel::import(new PencapaianAlumniImports, public_path('file_siswa/' . $nama_file));
        // return response(storage_path('/file_siswa/'.$nama_file));

        // alihkan halaman kembali
        return back()->with('success', 'Data Siswa Berhasil Diimport!');
    }
}
