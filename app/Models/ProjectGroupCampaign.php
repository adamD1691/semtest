<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProjectGroupCampaign extends Model
{
    protected $table = 'project_group_campaigns';

    public $timestamps = false;

    protected $guarded = [];

    public function projectGroup()
    {
        return $this->belongsTo(ProjectGroup::class);
    }
}
