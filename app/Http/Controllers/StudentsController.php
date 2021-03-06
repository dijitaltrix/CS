<?php

namespace App\Http\Controllers;

use Validator;
use Illuminate\Http\Request;
use App\Models\Student;
use App\Models\Skill;


class StudentsController extends Controller
{
	/**
	 * Show the list of Students
	 *
	 * @param Request $request 
	 * @return View
	 */
	public function getIndex(Request $request)
	{
		$students = Student::search($request->input())
			->paginate(8);

		return view('students/index', [
			'students' => $students,
		]);

	}
	/**
	 * Show the Student view 
	 *
	 * @param Request $request 
	 * @return View
	 */
	public function getView(Request $request, $id)
	{
		$student = Student::with('skills')
			->findOrFail($id);

		return view('students/view', [
			'student' => $student,
		]);

	}
	
	/**
	 * Show the create Student form
	 *
	 * @param Request $request 
	 * @return View
	 */
	public function getCreate(Request $request)
	{
		$student = new Student;

		return view('students/create', [
			'student' => $student,
		]);

	}
	/**
	 * Insert a new Student
	 *
	 * @param Request $request 
	 * @return View
	 */
	public function postInsert(Request $request)
	{
		$student = new Student;
		$validator = Validator::make($request->input(), $student->getInsertRules());

		if ($validator->fails()) {
			return redirect()
				->route('students.insert')
				->withErrors($validator)
				->withInput();
		}

		// fill Student with input data and save 
		$student->fill($request->only('name','email'));
		if ($student->save()) {
			return redirect()->route('students');

		} else {
			// mop up any other issues
			return redirect()
				->route('students.create')
				->withErrors([
					'The student could not be saved'
				])
				->withInput();
		}

	}
	/**
	 * Show the create Student form
	 *
	 * @param Request $request 
	 * @return View
	 */
	public function getEdit(Request $request, $id)
	{
		// get student with their already related students
		$student = Student::with('skills')
			->findOrFail($id);
		// get all skills so that any can be chosen
		$skills = Skill::get();

		return view('students/edit', [
			'student' => $student,
			'skills' => $skills
		]);

	}
	/**
	 * Update an existing Student
	 *
	 * @param Request $request 
	 * @return Redirect
	 */
	public function postUpdate(Request $request, $id)
	{
		$student = Student::findOrFail($id);
		$validator = Validator::make($request->input(), $student->getUpdateRules());

		if ($validator->fails()) {
			return redirect()
				->route('students.edit', $student->id)
				->withErrors($validator)
				->withInput();
		}

		// fill Student with input data and save 
		$student->fill($request->only('name','email'));
		if ($student->save() && $student->skills()->sync($request->input('skills'))) {
			return redirect()->route('students.view', $student->id);

		} else {
			// mop up any other issues
			return redirect()
				->route('students.edit', $student->id)
				->withErrors([
					'The student could not be updated'
				])
				->withInput();
		}

	}
	

}
