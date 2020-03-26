<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProjectGroup extends Model
{
    protected $table = 'project_groups';

    public $timestamps = false;

    protected $guarded = [];

    public function project()
    {
        return $this->belongsTo(Project::class);
    }

    public function projectGroupCampaigns()
    {
        return $this->hasMany(ProjectGroupCampaign::class);
    }
}
