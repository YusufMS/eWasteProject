<?php

namespace App\Http\Controllers;

use DB;
use View;
use App\Main_waste_category;
use App\User;
use App\Sub_waste_category;
use App\post;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use Session;
use App\Buyer_Post;
use App\Seller_Post;
use Auth;


class PostsController extends Controller
{

    public function index()
    {
        Session::put('active_nav', 'portal');
        $maincategories = main_waste_category::with(['sub_waste_category'])->get();

        //check the user logged to change the portal
        if (auth()->user()->_usertype === "buyer" || Session::get('user_role') == 'buyer') {

            // join post,user,sub_waste_category tables and retrieve all the details in the post table and sub_waste_category details
            $posts = DB::table('post')
                ->select('post.id as id', 'post.title as title', 'post.content', 'post.attachment', 'sub_waste_category.category as category', 'post.updated_at as updated_at', 'post.created_at as created_at', 'post.deleted_at as deleted_at', 'post.view_count as view_count', 'post.publisher_id as publisher_id', 'post.like_dislike as like_dislike')
                ->join('user', 'user.id', '=', 'post.publisher_id')
                ->rightjoin('sub_waste_category', 'sub_waste_category.id', "=", "post.sub_waste_category_id")
                ->where('user._usertype', "seller")
                ->orderby('post.created_at', 'desc')
                ->paginate(10);
//return $posts;

            //check the user logged to change the portal and check the portal buyer/seller type user is visiting
        } elseif (auth()->user()->_usertype === "seller" || Session::get('user_role') == 'seller') {

            // join post,user,sub_waste_category tables and retrieve all the details in the post table and sub_waste_category details

            $posts = DB::table('post')
                ->select('post.id as id', 'post.title as title', 'post.content', 'post.attachment', 'sub_waste_category.category as category', 'post.updated_at as updated_at', 'post.created_at as created_at', 'post.deleted_at as deleted_at', 'post.view_count as view_count', 'post.publisher_id as publisher_id', 'post.like_dislike as like_dislike')
                ->join('user', 'user.id', '=', 'post.publisher_id')
                ->rightjoin('sub_waste_category', 'sub_waste_category.id', "=", "post.sub_waste_category_id")
                ->where('user._usertype', "buyer")
                ->orderby('post.created_at', 'desc')
                ->paginate(10);
//            dd($posts);

        } else {
            if (Session::has('user_role')) {
                if (Session::get('user_role') == 'seller') {
                    $posts = DB::table('post')
                        ->select('post.id as id', 'post.title as title', 'post.content', 'post.attachment', 'sub_waste_category.category as category', 'post.updated_at as updated_at', 'post.created_at as created_at', 'post.deleted_at as deleted_at', 'post.view_count as view_count', 'post.publisher_id as publisher_id', 'post.like_dislike as like_dislike')
                        ->join('user', 'user.id', '=', 'post.publisher_id')
                        ->rightjoin('sub_waste_category', 'sub_waste_category.id', "=", "post.sub_waste_category_id")
                        ->where('user._usertype', "buyer")
                        ->orderby('post.created_at', 'desc')
                        ->paginate(10);
//                    return $posts;

                } elseif (Session::get('user_role') == 'buyer') {
                    $posts = DB::table('post')
                        ->select('post.id as id', 'post.title as title', 'post.content', 'post.attachment', 'sub_waste_category.category as category', 'post.updated_at as updated_at', 'post.created_at as created_at', 'post.deleted_at as deleted_at', 'post.view_count as view_count', 'post.publisher_id as publisher_id', 'post.like_dislike as like_dislike')
                        ->join('user', 'user.id', '=', 'post.publisher_id')
                        ->rightjoin('sub_waste_category', 'sub_waste_category.id', "=", "post.sub_waste_category_id")
                        ->where('user._usertype', "seller")
                        ->orderby('post.created_at', 'desc')
                        ->paginate(10);
// dd($posts[0]->category);

//                    return $posts;
                }

            }
        }

//        $posts = DB::table('post')->orderby('updated_at', 'desc')->paginate(10);
//
        return view('posts.index', ['posts' => $posts, 'maincategories' => $maincategories, 'view_title' => 'Portal']);

    }


