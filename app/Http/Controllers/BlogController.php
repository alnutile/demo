<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Blog;
use App\CustomPagination;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;

class BlogController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index(Request $request)
	{
		$blogs = Blog::orderBy('created_at', 'desc')->paginate(5);
		$customPagination = new CustomPagination($blogs);

		if($request->header('Accept') == 'application/json')
			return $blogs;

		return view('blogs.index', compact('blogs', 'customPagination'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return view('blogs.create');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param Request $request
	 * @return Response
	 */
	public function store(Request $request)
	{
		$this->validate($request, [
			'title' => 'required|unique:blogs|max:255',
			'body' => 'required',
		]);

		$blog = new Blog();

		$blog->title = $request->input("title");
        $blog->body = $request->input("body");

		$blog->save();

		return redirect()->route('blogs.index')->with('message', 'Item created successfully.');
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$blog = Blog::findBySlugOrIdOrFail($id);

		$comments = $blog->comments;

		return view('blogs.show', compact('blog', 'comments'));
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{

		$blog = Blog::findOrFail($id);

		return view('blogs.edit', compact('blog'));
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @param Request $request
	 * @return Response
	 */
	public function update(Request $request, $id)
	{

		$blog = Blog::findOrFail($id);

		$this->validate($request, [
			'title' => 'required|max:255|unique:blogs,title,' . $blog->id,
			'body' => 'required',
		]);

		$blog->title = $request->input("title");
        $blog->body = $request->input("body");

		$blog->save();

		return redirect()->route('blogs.index')->with('message', 'Item updated successfully.');
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		$blog = Blog::findOrFail($id);
		$blog->delete();

		return redirect()->route('blogs.index')->with('message', 'Item deleted successfully.');
	}

}
