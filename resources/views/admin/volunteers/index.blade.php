@extends('layouts.admin')

@section('title', 'Volunteers')
@section('page-title', 'Volunteers')

@section('content')
<table class="min-w-full bg-white shadow rounded">
    <thead>
        <tr class="bg-gray-100 text-left">
            <th class="p-3">Name</th>
            <th class="p-3">Email</th>
            <th class="p-3">Phone</th>
            <th class="p-3">Registered</th>
        </tr>
    </thead>
    <tbody>
    @foreach ($volunteers as $vol)
        <tr class="border-t">
            <td class="p-3">{{ $vol->name }}</td>
            <td class="p-3">{{ $vol->email }}</td>
            <td class="p-3">{{ $vol->phone }}</td>
            <td class="p-3">{{ $vol->created_at->toFormattedDateString() }}</td>
        </tr>
    @endforeach
    </tbody>
</table>
@endsection
