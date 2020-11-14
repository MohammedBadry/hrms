<?php

    namespace App\Models;

    use Illuminate\Database\Eloquent\Model;

    class Project extends Model
    {
        protected $guarded = [];

        public function getName() {
            return json_decode($this->name);
        }

        public function getDescription() {
            return json_decode($this->description);
        }
        
        public function client()
        {
            return $this->belongsTo(Client::class);
        }
    }
