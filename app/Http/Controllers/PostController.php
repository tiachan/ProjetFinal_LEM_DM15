<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\Category;
use Illuminate\Support\Facades\Storage;


class PostController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Post $post)
    {
        $this->authorize('index', Post::class);
        return view('back.post.index', ['posts' => $post::paginate(10)]);
        //
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->authorize('create', Post::class);
        $categories = Category::pluck('title', 'id')->all();
        return view('back.post.create', ['categories' => $categories]);

        $post->save();
        // return redirect()->route('post.index')->with('success', 'Le post à bien été créé');
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        // var_dump($request);

        $this->validate($request, [
            'title' => 'required',
            'description' => 'string',
            'start_date' => 'date',
            'end_date' => 'date',
            'price' => 'numeric',
            'nb_max' => 'integer',
            'category_id' => 'integer',
            'status' => 'in:publié,non publié',

        ]);
        $post = Post::create($request->all());
        $file = $request->file('picture');
        if(!empty($file)) {
            $link = $request->file('picture')->store('images');
            $this->savePicture($post, $link);
        }
        
        $post->categories()->attach($request->categories);
        $post->save();
        return redirect()->route('post.index')->with('message', 'success');
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        $this->authorize('view', Post::class);
        return view('back.post.show', ['post' => $post]);
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post, Category $categories)
    {
        return view('back.post.edit', [
            'post' => $post,
            'categories' => $categories::all()
        ]);
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $post = Post::find($id);
        $post->update($request->all());
        $file = $request->file('picture');
        if(!empty($file)) {
            if(count($post->picture) > 0) {
                Storage::disk('local')->delete($post->picture->link);
                $post->picture()->delete();
            }
            $link = $request->file('picture')->store('./');
            $this->savePicture($post, $link);
        }
       
        $post->save();
        return redirect()->route('post.index')->with('success', 'Le post a bien été mis à jour');
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        $post->delete();
        return redirect()->route('post.index')->with('success', 'Le post a bien été supprimé');
    }
    private function savePicture(Post $post, $link)
    {
        $post->picture()->create([
            'link' => $link,
            'title' => $request->img_title ?? "No title"
        ]);
    }
}