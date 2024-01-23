<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Support\Facades\DB;
use MongoDB\Laravel\Eloquent\Model;

class Participants extends Model
{
    protected $fillable = ['participant_name', 'email', 'phone', ];

    public function getParticipants()
    {
        return DB::collection('participants')->orderBy('email', 'desc')->get();
    }

    public function saveParticipant($data)
    {
        return $this->create($data);
    }

    public function deleteParticipant($id)
    {
        return $this->findOrFail($id)->delete();
    }

    public function updateParticipant($id)
    {
        return $this->findOrFail($id);
    }

    public function updatedParticipant($data, $id)
    {
        return $this->findOrFail($id)->update($data);
    }
}
