<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\models\ListItem;

class TodoListController extends Controller
{
    public function index() {
        return view('welcome', [ 'listItems' => ListItem::where('is_complete', 0)->get() ]);
    }

    public function completeItem($id){
        $listItem = ListItem::find($id);
        $listItem->is_complete = 1;
        $listItem->save();

        return redirect('/');
    }

    public function saveItem(Request $request) {

        $newListItem = ListItem::create(['name' => $request->listItem, 'is_complete' => 0]);

        return redirect('/');
    }


}
