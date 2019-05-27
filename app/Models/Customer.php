<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Traits\InitialsTrait;


class Customer extends Model
{

	use InitialsTrait;


	/**
	 * The attributes that are mass assignable.
	 * @var array
	 */
	protected $fillable = [
		'name',
		'email',
		'telephone',
	];
	/**
	 * The table associated with the model.
	 * @var string
	 */
	protected $table = "customers";
	/**
	 * Not using in table timestamps 
	 * @var boolean
	 */
	public $timestamps = false;


	/**
	 * Returns a Collection of Students belonging to this Customer
	 *
	 * @return Collection
	 */
	public function students()
	{
		return $this->belongsToMany(Student::class, 'customers__students');
	}
	/**
	 * Filter the Collection by user supplied input
	 *
	 * @param Array $input 
	 * @return Query
	 */
	public function scopeSearch($query, Array $input)
	{
		// set variables to filter on
		$search = (isset($input['search'])) ? $input['search'] : null;
		// filter input, we could use filter_var functions too (or filter class!)
		$search = preg_replace('[^a-z0-9\s]', '', $search);
		// amend query if we have something to search on
		if ( ! empty($search)) {
			$query = $query->where(function($query) use ($search) {
				$query->where('name', 'LIKE', "%$search%");
				$query->orWhere('email', 'LIKE', "%$search%");
			});
		}
		
		return $query;

	}
	/**
	 * Returns an array of insert rules for the Validation class
	 *
	 * @return Array
	 */
	public function getInsertRules() : Array
	{
		return [
			'name' => 'required|string|max:100',
			'email' => 'required|email|unique:customers,email',
			'telephone' => 'digits|max:25',
		];
	}
	/**
	 * Returns an array of edit rules for the Validation class
	 *
	 * @return Array
	 */
	public function getEditRules() : Array
	{
		return $this->insertRules();
	}

}
