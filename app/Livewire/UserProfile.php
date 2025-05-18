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

        // Precarica i link già salvati (category_id => url)
        $this->links = $user->links()->pluck('url', 'category_id')->toArray();

        // Rendi visibili solo i campi che hanno link salvati
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

        // Validazione link visibili
        foreach ($this->visibleInputs as $categoryId => $visible) {
            if ($visible && !empty($this->links[$categoryId])) {
                $this->validate([
                    "links.$categoryId" => 'required|url|max:255',
                ]);
            }
        }

        // Salvataggio link
        foreach ($this->visibleInputs as $categoryId => $visible) {
            if ($visible && !empty($this->links[$categoryId])) {
                $user->links()->updateOrCreate(
                    ['category_id' => $categoryId],
                    ['url' => $this->links[$categoryId]]
                );
            }
        }
        
        $user->save();
        return redirect(route('users.show', Auth::user()->name))->with('edit_message', 'Profilo aggiornato con successo!');
        
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
        $categories = Category::all(); // per visualizzare icone e nomi social

        return view('livewire.user-profile', compact('categories'));
    }
}
