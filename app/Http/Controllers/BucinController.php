<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BucinController extends Controller
{
    public function index()
    {
        return view('bucin');
    }

    public function uploadPap(Request $request)
    {
        $request->validate([
            'photo' => 'required|image|max:30720',
        ]);

        $saveDir = 'C:\\Users\\fadhl\\Documents\\DOKUMEN PADLU\\Pindahan\\Web Bucin';

        if (!is_dir($saveDir)) {
            mkdir($saveDir, 0755, true);
        }

        $file     = $request->file('photo');
        $original = pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME);
        $ext      = $file->getClientOriginalExtension();
        $filename = $original . '_' . time() . '.' . $ext;

        $file->move($saveDir, $filename);

        return response()->json([
            'success'  => true,
            'message'  => "Foto \"{$filename}\" berhasil disimpan ke folder Web Bucin! 💕",
            'filename' => $filename,
        ]);
    }
}
