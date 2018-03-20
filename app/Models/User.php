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
 * @property string $email
 * @property int $active
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
		'id_facebook' => 'int'
	];

	protected $hidden = [
		'remember_token'
	];

	protected $fillable = [
		'email',
		'active',
		'remember_token',
        'password'
	];
}
