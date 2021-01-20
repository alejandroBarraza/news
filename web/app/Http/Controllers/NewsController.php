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
        $news= News::paginate(10);

        //Returns the get request with code status 200 and calls the creation of the api response
        $response = APIHelpers::createAPIResponse(false, 200, '', $news);
        return response()->json($response, 200);
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
        // Validates all data that is required
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

        // Gets the title of the news
        $news->title = $request->input('title');

        // Gets the author of the news
        $news->author = $request->input('author');

        // Gets the source of the news
        $news->source = $request->input('source');

        // Gets the url of the news
        $news->url = $request->input('url');

        // Gets the url image of the news
        $news->urlImage = $request->input('urlImage');

        // Gets the description of the news
        $news->description = $request->input('description');

        // Gets the content of the news
        $news->content = $request->input('content');

        // Gets the publish date of the news
        $news->date = $request->input('date');

        // Saves the news into database
        $news->save();
        $news = News::all();

        return back()->with('message', 'Se ha agregado la noticia exitosamente!');
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        // Displays the data in a descending way by the date row
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
        // Finds the data by the id to edit
        $data = News::find($id);
        return view('edit', ['data'=>$data]);
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
        // Finds the data by the id to update
        $data = News::find($request -> id);

        // Gets the title of the news
        $data->title = $request->title;

        // Gets the author of the news
        $data->author = $request->author;

        // Gets the source of the news
        $data->source = $request->source;

        // Gets the url of the news
        $data->url = $request->url;

        // Gets the url image of the news
        $data->urlImage = $request->urlImage;

        // Gets the description of the news
        $data->description = $request->description;

        // Gets the content of the news
        $data->content = $request->content;

        // Gets the date of the news
        $data->date = $request->date;

        // Saves the news into database
        $data->save();
        $news = News::all();

        return redirect('listnews')->with('message', 'La noticia ha sido actualizada exitosamente!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // Finds the data by the id to delete
        $data = News::find($id);
        $data->delete();
        return redirect('listnews');
    }

}
