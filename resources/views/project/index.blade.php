@extends('layout')
@section('content')
    <div class="container-fluid">
        <h1>Lista projektów</h1>
        Filtr aktywności:
        <a href="?active=0">Nieaktywny</a> |
        <a href="?active=1">Aktywny</a> |
        <a href="?active=2">W trakcie realizacji</a>
        <table class="table table-hover">
            <thead>
            <tr>
                <th scope="col">Nazwa projektu</th>
                <th scope="col">Nazwa grupy projektu</th>
                <th scope="col">Nazwa kampanii</th>
                <th scope="col">Adres strony</th>
                <th scope="col">Aktywność projektu</th>
            </tr>
            </thead>
            <tbody>
            @foreach($projects as $project)
                <tr class="clickable-row" onclick="window.location='{{url('projects', $project)}}'">
                    <td>{{$project->name}}</td>
                    <td>
                        @foreach($project->projectGroups as $projectGroup)
                            {{$projectGroup->name}}<br>
                        @endforeach
                    </td>
                    <td>
                        @foreach($project->projectGroups as $projectGroup)
                            @foreach($projectGroup->projectGroupCampaigns as $projectGroupCampaign)
                                {{$projectGroupCampaign->name}}<br>
                            @endforeach
                        @endforeach
                    </td>
                    <td>{{$project->website}}</td>
                    <td>{{$project->active_label}}</td>
                </tr>
            @endforeach
            </tbody>
        </table>
        {{$projects->links()}}
    </div>
@endsection
