<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProjectUpdateRequest;
use Illuminate\Http\Request;
use App\Models\Project;
use App\Http\Helpers\ProjectControllerHelper;


class ProjectController extends Controller
{
    private $projectControllerHelper;

    /**
     * ProjectController constructor.
     * @param ProjectControllerHelper $projectControllerHelper
     */
    public function __construct(ProjectControllerHelper $projectControllerHelper)
    {
        $this->projectControllerHelper = $projectControllerHelper;
    }

    /**
     * Index projects.
     *
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index(Request $request)
    {
        if ($request->has('active')){
            $active = $request->active;
            $projects = Project::active($active)->paginate(10)->appends('active', $active);
        } else {
            $projects = Project::paginate(10);
        }

        return view('project.index', [
            'projects' => $projects
        ]);
    }

    /**
     * Show project.
     *
     * @param Project $project
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function show(Project $project)
    {
        return view('project.show', [
            'project' => $project
        ]);
    }

    /**
     * Show edit view of project.
     *
     * @param Project $project
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit(Project $project)
    {
        return view('project.edit', [
            'project' => $project
        ]);
    }

    /**
     * Updates project.
     *
     * @param ProjectUpdateRequest $request
     * @param Project $project
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function update(ProjectUpdateRequest $request, Project $project)
    {
        $this->projectControllerHelper->updateProject($request, $project);
        return redirect(route('projects.show', ['project' => $project]));
    }
}
