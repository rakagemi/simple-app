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
		if ($validator->fails()) {
			return response()->json([
				'success' => false,
				'message' => 'Authentication validation !',
                // 'data'    => $validator->errors()
			], 400);
		} else {
			$user = User::all();
			return response([
				'success' => true,
				'message' => 'List Semua User',
				'data' => $user
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
                'email' => $request->input('email')
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
    
    public function store(Request $request)
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
            $user = User::where([
                'email' => $request->input('email')
                ])->first();
            if (!$user) {
                $user = User::create([
                    'name' => $request->input('name'),
                    'alamat' => $request->input('alamat'),
                    'no_hp' => $request->input('no_hp'),
                    'email' => $request->input('email'),
                    'password' => Hash::make($request->input('password')),
                ]);
                if ($user) {
                    return response()->json([
                        'success' => true,
                        'message' => 'User Berhasil Disimpan!',
                        'User' => $user
                    ], 200);
                } else {
                    return response()->json([
                        'success' => false,
                        'message' => 'User Gagal Disimpan!',
                    ], 400);
                }
            } else {
                return response()->json([
                    'success' => false,
                    'message' => 'User sudah ada',
                ], 400);
            }
        }
    }
    
        public function update(Request $request, $id)
    {
        //validate data
        $validator = Validator::make(
            $request->all(),
            [
                'APIKEY' => 'required|In:request'
            ],
            [
                'APIKEY.required' => 'Authentication Failed'
            ]
        );
        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => 'Silahkan Isi Bidang Yang Kosong',
                'data'    => $validator->errors()
            ], 400);
        } else {

            $user = User::where('id', $id)->first();

            if (!$user) {
                return response()->json([
                    'success' => false,
                    'message' => 'Not authorized !',
                    // 'data'    => $validator->errors()
                ], 401);
            }

            if ($request->input('password')) {
                $user = User::where('id', $id)->update([
                    'name' => $request->input('name'),
                    'alamat' => $request->input('alamat'),
                    'no_hp' => $request->input('no_hp'),
                    'email' => $request->input('email'),
                    'password' => Hash::make($request->input('password')),
                ]);
            } else {
                $user = User::where('id', $id)->update([
                    'name' => $request->input('name'),
                    'alamat' => $request->input('alamat'),
                    'no_hp' => $request->input('no_hp'),
                    'email' => $request->input('email'),
                ]);
            }

            if ($user) {
                return response()->json([
                    'success' => true,
                    'message' => 'Berhasil update User !',
                    'data'    => $user
                ], 200);
            } else {
                return response()->json([
                    'success' => false,
                    'message' => 'User Gagal Diupdate!',
                ], 500);
            }
        }
    }

    public function destroy(Request $request, $id)
    {
        //validate data
        $validator = Validator::make(
            $request->all(),
            [
                'APIKEY' => 'required|In:request'
            ],
            [
                'APIKEY.required' => 'Authentication Failed !'
            ]
        );
        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => 'Silahkan Isi Bidang Yang Kosong',
                'data'    => $validator->errors()
            ], 400);
        } else {
            $user = User::findOrFail($id);
            $user->delete();
            if ($user) {
                return response()->json([
                    'success' => true,
                    'message' => 'User Berhasil Dihapus!',
                ], 200);
            } else {
                return response()->json([
                    'success' => false,
                    'message' => 'User Gagal Dihapus!',
                ], 500);
            }
        }
    }

}



