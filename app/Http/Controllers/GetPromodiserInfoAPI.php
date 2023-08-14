<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class GetPromodiserInfoAPI extends Controller
{
    public function index(Request $request)
    {
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
        
        // Create an array with the retrieved information
        $result = [
            'firstname' => $fname,
            'lastname' => $lname,
            'location_code' => $locationCode,
        ];
        
        // Wrap the result in an array before returning it
        if ($request->acceptsJson() && $request->expectsJson()) {
            return response()->json($result);
        }
        // return response()->json([$result]);
    
    }
    
}


