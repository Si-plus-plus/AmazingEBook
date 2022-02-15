<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\EBook;

class EBookController extends Controller
{
    public function show($id)
    {
        return view('pages.ebook', [
            'ebook' => EBook::find($id),
        ]);
    }
}
