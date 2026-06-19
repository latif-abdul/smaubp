<?php

namespace App\Http\Controllers;

use App\Models\ArtikelSantri;
use App\Models\Batch;
use App\Models\Galeri;
use App\Models\PencapaianAlumni;
use App\Models\Sambutan;
use App\Models\SlideShow;
use DirectoryIterator;
use Illuminate\Http\Request;
use App\Models\Artikel;
use Response;
use Spatie\ImageOptimizer\OptimizerChainFactory;

class ShowController extends Controller
{
    public function index()
    {
        $slideshow = SlideShow::all();
        // $optimizerChain = OptimizerChainFactory::create();
        // $stringToAdd = "/uploads/";
        // $slideshowPath = array_map(function($value) use ($stringToAdd) {
        //     return $value . $stringToAdd;
        // }, $slideshow->gambar);
        // $optimizerChain->optimize($slideshowPath);
        $sambutan = Sambutan::all();
        // $artikel = Artikel::all()->sortByDesc('updated_at')->take(5);
        $artikel = Artikel::with('images')->where('deleted_at', '=', null)->get()->sortByDesc('updated_at')->take(5);
        $galeri = Galeri::all()->take(6)->sortByDesc('updated_at');
        $alumni = PencapaianAlumni::all();
        $dir = new DirectoryIterator(public_path('logo kampus'));
        $dir2 = new DirectoryIterator(public_path('Tahfidzul Qur_an'));
        $batch = Batch::leftJoin('tahun_ajaran', 'batch.tahun_ajaran_id', '=', 'tahun_ajaran.id')->where('batch.deleted_at', '=', null)->where('tahun_ajaran.status', '=', 'active')->get();
        return view('index', compact('artikel', 'slideshow', 'galeri', 'sambutan', 'alumni', 'dir', 'dir2', 'batch'));
        // foreach ($dir as $fileinfo){
        //     if(!$fileinfo->isDot()){
        //         var_dump($fileinfo->getFilename());
        //     }
        // }
        // return response($dir);
    }

    public function show_artikel()
    {
        $artikel = Artikel::with('images')->where('deleted_at', '=', null)->get()->sortByDesc('updated_at');
        $base_url = "/artikel";
        return view('artikel', compact('artikel', 'base_url'));
    }

    public function show_artikel_santri()
    {
        $artikel = ArtikelSantri::with('images')->where('deleted_at', '=', null)->get()->sortByDesc('updated_at');
        $base_url = "/artikel_santri";
        // return response($artikel);
        return view('artikel', compact('artikel', 'base_url'));
    }

    public function program_tahfidz(){
        $dir = new DirectoryIterator(public_path('Tahfidzul Qur_an'));
        return view('program_tahfidz', compact('dir'));
    }

    public function download(Request $request){
        $headers = array(
            'Content-Type: application/pdf',
          );
        return Response::download(public_path($request->path), 'Brosur 2024 SMAU BP Amanatul Ummah.pdf', $headers);
    }

    public function ppdb(){
        $batch = Batch::leftJoin('tahun_ajaran', 'batch.tahun_ajaran_id', '=', 'tahun_ajaran.id')->where('batch.deleted_at', '=', null)->where('tahun_ajaran.status', '=', 'active')->get();
        return view('ppdb', compact(['batch']));
    }
}
