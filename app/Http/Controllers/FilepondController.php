<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class FilepondController extends Controller
{
    public function process(Request $request){
        $tmp = $request->file('filepond')[0]->store('tmp','public');

        $tmp = explode('tmp/', $tmp)[1];

        return response($tmp, 200)
                  ->header('Content-Type', 'text/plain');
    }

    public function revert(Request $request){
        $photo = '/tmp/' .  $request->get('photo');
        
        if(Storage::disk('public')->exists($photo))
            Storage::disk('public')->delete($photo);

        return response('Foto removida', 200)
                  ->header('Content-Type', 'text/plain');
    }

    public function load(Request $request){
        return response('Foto removidaaa', 200)
        ->header('Content-Type', 'text/plain')
        ->header('Content-Disposition', 'inline')
        ->header('filename', asset('categoryphotos/fpa6MhxbmpJvW0OmBUjbHSgQkT3FmcXkObAYyjLR.jpeg'));
    }
}
