<?php

namespace App\Http\Livewire\Article;

use Livewire\Component;
use App\Models\Article; 
use Livewire\WithPagination;
use Livewire\WithFileUploads;
class ArticleIndex extends Component
{
    use WithPagination ;
    use WithFileUploads ;
    public $showFormModal = false ;
    public $editModeModal = false ; 
    public $search ; 
    public $title ; 
    public $body ; 
    public $article_id ; 
    public $image ; 

    public $rules = [
        'title' => ['required' , 'string'] ,
        'body' => ['required' , 'string'] ,
        'image' => 'image|max:4024'
    ];

    public function toggleModal(){
        $this->reset();
        $this->showFormModal = true ; 
    }

    public function storeArticle(){
        $this->validate();
        $image = $this->image->store('articles');
        Article::create([
            'user_id' => auth()->user()->id ,
            'title' => $this->title , 
            'body' => $this->body , 
            'image' => $image 
        ]);

        $this->reset();
        session()->flash('flash.banner' , 'اضافه شد');
    }

    public function showEditForm($id){
        $this->reset();
        $this->showFormModal = true ; 
        $this->editModeModal = true ; 
        $this->article_id = $id ; 
        $this->loadEditForm();
    }

    public function loadEditForm(){
        $article = Article::findOrfail($this->article_id);
        $this->title = $article->title ; 
        $this->body = $article->body ; 
    }

    public function updateArticle(){
        $article = Article::findOrfail($this->article_id);
        $this->validate([
            'title' => ['required' , 'string'] ,
            'body' => ['required' , 'string'] ,
        ]);
        $article->update([
            'title' => $this->title , 
            'body' => $this->body , 
        ]);

        $this->reset();
        session()->flash('flash.banner' , 'ویرایش شد');
    }

    public function deleteArticle($id){
        $article = Article::findOrfail($id);
        $article->delete();
        session()->flash('flash.banner' , 'حذف شد');
    }
    public function render()
    {
        $articles = Article::paginate(5);
        return view('livewire.article.article-index' , [
            'articles' => $articles
        ])->layout('layouts.app');
    }
}
