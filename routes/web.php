<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::redirect('/', '/login');
Route::get('/home', function () {
	if (session('status')) {
		return redirect()->route('admin.home')->with('status', session('status'));
	}

	return redirect()->route('admin.home');
});

Auth::routes(['register' => false]);

Route::group(['prefix' => 'admin', 'as' => 'admin.', 'namespace' => 'Admin', 'middleware' => ['auth']], function () {
	Route::get('/', 'HomeController@index')->name('home');
	// Permissions
	Route::delete('permissions/destroy', 'PermissionsController@massDestroy')->name('permissions.massDestroy');
	Route::resource('permissions', 'PermissionsController');

	// Roles
	Route::delete('roles/destroy', 'RolesController@massDestroy')->name('roles.massDestroy');
	Route::resource('roles', 'RolesController');

	// Users
	Route::delete('users/destroy', 'UsersController@massDestroy')->name('users.massDestroy');
	Route::resource('users', 'UsersController');

	// Candidate
	Route::delete('candidates/destroy', 'CandidateController@massDestroy')->name('candidates.massDestroy');
	Route::post('candidates/parse-csv-import', 'CandidateController@parseCsvImport')->name('candidates.parseCsvImport');
	Route::post('candidates/process-csv-import',
		'CandidateController@processCsvImport')->name('candidates.processCsvImport');
	Route::resource('candidates', 'CandidateController');

	// Committee
	Route::delete('committees/destroy', 'CommitteeController@massDestroy')->name('committees.massDestroy');
	Route::post('committees/parse-csv-import', 'CommitteeController@parseCsvImport')->name('committees.parseCsvImport');
	Route::post('committees/process-csv-import',
		'CommitteeController@processCsvImport')->name('committees.processCsvImport');
	Route::resource('committees', 'CommitteeController');

	// Area
	Route::delete('areas/destroy', 'AreaController@massDestroy')->name('areas.massDestroy');
	Route::post('areas/parse-csv-import', 'AreaController@parseCsvImport')->name('areas.parseCsvImport');
	Route::post('areas/process-csv-import', 'AreaController@processCsvImport')->name('areas.processCsvImport');
	Route::resource('areas', 'AreaController');

	// Gender
	Route::delete('genders/destroy', 'GenderController@massDestroy')->name('genders.massDestroy');
	Route::resource('genders', 'GenderController');

	// Letter
	Route::delete('letters/destroy', 'LetterController@massDestroy')->name('letters.massDestroy');
	Route::post('letters/parse-csv-import', 'LetterController@parseCsvImport')->name('letters.parseCsvImport');
	Route::post('letters/process-csv-import', 'LetterController@processCsvImport')->name('letters.processCsvImport');
	Route::resource('letters', 'LetterController');

	// Assignment
	Route::delete('assignments/destroy', 'AssignmentController@massDestroy')->name('assignments.massDestroy');
	Route::post('assignments/parse-csv-import',
		'AssignmentController@parseCsvImport')->name('assignments.parseCsvImport');
	Route::post('assignments/process-csv-import',
		'AssignmentController@processCsvImport')->name('assignments.processCsvImport');
	Route::resource('assignments', 'AssignmentController');

	// Voter
	Route::delete('voters/destroy', 'VoterController@massDestroy')->name('voters.massDestroy');
	Route::post('voters/parse-csv-import', 'VoterController@parseCsvImport')->name('voters.parseCsvImport');
	Route::post('voters/process-csv-import', 'VoterController@processCsvImport')->name('voters.processCsvImport');
	Route::resource('voters', 'VoterController');

	// Result
	Route::delete('results/destroy', 'ResultController@massDestroy')->name('results.massDestroy');
	Route::post('results/parse-csv-import', 'ResultController@parseCsvImport')->name('results.parseCsvImport');
	Route::post('results/process-csv-import', 'ResultController@processCsvImport')->name('results.processCsvImport');
	Route::resource('results', 'ResultController');

	// Importer
	Route::delete('importers/destroy', 'ImporterController@massDestroy')->name('importers.massDestroy');
	Route::resource('importers', 'ImporterController');

	// Attend
	Route::get('attends', 'AttendController@index')->name('attends.index');
	Route::post('attends', 'AttendController@store')->name('attends.store');

	// Report
	Route::delete('reports/destroy', 'ReportController@massDestroy')->name('reports.massDestroy');
	Route::resource('reports', 'ReportController');

	// Audit Logs
	Route::resource('audit-logs', 'AuditLogsController',
		['except' => ['create', 'store', 'edit', 'update', 'destroy']]);

	Route::get('global-search', 'GlobalSearchController@search')->name('globalSearch');
});
Route::group(['prefix' => 'profile', 'as' => 'profile.', 'namespace' => 'Auth', 'middleware' => ['auth']], function () {
	// Change password
	if (file_exists(app_path('Http/Controllers/Auth/ChangePasswordController.php'))) {
		Route::get('password', 'ChangePasswordController@edit')->name('password.edit');
		Route::post('password', 'ChangePasswordController@update')->name('password.update');
		Route::post('profile', 'ChangePasswordController@updateProfile')->name('password.updateProfile');
		Route::post('profile/destroy', 'ChangePasswordController@destroy')->name('password.destroyProfile');
	}
});
