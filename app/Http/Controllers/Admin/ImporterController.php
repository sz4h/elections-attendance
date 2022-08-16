<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyImporterRequest;
use App\Http\Requests\StoreImporterRequest;
use App\Http\Requests\UpdateImporterRequest;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class ImporterController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('importer_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.importers.index');
    }

    public function create()
    {
        abort_if(Gate::denies('importer_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.importers.create');
    }

    public function store(StoreImporterRequest $request)
    {
        $importer = Importer::create($request->all());

        return redirect()->route('admin.importers.index');
    }

    public function edit(Importer $importer)
    {
        abort_if(Gate::denies('importer_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.importers.edit', compact('importer'));
    }

    public function update(UpdateImporterRequest $request, Importer $importer)
    {
        $importer->update($request->all());

        return redirect()->route('admin.importers.index');
    }

    public function show(Importer $importer)
    {
        abort_if(Gate::denies('importer_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.importers.show', compact('importer'));
    }

    public function destroy(Importer $importer)
    {
        abort_if(Gate::denies('importer_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $importer->delete();

        return back();
    }

    public function massDestroy(MassDestroyImporterRequest $request)
    {
        Importer::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
