<?php

namespace App\Livewire;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Livewire\Component;

class UserSearch extends Component
{
    public $name;
    public $email;
    public $password;

    public function createUser(){
        User::create([
            'name' => $this->name,
            'email' => $this->email,
            'password' => Hash::make($this->password),
        ]);
        $this->name = '';
        $this->email = '';
        $this->password = '';

        session()->flash('message', 'User created successfully');
    }


    public function render()
    {
        $user = User::all();
        return view('livewire.user-search',[
            'users' => $user
        ]);
    }
}
