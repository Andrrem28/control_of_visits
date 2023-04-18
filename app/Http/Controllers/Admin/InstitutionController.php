<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Institution\{InstitutionStoreRequest, InstitutionUpdateRequest};
use App\Models\Institution;
use Exception;
use Illuminate\Support\Facades\DB;

class InstitutionController extends Controller
{
    public function index()
    {
        return view('admin.institutions.index', [
            'institutions' => Institution::all()
        ]);
    }

    public function create()
    {
        return view('admin.institutions.create');
    }

    public function store(InstitutionStoreRequest $request)
    {
        try {
            DB::beginTransaction();

            Institution::create([
                'name' => $request->get('name'),
                'address' => $request->get('address'),
                'building_number' => $request->get('building_number'),
                'city' => $request->get('city'),
                'state' => $request->get('state'),
                'zip_code' => $request->get('zip_code')
            ]);

            DB::commit();

           // dd($request);

            // notify()->preset('institution-created');

            return to_route('admin.institutions.index');

        } catch (Exception $e) {
            DB::rollBack();

            return to_route('admin.institutions.create');
        }

    }

    public function edit(string $institutionId)
    {
        return view('admin.institutions.edit', [
            'institution' => Institution::findOrFail($institutionId)
        ]);
    }

    public function update(InstitutionUpdateRequest $request, string $institutionId)
    {
        try {
            DB::beginTransaction();

            $institution = Institution::findOrFail($institutionId);
            $institution->update([
                'name' => $request->get('name'),
                'address' => $request->get('address'),
                'building_number' => $request->get('building_number'),
                'city' => $request->get('city'),
                'state' => $request->get('state'),
                'zip_code' => $request->get('zip_code')
            ]);

            DB::commit();

            return to_route('admin.institutions.index');

        } catch (Exception $e) {
            DB::rollBack();

            return to_route('admin.institutions.edit', $institutionId);
        }
    }

    public function destroy(string $institutionId)
    {
        try {
            DB::beginTransaction();

            $institution = Institution::findOrFail($institutionId);
            $institution->delete();

            DB::commit();

            return to_route('admin.institutions.index');

        } catch (Exception $e) {
            DB::rollBack();

            return to_route('admin.institutions.index', $institutionId);
        }
    }
}
