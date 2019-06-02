<?php

namespace App\Repositories\User;

use App\User;

class EloquentUser implements UserRepository
{

    /**
     * {@inheritdoc}
     */
    public function all()
    {
        return User::all();
    }

    /**
     * {@inheritdoc}
     */
    public function find($id)
    {
        return User::find($id);
    }

    /**
     * {@inheritdoc}
     */
    public function findByEmail($email)
    {
        return User::where('email', $email)->first();
    }

    /**
     * {@inheritdoc}
     */
    public function create(array $data)
    {
        $data['verified'] = 1;
        return User::create($data);
    }

    /**
     * {@inheritdoc}
     */
    public function update($id, array $data)
    {

        $user = $this->find($id);

        $user->update($data);

        return $user;
    }

    /**
     * {@inheritdoc}
     */
    public function delete($id)
    {
        $user = $this->find($id);

        return $user->delete();
    }

    /**
     * {@inheritdoc}
     */
    public function count()
    {
        return User::count();
    }

    /**
     * {@inheritdoc}
     */
    public function where($where)
    {
        $user = User::where($where);
        
        return $user;
    }

    /**
     * {@inheritdoc}
     */
    public function whereNot($key, $value)
    {
        $user = User::where($key, '!=', $value);
        
        return $user;
    }

}