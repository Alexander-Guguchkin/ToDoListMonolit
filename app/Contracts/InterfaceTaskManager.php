<?php

namespace App\Contracts;
use Inertia\Response;

interface InterfaceTaskManager
{
    public function index () : Response;
    public function create() : Response;
    public function store() : Response;
    public function show(int $id) : Response;
    public function edit(int $id) : Response;
    public function update(Request $request, int $id) : Response;
    public function destroy(int $id) : Response;
}
