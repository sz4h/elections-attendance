<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\CsvImportTrait;
use App\Http\Requests\MassDestroyAssignmentRequest;
use App\Http\Requests\StoreAssignmentRequest;
use App\Http\Requests\UpdateAssignmentRequest;
use App\Models\Area;
use App\Models\Assignment;
use App\Models\Committee;
use App\Models\Gender;
use App\Models\Letter;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Yajra\DataTables\Facades\DataTables;

class AssignmentController extends Controller
{
    use CsvImportTrait;

    public function index(Request $request)
    {
        abort_if(Gate::denies('assignment_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        if ($request->ajax()) {
            $query = Assignment::with(['committee', 'area', 'gender', 'letters'])->select(sprintf('%s.*', (new Assignment())->table));
            $table = Datatables::of($query);

            $table->addColumn('placeholder', '&nbsp;');
            $table->addColumn('actions', '&nbsp;');

            $table->editColumn('actions', function ($row) {
                $viewGate = 'assignment_show';
                $editGate = 'assignment_edit';
                $deleteGate = 'assignment_delete';
                $crudRoutePart = 'assignments';

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
            $table->addColumn('committee_name', function ($row) {
                return $row->committee ? $row->committee->name : '';
            });

            $table->addColumn('area_name', function ($row) {
                return $row->area ? $row->area->name : '';
            });

            $table->addColumn('gender_name', function ($row) {
                return $row->gender ? $row->gender->name : '';
            });

            $table->editColumn('from', function ($row) {
                return $row->from ? $row->from : '';
            });
            $table->editColumn('to', function ($row) {
                return $row->to ? $row->to : '';
            });
            $table->editColumn('letter', function ($row) {
                $labels = [];
                foreach ($row->letters as $letter) {
                    $labels[] = sprintf('<span class="label label-info label-many">%s</span>', $letter->name);
                }

                return implode(' ', $labels);
            });

            $table->rawColumns(['actions', 'placeholder', 'committee', 'area', 'gender', 'letter']);

            return $table->make(true);
        }

        return view('admin.assignments.index');
    }

    public function create()
    {
        abort_if(Gate::denies('assignment_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $committees = Committee::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $areas = Area::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $genders = Gender::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $letters = Letter::pluck('name', 'id');

        return view('admin.assignments.create', compact('areas', 'committees', 'genders', 'letters'));
    }

    public function store(StoreAssignmentRequest $request)
    {
        $assignment = Assignment::create($request->all());
        $assignment->letters()->sync($request->input('letters', []));

        return redirect()->route('admin.assignments.index');
    }

    public function edit(Assignment $assignment)
    {
        abort_if(Gate::denies('assignment_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $committees = Committee::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $areas = Area::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $genders = Gender::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $letters = Letter::pluck('name', 'id');

        $assignment->load('committee', 'area', 'gender', 'letters');

        return view('admin.assignments.edit', compact('areas', 'assignment', 'committees', 'genders', 'letters'));
    }

    public function update(UpdateAssignmentRequest $request, Assignment $assignment)
    {
        $assignment->update($request->all());
        $assignment->letters()->sync($request->input('letters', []));

        return redirect()->route('admin.assignments.index');
    }

    public function show(Assignment $assignment)
    {
        abort_if(Gate::denies('assignment_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $assignment->load('committee', 'area', 'gender', 'letters');

        return view('admin.assignments.show', compact('assignment'));
    }

    public function destroy(Assignment $assignment)
    {
        abort_if(Gate::denies('assignment_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $assignment->delete();

        return back();
    }

    public function massDestroy(MassDestroyAssignmentRequest $request)
    {
        Assignment::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
