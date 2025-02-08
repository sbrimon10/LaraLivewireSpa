<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Post;
use Livewire\Attributes\Validate;
use App\Livewire\Forms\PostForm;
use Illuminate\Support\Str;
class CreatePost extends Component
{
    public PostForm $form;
    #[Title('Create Post')] 
    public bool $success = false;
   
    public function save(): void
    {
        $this->validate(); 
        // Post::create([ 
        //     'title' => $this->form->title, 
        //     'body' => $this->form->body, 
        // ]); 
        $this->form->save(); 
        $this->success = true; 
 
        
    }
    
    public function updated($property): void
    {
        if ($property == 'form.title') {
            $this->form->title = Str::headline($this->form->title);
        }
    }
    public function render()
    {
        return view('livewire.create-post');
    }
}
