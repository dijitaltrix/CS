<?php

namespace App\Models;

use Crypt;
use DateTime;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Validation\Rule;
use App\Models\Traits\InitialsTrait;


class Student extends Model
{

	use InitialsTrait;
	
    /**
     * The attributes that are mass assignable.
     * @var array
     */
    protected $fillable = [
		'name',
		'date_of_birth',
	];
    /**
     * The table associated with the model.
     * @var string
     */
    protected $table = "students";
	/**
	 * Not using in table timestamps 
	 * @var boolean
	 */
	public $timestamps = false;


	/**
	 * Returns the decrypted Students date of birth as a DateTime object
	 *
	 * @return DateTime
	 */
	public function getDateOfBirthAttribute() : DateTime
	{
		return new DateTime(Crypt::decrypt($this->attributes['date_of_birth']));
	}
	/**
	 * Encrypts the Students date of birth for storage in the database
	 *
	 * @param string $str 
	 * @return void
	 */
	public function setDateOfBirthAttribute($value)
	{
		$this->attributes['date_of_birth'] = Crypt::encrypt($value);
	}
	/**
	 * Returns a Collection of Customers this Student is assigned to
	 *
	 * @return Collection
	 */
	public function customer()
	{
		return $this->belongsToMany(Customer::class, 'customers__students');
	}
	/**
	 * Returns a Collection of Skills this Student has
	 *
	 * @return Collection
	 */
	public function skills()
	{
		return $this->belongsToMany(Skill::class, 'students__skills');
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
			$query->where('name', 'LIKE', "%$search%");
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
			'date_of_birth' => 'required|date',
		];
	}
	/**
	 * Returns an array of update rules for the Validation class
	 *
	 * @return Array
	 */
	public function getUpdateRules() : Array
	{
		return [
			'name' => 'required|string|max:100',
			'date_of_birth' => 'required|date',
			'skills.*' => 'integer'
		];
	}
	
}
