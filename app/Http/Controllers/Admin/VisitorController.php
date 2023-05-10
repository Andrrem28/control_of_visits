<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Visit\GetConsultVisitor;
use App\Models\Unit;
use App\Models\Visit;
use App\Models\Visitor;
use Exception;
use Illuminate\Http\Request;

class VisitorController extends Controller
{
    public function filterVisitor()
    {
        return view('admin.visits.verification');
    }

    public function consultVisitor(GetConsultVisitor $request)
    {
        try {
            $individualRegistration = $request->get('individual_registration');

            $visitor = Visitor::where('individual_registration', $individualRegistration)->first();

            if($visitor)
            {
                return to_route('admin.visits.create', [
                    'units' => Unit::all(),
                ]);
            } else {
                return to_route('admin.visits.create', [
                    'units' => Unit::all(),
                ]);
            }
        } catch (Exception $e) {
            dd($e->getMessage());
            return view('admin.visits.verification');
        }
    }
}
