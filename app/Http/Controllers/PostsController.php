<?php

namespace App\Http\Controllers;

use App\seller;
use DB;
use View;
use App\main_waste_category;
use App\user;
use App\sub_waste_category;
use App\post;
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
        $maincategories =  main_waste_category::with(['sub_waste_category'])->get();

        if(auth()->user()->_usertype === "buyer") {
            $posts = DB::table('post')
                ->join('user', 'user.id', '=', 'post.publisher_id')

                        ->where('user._usertype', '=', "seller")
                ->paginate(3);



        }else{
            $posts = DB::table('post')
                ->join('user', 'user.id', '=', 'post.publisher_id')

                ->where('_usertype', '=', "buyer")
                ->paginate(3);

        }

//        $posts = DB::table('post')->orderby('updated_at', 'desc')->paginate(3);
//
        return view('posts.index', ['posts'=>$posts ,'maincategories'=>$maincategories]);
//
    }


    public function category($id)
    {
        $maincategories =  main_waste_category::find($id);
        $subcategories= waste::where('main_category_id',$id)->get();
        return view('buyer.index')->with($maincategories)->with($subcategories);
            }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // $subWasteCategory = new Waste();
        $cat = DB::table('sub_waste_category')->select('category')->distinct()->get();

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
        $wasteid = DB::table('sub_waste_category')->select('id')->where('category', $category)->get();

        $post = new post;


        $post->title = $request->input('title');
        $post->content = $request->input('description');
        $post->attachment = $fileNameToStore;
        foreach ($wasteid as $id)

            $post->sub_waste_category_id = $id->id;
            $post->publisher_id = auth()->user()->id;

        $post->save();




        $postid = DB::table('post')->select('id')->where('title', $request->input('title'))->get();

        foreach ($postid as $pid)

             $post_id = $pid->id;


        if(auth()->user()->_usertype === "seller") {
            $buyerType = $request->input('buyerType');
            $buyerType = implode(',', $buyerType);

            DB::table('seller_post')->insert(
                ['buyer_category' => $buyerType, 'user_id' => auth()->user()->id, 'post_id' => $post_id]
            );
        }

        if(auth()->user()->_usertype === "buyer"){
            $noOfItems = $request->input('noOfItems');
            $modelNo = $request->input('modelNo');

            DB::table('buyer_post')->insert(
                ['no_of_items' => $noOfItems, 'model' => $modelNo, 'user_id' => auth()->user()->id, 'post_id' => $post_id]
            );
        }


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
        $post = post::findOrFail($id);
        $seller = user::findOrFail($post->publisher_id);
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



    public function showMyPosts($id)
    {
        $maincategories =  main_waste_category::with(['sub_waste_category'])->get();

        $posts = DB::table('post')->where('publisher_id',$id)->orderby('updated_at', 'desc')->paginate(3);
//
        return view('posts.index', ['posts'=>$posts ,'maincategories'=>$maincategories]);
    }


}
