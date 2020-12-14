<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Contracts\Services\API\PostAPIServiceInterface;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Imports\PostsImport;
use Maatwebsite\Excel\Facades\Excel;
use App\Http\Requests\PostConfirmationRequest;
use App\Http\Requests\PostUpdateRequest;

class PostApiController extends Controller
{
    private $postInterface;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(PostAPIServiceInterface $postInterface)
    {
        $this->postInterface = $postInterface;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return $this->postInterface->getPostList();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        return $this->postInterface->storePost($request);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        return $post;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post)
    {
        return $this->postInterface->updatePost($request, $post);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        return $this->postInterface->deletePost($post);
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
        return Post::get();
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
