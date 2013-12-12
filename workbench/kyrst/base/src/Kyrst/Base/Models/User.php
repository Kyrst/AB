<?php
namespace Kyrst\Base\Models;

use Kyrst\Base\Helpers\Time as Time;

use Toddish\Verify\Models\User as VerifyUser;

class User extends VerifyUser
{
	public static function register($email, $username, $password, $first_name = '', $last_name = '', $birthdate = NULL)
	{
		$email = trim($email);
		$password = trim($password);

		$user = new User;
		$user->email = $email;
		$user->username = trim($username);
		$user->password = $password;
		$user->first_name = trim($first_name);
		$user->last_name = trim($last_name);
		$user->birthdate = trim(date(Time::ISO_DATE_FORMAT, strtotime($birthdate)));
		$user->verified = 1;
		$user->created_at = date(Time::ISO_DATE_FORMAT);
		$user->save();

		\Auth::attempt
		(
			array
			(
				'email' => $email,
				'password' => $password
			),
			true
		);

		$user = \Auth::user();

		return $user;
	}

	public function get_name()
	{
		return $this->first_name . ' ' . $this->last_name;
	}
}