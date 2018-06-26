<?php

namespace App\Http\Controllers;

use App\seller;
use DB;
use View;
use App\main_waste_category;
use App\user;
use App\waste;
use App\posts;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;


class PostsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */


    public function index(){
        $maincategories =  DB::table('main_waste_category')->get();
//        $subcategories =  DB::table('waste')->get();
        /*$newArray = [];
        foreach ($maincategories as $mat){
            $subcategories= waste::where('main_category_id',$mat->id)->get();
            $newArray.appen
        }*/
        $posts = DB::table('post')->orderby('updated_at', 'desc')->paginate(3);
//
        return view('auth.buyer.index', ['posts'=>$posts ,'maincategories'=>$maincategories]);
//        return view('auth.buyer.index', compact('maincategories', $maincategories));
    }


    public function category($id)
    {
        $maincategories =  main_waste_category::find($id);
        $subcategories= waste::where('main_category_id',$id)->get();
        return view('auth.buyer.index')->with($maincategories)->with($subcategories);
            }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // $waste = new Waste();
        $cat = DB::table('waste')->select('category')->distinct()->get();

        return view('posts.create', compact('cat'));


    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if ($request->hasFile('attachment')) {
            $fileNameWithExt = $request->file('attachment')->getClientOriginalName();
            $filename = pathinfo($fileNameWithExt, PATHINFO_FILENAME);
            // get extension
            $extension = $request->file('attachment')->getClientOriginalExtension();

            $fileNameToStore = $filename . '_' . time() . '.' . $extension;
            // upload
            $path = $request->file('attachment')->storeAs('public/attachment', $fileNameToStore);
        } else {
            $fileNameToStore = 'noimage.jpg';

        }
        $category = $request->input('category');
        $wasteid = DB::table('waste')->select('id')->where('category', $category)->get();

        $post = new posts;


        $post->title = $request->input('title');
        $post->content = $request->input('description');
        $post->attachment = $fileNameToStore;
        foreach ($wasteid as $id)

            $post->waste_id = $id->id;
        $post->publisher_id = auth()->user()->id;

        $post->save();
        return redirect()->to('/posts/create')->with('success', 'Successfully posted.');


    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $post = Posts::findOrFail($id);
        $seller = Seller::findOrFail($post->publisher_id);
        if ($post->publisher_id != auth()->user()->id){
            $post->increment('view_count');
        }

        return view('posts.view', ['post' => $post , 'seller' => $seller]);
    }

    /**
     * Show the form for editing newt_textbox_set_height(textbox, height)e specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function getPublisher($id)
    {
        $seller = Seller::findOrFail($id);
        return view('posts.sellerContactDetails', ['seller' => $seller]);
    }




}
