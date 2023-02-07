<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Rom;
use Illuminate\Http\Request;

class RomController extends Controller
{
    public function index()
    {
        $data = Rom::latest()->paginate(5);

        return view('specs.rom', compact('data'))->with('i', (request()->input('page', 1) - 1) * 5);
    }
    public function show($id)   
    {
        $info = Rom::find($id);
        $response['id'] = $info->id;
        $response['name'] = $info->name;
        return response()->json($response);
    }

    public function store(Request $request)
    {
        // dd(($request->rom_name));
        $request->validate([
               'rom_name.*.name'=>'required|max:255'
       ]);
        $names = $request->rom_name;
        // dd($names[0]);
        for ($i = 0; $i < count($names); $i++) {
            Rom::create($names[$i])->save();
        }

        return redirect()->route('specs.rom')->with('success', 'Rom detail Added successfully.');
    }
    public function update(Request $request)
    {
        $request->validate([
            'name' => 'required',
        ]);
        // dd($request->all());
        $data['name'] = $request->name;
        Rom::whereId($request->id)->update($data);
      
        return redirect()->route('specs.rom')
                        ->with('success','ROM Name updated successfully');
    }

    public function delete(Request $request)
    {
        Rom::whereId(urldecode(base64_decode($request->id)))->delete();

        return redirect()->back()->with('success',' ROM model deleted !');
    }
}
