<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Log;
use DB;

class LogController extends Controller
{
    //
    public function show($slug)
    {
        return view('post', [
            'post' => Post::where('slug', '=', $slug)->first()
        ]);
    }

    public function index()
    {
        try {
            DB::connection()->getMongoClient()->listDatabases();
        } catch (\Exception $e) {
            echo $e->getMessage();
        }
        
        // $log = DB::table('logs')->get();
        $log = Log::all();

        return view('main', compact('log'));
    }
}
