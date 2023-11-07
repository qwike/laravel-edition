<?php

namespace App\Http\Controllers;

use App\Repositories\ProjectRepository;

class ProjectController extends Controller
{
    public function __construct(protected ProjectRepository $projectRepository)
    {
    }

    public function projects()
    {
        $projects = $this->projectRepository->getProjects();

        return view('projects', [
            'projects' => $projects,
        ]);
    }
}
