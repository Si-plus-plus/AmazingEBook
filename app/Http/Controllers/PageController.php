<?php

namespace App\Http\Controllers;

use App\Models\EBook;
use Illuminate\Http\Request;

class PageController extends Controller
{
    public function home() {
        return view('home', [
            'ebooks' => EBook::orderBy('title')->paginate(9),
        ]);
    }

    public function setlanguage($lang) {
        app()->setLocale($lang);
        session()->put('locale', $lang);
        return redirect()->back()->with(['success' => 'Language changed successfully']);
    }
}
