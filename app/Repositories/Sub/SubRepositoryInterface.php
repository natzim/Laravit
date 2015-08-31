<?php

namespace App\Repositories\Sub;

use Illuminate\Http\Request;

interface SubRepositoryInterface
{
    public function all();
    public function find($name);
    public function store(Request $request);
}
