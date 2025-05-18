<?php

namespace App\Livewire;

use App\Models\User;
use Livewire\Component;
use App\Models\Category;
use Illuminate\Support\Facades\Auth;

class Homepage extends Component
{
    public $username;
    
    public $visibleInputs = []; 
    public $links = [];
    public $changes = false;
    
    
    public function mount()
    {
        $this->visibleInputs = []; 
    }
    
    public function toggleInput($categoryId)
    {
        $this->visibleInputs[$categoryId] = !($this->visibleInputs[$categoryId] ?? false);
    }
    
    public function saveLinks()
    {
        $rules = [];
        $messages = [];
        
        foreach ($this->visibleInputs as $categoryId => $visible) {
            if ($visible && !empty($this->links[$categoryId])) {
                $rules["links.$categoryId"] = 'required|url|max:255';
                $messages["links.$categoryId.required"] = 'Il campo URL è obbligatorio.';
                $messages["links.$categoryId.url"] = 'Inserisci un URL valido per la categoria.';
                $messages["links.$categoryId.max"] = 'L\'URL non può superare i 255 caratteri.';
            }
        }
        
        $this->validate($rules, $messages);
        
        foreach ($this->visibleInputs as $categoryId => $visible) {
            if ($visible && !empty($this->links[$categoryId])) {
                Auth::user()->links()->updateOrCreate(
                    ['category_id' => $categoryId],
                    ['url' => $this->links[$categoryId]]
                );
                
            }
        }
        
        session()->flash('message', 'Tutti i link sono stati salvati con successo!');
    }
    
    public function updatedLinks()
    {
        $this->changes = true;
    }
    
    
    public function deleteLink($categoryId)
    {
        $link = Auth::user()->links()->where('category_id', $categoryId)->first();
        
        if ($link) {
            $link->delete(); 
            
            unset($this->links[$categoryId]); 
            $this->changes = false;
            session()->flash('message', 'Link eliminato con successo!');
        }
    }
    
    
    public function render()
    {
        $categories = Category::all();
        $existingLinks = Auth::user()->links()->pluck('url', 'category_id')->toArray();
        $this->links = $this->links ?: $existingLinks;
        
        return view('livewire.homepage', compact('categories'));
    }
}
