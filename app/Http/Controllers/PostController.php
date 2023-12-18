<?php

namespace App\Http\Controllers;

//import Model "Post
use App\Models\Post;

//return type View
use Illuminate\View\View;

//insert return type redirectResponse
use Illuminate\Http\RedirectResponse;

// edit Facade "Storage"
use Illuminate\Support\Facades\Storage;

use Illuminate\Http\Request;

class PostController extends Controller{

    public function index(): View{
        //get posts
        $posts = Post::latest()->paginate(5);
        //render view with posts
        return view('posts.index', compact('posts'));
    }

    //buat halaman create
    public function create(): View {
        return view('posts.create');
    }


    //function untuk insert data kedalam database
    public function store(Request $request): RedirectResponse{
        //validate form
        $this->validate($request, [
            'image'     => 'required|image|mimes:jpeg,jpg,png|max:2048',
            'title'     => 'required|min:5',
            'content'   => 'required|min:10'
        ]);

        //upload image
        $image = $request->file('image');
        $image->storeAs('public/posts', $image->hashName());

        //create post
        Post::create([
            'image'     => $image->hashName(),
            'title'     => $request->title,
            'content'   => $request->content
        ]);

        //redirect to index
        return redirect()->route('posts.index')->with(['success' => 'Data Berhasil Disimpan!']);
    }


    //function untuk show detail data
    public function show(string $id): View{
        //get post by ID
        $post = Post::findOrFail($id);

        //render view with post
        return view('posts.show', compact('post'));
    }

    //function untuk edit data dari database
    public function edit(string $id): View {
        //get post by ID
        $post = Post::findOrFail($id);
        //render view with post
        return view('posts.edit', compact('post'));
    }


    //function untuk update data di database
    public function update(Request $request, $id): RedirectResponse {
        //validate form
        $this->validate($request, [
            'image'     => 'image|mimes:jpeg,jpg,png|max:2048',
            'title'     => 'required|min:5',
            'content'   => 'required|min:10'
        ]);

        //get post by ID
        $post = Post::findOrFail($id);

        //check if image is uploaded
        if ($request->hasFile('image')) {

            //upload new image
            $image = $request->file('image');
            $image->storeAs('public/posts', $image->hashName());

            //delete old image
            Storage::delete('public/posts/'.$post->image);

            //update post with new image
            $post->update([
                'image'     => $image->hashName(),
                'title'     => $request->title,
                'content'   => $request->content
            ]);

        } else {

            //update post without image
            $post->update([
                'title'     => $request->title,
                'content'   => $request->content
            ]);
        }

        //redirect to index
        return redirect()->route('posts.index')->with(['success' => 'Data Berhasil Diubah!']);
    }

    //funciton delete data dari database
    public function destroy($id): RedirectResponse  {
        //get post by ID
        $post = Post::findOrFail($id);
        //delete image
        Storage::delete('public/posts/'. $post->image);
        //delete post
        $post->delete();
        //redirect to index
        return redirect()->route('posts.index')->with(['success' => 'Data Berhasil Dihapus!']);
    }

}
