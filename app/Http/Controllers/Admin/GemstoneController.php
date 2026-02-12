<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\GemstoneRequest;
use App\Models\Gemstone;

class GemstoneController extends Controller
{
    public function index()
    {
        return view('admin.gemstones.index', [
            'gemstones' => Gemstone::orderByDesc('id')->get(),
        ]);
    }

    public function create()
    {
        return view('admin.gemstones.create');
    }

    public function store(GemstoneRequest $request)
    {
        $data = $request->validated();
        $data['is_featured'] = $request->boolean('is_featured');

        Gemstone::create($data);

        return redirect()->route('admin.gemstones.index')
            ->with('status', 'Gemstone created successfully.');
    }

    public function edit(Gemstone $gemstone)
    {
        return view('admin.gemstones.edit', ['gemstone' => $gemstone]);
    }

    public function update(GemstoneRequest $request, Gemstone $gemstone)
    {
        $data = $request->validated();
        $data['is_featured'] = $request->boolean('is_featured');

        $gemstone->update($data);

        return redirect()->route('admin.gemstones.index')
            ->with('status', 'Gemstone updated successfully.');
    }

    public function destroy(Gemstone $gemstone)
    {
        $gemstone->delete();

        return redirect()->route('admin.gemstones.index')
            ->with('status', 'Gemstone deleted successfully.');
    }
}
