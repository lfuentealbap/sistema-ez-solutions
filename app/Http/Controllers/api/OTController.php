<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Http\Requests\OTRequest;
use App\Models\OT;
use Illuminate\Http\Request;

class OTController extends Controller
{
    public function index()
    {
        $ots = OT::all();
        return \response($ots);
    }


    public function store(OTRequest $request)
    {
        $ot = OT::create($request->validated());
        return \response($ot);

    }

    public function show(OT $ot)
    {
        $ot = OT::findOrFail($ot->id);
        return \response($ot);
    }


    public function update(OTRequest $request, OT $ot)
    {
        $ot = OT::findOrFail($ot->id)->update($request->validated());
        return \response($ot);
    }

    public function destroy(OT $ot)
    {
        $ots = OT::destroy($ot->id);
        return \response("OT eliminado");
    }
}
