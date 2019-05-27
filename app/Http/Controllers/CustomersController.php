<?php

namespace App\Http\Controllers;

use Validator;
use Illuminate\Http\Request;
use App\Models\Customer;
use App\Models\Student;


class CustomersController extends Controller
{
	/**
	 * Show the list of Customers
	 *
	 * @param Request $request 
	 * @return View
	 */
	public function getIndex(Request $request)
	{
		$customers = Customer::search($request->input())
			->paginate(8);

		return view('customers/index', [
			'customers' => $customers,
		]);

	}
	/**
	 * Show the Customer view 
	 *
	 * @param Request $request 
	 * @return View
	 */
	public function getView(Request $request, $id)
	{
		$customer = Customer::with('students.skills')
			->findOrFail($id);

		return view('customers/view', [
			'customer' => $customer,
		]);

	}
	
	/**
	 * Show the create Customer form
	 *
	 * @param Request $request 
	 * @return View
	 */
	public function getCreate(Request $request)
	{
		$customer = new Customer;

		return view('customers/create', [
			'customer' => $customer,
		]);

	}
	/**
	 * Insert a new Customer
	 *
	 * @param Request $request 
	 * @return View
	 */
	public function postInsert(Request $request)
	{
		$customer = new Customer;
		$validator = Validator::make($request->input(), $customer->getInsertRules());

		if ($validator->fails()) {
			return redirect()
				->route('customers.insert')
				->withErrors($validator)
				->withInput();
		}

		// fill Customer with input data and save 
		$customer->fill($request->only('name','email'));
		if ($customer->save()) {
			return redirect()->route('customers');

		} else {
			// mop up any other issues
			return redirect()
				->route('customers.create')
				->withErrors([
					'The customer could not be saved'
				])
				->withInput();
		}

	}
	/**
	 * Show the create Customer form
	 *
	 * @param Request $request 
	 * @return View
	 */
	public function getEdit(Request $request, $id)
	{
		// get customer with their already related students
		$customer = Customer::with('students')
			->findOrFail($id);
		// get all students so that any can be chosen
		$students = Student::get();

		return view('customers/edit', [
			'customer' => $customer,
			'students' => $students
		]);

	}
	/**
	 * Update an existing Customer
	 *
	 * @param Request $request 
	 * @return Redirect
	 */
	public function postUpdate(Request $request, $id)
	{
		$customer = Customer::findOrFail($id);
		$validator = Validator::make($request->input(), $customer->getUpdateRules());

		if ($validator->fails()) {
			return redirect()
				->route('customers.edit', $customer->id)
				->withErrors($validator)
				->withInput();
		}

		// fill Customer with input data and save 
		$customer->fill($request->only('name','email','students'));
		if ($customer->save() && $customer->students()->sync($request->input('students'))) {
			return redirect()->route('customers.view', $customer->id);

		} else {
			// mop up any other issues
			return redirect()
				->route('customers.edit', $customer->id)
				->withErrors([
					'The customer could not be updated'
				])
				->withInput();
		}

	}

}
