<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\CsvImportTrait;
use App\Http\Requests\MassDestroyLetterRequest;
use App\Http\Requests\StoreLetterRequest;
use App\Http\Requests\UpdateLetterRequest;
use App\Models\Letter;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Yajra\DataTables\Facades\DataTables;

class LetterController extends Controller
{
    use CsvImportTrait;

    public function index(Request $request)
    {
        abort_if(Gate::denies('letter_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        if ($request->ajax()) {
            $query = Letter::query()->select(sprintf('%s.*', (new Letter())->table));
            $table = Datatables::of($query);

            $table->addColumn('placeholder', '&nbsp;');
            $table->addColumn('actions', '&nbsp;');

            $table->editColumn('actions', function ($row) {
                $viewGate = 'letter_show';
                $editGate = 'letter_edit';
                $deleteGate = 'letter_delete';
                $crudRoutePart = 'letters';

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

        return view('admin.letters.index');
    }

    public function create()
    {
        abort_if(Gate::denies('letter_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.letters.create');
    }

    public function store(StoreLetterRequest $request)
    {
        $letter = Letter::create($request->all());

        return redirect()->route('admin.letters.index');
    }

    public function edit(Letter $letter)
    {
        abort_if(Gate::denies('letter_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.letters.edit', compact('letter'));
    }

    public function update(UpdateLetterRequest $request, Letter $letter)
    {
        $letter->update($request->all());

        return redirect()->route('admin.letters.index');
    }

    public function show(Letter $letter)
    {
        abort_if(Gate::denies('letter_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $letter->load('letterVoters', 'letterAssignments');

        return view('admin.letters.show', compact('letter'));
    }

    public function destroy(Letter $letter)
    {
        abort_if(Gate::denies('letter_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $letter->delete();

        return back();
    }

    public function massDestroy(MassDestroyLetterRequest $request)
    {
        Letter::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
