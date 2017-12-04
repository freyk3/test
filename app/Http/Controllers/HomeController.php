<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Item;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {

    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $view['items'] = Item::where('published','1')->get();
        return view('main',$view);
    }

    public function item($id)
    {
        $item = $view['item'] = Item::find($id);
        $view['comments'] = $item->comments;
        return view('item',$view);
    }

    public function getComments($itemId, Request $request)
    {
        $item = Item::find($itemId);
        echo json_encode($item->comments()->get());
    }

    public function newComment($id, Request $request)
    {
        $comment = new Comment();
        $comment->name = $request->name;
        $comment->text = $request->text;
        $comment->item_id = $id;
        $comment->save();
        echo json_encode($comment);
    }
}
