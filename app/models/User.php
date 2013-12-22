<?php
use Kyrst\Base\Models\User as KyrstUser;

class User extends KyrstUser
{
	protected $table = 'users';

	protected $hidden = array('password');
}