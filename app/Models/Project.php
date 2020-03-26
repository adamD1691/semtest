<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    const STATUS_INACTIVE = 0;
    const STATUS_ACTIVE = 1;
    const STATUS_IN_PROGRESS = 2;

    const ACTIVE_LABEL = [
      self::STATUS_INACTIVE=>'Nieaktywny',
      self::STATUS_ACTIVE=>'Aktywny',
      self::STATUS_IN_PROGRESS=>'W trakcie realizacji'
    ];

    protected $table = 'projects';

    public $timestamps = false;

    protected $guarded = [];

    public function getActiveLabelAttribute()
    {
        return self::ACTIVE_LABEL[$this->active];
    }

    public function projectGroups()
    {
        return $this->hasMany(ProjectGroup::class);
    }

    public function scopeActive($query, $active)
    {
        if (!blank($active)){
            $query->where('active', $active);
        }
          return $query;
    }
}
