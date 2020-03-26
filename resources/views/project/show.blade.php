@extends('layout')
@section('content')
    <div id="wrapper">
        <div id="page" class="container">
            <div>
                <h1>Dane projektu</h1>
                <a href="{{route('projects.edit', ['project'=>$project])}}" type="button" class="btn btn-primary"
                   style="margin-bottom: 10px;">Edytuj</a>
            </div>
            <div class="list-group">
                <a class="list-group-item">
                    <h4 class="list-group-item-heading">Nazwa</h4>
                    <p class="list-group-item-text">{{$project->name}}</p>
                </a>
                <a class="list-group-item">
                    <h4 class="list-group-item-heading">Grupy projektu</h4>
                    <p class="list-group-item-text">
                        @foreach($project->projectGroups as $projectGroup)
                            {{$projectGroup->name}}<br>
                        @endforeach
                    </p>
                </a>
                <a class="list-group-item">
                    <h4 class="list-group-item-heading">Kampanie</h4>
                    <p class="list-group-item-text">
                    @foreach($project->projectGroups as $projectGroup)
                        @foreach($projectGroup->projectGroupCampaigns as $projectGroupCampaign)
                            <p>
                                <b>Nazwa:</b> {{$projectGroupCampaign->name}}<br>
                                <b>Data rozpoczęcia:</b> {{$projectGroupCampaign->date_start}}
                            </p>
                            <br>
                        @endforeach
                    @endforeach
                    </p>
                </a>
                <a class="list-group-item">
                    <h4 class="list-group-item-heading">Adres strony</h4>
                    <p class="list-group-item-text">
                        {{$project->website}}
                    </p>
                </a>
                <a class="list-group-item">
                    <h4 class="list-group-item-heading">Aktywność</h4>
                    <p class="list-group-item-text">
                        {{$project->active_label}}
                    </p>
                </a>
            </div>
        </div>
    </div>
@endsection