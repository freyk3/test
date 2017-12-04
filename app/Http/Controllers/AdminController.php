<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use Illuminate\Http\Request;
use App\User;
use App\Models\Item;
use Illuminate\Support\Facades\Session;

class AdminController extends Controller
{

    public function __construct()
    {

    }

    public function index()
    {
        $view['items'] = Item::all();
        return view('admin/admin', $view);
    }

    public function item($id)
    {
        $item = $view['item'] = Item::find($id);
        $view['comments'] = $item->comments()->get();
        return view('admin/item', $view);
    }

    public function createpage()
    {
        return view('admin/create');
    }


    public function create(Request $request)
    {
        $item = new Item();
        $item->title = $request->title;
        $item->text = $request->text;
        $item->published = ($request->published == 'on') ? 1 : 0;
        $item->save();
        return redirect('admin/');
    }

    public function update($id, Request $request)
    {
        $item = Item::find($id);
        $item->title = $request->title;
        $item->text = $request->text;
        $item->published = ($request->published == 'on') ? 1 : 0;
        $item->save();
        return redirect('admin/');
    }

    public function delete($id)
    {
        $item = Item::find($id);
        foreach ($item->comments()->get() as $comment)
            $comment->delete();
        $item->delete();
        return redirect('/admin/');
    }

    public function deleteComment($id)
    {
        $comment = Comment::find($id);
        $comment->delete();
        return redirect()->back();
    }


}
