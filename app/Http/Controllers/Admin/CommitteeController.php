<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\CsvImportTrait;
use App\Http\Requests\MassDestroyCommitteeRequest;
use App\Http\Requests\StoreCommitteeRequest;
use App\Http\Requests\UpdateCommitteeRequest;
use App\Models\Committee;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Yajra\DataTables\Facades\DataTables;

class CommitteeController extends Controller
{
    use CsvImportTrait;

    public function index(Request $request)
    {
        abort_if(Gate::denies('committee_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        if ($request->ajax()) {
            $query = Committee::query()->select(sprintf('%s.*', (new Committee())->table));
            $table = Datatables::of($query);

            $table->addColumn('placeholder', '&nbsp;');
            $table->addColumn('actions', '&nbsp;');

            $table->editColumn('actions', function ($row) {
                $viewGate = 'committee_show';
                $editGate = 'committee_edit';
                $deleteGate = 'committee_delete';
                $crudRoutePart = 'committees';

                return view('partials.datatablesActions', compact(
                'viewGate',
                'editGate',
                'deleteGate',
                'crudRoutePart',
                'row'
            ));
            });

            $table->editColumn('id', function ($row) {
                return $row->id ? $row->id : '';
            });
            $table->editColumn('name', function ($row) {
                return $row->name ? $row->name : '';
            });

            $table->rawColumns(['actions', 'placeholder']);

            return $table->make(true);
        }

        return view('admin.committees.index');
    }

    public function create()
    {
        abort_if(Gate::denies('committee_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.committees.create');
    }

    public function store(StoreCommitteeRequest $request)
    {
        $committee = Committee::create($request->all());

        return redirect()->route('admin.committees.index');
    }

    public function edit(Committee $committee)
    {
        abort_if(Gate::denies('committee_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.committees.edit', compact('committee'));
    }

    public function update(UpdateCommitteeRequest $request, Committee $committee)
    {
        $committee->update($request->all());

        return redirect()->route('admin.committees.index');
    }

    public function show(Committee $committee)
    {
        abort_if(Gate::denies('committee_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $committee->load('committeeAssignments', 'committeeVoters');

        return view('admin.committees.show', compact('committee'));
    }

    public function destroy(Committee $committee)
    {
        abort_if(Gate::denies('committee_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $committee->delete();

        return back();
    }

    public function massDestroy(MassDestroyCommitteeRequest $request)
    {
        Committee::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
