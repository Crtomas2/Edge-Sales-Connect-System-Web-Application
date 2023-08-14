<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class UserTableController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $users = User::get();

        $paginatedUsers = User::paginate(5);

        $name = $request->query('firstname');
    
        $tempData = User::query();
    
        if ($name) {
            $tempData->where('firstname', $name);
        } elseif ($request->acceptsJson() && $request->expectsJson()) {
            $tempData = $tempData->get();
    
            if ($tempData->isEmpty()) {
                // If no matching data found, return an empty result
                return response()->json([]);
            }
    
            // Retrieve the corresponding information
            $firstNames = $tempData->pluck('firstname');
    
            // Create an array with the retrieved information
            $result = [
                'firstnames' => $firstNames,
            ];
    
            return response()->json($result);
        } else {
            $tempData = $tempData->get();
        }
    
        $tempData = $tempData->first();
    
        if (!$tempData) {
            // If no matching data found, return an empty result
            return response()->json([]);
        }
    
        // Retrieve the corresponding information
        $fname = $tempData->firstname;
        $lname = $tempData->lastname;
        $locationCode = $tempData->location_code;
         // $lname = $tempData->lastname;
        // $locationCode = $tempData->location_code;
    
        // Create an array with the retrieved information
        $result = [
            'firstname' => $fname,
            'lastname' => $lname,
            'location_code' => $locationCode
            // 'lastname' => $lname,
            // 'location_code' => $locationCode,
        ];
    
        if ($request->acceptsJson() && $request->expectsJson()) {
            return response()->json($result);
        }

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
            'firstname' => 'required',
            'lastname' => 'required',
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
            'firstname' => 'required',
            'lastname' => 'required',
            'email' => 'required|email',
            'username' => 'required',
            'UserRole' => 'required',
            'password'=> 'required',
        ]);
    
        try {
            DB::beginTransaction();
            // Logic For Save User Data
    
            $update_user = User::where('id', $id)->update([
                'firstname' => $request->firstname,
                'lastname' => $request->lastname,
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
