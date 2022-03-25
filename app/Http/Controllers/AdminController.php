<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Question;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    //
    public function index()
    {
        $questions = Question::orderBy('id', 'DESC')->get();
        $first = Question::first();
        $q = Question::pluck('id')->all();
        $comment = Comment::where('question', $q)->count();
        return view('index', compact('questions', 'first', 'comment'));
    }
    public function register()
    {
        return view('register');
    }
    public function store(Request $request)
    {
        $data = $request->all();
        $user = User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
        ]);
        auth()->login($user);
        return redirect()->route('homepage');
    }
}
