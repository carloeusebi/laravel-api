@extends('layouts.app')

@section('content')
    <x-admin.projects.header :title="'Update ' . $project->name" has-back-button />


    <x-admin.projects.form method="PUT" action="admin.projects.update" :$project :$types :$technologies
        :$projectTechnologyIds />
@endsection
