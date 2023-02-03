<!DOCTYPE html>
<html lang="en">

@extends('dashboard')
@section('content')
    <div class="flex justify-center bg-dark">
        <form action="citiesAdd" method="post">
            @csrf

            {{-- addding portion --}}
            <div class="mr-3">
              <div class=" mb-2 ">
                <label class="label">
                  <span class="label-text">Country :</span>
              </label>
                <select name='coid' class="bg-gray-800" id="inputGroupSelect01">
                    <option style="width: 300px;" selected disabled>Choose Country </option>
                      @if ($countries->count())
                        @foreach ($countries as $country)
                         <option  class="text-white" value="{{ $country->id }}">{{ $country->name }}</option>
                       @endForeach
                      @else
                         No Record Found
                     @endif     
                </select>
            </div>
                <div class="form-control  max-w-xs">
                    <label class="label">
                        <span class="label-text">City name :</span>
                    </label>
                    <input type="text" name="name" placeholder="city name" class="input input-bordered "
                        style="width: 300px;" />
                </div>
                <div class="flex justify-between">
                    <input type="submit" class="btn btn-outline btn-primary btn-sm mt-4" value="Add City">

                    <button onclick="window.location.href='{{ route('locations') }}'" type="button"
                        class='btn btn-error btn-outline btn-sm mt-4'>Back</button>
                </div>
            </div>
        </form>
    </div>
@endsection
