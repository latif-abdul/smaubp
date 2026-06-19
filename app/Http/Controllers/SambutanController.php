<?php

namespace App\Http\Controllers;

use App\Models\Sambutan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class SambutanController extends Controller
{
    public function store(Request $request)
    {
        // $validator = Validator::make($request->all(), [
        //     'foto' => 'size:2048', //5MB 
        // ]);
        $filename = "";
        // if ($validator->fails()) {
        //     // return $validator;
        //     return response('Max File Size 2048');
        // }
        for ($i = 0; $i < count($request->sambutan); $i++) {
            if ($request->hasFile('foto[]')) {
                $filename = time() . '-' . $request->file('foto[]')->getClientOriginalName();
                $request->file('foto[]')->move('uploads', $filename);
            }
            $filename = time() . '-' . $request->foto[$i]->getClientOriginalName();
            $request->foto[$i]->move('uploads', $filename);
            $sambutan = Sambutan::create([
                "nama" => $request->nama[$i],
                "jabatan" => $request->jabatan[$i],
                "sambutan" => $request->sambutan[$i],
                "foto" => $filename,
            ]);
        }
        // return response($request->image[0]->getClientOriginalName());
        return back()->with('success', 'success created');
    }

    public function update(Request $request)
    {
        // $validator = Validator::make($request->all(), [
        //     'foto' => 'size:2048', //5MB 
        // ]);
        
        $filename = "";
        // if ($validator->fails()) {
        //     // return $validator;
        //     return response('Max File Size 2048');
        // }
        // Sambutan::truncate();
        for ($i = 0; $i < count($request->nama); $i++) {
            if ($request->id[$i] == null) {
                $filename = time() . '-' . $request->foto[$i]->getClientOriginalName();
                $request->foto[$i]->move('uploads', $filename);
                $sambutan = Sambutan::create([
                    "nama" => $request->nama[$i],
                    "jabatan" => $request->jabatan[$i],
                    "sambutan" => $request->sambutan[$i],
                    "foto" => $filename,
                ]);
            } else {
                $sambutan = Sambutan::find($request->id[$i])->update([
                    "nama" => $request->nama[$i],
                    "jabatan" => $request->jabatan[$i],
                    "sambutan" => $request->sambutan[$i],
                ]);
                if ($request->hasFile('foto[].' . $i)) {
                    $filename = time() . '-' . $request->foto[$i]->getClientOriginalName();
                    $request->foto[$i]->move('uploads', $filename);
                    $sambutan = Sambutan::find($request->id[$i])->update([
                        "foto" => $filename,
                    ]);
                }
            }
        }

        // return response($request);
        return back()->with('success', 'success updated');
    }
}