    public function category($id)
    {
        //retrieve all the main waste categories in the database
        $maincategories = main_waste_category::find($id);
        //retrieve sub categories belongs to each of the main waste category in the database
        $subcategories = waste::where('main_category_id', $id)->get();

        return view('buyer.index')->with($maincategories)->with($subcategories);
    }

    public function create()
    {

        //select all the sub categories which should be displayed in the drop down menu in add post page to select
        $cat = DB::table('sub_waste_category')->select('category')->distinct()->get();

        return view('posts.create', compact('cat'));


    }

    public function store(Request $request)
    {

        // validation
        if(auth()->user()->_usertype === "seller" || Session::get('user_role') == 'seller'){
            $request->validate([
                'title' => 'required|string|max:100',
                'category' => 'required',
                'description' => 'required',
                'attachment' => 'nullable',
                'buyerType' => 'required',
            ]);
        } elseif(auth()->user()->_usertype === "buyer" || Session::get('user_role') == 'buyer'){
            $request->validate([
                'title' => 'required|string|max:100',
                'category' => 'required',
                'description' => 'required',
                'attachment' => 'nullable',
                'noOfItems' => 'required|integer',
                'item_unit' => 'nullable',
                'modelNo' => 'string|max:12|nullable',
            ]);
        } else { return "Unauthorized User"; }
        

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
        //select the sub category id which is selected by the user in the add post form
        $wasteid = DB::table('sub_waste_category')->select('id')->where('category', $category)->get();

        $post = new post;

        //get the user inputs that should insert to the post table
        $post->title = $request->input('title');
        $post->content = $request->input('description');
        $post->attachment = $fileNameToStore;

        foreach ($wasteid as $id)

            $post->sub_waste_category_id = $id->id;

        $post->publisher_id = auth()->user()->id;

        //insert data in to the post table
        $post->save();

        //get the id of the post submited
        $postid = DB::table('post')->select('id')->where('title', $request->input('title'))->get();

        foreach ($postid as $pid)

            $post_id = $pid->id;


        if (auth()->user()->_usertype === "seller" && Session::get('user_role') == 'seller') {
            $buyerType = $request->input('buyerType');
            $buyerType = implode(',', $buyerType);

            //insert post details of the posts which are published by the sellers
            DB::table('seller_post')->insert(
                ['buyer_category' => $buyerType, 'user_id' => auth()->user()->id, 'post_id' => $post_id]
            );

        } elseif (auth()->user()->_usertype === "buyer" && Session::get('user_role') == 'buyer') {
            $noOfItems = $request->input('noOfItems');
            $itemUnit = $request->input('item_unit');
            $modelNo = $request->input('modelNo');

            //insert post details of the posts which are published by the buyers
            DB::table('buyer_post')->insert(
                ['no_of_items' => $noOfItems, 'item_unit' => $itemUnit, 'model' => $modelNo, 'user_id' => auth()->user()->id, 'post_id' => $post_id]
            );
        }


        return redirect()->to('/posts/create')->with('success', 'Successfully posted.');


    }

    public function show($id)
    {
        //get the all the details of the posts published by any
        $post = post::findOrFail($id);
        $seller = user::findOrFail($post->publisher_id);

        $comments = $post->comments;
        $commentors = User::all();

        if ($post->publisher_id != auth()->user()->id) {
            $post->increment('view_count');
        }

        return view('posts.view', ['post' => $post, 'seller' => $seller, 'comments' => $comments, 'commentors' => $commentors]);
    }


