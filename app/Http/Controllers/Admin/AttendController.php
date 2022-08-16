<?php

namespace App\Http\Controllers\Admin;

use App\Helpers\ArabicNumberHandling;
use App\Http\Controllers\Controller;

use App\Http\Requests\AttendStoreRequest;
use App\Models\Voter;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Symfony\Component\HttpFoundation\Response;

class AttendController extends Controller
{
	public function index()
	{
		abort_if(Gate::denies('attend_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

		return view('admin.attends.index');
	}


	public function store(AttendStoreRequest $request, ArabicNumberHandling $numberHandling)
	{
		abort_if(Gate::denies('attend_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');
		$request->merge(['register_number' => $numberHandling($request->register_number)]);
		$result = Voter::query()
			->where(
				$request->only('register_number', 'gender_id', 'committee_id')
			)
			->update(['attended' => 1]);
		if ($result) {
			return redirect()->route('admin.attends.index')->withMessage('تم التحضير');
		} else {
			return redirect()->route('admin.attends.index')->withErrors(['لم يتم العثور على القيد او هو غير تابع لك']);
		}

	}

}
