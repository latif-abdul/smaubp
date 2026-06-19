<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use Illuminate\Http\Request;
use App\Models\Artikel;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;
use Carbon\Carbon;

class ArtikelController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $artikel = Artikel::where('deleted_at', '=', null)->get();
        $title = "Artikel";
        $base_url = "/admin/artikel";
        return view("Admin.artikel_index", compact("artikel", "title", "base_url"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $formAction = "/admin/artikel";
        return view("Admin.manage_artikel", compact(['formAction']));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
			'judul' => 'required|string|max:255',
			'penulis' => 'required|string|max:255',
			'gambar' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
		]);

		if ($validator->fails()) {
			// return response($validator->errors());
			return redirect()->back()
				->withErrors($validator)
				->withInput();
		}
        $artikel = Artikel::create($request->all());

        if (!Storage::exists('artikel_images')) {
            Storage::makeDirectory('artikel_images');
        }

        if ($request->hasFile('gambar')) {
            for ($i = 0; $i < count($request->gambar); $i++) {
                $filename = time() . '-' . $request->gambar[$i]->getClientOriginalName();
                $request->gambar[$i]->move('uploads', $filename);
                $slideShow = $artikel->images()->create([
                    "gambar" => $filename,
                ]);
            }
        }

        // if ($request->hasFile('bukti_pembayaran')) {
        //     $artikel->bukti_pembayaran = time() . '-' . $request->file('bukti_pembayaran')->getClientOriginalName();
        //     $request->file('bukti_pembayaran')->move('uploads', $artikel->bukti_pembayaran);
        //     $artikel->save();
        // }

        return back()->with('success', 'Artikel created successfully')
            ->header('Content-Type', 'text/plain');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $artikel = Artikel::find($id);
        $gambar = $artikel->images()->get();
        $comment_url = '';
        return view('Admin.show_artikel', compact('artikel', 'gambar', 'comment_url'));
        // return response($gambar);
    }

    public function show2(string $id)
    {
        $artikel = Artikel::find($id);
        $gambar = $artikel->images()->get();
        $comment_url = '';
        if ($artikel === null) {
            return view('artikel_not_found')->with('failed', 'Artikel Not Found');
        }
        return view('perArtikel', compact('artikel', 'gambar', 'comment_url'));
        // return response($gambar);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $formAction = "/admin/artikel/$id";
        $artikel = Artikel::where('id', $id)->first();
        $gambar = $artikel->images()->get();
        return view('Admin.manage_artikel', compact(['artikel', 'formAction', 'gambar']));
        // return response($gambar);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $artikel = Artikel::find($id);
        $artikel->update($request->all());

        if (!Storage::exists('artikel_images')) {
            Storage::makeDirectory('artikel_images');
        }

        if ($request->hasFile('gambar')) {
            $slideShow = $artikel->images()->delete();
            for ($i = 0; $i < count($request->name); $i++) {
                $filename = time() . '-' . $request->name[$i]->getClientOriginalName();
                $request->name[$i]->move('uploads', $filename);
                
                $slideShow = $artikel->images()->create([
                    "gambar" => $filename,
                ]);
            }
        }

        return redirect()->back()->with('success', 'Artikel updated successfully')
            ->header('Content-Type', 'text/plain');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $artikel = Artikel::find($id);
        $artikel->update(['deleted_at' => Carbon::now()]);
        return back()->with('delete', 'Successfully delete');
    }

    public function postComment(Request $request)
    {
        $artikel = Comment::create($request->all());
        return response()->json($data = $artikel, $status = 200);
    }

    public function getComment(string $id)
    {
        $comment = Comment::where('id_artikel', $id)->where('id_comment', null)->with('reply')->get();
        return response()->json($data = $comment, $status = 200);
    }



}
