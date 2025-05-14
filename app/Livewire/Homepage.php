<?php

namespace App\Livewire;

use App\Models\User;
use Livewire\Component;
use App\Models\Category;
use Illuminate\Support\Facades\Auth;

class Homepage extends Component
{
    public $username;

    public function updateUsername() {
        $user=User::find(Auth::id());
        if ($user->id == Auth::id()) {
            $user->update([
            'name'=>$this->username
            ]);
        }
        $user->save();
        return redirect(route('homepage'))->with('message', 'Username modificato correttamente');
        // $this->reset();
    }
    public $showInput=false;
    public function showInputs() {
        $this->showInput=true;
    }
    public function render()
    {
        $categories = Category::all();
        return view('livewire.homepage', compact('categories'));
    }
}