    public function edit($id)
    {
        
        $post = Post::find($id);
        if ($post->user->_usertype == 'seller' || Session::get('user_role') == 'seller'){
            $buyer_category = explode(',' ,$post->seller_post->buyer_category);
        }
        // $post->buyer_post->no_of_items;
        // $buyer_category = explode(',' ,$post->seller_post->buyer_category);
        $cat = DB::table('sub_waste_category')->select('category')->distinct()->get();

        return view('posts.edit', compact('post', 'buyer_category', 'cat'));
    }


    public function update(Request $request, $id)
    {
        if(auth()->user()->_usertype === "seller" || Session::get('user_role') == 'seller'){
            $request->validate([
                'title' => 'required|string|max:100',
                'category' => 'required',
                'description' => 'required',
                'attachment' => 'nullable',
                'buyerType' => 'required',
            ]);
        } elseif(auth()->user()->_usertype === "buyer" || Session::get('user_role') == 'buyer'){
            $request->validate([
                'title' => 'required|string|max:100',
                'category' => 'required',
                'description' => 'required',
                'attachment' => 'nullable',
                'noOfItems' => 'required',
                'item_unit' => 'nullable',
                'modelNo' => 'string|max:12|nullable',
            ]);
        } else { return "Unauthorized User"; }

        if ($request->hasFile('attachment')) {
            $fileNameWithExt = $request->file('attachment')->getClientOriginalName();
            $filename = pathinfo($fileNameWithExt, PATHINFO_FILENAME);
            // get extension
            $extension = $request->file('attachment')->getClientOriginalExtension();

            $fileNameToStore = $filename . '_' . time() . '.' . $extension;
            // upload
            $path = $request->file('attachment')->storeAs('public/attachment', $fileNameToStore);
        }

        $category = $request->input('category');
        $wasteid = DB::table('sub_waste_category')->select('id')->where('category', $category)->get();

        $post = Post::find($id);
        $post->title = $request->input('title');
        $post->content = $request->input('description');
        if (isset($fileNameToStore)) {
            $post->attachment = $fileNameToStore;
        }

        foreach ($wasteid as $id)
            $post->sub_waste_category_id = $id->id;

        $post->save();


        $postid = DB::table('post')->select('id')->where('title', $request->input('title'))->get();

        foreach ($postid as $pid)

            $post_id = $pid->id;


        if (auth()->user()->_usertype === "seller" || Session::get('user_role') == 'seller') {
            $buyerType = $request->input('buyerType');
            $buyerType = implode(',', $buyerType);

            //insert data to the seller_post table
            $seller_post = Seller_Post::where('post_id', $post->id)->first();
            $seller_post->buyer_category = $buyerType;
            $seller_post->save();


        } elseif (auth()->user()->_usertype === "buyer" || Session::get('user_role') == 'buyer') {

            //insert data to the buyer_post table
            $buyer_post = Buyer_Post::where('post_id', $post->id)->first();
            $buyer_post->no_of_items = $request->input('noOfItems');
            $buyer_post->item_unit = $request->input('item_unit');
            $buyer_post->model = $request->input('modelNo');
            $buyer_post->save();

            

            // DB::table('buyer_post')->insert(
            //     ['no_of_items' => $noOfItems, 'model' => $modelNo, 'user_id' => auth()->user()->id, 'post_id' => $post_id]
            // );
        } 
        return redirect()->to('/posts/' . $post->id)->with('success', 'Post updated successfully.');

    }


    public function destroy($id)
    {
        //delete selected post
        $post = Post::find($id);
        if ($post->buyer_post()->exists()) {
            $user_post = Buyer_Post::where('post_id', $id)->first();
        } elseif ($post->seller_post()->exists()) {
            $user_post = Seller_Post::where('post_id', $id)->first();
        }


        if ($post->attachment != "noimage.jpg") {
            Storage::delete('public/images/' . $post->attachment);
        }

        $post->delete();
        $user_post->delete();
        return redirect('showMyPosts')->with('success', 'Post deleted successfully');
        
    }

    


