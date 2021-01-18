<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;

class TableditController extends Controller
{
    function index()
    {
        $data = DB::table('sample_datas')->get();
        return view('table_edit', compact('data'));
    }

    function action(Request $request)
    {
        if($request->ajax())
        {
            if($request->action == 'edit')
            {
                $data = array(
                    'first_name'	=>	$request->first_name,
                    'last_name'		=>	$request->last_name,
                    'gender'		=>	$request->gender
                );
                DB::table('sample_datas')
                    ->where('id', $request->id)
                    ->update($data);
            }
            if($request->action == 'delete')
            {
                DB::table('sample_datas')
                    ->where('id', $request->id)
                    ->delete();
            }
            return response()->json($request);
        }
    }
}
