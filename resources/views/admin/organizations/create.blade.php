@extends('layouts.admin')

@section('title', 'Add Organization')
@section('page-title', 'Add New Organization')

@section('content')
<form action="{{ route('admin.organizations.store') }}" method="POST" class="space-y-6 bg-white p-6 shadow rounded">
    @csrf
    <div>
        <label class="block mb-1 font-medium">Name</label>
        <input name="name" class="w-full border rounded p-2" required>
    </div>
    <div>
        <label class="block mb-1 font-medium">Email</label>
        <input type="email" name="email" class="w-full border rounded p-2">
    </div>
    <div>
        <label class="block mb-1 font-medium">Phone</label>
        <input name="phone" class="w-full border rounded p-2">
    </div>
    <div>
        <label class="block mb-1 font-medium">Address</label>
        <textarea name="address" class="w-full border rounded p-2"></textarea>
    </div>
    <button class="bg-blue-600 text-white px-4 py-2 rounded">Save</button>
</form>
@endsection
