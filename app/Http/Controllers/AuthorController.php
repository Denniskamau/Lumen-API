<?php
namespace App\Http\Controllers;

use App\Author;
use App\Http\Middleware\Authenticate;
use Illuminate\Http\Request;

class AuthorController extends Controller
{
    public function showAllAuthors()
    {
        return response()->json(Author::all());
    }

    public function showOneAuthor($id)
    {
        return response()->json(Author::find($id));
    }

    public function create(Request $request)
    {
        $author = Author::create($request->all());
        return response()->json($author,201);
    }

    public function update($id, Request $request)
    {
        $author = Author::findorFail($id);
        $author = Author::update($request->all());

        return response()->json($author,200);
    }

    public function delete($id)
    {
        Author::findofFail($id)->delete();
        return response('Deleted successfully',200);
    }
}
