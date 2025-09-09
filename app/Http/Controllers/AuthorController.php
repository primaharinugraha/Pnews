<?php

namespace App\Http\Controllers;

use App\Models\Author;
use Illuminate\Http\Request;

class AuthorController extends Controller
{
    public function show($ussername){
        $author = Author::where('ussername', $ussername)->first();
        return view('pages.author.show', compact('author'));
    }
}
