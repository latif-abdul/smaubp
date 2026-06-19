<?php

namespace App\Http\Controllers;

use App\Models\Sambutan;
use App\Models\SlideShow;
use Illuminate\Http\Request;

class SettingController extends Controller
{
    public function index()
    {
        // $formAction =
        $slideshow = SlideShow::all();
        $sambutan = Sambutan::all();
        return view('Admin.setting', compact('slideshow', 'sambutan'));
    }

    public function store(Request $request)
    {
        $filename = "";
        for ($i = 0; $i < count($request->text_1); $i++) {
            if ($request->hasFile('image[]')) {
                $filename = time() . '-' . $request->file('image[]')->getClientOriginalName();
                $request->file('image[]')->move('uploads', $filename);
            }
            $filename = time() . '-' . $request->image[$i]->getClientOriginalName();
            $request->image[$i]->move('uploads', $filename);
            $slideShow = SlideShow::create([
                "gambar" => $filename,
                "text_1" => $request->text_1[$i],
                "text_2" => $request->text_2[$i]
            ]);
        }
        // return response($request->image[0]->getClientOriginalName());
        return back()->with('success', 'success created');
    }

    public function update(Request $request)
    {
        // SlideShow::truncate();
        for ($i = 0; $i < count($request->text_1); $i++) {
            if ($request->id[$i] == null){
                $filename = time() . '-' . $request->image[$i]->getClientOriginalName();
                $request->image[$i]->move('uploads', $filename);
                $slideShow = SlideShow::create([
                    "gambar" => $filename,
                    "text_1" => $request->text_1[$i],
                    "text_2" => $request->text_2[$i]
                ]);
            }else{
                $slideShow = SlideShow::find($request->id[$i])->update([
                    "text_1" => $request->text_1[$i],
                    "text_2" => $request->text_2[$i]
                ]);
                if(array_key_exists($i,$request->image)){
                    $filename = time() . '-' . $request->image[$i]->getClientOriginalName();
                    $request->image[$i]->move('uploads', $filename);
                    $slideShow = SlideShow::find($request->id[$i])->update([
                        "gambar" => $filename,
                    ]);
                }
            }
        }

        return back()->with('success', 'success updated');
        // $i = 0;
        // return response($request);
    }

    public function destroy($id){
        SlideShow::find($id)->delete();
        return back()->with('delete', 'Successfully delete');
    }
}