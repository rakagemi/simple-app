<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\UserStatus;

class UserStatusController extends Controller
{
    public function index(request $request)
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
            $user_status = UserStatus::with('user')->get();
            return response([
                'success' => true,
                'message' => 'Listing User Status',
                'data' => $user_status
            ], 200);
        }
    }

    // public function login(Request $request)
    // {
    //     //validate data
    //         $validate_user = User::where([
    //             'email' => $request->input('email')
    //             //'password' => $request->input('password'),
    //             //'provider' => 'users',
    //             //dd($validate_user);
    //         ])->first();
    //         //dd($validate_user);

    //         if ($validate_user && Hash::check($request->input('password'), $validate_user->password)) {

    //             return response()->json([
    //                 'success' => true,
    //                 'message' => 'user Berhasil Login!',
    //                 'user' => $validate_user
    //             ], 200);
    //         } else {
    //             return response()->json([
    //                 'success' => false,
    //                 'message' => 'user Gagal Login!',
    //             ], 400);
    //         }
    //     }

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
            $user_status = UserStatus::whereId($id)->with('user')->first();

            if ($user_status) {
                return response()->json([
                    'success' => true,
                    'message' => 'Showed User Status!',
                    'data'    => $user_status
                ], 200);
            } else {
                return response()->json([
                    'success' => false,
                    'message' => 'User Status Not Found!',
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
            $user_status = UserStatus::create([
                'id_user' => $request->input('id_user'),
                'status' => $request->input('status'),
                'position' => $request->input('position'),
            ]);
            if ($user_status) {
                return response()->json([
                    'success' => true,
                    'message' => 'User Status Berhasil Disimpan!',
                    'Programs' => $user_status
                ], 200);
            } else {
                return response()->json([
                    'success' => false,
                    'message' => 'User Status Gagal Disimpan!',
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
            $user_status = UserStatus::where('id', $id)->update([
                'id_user' => $request->input('id_user'),
                'status' => $request->input('status'),
                'position' => $request->input('position'),
            ]);

            if ($user_status) {
                return response()->json([
                    'success' => true,
                    'message' => 'User Status Berhasil Diupdate!',
                    'data' => $user_status,
                ], 200);
            } else {
                return response()->json([
                    'success' => false,
                    'message' => 'User Status gagal diupdate!',
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
            $user_status = UserStatus::findOrFail($id)->delete();

            if ($user_status) {
                return response()->json([
                    'success' => true,
                    'message' => 'User Status Berhasil Dihapus!',
                ], 200);
            } else {
                return response()->json([
                    'success' => false,
                    'message' => 'User Status Gagal Dihapus!',
                ], 500);
            }
        }
    }
}
