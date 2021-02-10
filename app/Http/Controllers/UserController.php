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

			$User = User::all();
			return response([
				'success' => true,
				'message' => 'List Semua User',
				'data' => $User
			], 200);
            //dd($User);
		
    }

    public function login(Request $request)
    {
        //validate data
            $validate_user = User::where([
                'email' => $request->input('email')
                //'password' => $request->input('password'),
                //'provider' => 'users',
                //dd($validate_user);
            ])->first();
            //dd($validate_user);

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

    

    public function show(Request $request, $id)
    {

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
    
    public function store(Request $request)
    {
        //validate data
            $User = User::where([
                'email' => $request->input('email'),
                //'provider' => ''
                ])->first();
            if (!$User) {
                $User = User::create([
                    'name' => $request->input('name'),
                    'email' => $request->input('email'),
                    'password' => Hash::make($request->input('password')),
                    'alamat' => $request->input('alamat'),
                    'no_hp' => $request->input('no_hp'),
                ]);
                if ($User) {
                    return response()->json([
                        'success' => true,
                        'message' => 'User Berhasil Disimpan!',
                        'User' => $User
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
    
        public function update(Request $request, $id)
    {
        //validate data
            $User = User::where('id', $id)->first();

            if (!$User) {
                return response()->json([
                    'success' => false,
                    'message' => 'Not authorized !',
                    // 'data'    => $validator->errors()
                ], 401);
            }

            if ($request->input('password')) {
                $User = User::where('id', $id)->update([
                    'name' => $request->input('name'),
                    'email' => $request->input('email'),
                    'password' => Hash::make($request->input('password')),
                    'alamat' => $request->input('alamat'),
                    'no_hp' => $request->input('no_hp'),
                ]);
            } else {
                $User = User::where('id', $id)->update([
                    'name' => $request->input('name'),
                    'email' => $request->input('email'),
                    'alamat' => $request->input('alamat'),
                    'no_hp' => $request->input('no_hp'),
                ]);
            }

            if ($User) {
                return response()->json([
                    'success' => true,
                    'message' => 'Berhasil update User !',
                    'data'    => $User
                ], 200);
            } else {
                return response()->json([
                    'success' => false,
                    'message' => 'User Gagal Diupdate!',
                ], 500);
        }
    }

    public function destroy(Request $request, $id)
    {
        //validate data
            $User = User::findOrFail($id);
            $User->delete();
            if ($User) {
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



