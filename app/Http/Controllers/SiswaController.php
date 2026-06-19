<?php

namespace App\Http\Controllers;

use App\Models\Batch;
use App\Models\ErrorLog;
use App\Models\Pengumuman;
use Illuminate\Http\Request;
use App\Models\Santris;
use App\Models\Daful;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Facades\Excel;
use Barryvdh\DomPDF\Facade\Pdf;
use Carbon\Carbon;
use App\Imports\SiswaImport;

class SiswaController extends Controller
{
	/**
		* Display a listing of the resource.
		*/
	public function index()
	{
		$siswa = Santris::leftJoin('daful', 'daful.id_santris', '=', 'santris.id')
			->leftJoin('batch', 'santris.batch_id', '=', 'batch.id')
			->leftJoin('tahun_ajaran', 'batch.tahun_ajaran_id', '=', 'tahun_ajaran.id')
			->where('daful.id_santris', '=', null)
            ->where('santris.status_lulus', '=', 0)
			->where('santris.deleted_at', '=', null)
			->where('batch.deleted_at', '=', null)
			->where('tahun_ajaran.deleted_at', '=', null)
            ->distinct()->get(['santris.id', 'no_pendaftaran', 'nama_lengkap', 'batch.name', 'tahun_ajaran.tahun_ajaran']);
        $lolos = Santris::leftJoin('daful', 'daful.id_santris', '=', 'santris.id')
			->leftJoin('batch', 'santris.batch_id', '=', 'batch.id')
			->leftJoin('tahun_ajaran', 'batch.tahun_ajaran_id', '=', 'tahun_ajaran.id')
			->where('daful.id_santris', '=', null)->orWhereNotNull('daful.id_santris')->where('daful.deleted_at', '!=', null)
            ->where('santris.status_lulus', '=', 1)
			->where('santris.deleted_at', '=', null)
			->where('batch.deleted_at', '=', null)
			->where('tahun_ajaran.deleted_at', '=', null)
			// ->where('daful.deleted_at', '!=', null)
			->distinct()->get(['santris.id', 'no_pendaftaran', 'nama_lengkap', 'batch.name', 'tahun_ajaran.tahun_ajaran']);
		$daful = Santris::leftJoin('daful', 'daful.id_santris', '=', 'santris.id')
			->leftJoin('batch', 'santris.batch_id', '=', 'batch.id')
			->leftJoin('tahun_ajaran', 'batch.tahun_ajaran_id', '=', 'tahun_ajaran.id')
			->where('daful.id_santris', '!=', null)
			->where('santris.deleted_at', '=', null)
			->where('batch.deleted_at', '=', null)
			->where('tahun_ajaran.deleted_at', '=', null)
			->where('daful.deleted_at', '=', null)
			->distinct()->get(['santris.id', 'no_pendaftaran', 'nama_lengkap', 'batch.name', 'tahun_ajaran.tahun_ajaran']);
		// $siswa_terverifikasi = $siswa->daful()
		// ->where("verifikasi_akta_kelahiran", 1)
		// ->where("verifikasi_kk", 1)
		// ->where("verifikasi_skl", 1)
		// ->where("verifikasi_bukti_transfer", 1)
		// ->where("verifikasi_foto", 1)
		// ->get()
		// ;
		// $queries = DB::getQueryLog();
		// $siswa_belum_terverifikasi = $siswa
		// ->where("verifikasi_akta_kelahiran", '!=', 1)
		// ->where("verifikasi_kk", '!=', 1)
		// ->where("verifikasi_skl", '!=', 1)
		// ->where("verifikasi_bukti_transfer", '!=', 1)
		// ->where("verifikasi_foto", '!=', 1);
		$tanggal_pengumuman = Pengumuman::find("2");
		$batch = Batch::leftJoin('tahun_ajaran', 'batch.tahun_ajaran_id', '=', 'tahun_ajaran.id')
			->where('batch.deleted_at', '=', null)
			->where('tahun_ajaran.deleted_at', '=', null)->get();
		$formAction = "/admin/siswa_baru/update_tanggal_pengumuman/2";
		$formAction2 = "/admin/siswa_baru/import";
        $formAction3 = "/admin/siswa_baru/import_lolos";
		// return response($siswa_terverifikasi);
		return view("Admin.siswa_baru", compact('siswa', 'tanggal_pengumuman', 'formAction', 'formAction2', 'formAction3', 'daful', 'batch', 'lolos'));
	}

