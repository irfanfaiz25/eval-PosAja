<?php

namespace App\Livewire;

use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class LoginForm extends Component
{
    public $username;
    public $password;
    public $login_rules = [
        'username' => 'required',
        'password' => 'required',
    ];

    public function login()
    {
        $validated_login = $this->validate($this->login_rules);

        if (Auth::attempt(['username' => $validated_login['username'], 'password' => $validated_login['password']])) {
            return redirect(route('dashboard.index'));
        } else {
            session()->flash('invalid', 'Invalid login credentials');
            $this->reset('password');
        }
    }

    public function render()
    {
        return view('livewire.login-form');
    }
}
