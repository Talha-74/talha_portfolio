<?php

namespace App\Http\Controllers\Admin;

use App\DataTables\TyperTitleDataTable;
use App\Http\Controllers\Controller;
use App\Models\TyperTitle;
use Illuminate\Http\Request;

class TyperTitleController extends Controller
{
    public function index(TyperTitleDataTable $dataTable)
    {
        return  $dataTable->render('admin.typer-title.index');
    }

    public function create()
    {
        return view('admin.typer-title.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required | max:255'
        ]);

        $title = new TyperTitle();
        $title->title = $request->title;
        $title->save();

        toastr()->success('Created Successfully');
        return redirect()->route('admin.typer-title.index');
    }

    public function show() {}

    public function edit(TyperTitle $typer_title) {
        return view('admin.typer-title.edit', ['title' => $typer_title]);
     }

     public function update(Request $request, TyperTitle $title) {
        $request->validate([
            'title' => 'required',
        ]);

        $title->update([
            'title' => $request->title,
        ]);

        toastr()->success('Updated Successfully');
        return redirect()->route('admin.typer-title.index');
     }

    public function destroy($id)
    {
        $typerTitle = TyperTitle::find($id);
        if ($typerTitle) {
            $typerTitle->delete();
            return response()->json(['success' => 'Deleted successfully']);
        }
        return response()->json(['error' => 'Item not found'], 404);
    }

}
