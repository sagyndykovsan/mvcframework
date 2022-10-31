<?php

namespace App\Controllers;

class CommentController {
    public function create() {
        return view('comments/create');
    }

    public function store() {
        return 'lets pretend that I handle some data :D';
    }
}