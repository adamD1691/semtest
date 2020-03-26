@extends('layout')
@section('content')
    <div class="container">
        <h1>Edycja projektu</h1>
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <form method="POST" action="{{route('projects.update', ['project'=>$project])}}">
            @csrf
            @method('PUT')
            <div class="field form-group">
                <label class="col-form-label" for="name">Nazwa projektu</label>
                <div class="control">
                    <input type="text" name="name" id="name" value="{{$project->name}}">
                </div>
            </div>
            <div class="field form-group">
                <label class="col-form-label" for="groups">Nazwy grup projektu</label>
                <div class="control">
                    <div name="groups">
                        @foreach($project->projectGroups as $projectGroup)
                            <input type="text" name="groups[{{$projectGroup->id}}][name]" id="groups[{{$projectGroup->id}}][name]"
                                   value="{{$projectGroup->name}}">
                        @endforeach
                    </div>
                </div>
            </div>

            @foreach($project->projectGroups as $projectGroup)
                @foreach($projectGroup->projectGroupCampaigns as $projectGroupCampaign)
                    <div class="field form-group">
                        <label class="col-form-label" for="campaign_{{$projectGroupCampaign->id}}">Kampania ({{$projectGroupCampaign->id}})</label>
                        <div class="control">
                            <div name="campaign_{{$projectGroupCampaign->id}}">
                                <input type="text" name="campaigns[{{$projectGroupCampaign->id}}][name]"
                                       id="campaigns[{{$projectGroupCampaign->id}}][name]"
                                       value="{{$projectGroupCampaign->name}}">
                                <input type="date" name="campaigns[{{$projectGroupCampaign->id}}][start]"
                                       id="campaigns[{{$projectGroupCampaign->id}}][start]"
                                       value="{{$projectGroupCampaign->date_start}}">
                            </div>
                        </div>
                    </div>
                @endforeach
            @endforeach

            <div class="field form-group">
                <label class="col-form-label" for="website">Adres strony</label>
                <div class="control">
                    <input type="text" name="website" id="website" value="{{$project->website}}">
                </div>
            </div>

            <div class="field form-group">
                <label class="col-form-label" for="active">Aktywność</label>
                <select class="form-control" id="active" name="active">
                    <option value="{{$project->active}}" selected disabled>{{$project->active_label}}</option>
                    <option value="0">Nieaktywny</option>
                    <option value="1">Aktywny</option>
                    <option value="2">W trakcie realizacji</option>
                </select>
            </div>

            <div class="field">
                <div class="control">
                    <button class="btn btn-success" type="submit">Zapisz</button>
                </div>
            </div>
        </form>
    </div>
@endsection