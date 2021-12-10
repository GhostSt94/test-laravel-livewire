<?php

namespace App\Http\Livewire;

use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Login extends Component
{
    public $email,$password;
    protected $rules = [
        'email' => 'required|email|min:10',
        'password' => 'required|min:4'
    ];
    protected $messages = [
        'email.required' => 'Required',
        'password.required' => 'Required'
    ];

    public function login(){
        if(Auth::attempt([
            'email'=>$this->email,
            'password'=>$this->password
        ])){
            redirect('/');
        }else{
            session()->flash('message_error', 'Email or Password incorrect');
        }
    }


    public function render()
    {
        return view('livewire.login');
    }
}
