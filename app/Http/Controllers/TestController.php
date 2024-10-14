<?php

namespace App\Http\Controllers;

use App\Models\Test;
use Illuminate\Http\Request;

class TestController extends Controller
{

    public function store(Request $request)
    {
        $request->validate([
            'about' => 'required|string|max:500',
        ]);

        $about = $request->input('about');

        $test = new Test();
        $test->about = $about;
        $test->save();

        return back()->with('success', 'About bilgisi başarıyla kaydedildi!');
    }
}
