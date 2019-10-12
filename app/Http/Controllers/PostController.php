<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $records = Post::paginate(20);
        return view('posts.index', compact('records'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('posts.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $this->validate($request, [
            'title' => 'required',
            'content' => 'required',
            'image' => 'required',
            'category_id' => 'required|numeric',
        ], [
            'title.required' => 'يجب كتابه العنوان',
            'content.required' => 'يجب كتابه المحتوى',
            'image.required' => 'يجب اضافه الصوره',
            'category_id.required' => 'يجب اضافه القسم'
        ]);

        $record = Post::create($request->all());

        if ( $request->hasFile('image')  ) {
            $logo = $request->image;
            $logo_new_name = time() . $logo->getClientOriginalName();
            $logo->move('uploads/post', $logo_new_name);

            $record->image = 'uploads/post/'.$logo_new_name;
            $record->save();
        }
        flash()->success("تمت الاضافه بنجاح");
        return redirect(route('post.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $model = Post::findOrFail($id);
        return view('posts.edit', compact('model'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $records = Post::findOrFail($id);
        $records->update($request->all());
        if ( $request->hasFile('image')  ) {
            $logo = $request->image;
            $logo_new_name = time() . $logo->getClientOriginalName();
            $logo->move('uploads/post', $logo_new_name);

            $records->image = 'uploads/post/'.$logo_new_name;
            $records->save();
        }
        flash()->success('تم التعديل بنجاح');
        return redirect(route('post.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $record = Post::findOrFail($id);
        $record->delete();
        flash()->success('تم الحذف بنجاح');
        return back();
    }
}
