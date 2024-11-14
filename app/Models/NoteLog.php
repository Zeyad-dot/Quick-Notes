<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NoteLog extends Model
{
    use HasFactory;

    protected $fillable = ['note_id', 'action', 'note_title', 'user_name']; // Add 'note_title' and 'user_name'

    // Relationship with Note: A log belongs to a note
    public function note()
    {
        return $this->belongsTo(Note::class);
    }

    // Relationship with User: A log belongs to a user
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
