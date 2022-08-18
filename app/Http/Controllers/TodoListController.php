<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\models\ListItem;

class TodoListController extends Controller
{
    public function index(Request $request) {
        if(($request->filter ?? null) == 'all' ) {
            $listItems = ListItem::paginate(20);
        } else {
            $listItems = ListItem::where('is_complete', true)->paginate(20);
        }
        return view('welcome', [ 'listItems' => $listItems ]);
    }

    public function completeItem($id){
        $listItem = ListItem::find($id)->update('is_complete', true);

        return redirect('/');
    }

    public function saveItem(Request $request) {

        $newListItem = ListItem::create(['name' => $request->listItem, 'is_complete' => 0]);

        return redirect('/');
    }


}
