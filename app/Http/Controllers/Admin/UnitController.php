<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Unit\{UnitStoreRequest, UnitUpdateRequest};
use App\Models\Institution;
use App\Models\Unit;
use Exception;
use Illuminate\Support\Facades\DB;

class UnitController extends Controller
{
    public function index()
    {
        return view('admin.units.index',[
            'units' => Unit::all()
        ]);
    }

    public function create()
    {
        return view('admin.units.create', [
            'institutions' => Institution::all()
        ]);
    }

    public function store(UnitStoreRequest $request)
    {
        try {
            DB::beginTransaction();

            Unit::create([
                'name' => $request->get('name'),
                'address' => $request->get('address'),
                'city' => $request->get('city'),
                'state' => $request->get('state'),
                'building_number' => $request->get('building_number'),
                'zip_code' => $request->get('zip_code'),
                'institution_id' => $request->get('institution_id')
            ]);

            DB::commit();

            return to_route('admin.units.index');

        } catch (Exception $e) {

            DB::rollBack();

            return to_route('admin.units.create');
        }
    }

    public function edit(string $unitId)
    {
        return view('admin.units.edit', [
            'unit' => Unit::findOrFail($unitId),
            'institutions' => Institution::all()
        ]);
    }

    public function update(UnitUpdateRequest $request, string $unitId)
    {
        try {
            DB::beginTransaction();

            $unit = Unit::findOrFail($unitId);
            $unit->update([
                'name' => $request->get('name'),
                'address' => $request->get('address'),
                'city' => $request->get('city'),
                'state' => $request->get('state'),
                'building_number' => $request->get('building_number'),
                'zip_code' => $request->get('zip_code'),
                'institution_id' => $request->get('institution_id')
            ]);

            DB::commit();

            return to_route('admin.units.index');

        } catch (Exception $e) {
            DB::rollBack();

            return to_route('admin.units.edit', $unitId);
        }
    }

    public function destroy(string $unitId)
    {
        try {
            DB::beginTransaction();

            $unit = Unit::findOrFail($unitId);
            $unit->delete();

            DB::commit();

            return to_route('admin.units.index');

        } catch (Exception $e) {
            DB::rollBack();

            return to_route('admin.units.index', $unitId);
        }
    }
}
