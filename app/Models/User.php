<?php

/**
 * Created by Reliese Model.
 * Date: Sat, 03 Feb 2018 18:52:51 +0000.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class User
 * 
 * @property int $id_user
 * @property string $last_name
 * @property string $first_name
 * @property string $country
 * @property string $city
 * @property string $phone
 * @property string $need
 * @property string $email
 * @property string $password
 * @property int $active
 * @property int $first_connection
 * @property string $remember_token
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 *
 * @package App\Models
 */
class User extends Eloquent
{
	protected $primaryKey = 'id_user';

	protected $casts = [
		'active' => 'int',
        'password' => 'string'
	];

	protected $hidden = [
		'remember_token'
	];

	protected $fillable = [
		'email',
        'last_name',
        'first_name',
        'password',
        'country',
        'city',
        'phone',
        'need',
		'active',
        'first_connection',
		'remember_token'
	];
}
