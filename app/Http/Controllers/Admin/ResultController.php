<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\CsvImportTrait;
use App\Http\Requests\MassDestroyResultRequest;
use App\Http\Requests\StoreResultRequest;
use App\Http\Requests\UpdateResultRequest;
use App\Models\Candidate;
use App\Models\Committee;
use App\Models\Result;
use App\Models\User;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Yajra\DataTables\Facades\DataTables;

class ResultController extends Controller
{
    use CsvImportTrait;

    public function index(Request $request)
    {
        abort_if(Gate::denies('result_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        if ($request->ajax()) {
            $query = Result::with(['committee', 'candidate', 'admin'])->select(sprintf('%s.*', (new Result())->table));
            $table = Datatables::of($query);

            $table->addColumn('placeholder', '&nbsp;');
            $table->addColumn('actions', '&nbsp;');

            $table->editColumn('actions', function ($row) {
                $viewGate = 'result_show';
                $editGate = 'result_edit';
                $deleteGate = 'result_delete';
                $crudRoutePart = 'results';

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
            $table->editColumn('votes', function ($row) {
                return $row->votes ? $row->votes : '';
            });
            $table->addColumn('committee_name', function ($row) {
                return $row->committee ? $row->committee->name : '';
            });

            $table->addColumn('candidate_name', function ($row) {
                return $row->candidate ? $row->candidate->name : '';
            });

            $table->addColumn('admin_name', function ($row) {
                return $row->admin ? $row->admin->name : '';
            });

            $table->rawColumns(['actions', 'placeholder', 'committee', 'candidate', 'admin']);

            return $table->make(true);
        }

        $committees = Committee::get();
        $candidates = Candidate::get();
        $users      = User::get();

        return view('admin.results.index', compact('committees', 'candidates', 'users'));
    }

    public function create()
    {
        abort_if(Gate::denies('result_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $committees = Committee::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $candidates = Candidate::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $admins = User::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.results.create', compact('admins', 'candidates', 'committees'));
    }

    public function store(StoreResultRequest $request)
    {
        $result = Result::create($request->all());

        return redirect()->route('admin.results.index');
    }

    public function edit(Result $result)
    {
        abort_if(Gate::denies('result_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $committees = Committee::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $candidates = Candidate::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $admins = User::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $result->load('committee', 'candidate', 'admin');

        return view('admin.results.edit', compact('admins', 'candidates', 'committees', 'result'));
    }

    public function update(UpdateResultRequest $request, Result $result)
    {
        $result->update($request->all());

        return redirect()->route('admin.results.index');
    }

    public function show(Result $result)
    {
        abort_if(Gate::denies('result_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $result->load('committee', 'candidate', 'admin');

        return view('admin.results.show', compact('result'));
    }

    public function destroy(Result $result)
    {
        abort_if(Gate::denies('result_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $result->delete();

        return back();
    }

    public function massDestroy(MassDestroyResultRequest $request)
    {
        Result::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
