<?php

namespace App\Http\Controllers;

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
        $view['item'] = Item::find($id);
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
        $item->delete();
        return redirect('/admin/');
    }

}
