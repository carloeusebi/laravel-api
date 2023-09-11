@extends('layouts.app')

@section('content')
    <x-admin.projects.header title="Create a new Project" has-back-button />

    <div>
        <x-admin.projects.form :$project :$types :$technologies method="POST" action="admin.projects.store" />
    </div>
@endsection
