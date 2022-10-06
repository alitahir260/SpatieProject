<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;

class InlineController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $users = User::get();
        return view('admin.Modal.inlineData', compact('users'));
    }

    /**
     * Write code for update
     *
     * @return response()
     */
    public function update(Request $request)
    {
        if ($request->ajax()) {
            User::find($request->pk)
                ->update([
                    $request->name => $request->value
                ]);
  
            return response()->json(['success' => true]);
        }
    }

    /**
     * Write code for delete
     *
     * @return response()
     */
    public function delete($id)
    {
        $product = User::find($id);
        $product->delete();
        return response()->json(['success' => 'success']);
    }
}
