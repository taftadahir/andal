<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreAssetRequest;
use App\Http\Requests\UpdateAssetRequest;
use App\Models\Asset;
use Illuminate\Http\Request;
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

    }

    public function store(StoreAssetRequest $request)
    {

    }

    public function edit(Asset $asset)
    {
        return "Edit";
    }

    public function update(UpdateAssetRequest $request, Asset $asset)
    {

    }

    public function destroy(Asset $asset)
    {
        return "Destroy";
    }
}
