<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LiveSearch extends Controller
{
    function index()
    {
        return view('listnews');
    }

    function action(Request $request)
    {
        if($request->ajax())
        {
            $output = '';
            $query = $request->get('query');
            if($query != '')
            {
                $data = DB::table('news')
                    ->where('title', 'like', '%'.$query.'%')
                    ->orWhere('author', 'like', '%'.$query.'%')
                    ->orWhere('source', 'like', '%'.$query.'%')
                    ->orWhere('url', 'like', '%'.$query.'%')
                    ->orWhere('urlImage', 'like', '%'.$query.'%')
                    ->orWhere('description', 'like', '%'.$query.'%')
                    ->orWhere('content', 'like', '%'.$query.'%')
                    ->orderBy('date', 'desc')
                    ->get();

            }
            else
            {
                $data = DB::table('news')
                    ->orderBy('date', 'desc')
                    ->get();
            }
            $total_row = $data->count();
            if($total_row > 0)
            {
                foreach($data as $row)
                {
                    $output .= '
        <tr>
         <td>'.$row->title.'</td>
         <td>'.$row->author.'</td>
         <td>'.$row->source.'</td>
         <td>'.$row->url.'</td>
         <td>'.$row->urlImage.'</td>
         <td>'.$row->description.'</td>
         <td>'.$row->content.'</td>
         <td>'.$row->date.'</td>
        </tr>
        ';
                }
            }
            else
            {
                $output = '
       <tr>
        <td align="center" colspan="5">No Data Found</td>
       </tr>
       ';
            }
            $data = array(
                'table_data'  => $output,
                'total_data'  => $total_row
            );

            echo json_encode($data);
        }
    }
}
