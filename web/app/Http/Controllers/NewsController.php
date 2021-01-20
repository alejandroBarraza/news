<?php

namespace App\Http\Controllers;

use App\Helpers\APIHelpers;
use App\Models\News;
use Illuminate\Http\Request;

class NewsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // SELECT * FROM news
        $news = News::all();

        //Return the get request with code 200
        $response = APIHelpers::createAPIResponse(false, 200, '', $news);
        return response()->json($response, 200);
        /*return response([
            'message' =>'Retrieved Successfully',
            'news' => $news
        ],200);*/
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // The validation of the required
        $this->validate($request, [
            'title' => 'required',
            'author' => 'required',
            'source' => 'required',
            'url' => 'required',
            'description' => 'required',
            'content' => 'required',
            'date' => 'required'
        ]);

        // Creates a News
        $news = new News();

        // Get  the title of the news
        $news->title = $request->input('title');

        // Get the author of the news
        $news->author = $request->input('author');

        // Get the source of the news
        $news->source = $request->input('source');

        // Get the URL of the news
        $news->url = $request->input('url');

        // Get the URL image of the news
        $news->urlImage = $request->input('urlImage');

        // Get the description of the news
        $news->description = $request->input('description');

        // Get the content of the news
        $news->content = $request->input('content');

        // Get the publish date of the news
        $news->date = $request->input('date');

        // Save the news into database
        $news->save();
        $news = News::all();

        return back()->with('message', 'Se ha agregado la noticia correctamente!');
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        $data = News::orderBy('date', 'DESC') -> paginate(10);
        return view('listnews', ['newslist' => $data]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = News::find($id);
        return view('edit', ['data'=>$data]);
        //return back()->with('message', 'Se ha modificado la noticia correctamente!');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {

        $data = News::find($request -> id);

        $data->title = $request->title;

        $data->author = $request->author;

        $data->source = $request->source;

        $data->url = $request->url;

        $data->urlImage = $request->urlImage;

        $data->description = $request->description;

        $data->content = $request->content;

        $data->date = $request->date;

        $data->save();
        $news = News::all();

        return redirect('listnews')->with('message', 'La noticia ha sido actualizada');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = News::find($id);
        $data->delete();
        return redirect('listnews');
    }

}
