<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\CsvImportTrait;
use App\Http\Requests\MassDestroyVoterRequest;
use App\Http\Requests\StoreVoterRequest;
use App\Http\Requests\UpdateVoterRequest;
use App\Models\Area;
use App\Models\Committee;
use App\Models\Gender;
use App\Models\Letter;
use App\Models\User;
use App\Models\Voter;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Yajra\DataTables\Facades\DataTables;

class VoterController extends Controller
{
    use CsvImportTrait;

    public function index(Request $request)
    {
        abort_if(Gate::denies('voter_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        if ($request->ajax()) {
            $query = Voter::with(['gender', 'letter', 'area', 'committee', 'admin'])->select(sprintf('%s.*', (new Voter())->table));
            $table = Datatables::of($query);

            $table->addColumn('placeholder', '&nbsp;');
            $table->addColumn('actions', '&nbsp;');

            $table->editColumn('actions', function ($row) {
                $viewGate = 'voter_show';
                $editGate = 'voter_edit';
                $deleteGate = 'voter_delete';
                $crudRoutePart = 'voters';

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
            $table->editColumn('parlmaint_no', function ($row) {
                return $row->parlmaint_no ? $row->parlmaint_no : '';
            });
            $table->editColumn('parlmaint_name', function ($row) {
                return $row->parlmaint_name ? $row->parlmaint_name : '';
            });
            $table->editColumn('parlmaint_type', function ($row) {
                return $row->parlmaint_type ? $row->parlmaint_type : '';
            });
            $table->addColumn('gender_name', function ($row) {
                return $row->gender ? $row->gender->name : '';
            });

            $table->editColumn('register_number', function ($row) {
                return $row->register_number ? $row->register_number : '';
            });
            $table->editColumn('moi_reference', function ($row) {
                return $row->moi_reference ? $row->moi_reference : '';
            });
            $table->editColumn('full_name', function ($row) {
                return $row->full_name ? $row->full_name : '';
            });
            $table->editColumn('register_status', function ($row) {
                return $row->register_status ? $row->register_status : '';
            });
            $table->editColumn('phone', function ($row) {
                return $row->phone ? $row->phone : '';
            });
            $table->editColumn('attended', function ($row) {
                return '<input type="checkbox" disabled ' . ($row->attended ? 'checked' : null) . '>';
            });
            $table->editColumn('targeted', function ($row) {
                return '<input type="checkbox" disabled ' . ($row->targeted ? 'checked' : null) . '>';
            });
            $table->addColumn('area_name', function ($row) {
                return $row->area ? $row->area->name : '';
            });

            $table->addColumn('committee_name', function ($row) {
                return $row->committee ? $row->committee->name : '';
            });

            $table->addColumn('admin_name', function ($row) {
                return $row->admin ? $row->admin->name : '';
            });

            $table->rawColumns(['actions', 'placeholder', 'gender', 'attended', 'targeted', 'area', 'committee', 'admin']);

            return $table->make(true);
        }

        $genders    = Gender::get();
        $letters    = Letter::get();
        $areas      = Area::get();
        $committees = Committee::get();
        $users      = User::get();

        return view('admin.voters.index', compact('genders', 'letters', 'areas', 'committees', 'users'));
    }

    public function create()
    {
        abort_if(Gate::denies('voter_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $genders = Gender::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $letters = Letter::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $areas = Area::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $committees = Committee::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $admins = User::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.voters.create', compact('admins', 'areas', 'committees', 'genders', 'letters'));
    }

    public function store(StoreVoterRequest $request)
    {
        $voter = Voter::create($request->all());

        return redirect()->route('admin.voters.index');
    }

    public function edit(Voter $voter)
    {
        abort_if(Gate::denies('voter_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $genders = Gender::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $letters = Letter::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $areas = Area::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $committees = Committee::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $admins = User::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $voter->load('gender', 'letter', 'area', 'committee', 'admin');

        return view('admin.voters.edit', compact('admins', 'areas', 'committees', 'genders', 'letters', 'voter'));
    }

    public function update(UpdateVoterRequest $request, Voter $voter)
    {
        $voter->update($request->all());

        return redirect()->route('admin.voters.index');
    }

    public function show(Voter $voter)
    {
        abort_if(Gate::denies('voter_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $voter->load('gender', 'letter', 'area', 'committee', 'admin');

        return view('admin.voters.show', compact('voter'));
    }

    public function destroy(Voter $voter)
    {
        abort_if(Gate::denies('voter_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $voter->delete();

        return back();
    }

    public function massDestroy(MassDestroyVoterRequest $request)
    {
        Voter::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
