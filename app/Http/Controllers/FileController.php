<?php

namespace App\Http\Controllers;
use App\Models\Files;
use Illuminate\Http\Request;

class FileController extends Controller
{
    public function showfiles()
    {
        $Files = Files::all();
        return view ('Files.index',compact('Files'));
    }
    public function addfiles()
    {
        return view('Files.create');
    }
    public function storefiles(Request $request)
    {
        $requestData = $request->all();
     
        $fileName = time().$request->file('photo')->getClientOriginalName();
        $path = $request->file('photo')->storeAs('images', $fileName, 'public'); 
        $requestData["photo"] = '/storage/'.$path;
        Files::create($requestData);
        return redirect('add-files')->with('message', 'File Addedd!');  
    }

    // public function homepage()
    // {
    //     $files = Files::all();
    //     return view('homepage',compact('files'));
    // }
}
