<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Category;
use Illuminate\Support\Facades\Auth;

class UserProfile extends Component
{
    public $username;
    public $bio;
    public $links = [];
    public $visibleInputs = [];
    
    
    public function mount()
    {
        $user = Auth::user();
        $this->username = Auth::user()->name;
        $this->bio = Auth::user()->bio;
        
        $this->links = $user->links()->pluck('url', 'category_id')->toArray();

        foreach ($this->links as $categoryId => $url) {
            $this->visibleInputs[$categoryId] = true;
        }
    }

    public function toggleInput($categoryId)
    {
        $this->visibleInputs[$categoryId] = !($this->visibleInputs[$categoryId] ?? false);
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

        foreach ($this->visibleInputs as $categoryId => $visible) {
            if ($visible && !empty($this->links[$categoryId])) {
                $this->validate([
                    "links.$categoryId" => 'required|url|max:255',
                ]);
            }
        }

        foreach ($this->visibleInputs as $categoryId => $visible) {
            if ($visible && !empty($this->links[$categoryId])) {
                $user->links()->updateOrCreate(
                    ['category_id' => $categoryId],
                    ['url' => $this->links[$categoryId]]
                );
            }
        }
        
        $user->save();
        $this->dispatch('profile-updated');

        return redirect(route('users.show', Auth::user()->name));
        
    }

    public function deleteLink($categoryId)
    {
        $link = Auth::user()->links()->where('category_id', $categoryId)->first();
        if ($link) {
            $link->delete();
            unset($this->links[$categoryId]);
            $this->visibleInputs[$categoryId] = false;
        }
    }

    
   
    
    public function render()
    {
        $categories = Category::all();

        return view('livewire.user-profile', compact('categories'));
    }
}
