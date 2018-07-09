<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserLikeController extends Controller
{
    // like store
    public function like(Request $request, $id)
    {
        \Auth::user()->like($id);
        return redirect()->back();
    }
    
    // like destroy
    public function unlike($id)
    {
        \Auth::user()->unlike($id);
        return redirect()->back();
    }
    
    // zuttomo store
    public function zuttomo(Request $request, $id)
    {
        \Auth::user()->zuttomo($id);
        return redirect()->back();
    }
    
    // zuttomo destroy
    public function unzuttomo($id)
    {
        \Auth::user()->unzuttomo($id);
        return redirect()->back();
    }
}
