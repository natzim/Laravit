<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\Sub\SubRepositoryInterface as Sub;

class SubController extends Controller
{
    private $sub;

    public function __construct(Sub $sub)
    {
        $this->sub = $sub;

        $this->middleware('auth', ['except' => ['show']]);
    }

    public function show($name)
    {
        $sub = $this->sub->find($name);

        return view('subs.show', compact('sub'));
    }

    public function create()
    {
        return view('subs.create');
    }

    public function store(Request $request)
    {
        $sub = $this->sub->store($request);

        return redirect()->route('subs.show', $sub->name);
    }
}
