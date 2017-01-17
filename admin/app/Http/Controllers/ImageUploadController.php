<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\Validator;

class ImageUploadController extends Controller
{
    public function index(Request $request) {
        if($request->hasFile('image')) {
            /*$this->validate($request, [
                'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:10240',
            ]);*/

            $validator = Validator::make($request, [
                'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:10240',
            ]);

            if ($validator->fails()) {
                return ["message" => "File not allowed"];
            } else {
                $file = $request->file('image');

                $file->move(public_path('uploads'), time() . '_' . $file->getClientOriginalName());
            }
        }
    }
}
