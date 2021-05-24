<?php

namespace App\Http\Controllers\Note;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\NotesRequest;
use App\Model\Note;

class NotesController extends Controller
{
    private $paginate = 5;

    public function index():object
    {
      return view('note.new');
    }

    public function store(NotesRequest $req)
    {      
       (new Note())->store_c($req->except('_token'));

       return $this->show();      
    }

    public function show():object
    {
       $lembretes = Note::where('id', '>', 0)
                    ->paginate($this->paginate);
       return view('note.show', compact('lembretes'));
    }
       
}
