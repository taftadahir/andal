<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreAssetRequest;
use App\Http\Requests\UpdateAssetRequest;
use App\Models\Asset;
use Illuminate\Support\Facades\Storage;
use Inertia\Inertia;

class AssetController extends Controller
{
    public function index()
    {
        $assets = Asset::latest()->paginate(9);
        return Inertia::render('Laru/Asset/Index', [
            'assets' => $assets,
        ]);
    }

    public function show(Asset $asset)
    {

    }

    public function create()
    {
        return Inertia::render('Laru/Asset/Create');
    }

    public function store(StoreAssetRequest $request)
    {
        if ($request->hasFile('asset')) {
            $image_path = $request->file('asset');

            $file = $request->file('asset');
            $extension = $file->clientExtension();
            if ($extension == 'jpg') {
                $file->store('assets', 'public');
            } else {
                $file->store('code', 'public');
            }

            Asset::create([
                'name' => $file->hashName(),
                'original_name' => $file->getClientOriginalName(),
                'extension' => $extension
            ]);
        }

        return redirect()->route('assets.index')->with([
            'success' => 'Asset Created successfull.'
        ]);
    }

    public function edit(Asset $asset)
    {
        return Inertia::render('Laru/Asset/Edit', [
            'asset' => $asset,
        ]);
    }

    public function update(UpdateAssetRequest $request, Asset $asset)
    {
        $validated = $request->validated();
        $asset->update($validated);

        return redirect()->route('assets.index')->with([
            'success' => 'Asset Updated successfull.'
        ]);
    }

    public function destroy(Asset $asset)
    {
        if ($asset->extension == 'jpg') {
            if (Storage::exists('public/assets/' . $asset->name)) {
                Storage::delete('public/assets/' . $asset->name);
            }
        } else {
            if (Storage::exists('public/code/' . $asset->name)) {
                Storage::delete('public/code/' . $asset->name);
            }
        }
        $asset->delete();

        return redirect()->route('assets.index')->with([
            'success' => 'Asset Deleted successfull.'
        ]);
    }
}
