@extends('dashboard')
@section('content')
    <div class="flex justify-around">
        <div>
            <div class="stats bg-primary shadow text-white">
                <div class="stat ">
                    <div class="stat-title flex justify-center">Total Users</div>
                    <div class="stat-value flex justify-center">{{ count($users) }}</div>
                    <div class="flex justify-around">
                      <button class="btn btn-sm btn-success mx-2">Admin : {{ count($users) }}</button>
                    <button class="btn btn-sm btn-success mx-2">Customer :{{ count($users) }}</button>
                    <button class="btn btn-sm btn-success mx-2">Vendor :{{ count($users) }}</button>
                    <button class="btn btn-sm btn-success mx-2">Delivery Man :{{ count($users) }}</button>
                    </div>
                </div>
            </div>
        </div>
        <div class="stats shadow text-primary">
            <div class="stat">
                <div class="stat-title">Total Page Views</div>
                <div class="stat-value">89,400</div>
                <div class="stat-desc text-secondary">21% more than last month</div>
            </div>
        </div>
    </div>
    </div>
@endsection
