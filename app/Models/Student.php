<?php

namespace App\Models;

use Crypt;
use DateTime;
use Illuminate\Database\Eloquent\Model;
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
	public function getDateOfBirth() : DateTime
	{
		return new DateTime(Crypt::decrypt($this->attributes[$name]));
	}
	/**
	 * Encrypts the Students date of birth for storage in the database
	 *
	 * @param string $str 
	 * @return void
	 */
	public function setDateOfBirth($value)
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
	
}
