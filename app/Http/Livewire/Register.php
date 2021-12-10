<?php

namespace App\Http\Livewire;

use App\Models\User;
use FFI\Exception;
use Illuminate\Database\QueryException;
use Livewire\Component;

class Register extends Component
{
    public $name,$email,$password;
    protected $rules = [
        'name' => 'required|min:4',
        'email' => 'required|email|min:10',
        'password' => 'required|min:4'
    ];
    protected $messages = [
        'name.required' => 'Required',
        'email.required' => 'Required',
        'password.required' => 'Required'
    ];

    public function register()
    {
        try {
            $this->validate();
            $user=new User();
            $user->name=$this->name;
            $user->email=$this->email;
            $user->password=bcrypt($this->password);
            $user->save();
            $this->name="";
            $this->email="";
            $this->password="";
            session()->flash('message', 'User successfully created.');
        } catch (QueryException) {
            session()->flash('message_error', 'Email already exist');
        }
        
    }

    public function render()
    {
        return view('livewire.register');
    }
}
