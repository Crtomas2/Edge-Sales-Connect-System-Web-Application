<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::get();

        $paginatedUsers = User::paginate(5);

        if (!auth()->check() || auth()->user()->UserRole !== 'Admin') {
            abort(403, 'Unauthorized Access to this page');        
        }

        return view('admin.user.index', compact('users','paginatedUsers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (!auth()->check() || auth()->user()->UserRole !== 'Admin') {
            abort(403, 'Unauthorized Access to this page');
               
        }

        return view('admin.user.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'username' => 'required',
            'UserRole' => 'required',
        ]);

        try{
            DB::beginTransaction();

            $create_user = User::create([
                'name' => $request->name,
                'email' => $request->email,
                'username' => $request->username,
                'UserRole' => $request->UserRole,
                'password'=> Hash::make('password')
            ]);

            if(!$create_user){
                DB::rollBack();

            return back()->with('error','Something went wrong while saving user data');
            }

            DB::commit();
            return redirect()->route('users.index')->with('success', 'User Stored Successfully.');

        }catch(\Throwable $th){
            DB::rollBack();
            throw $th;
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if (!auth()->check() || auth()->user()->UserRole !== 'Admin') {
            abort(403, 'Unauthorized Access to this page');
               
        }
        
        $user = User::whereId($id)->first();

        if(!$user){
            return back()->with('error', 'User Not Found');
        }

        return view('admin.user.edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        
        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'username' => 'required',
            'UserRole' => 'required',
            'password'=> 'required',
        ]);
    
        try {
            DB::beginTransaction();
            // Logic For Save User Data
    
            $update_user = User::where('id', $id)->update([
                'name' => $request->name,
                'email' => $request->email,
                'username' => $request->username,
                'UserRole' => $request->UserRole,
                'password' => Hash::make($request->password),
            ]);

            if(!$update_user){
                DB::rollBack();
    
                return back()->with('error', 'Something went wrong while update user data');
            }
    
            DB::commit();
            return redirect()->route('users.index')->with('success', 'User Stored Successfully.');
    
    
        } catch (\Throwable $th) {
            DB::rollBack();
            throw $th;
        }  
    }
    

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
            DB::beginTransaction();
    
            $delete_user = User::whereId($id)->delete();
    
            if(!$delete_user){
                DB::rollBack();
                return back()->with('error', 'There is an error while deleting user.');
            }
    
            DB::commit();
            return redirect()->route('users.index')->with('success', 'User Deleted successfully.');
    
    
    
        } catch (\Throwable $th) {
            DB::rollBack();
            throw $th;
        }
    }
}
