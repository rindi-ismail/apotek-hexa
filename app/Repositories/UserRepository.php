<?php

namespace App\Repositories;

use App\Models\User as AppUser;

class UserRepository
{

  protected $user;

  public function __construct(AppUser $user)
  {
    $this->user = $user;
  }

  public function create(array $attributes)
  {
    $this->user->name = $attributes['name'];
    $this->user->email = $attributes['email'];
    $this->user->password = bcrypt($attributes['password']);
    $this->user->save();
    return $this->user;
  }
}
