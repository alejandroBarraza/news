<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Controllers\NewsController;
use Illuminate\Http\Request;
use DB;

class TableditController extends Controller
{
    function index()
    {
        $data = DB::table('news')->get();
        return view('table_edit', compact('data'));
    }

    function action(Request $request)
    {
        if($request->ajax())
        {
            if($request->action == 'edit')
            {
                $data = array(
                    'title'	=>	$request->title,
                    'author'		=>	$request->author,
                    'source'		=>	$request->source,
                    'url'		=>	$request->url,
                    'urlImage'		=>	$request->urlImage,
                    'description'		=>	$request->description,
                    'content'		=>	$request->content,
                    'date'		=>	$request->date
                );
                //NewsController::update(id);
                $this->updateData(id, data);
                /*DB::table('news')
                    ->where('id', $request->id)
                    ->update($data);*/
                /*$data = NewsController::update($id);*/
            }
            if($request->action == 'delete')
            {
                DB::table('news')
                    ->where('id', $request->id)
                    ->delete();
            }
            return response()->json($request);
        }
    }

    function updateData($id,$data){
        DB::table('news')
            ->where('id', $id)
            ->update($data);
    }

}