	/**
		* Show the form for creating a new resource.
		*/
	public function create()
	{
		$formAction = "siswa_baru.store";
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
			'jenis_kelamin' => 'required|in:laki-laki,perempuan',
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
			'jalur_masuk' => 'required|in:reguler,prestasi',
			'sertifikat' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg,pdf|max:2048',
			'foto' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
			'bukti_pembayaran' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
		]);

		if ($validator->fails()) {
			// return response($validator->errors());
			return redirect()->back()
				->withErrors($validator)
				->withInput();
		}
		try {
			$siswa = Santris::create($request->all());
			$siswa->no_wa = $request->nomor_hp_ayah;
			$batch = Batch::where('deleted_at', '=', null)->where('date_from', '<=', Carbon::now())->where('date_to', '>=', Carbon::now())->first();
			if ($batch){
				$siswa->batch_id = $batch->id;
			}
			$siswa->save();
			
			if (!Storage::exists('siswa_images')) {
				Storage::makeDirectory('siswa_images');
			}

			if ($request->hasFile('sertifikat')) {
				$siswa->sertifikat = time() . '-' . $request->file('sertifikat')->getClientOriginalName();
				$request->file('sertifikat')->move('uploads', $siswa->sertifikat);
				$siswa->save();
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
			// return response($response->no)
		} catch (\Exception $e) {
			ErrorLog::create([
				'url' => url()->current(),
				'message' => $e->getMessage(),
				'trace' => $e->getTraceAsString(),
			]);
			return back()->with('failed', 'Gagal menyimpan data siswa '.$e->getCode());
		}
	}

	/**
		* Display the specified resource.
		*/
	public function show(string $id)
	{
		$siswa = Santris::where('id', $id)->first();
		return view('Admin.manage_siswa', [$siswa]);
	}

	/**
		* Show the form for editing the specified resource.
		*/
	public function edit(string $id)
	{
		$formAction = "siswa_baru.update";
		$siswa = Santris::where('id', $id)->first();
		return view('Admin.manage_siswa', compact(['siswa', 'formAction', 'id']));
	}

	/**
		* Update the specified resource in storage.
		*/
	public function update(Request $request, string $id)
	{
		$validator = Validator::make($request->all(), [
			// 'email' => 'required|email|unique:santris',
			'nama_lengkap' => 'required|string|max:255',
			'jenis_kelamin' => 'required|in:laki-laki,perempuan',
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
			'jalur_masuk' => 'required|in:reguler,prestasi',
			'sertifikat' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg,pdf|max:2048',
			'foto' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
			'bukti_pembayaran' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
			'no_pendaftaran' => 'required|unique:App\Models\Santris,no_pendaftaran',
		]);

		if ($validator->fails()) {
			// return response($validator->errors());
			return redirect()->back()
				->withErrors($validator)
				->withInput();
		}
		try {
			// DB::connection()->enableQueryLog();
			$siswa = Santris::find($id)->update($request->all());

			if (!Storage::exists('siswa_images')) {
				Storage::makeDirectory('siswa_images');
			}

			if ($request->hasFile('sertifikat')) {
				$sertifikat = time() . '-' . $request->file('sertifikat')->getClientOriginalName();
				$request->file('sertifikat')->move('uploads', $sertifikat);
				Santris::find($id)->update(['sertifikat' => $sertifikat]);
			}

			if ($request->hasFile('foto')) {
				$foto = time() . '-' . $request->file('foto')->getClientOriginalName();
				$request->file('foto')->move('uploads', $foto);
				Santris::find($id)->update(['foto' => $foto]);
			}

			if ($request->hasFile('bukti_pembayaran')) {
				$bukti_pembayaran = time() . '-' . $request->file('bukti_pembayaran')->getClientOriginalName();
				$request->file('bukti_pembayaran')->move('uploads', $bukti_pembayaran);
				Santris::find($id)->update(['bukti_pembayaran' => $bukti_pembayaran]);
			}
			// return response()->json(DB::getQueryLog());
			return redirect()->back()->with('success', 'Santri updated successfully')
				->header('Content-Type', 'text/plain');
		} catch (\Exception $e) {
			// return response($e->getTraceAsString());
			ErrorLog::create([
				'url' => url()->current(),
				'message' => $e->getMessage(),
				'trace' => $e->getTraceAsString(),
			]);
			return redirect()->back()->with('failed', 'Gagal menyimpan data siswa '.$e->getCode());
		}
	}

	/**
		* Remove the specified resource from storage.
		*/
	public function destroy(string $id)
	{
		$santri = Santris::find($id);
		$santri->update(['deleted_at' => Carbon::now()]);
		return back()->with('delete', 'Successfully delete');
	}

	public function redirectToWhatsapp(string $id)
	{
		$siswa = Santris::where('id', $id)->first();
		if ($siswa->no_wa != null) {
			$phoneNumber = $siswa->no_wa; // Replace with actual phone number
			$phoneNumber = preg_replace('/^\D+/', '', $phoneNumber);

			// Check if the phone number starts with "08"
			if (substr($phoneNumber, 0, 2) === '08') {
				// Prepend "+62" for Indonesia country code
				$phoneNumber = '+62' . substr($phoneNumber, 1);
			}

			// $message = "No Pendaftaran :" . $siswa->no_pendaftaran . "\nNama Lengkap :" . $siswa->nama_lengkap . "\nEmail :" . $siswa->email . "\nJenis Kelamin :" . $siswa->jenis_kelamin . "\nTempat Lahir :" . $siswa->tempat_lahir . "\nTanggal Lahir :" . $siswa->tanggal_lahir . "\nAsal Sekolah :" . $siswa->asal_sekolah . "\nAlamat Sekolah :" . $siswa->alamat_sekolah . "\nNama Ayah :" . $siswa->nama_ayah . "\nNama Ibu :" . $siswa->nama_ibu . "\n"; // Replace with desired message

			// $encodedMessage = urlencode($message);
			// $whatsappUrl = "https://wa.me/$phoneNumber/?text=$encodedMessage";
			$whatsappUrl = "https://wa.me/$phoneNumber";

			return redirect()->away($whatsappUrl);
		} else {
			return redirect()->back()->withErrors(["Harap isi No Whatsapp dahulu"]);
		}
		// return redirect()->away($whatsappUrl);
	}

	public function export_excel()
	{
		return Excel::download(new SiswaExport, 'siswa.xlsx');
	}

	public function pengumuman(Request $request)
	{
		$siswa = Santris::where('no_pendaftaran', $request->no_pendaftaran)
            ->where('deleted_at', '=', null)
            ->where('status_lulus', '=', 1)->first();
		$pengumuman = Pengumuman::find(2);
		if ($pengumuman->tanggal_pengumuman <= Carbon::now()) {
			if ($siswa === null) {
				$st = 'Mohon Maaf';
				$color = 'danger';
				$msg = 'Mohon Maaf, No Pendaftaran ' . $request->no_pendaftaran . ' Dinyatakan Tidak Lulus. Jangan Putus Asa dan Tetap Semangat';
			} else {
				$st = 'Selamat';
				$color = 'success';
				$msg = 'Selamat, ' . $siswa->nama_lengkap . ' dengan Nomor Pendaftaran ' . $siswa->no_pendaftaran . ' Dinyatakan Lulus';
			}
		} else {
			$st = '';
			$color = 'warning';
			$msg = 'Pengumuman akan diumumkan pada tanggal ' . Carbon::parse($pengumuman->tanggal_pengumuman)->isoFormat('D MMMM Y');
		}
		$id = $siswa ? $siswa->id : null;
		return view("pengumuman", compact(['msg', 'st', 'color', 'id']));
	}

	public function update_tanggal_pengumuman(Request $request, string $id)
	{
		try {
			DB::connection()->enableQueryLog();
			$pengumuman = Pengumuman::find($id)->update($request->all());
			$queries = DB::getQueryLog();
			// return dd($queries);
			// $pengumuman->save();
			// return response()->json($request);
			return back()->with('success', 'Successfully saved in database')
				->header('Content-Type', 'text/plain');
		} catch (\Exception $e) {
			return back()->with('failed', $e->getMessage());
		}
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
		// Excel::import(new SiswaImport, '/home/u346878522/domains/smaubp-tahfidz.sch.id/public_html/file_siswa/' . $nama_file);
		// Excel::import(new SiswaImport, 'file_siswa/' . $nama_file);
		// return response(storage_path('/file_siswa/'.$nama_file));
		$data = Excel::toArray(new SiswaImport, '/home/u346878522/domains/smaubp-tahfidz.sch.id/public_html/file_siswa/' . $nama_file); 

        collect(head($data))
            ->each(function ($row, $key) {
                Santris::where('no_pendaftaran', '=', (string)$row[1])
                    ->update(['status_lulus' => true]);
            });
            // alihkan halaman kembali
        return back()->with('success', 'Data Siswa Berhasil Diimport!');
    }

    public function import_excel_tambah(Request $request){
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
		Excel::import(new SiswaImport, '/home/u346878522/domains/smaubp-tahfidz.sch.id/public_html/file_siswa/' . $nama_file);
		// Excel::import(new SiswaImport, 'file_siswa/' . $nama_file);
		// return response(storage_path('/file_siswa/'.$nama_file));
            // alihkan halaman kembali
        return back()->with('success', 'Data Siswa Berhasil Diimport!');
    }

	public function downloadPDF($id)
	{
		$siswa = Santris::find($id);

		$validator = Validator::make($siswa->toArray(), [
			'email' => 'required',
			'nama_lengkap' => 'required',
			'jenis_kelamin' => 'required',
			'tempat_lahir' => 'required',
			'tanggal_lahir' => 'required',
			'asal_sekolah' => 'required',
			'alamat_sekolah' => 'required',
			'nama_ayah' => 'required',
			'nama_ibu' => 'required',
			'nomor_hp_ayah' => 'required',
			'nomor_hp_ibu' => 'required',
			'pekerjaan_ayah' => 'required',
			'pekerjaan_ibu' => 'required',
			'penghasilan_ayah' => 'required',
			'penghasilan_ibu' => 'required',
			'jalur_masuk' => 'required',
			'foto' => 'nullable',
			'bukti_pembayaran' => 'nullable',
		]);

		if ($validator->fails()) {
			// return response($validator->errors());
			return redirect()->back()
				->withErrors($validator);
			// return redirect()->back()
			// ->with('error', $validator->errors());

		}

		if ($siswa->tanggal_lahir != null) {
			$tanggal_lahir = Carbon::parse($siswa->tanggal_lahir)->isoFormat('D MMMM Y');
			$today = Carbon::now()->isoFormat('D MMMM Y');
		} else {
			$tanggal_lahir = "";
		}
		$logo = base64_encode(file_get_contents('/home/u346878522/domains/smaubp-tahfidz.sch.id/public_html/images/logo_pdf.png'));
		$smart_quranic = base64_encode(file_get_contents('/home/u346878522/domains/smaubp-tahfidz.sch.id/public_html/images/smart quranic.png'));
		$foto = base64_encode(file_get_contents('/home/u346878522/domains/smaubp-tahfidz.sch.id/public_html/uploads/' . $siswa->foto));

		$type_logo = pathinfo('/home/u346878522/domains/smaubp-tahfidz.sch.id/public_html/images/logo_pdf.png', PATHINFO_EXTENSION);
		$type_SQ = pathinfo('/home/u346878522/domains/smaubp-tahfidz.sch.id/public_html/images/smart quranic.png', PATHINFO_EXTENSION);
		$type_foto = pathinfo('/home/u346878522/domains/smaubp-tahfidz.sch.id/public_html/uploads/' . $siswa->foto, PATHINFO_EXTENSION);

		$base64_logo = 'data:image/' . $type_logo . ';base64,' . $logo;
		$base64_SQ = 'data:image/' . $type_SQ . ';base64,' . $smart_quranic;
		$base64_foto = 'data:image/' . $type_foto . ';base64,' . $foto;

		$contxt = stream_context_create([
			'ssl' => [
				'verify_peer' => FALSE,
				'verify_peer_name' => FALSE,
				'allow_self_signed' => TRUE,
			]
		]);

		$pdf = PDF::setOptions(['isHTML5ParserEnabled' => true, 'isRemoteEnabled' => true]);
		$pdf->getDomPDF()->setHttpContext($contxt);
		$pdf->loadView('Admin.pdf', compact(['base64_logo', 'base64_SQ', 'siswa', 'tanggal_lahir', 'today', 'base64_foto']));

		$pdf->render();
		return $pdf->download($siswa->nama_lengkap . '.pdf');
	}

	public function pdf($id)
	{
		$siswa = Santris::find($id);

		$tanggal_lahir = Carbon::parse($siswa->tanggal_lahir)->isoFormat('D MMMM Y');
		$today = Carbon::now()->isoFormat('D MMMM Y');

		$logo = base64_encode(file_get_contents(public_path('images/logo_pdf.png')));
		$smart_quranic = base64_encode(file_get_contents(public_path('images/smart quranic.png')));
		$foto = base64_encode(file_get_contents(public_path('uploads/' . $siswa->foto)));

		$type_logo = pathinfo(public_path('images/logo_pdf.png'), PATHINFO_EXTENSION);
		$type_SQ = pathinfo(public_path('images/smart quranic.png'), PATHINFO_EXTENSION);
		$type_foto = pathinfo(public_path('uploads/' . $siswa->foto), PATHINFO_EXTENSION);

		$base64_logo = 'data:image/' . $type_logo . ';base64,' . $logo;
		$base64_SQ = 'data:image/' . $type_SQ . ';base64,' . $smart_quranic;
		$base64_foto = 'data:image/' . $type_foto . ';base64,' . $foto;

		$contxt = stream_context_create([
			'ssl' => [
				'verify_peer' => FALSE,
				'verify_peer_name' => FALSE,
				'allow_self_signed' => TRUE,
			]
		]);

		$pdf = PDF::setOptions(['isHTML5ParserEnabled' => true, 'isRemoteEnabled' => true]);
		$pdf->getDomPDF()->setHttpContext($contxt);
		$pdf->loadView('Admin.pdf', compact(['base64_logo', 'base64_SQ', 'siswa', 'tanggal_lahir', 'today', 'base64_foto']));

		$pdf->render();
		return view('Admin.pdf', compact(['base64_logo', 'base64_SQ', 'siswa', 'tanggal_lahir', 'today', 'base64_foto']));
	}
}
