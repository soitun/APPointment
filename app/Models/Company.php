<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\AppointmentType;

class Company extends Model {

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'companies';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['name', 'email', 'address', 'phonenumber'];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = [];

	/**
	 * All the days of the week
	 *
	 * @var Array
	 */
	public $days = [
		'mo' => 'Monday',
		'tu' => 'Tuesday',
		'we' => 'Wednesday',
		'thu' => 'Thursday',
		'fr' => 'Friday',
		'sa' => 'Saturday',
		'su' => 'Sunday'
	];

	/**
	 * Get user
	 *
	 * @return Model
	 */
	public function user()
	{
		return $this->hasOne(User::class);
	}

	/**
	 * A hasMany relationship
	 *
	 * @return App\Models\AppointmentType
	 */
	public function appointmentTypes()
	{
		return $this->hasMany(AppointmentType::class);
	}

	/**
	 * Decode the json array
	 *
	 * @return Object
	 */
	public function openingHours()
	{
		return json_decode($this->opening_hours) ?? $this->days;
	}
}
