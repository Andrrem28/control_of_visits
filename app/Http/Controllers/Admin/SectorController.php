<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Sector\{SectorStoreRequest, SectorUpdateRequest};
use App\Models\Sector;
use App\Models\Unit;
use Exception;
use Illuminate\Support\Facades\DB;

class SectorController extends Controller
{
    public function index()
    {
        return view('admin.sectors.index', [
            'sectors' => Sector::all()
        ]);
    }

    public function create()
    {
        return view('admin.sectors.create', [
            'units' => Unit::all()
        ]);
    }

    public function store(SectorStoreRequest $request)
    {
        try {
            DB::beginTransaction();

            Sector::create([
                'name' => $request->get('name'),
                'unit_id' => $request->get('unit_id')
            ]);

            DB::commit();

            return to_route('admin.sectors.index');

        } catch (Exception $e) {
            DB::rollBack();

            return to_route('admin.sectors.create');
        }
    }

    public function edit(string $sectorId)
    {
        return view('admin.sectors.edit', [
            'sector' => Sector::findOrFail($sectorId),
            'units' => Unit::all()
        ]);
    }

    public function update(SectorUpdateRequest $request, string $sectorId)
    {
        try {
            DB::beginTransaction();

            $sector = Sector::findOrFail($sectorId);
            $sector->update([
                'name' => $request->get('name'),
                'unit_id' => $request->get('unit_id')
            ]);

            DB::commit();

            return to_route('admin.sectors.index');

        } catch (Exception $e) {
            DB::rollBack();

            return to_route('admin.sectors.edit', $sectorId);
        }
    }

    public function destroy(string $sectorId)
    {
        try {
            DB::beginTransaction();

            $sector = Sector::findOrFail($sectorId);
            $sector->delete();

            DB::commit();

            return to_route('admin.sectors.index');
        } catch (Exception $e) {
            DB::rollBack();

            return to_route('admin.sectors.index');
        }
    }
}