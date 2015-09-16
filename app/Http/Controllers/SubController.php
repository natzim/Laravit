<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreSubRequest;
use App\Sub;

class SubController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth', ['except' => ['show']]);
    }

    public function show($name)
    {
        $sub = Sub::where('name', $name)->firstOrFail();
        $posts = $sub->posts()->simplePaginate(15);

        return view('sub.show', compact('sub', 'posts'));
    }

    public function create()
    {
        return view('sub.create');
    }

    public function store(StoreSubRequest $request)
    {
        $sub = Sub::create($request->all());
        $sub->owner()->associate(auth()->user());

        $sub->save();

        return redirect()->route('sub.show', $sub->name);
    }
}
