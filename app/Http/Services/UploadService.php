<?php

namespace App\Http\Services;

class UploadService
{
    public function store($request){
        if ($request->hasFile('file')) {
            try {
                $name = $request->file('file')->getClientOriginalName();
                $fullPath = 'uploads/' . date('Y/m/d');
                $request->file('file')->storeAs(
                    'public/' . $fullPath, $name);

                return '/storage/'. $fullPath.'/'.$name;
            }catch (\Exception $exception){
                return false;
                }
            }
    }
}
