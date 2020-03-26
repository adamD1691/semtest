<?php

namespace App\Http\Helpers;

use App\Models\Project;
use App\Models\ProjectGroup;
use App\Models\ProjectGroupCampaign;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;

class ProjectControllerHelper
{
    /**
     * Updates project with relations.
     *
     * @param Request $request
     * @param Project $project
     */
    public function updateProject(Request $request, Project $project)
    {
        $input = $request->all();

        $projectData = [
            'name' => Arr::get($input, 'name'),
            'website' => Arr::get($input, 'website'),
            'active' => Arr::get($input, 'active', $project->active)
        ];

        $projectGroupData = Arr::get($input, 'groups');
        if (!is_null($projectGroupData)) {
            foreach ($projectGroupData as $id => $values) {
                if ($projectGroup = ProjectGroup::query()->find($id)) {
                    $projectGroup->update([
                        'name' => Arr::get($values, 'name')
                    ]);
                }
            }
        }

        $campaignsData = Arr::get($input, 'campaigns');
        if (!is_null($campaignsData)) {
            foreach ($campaignsData as $id => $values) {
                if ($projectGroupCampaign = ProjectGroupCampaign::query()->find($id)) {
                    $projectGroupCampaign->update([
                        'name' => Arr::get($values, 'name'),
                        'date_start' => Arr::get($values, 'start')
                    ]);
                }
            }
        }

        $project->update($projectData);
    }
}