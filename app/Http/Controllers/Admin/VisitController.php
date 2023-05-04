<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Visit\VisitStoreRequest;
use App\Http\Requests\Admin\Visit\VisitUpdateRequest;
use App\Models\Unit;
use App\Models\Visit;
use App\Models\Visitor;
use Exception;
use Illuminate\Support\Facades\DB;

class VisitController extends Controller
{
    public function index()
    {
        return view('admin.visits.index', [
            'visits' => Visit::all()
        ]);
    }

    public function create()
    {
        return view('admin.visits.create', [
            'units' => Unit::all()
        ]);
    }

    public function store(VisitStoreRequest $request)
    {
        try {
            DB::beginTransaction();

            $visitor = Visitor::create([
                'name' => $request->get('name'),
                'individual_registration' => $request->get('individual_registration'),
                'general_record' => $request->get('general_record'),
                'phone_number' => $request->get('phone_number'),
                'image' => $request->file('image')->store('public/images')
            ]);

            Visit::create([
                'visitor_id' => $visitor->id,
                'date' => $request->get('date'),
                'status' => $request->get('status'),
                'unit_id' => $request->get('unit_id'),
            ]);

            notify()->success('Visitante cadastrado com sucesso.', 'Informação!');

            DB::commit();

            return to_route('admin.visits.index');

        } catch (Exception $e) {
            DB::rollBack();

            return to_route('admin.visits.create');
        }
    }

    public function edit(string $visitId)
    {
        return view('admin.visits.edit', [
            'visit' => Visit::findOrFail($visitId),
            'units' => Unit::all()
        ]);
    }

    public function update(VisitUpdateRequest $request, string $visitId)
    {
        try {
            DB::beginTransaction();

            $visit = Visit::findOrFail($visitId);
            $visit->update([
                'date' => $request->get('date'),
                'status' => $request->get('status'),
                'unit_id' => $request->get('unit_id'),
            ]);

            $visitor = $visit->visitor;

            $visitor->update([
                'name' => $request->get('name'),
                'individual_registration' => $request->get('individual_registration'),
                'general_record' => $request->get('general_record'),
                'phone_number' => $request->get('phone_number'),
                'image' => $request->file('image')->store('public/images'),
            ]);

            notify()->success('Visitante atualizado com sucesso.', 'Informação!');

            DB::commit();

            return to_route('admin.visits.index');

        } catch (Exception $e) {
            DB::rollBack();

            return to_route('admin.visits.edit', [$visitId]);
        }
    }

    public function destroy(string $visitId)
    {
        try {
            DB::beginTransaction();

            $visit = Visit::findOrFail($visitId);
            $visit->delete();

            notify()->success('Visitante deletedo(a) com sucesso.', 'Informação!');

            DB::commit();

            return to_route('admin.visits.index');
        } catch (Exception $e) {
            DB::rollBack();

            return to_route('admin.visits.index');
        }
    }
}
