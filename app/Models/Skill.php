<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Skill extends Model
{
    /**
     * The attributes that are mass assignable.
     * @var array
     */
    protected $fillable = [
		'name',
	];
    /**
     * The table associated with the model.
     * @var string
     */
    protected $table = "skills";
	/**
	 * Not using in table timestamps 
	 * @var boolean
	 */
	public $timestamps = false;


}
