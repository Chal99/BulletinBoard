<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use App\Contracts\Services\Post\PostServiceInterface;
use App\Http\Controllers\Controller;
use App\Imports\PostsImport;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Rules;
use App\Http\Requests\PostConfirmationRequest;
use App\Http\Requests\PostUpdateRequest;

class PostController extends Controller
{
    private $postInterface;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(PostServiceInterface $postInterface)
    {
        $this->middleware('auth')->except(['index']);
        $this->postInterface = $postInterface;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = $this->postInterface->getPostList();
        return view('posts.index', [
            'posts' => $posts,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('posts.create', ["title" => '', "description" => '']);
    }
    /**
     * Get data for confirmation page 
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function confirmation(PostConfirmationRequest $request)
    {
        return view('posts.confirm-post', ["title" => $request->title, "description" => $request->description]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PostConfirmationRequest $request, Post $post)
    {
        switch ($request->input('action')) {
            case 'save':
                $this->postInterface->storePost($request);
                return redirect()->route('post.index')->with('success', 'Product created successfully.');
                break;

            case 'cancel':
                return redirect()->route('post.create')->withInput($request->all());
                break;
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        return view('posts.edit', compact('post'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(PostUpdateRequest $request, Post $post)
    {
        $this->postInterface->updatePost($request, $post);
        return redirect()->route('post.index')->with('success', 'Post Confirm Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $this->userInterface->destroyUser($request);
        return redirect()->route('post.index')->with('success', 'Post deleted successfully');
    }

    /** 
     * Show the form for upload
     * 
     * @return \Illuminate\Support\Collection
     */
    public function uploadindex()
    {
        return view('posts.upload-post');
    }
    
    /**
     * Get csv data and save to database
     * 
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Support\Collection
     */
    public function importExcelCSV(Request $request)
    {
        $request->validate([
            'file' => 'required|mimes:csv,txt',
        ]);
        $line = 0;
        $file_path = $request->file->path();
        if (($handle = fopen($file_path, "r")) !== FALSE) {

            // Get first row of the file as the header
            $header = fgetcsv($handle , 0, ',');
            if(count($header)>2){
                return redirect()->route('post.upload')->with('fail', 'Only Title and Description Must Have');
            }
            $title_column = $this->getColumnNameByValue($header, 'title');
            $description_column = $this->getColumnNameByValue($header, 'description');

            // Find data
            if($title_column == 'title' && $description_column == 'description'){
                while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {
                    $line++;

                    $post = array();
                    list(
                        $post['title'],
                        $post['description']
                    ) = $data;

                    $csv_errors = Validator::make($post, [
                        'title' => 'required|unique:posts,title',
                        'description' => 'required',
                    ])->errors();

                    if ($csv_errors->any()) {
                        return redirect()->back()
                            ->withErrors($csv_errors, 'import')
                            ->with('error_line', $line);
                    }
                }
                fclose($handle);
            }
            else{
                return redirect()->route('post.upload')->with('fail', 'Title and Description column must have');
            }
        }
        Excel::import(new PostsImport, $request->file('file'));
        return redirect()->route('post.upload')->with('status', 'The file has been imported');
    }
    /**
     * Attempts to find a value in array or returns empty string
     * 
     * @param array  $array hay stack we are searching
     * @param string $key   
     *
     */
    private function getColumnNameByValue($array, $value) 
    {
        return in_array($value, $array)? $value : '';
    }
}