    //get all the post details published by the logged user
    public function showMyPosts()
    {
        $maincategories = main_waste_category::with(['sub_waste_category'])->get();
        if (Session::has('user_role')) {
            if (Session::get('user_role') == 'seller') {

                $posts = Post::has('seller_post')
                    ->rightjoin('sub_waste_category', 'sub_waste_category.id', "=", "post.sub_waste_category_id")
                    ->select('post.id as id', 'post.title as title', 'post.content', 'post.attachment', 'sub_waste_category.category as category', 'post.updated_at as updated_at', 'post.created_at as created_at', 'post.deleted_at as deleted_at', 'post.view_count as view_count', 'post.publisher_id as publisher_id', 'post.like_dislike as like_dislike')
                    ->where('publisher_id', Auth::id())
                    ->orderby('post.created_at', 'desc')
                    ->paginate(10);
                // }
            }elseif (Session::get('user_role') == 'buyer'){
                // if (Post::has('buyer_post')){
                    $posts = Post::has('buyer_post')
                    ->rightjoin('sub_waste_category', 'sub_waste_category.id', "=", "post.sub_waste_category_id")
                    ->select('post.id as id', 'post.title as title', 'post.content', 'post.attachment', 'sub_waste_category.category as category', 'post.updated_at as updated_at', 'post.created_at as created_at', 'post.deleted_at as deleted_at', 'post.view_count as view_count', 'post.publisher_id as publisher_id', 'post.like_dislike as like_dislike')
                    ->where('publisher_id', Auth::id())
                    ->orderby('post.created_at', 'desc')
                    ->paginate(10);
                // }
            }
        } else {
            $posts = DB::table('post')
            ->rightjoin('sub_waste_category', 'sub_waste_category.id', "=", "post.sub_waste_category_id")
            ->select('post.id as id', 'post.title as title', 'post.content', 'post.attachment', 'sub_waste_category.category as category', 'post.updated_at as updated_at', 'post.created_at as created_at', 'post.deleted_at as deleted_at', 'post.view_count as view_count', 'post.publisher_id as publisher_id', 'post.like_dislike as like_dislike')
            ->where('publisher_id', Auth::id())
            ->orderby('post.created_at', 'desc')
            ->paginate(10);
        }
        // $posts = DB::table('post')
        //     ->rightjoin('sub_waste_category', 'sub_waste_category.id', "=", "post.sub_waste_category_id")
        //     ->select('post.id as id', 'post.title as title', 'post.content', 'post.attachment', 'sub_waste_category.category as category', 'post.updated_at as updated_at', 'post.created_at as created_at', 'post.deleted_at as deleted_at', 'post.view_count as view_count', 'post.publisher_id as publisher_id', 'post.like_dislike as like_dislike')
        //     ->where('publisher_id', $id)
        //     ->orderby('post.created_at', 'desc')
        //     ->paginate(10);
//
        return view('posts.index', ['posts' => $posts, 'maincategories' => $maincategories, 'view_title' =>'Your Posts']);
    }


    //get the user details according the logged user(if logged portal is buyer this shows the details of the seller)
    public function postByCategory($id)
    {
        $maincategories = main_waste_category::with(['sub_waste_category'])->get();

        $posts = DB::table('post')
            ->select('post.id as id', 'post.title as title', 'post.content', 'post.attachment', 'sub_waste_category.category as category', 'post.updated_at as updated_at', 'post.created_at as created_at', 'post.deleted_at as deleted_at', 'post.view_count as view_count', 'post.publisher_id as publisher_id', 'post.like_dislike as like_dislike')
            ->rightjoin('sub_waste_category', 'sub_waste_category.id', "=", "post.sub_waste_category_id")
            ->where('sub_waste_category_id', '=', $id)
            ->where('publisher_id', '!=', auth()->user()->id)
            ->orderby('post.created_at', 'desc')
            ->paginate(10);
//
        return view('posts.index', ['posts' => $posts, 'maincategories' => $maincategories, 'view_title' =>'Portal', 'resultsForCat' => sub_waste_category::find($id)->category]);
    }


}
