<?php

namespace App\Http\Controllers;

use App\Models\Galeri;
use Illuminate\Http\Request;

class GaleriController extends Controller
{
    public function index()
    {
        $galeri = Galeri::all();
        return view('Admin.galeri', compact('galeri'));
    }

    public function create(){
        $formAction = '/galeri';
        return view('Admin.manage_galeri', compact('formAction'));
    }

    // public function store(Request $request)
    // {
    //     for ($i = 0; $i < count($request->gambar); $i++) {
    //         $filename = time() . '-' . $request->gambar[$i]->getClientOriginalName();
    //         $request->gambar[$i]->move('uploads', $filename);
    //         $slideShow = Galeri::create([
    //             "gambar" => $filename,
    //         ]);
    //     }
    //     return back()->with('success', 'success create data');
    // }

    public function store(Request $request){
        $galeri = Galeri::create($request->all());

        if ($request->hasFile('gambar')) {
            $galeri->gambar = time() . '-' . $request->file('gambar')->getClientOriginalName();
            $request->file('gambar')->move('uploads', $galeri->gambar );
            $galeri->save();
        }

        return back()->with('success', 'success create data');
    }

    public function edit(string $id){
        $formAction = '/galeri/'.$id;
        $galeri = Galeri::find($id);
        return view('Admin.manage_galeri', compact('formAction', 'galeri'));
    }

    public function update(Request $request, string $id){
        $galeri = Galeri::find($id)->update($request->all());

        if ($request->hasFile('gambar')) {
            $gambar = time() . '-' . $request->file('gambar')->getClientOriginalName();
            $request->file('gambar')->move('uploads', $gambar);
            Galeri::find($id)->update(['gambar' => $gambar]);
        }

        return back()->with('success', 'success update data');
    }

    public function destroy(string $id){
        Galeri::find($id)->delete();
        return back()->with('success', 'success delete image');
    }

    public function show_all(){
        $galeri = Galeri::all();
        return view('galeri', compact('galeri'));
    }
}
