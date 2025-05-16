<?php

namespace App\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;

class UserProfile extends Component
{
    public $username;
    public $bio;
    
    public function mount()
    {
        $this->username = Auth::user()->name;
        $this->bio = Auth::user()->bio;
    }
    
    public function updateProfile()
    {
        $user = Auth::user();
        
        $this->validate([
            'username' => 'required|string|max:255',
            'bio' => 'nullable|string|max:1000',
        ]);
        
        $user->update([
            'name' => $this->username,
            'bio' => $this->bio,
        ]);
        
        $user->save();
        return redirect()->back()->with('message', 'Profilo aggiornato con successo!');
        
    }
    
   
    
    public function render()
    {
        return view('livewire.user-profile');
    }
}
