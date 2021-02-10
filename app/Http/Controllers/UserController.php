<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index(request $request)
	{
		$validator = Validator::make(
            $request->all(),
            [
                'APIKEY' => 'required|In:request'
            ],
            [
                'APIKEY.required' => 'Authentication Failed !'
            ]
        );
        //dd($validator);
		if ($validator->fails()) {
			return response()->json([
				'success' => false,
				'message' => 'Authentication validation !',
                //'data'    => $validator->errors()
			], 400);
            //dd($validator);
		} else {
			$User = User::all();
			return response([
				'success' => true,
				'message' => 'List Semua User',
				'data' => $User
			], 200);
		}
    }

    public function login(Request $request)
    {
        //validate data
        $validator = Validator::make(
            $request->all(),
            [
                'APIKEY' => 'required|In:request'
            ],
            [
                'APIKEY.required' => 'Authentication validation !'
            ]
        );

        if ($validator->fails()) {

            return response()->json([
                'success' => false,
                'message' => 'Silahkan Isi Bidang Yang Kosong',
                'data'    => $validator->errors()
            ], 400);
        } else {

            $validate_user = User::where([
                'email' => $request->input('email'),
                //'password' => $request->input('password'),
                //'password' => ''
                //dd($validate_user);
            ])->first();

            if ($validate_user && Hash::check($request->input('password'), $validate_user->password)) {

                return response()->json([
                    'success' => true,
                    'message' => 'user Berhasil Login!',
                    'user' => $validate_user
                ], 200);
            } else {
                return response()->json([
                    'success' => false,
                    'message' => 'user Gagal Login!',
                ], 400);
            }
        }
    }

    public function show(Request $request, $id)
    {
        $validator = Validator::make(
            $request->all(),
            [
                'APIKEY' => 'required|In:request'
            ],
            [
                'APIKEY.required' => 'Authentication validation !'
            ]
        );

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => 'Authentication validation !',
                // 'data'    => $validator->errors()
            ], 400);
        } else {
            $user = User::whereId($id)->first();

            if ($user) {
                return response()->json([
                    'success' => true,
                    'message' => 'Detail User!',
                    'data'    => $user
                ], 200);
            } else {
                return response()->json([
                    'success' => false,
                    'message' => 'User Tidak Ditemukan!',
                    'data'    => ''
                ], 404);
            }
        }
    }
}
