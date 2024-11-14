<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Note extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'content'];

    // Relationship with User: A note belongs to a user
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // Relationship with NoteLog: A note can have many logs
    public function noteLogs()
    {
        return $this->hasMany(NoteLog::class);
    }

    protected static function booted()
    {
        parent::boot();

        // Log the creation of a note
        static::created(function ($note) {
            $note->noteLogs()->create([
                'action' => 'created',
                'note_title' => $note->title,
                'user_name' => $note->user->name ?? 'N/A',
            ]);
        });
    
        // Log updates to a note
        static::updated(function ($note) {
            $note->noteLogs()->create([
                'action' => 'updated',
                'note_title' => $note->title,
                'user_name' => $note->user->name ?? 'N/A',
            ]);
        });
    
        // Log deletion of a note
        static::deleting(function ($note) {
            $note->noteLogs()->create([
                'action' => 'deleted',
                'note_title' => $note->title,
                'user_name' => $note->user->name ?? 'N/A',
            ]);
        });
    }
}
