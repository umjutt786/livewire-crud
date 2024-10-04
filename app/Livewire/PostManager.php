<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Post;

class PostManager extends Component
{
    public $posts, $title, $content, $postId;
    public $isOpen = false;

    public function render()
    {
        $this->posts = Post::all();
        return view('livewire.post-manager');
    }

    public function create()
    {
        $this->resetInputFields();
        $this->isOpen = true;
    }

    public function store()
    {
        $this->validate([
            'title' => 'required',
            'content' => 'required',
        ]);

        Post::updateOrCreate(['id' => $this->postId], [
            'title' => $this->title,
            'content' => $this->content,
        ]);

        session()->flash('message', $this->postId ? 'Post Updated.' : 'Post Created.');
        $this->closeModal();
    }

    public function savePost()
    {
        $this->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
        ]);

        Post::create([
            'title' => $this->title,
            'content' => $this->content,
        ]);

        $this->reset(['title', 'content']);
        $this->closeModal();
    }


    public function edit($id)
    {
        $post = Post::find($id);
        $this->postId = $id;
        $this->title = $post->title;
        $this->content = $post->content;
        $this->isOpen = true;
    }

    public function delete($id)
    {
        Post::find($id)->delete();
        session()->flash('message', 'Post Deleted.');
    }

    private function resetInputFields()
    {
        $this->title = '';
        $this->content = '';
        $this->postId = null;
    }

    public function closeModal()
    {
        $this->isOpen = false;
        $this->resetInputFields();
    }
}

