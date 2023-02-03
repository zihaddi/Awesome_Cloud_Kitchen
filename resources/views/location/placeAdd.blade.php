<!DOCTYPE html>
<html lang="en">

@extends('dashboard')
@section('content')
    <div class="flex justify-center bg-dark">
        <form action="placesAdd" method="post">
            @csrf
            {{-- addding portion --}}

            <div class=" mb-2 ">
                <label class="label">
                    <span class="label-text">Country :</span>
                </label>
                <select class="bg-gray-800" id="country-dd">
                    <option style="width: 300px;" selected disabled>Choose Country </option>
                    @if ($countries->count())
                        @foreach ($countries as $country)
                            <option class="text-white" value="{{ $country->id }}">{{ $country->name }}</option>
                        @endForeach
                    @else
                        No Record Found
                    @endif
                </select>

                {{-- city --}}
                <div class="form-control  max-w-xs">
                    <label class="label">
                        <span class="label-text">City name :</span>
                    </label>
                    <select name='ctid' id="city-dd" class="bg-gray-800">
                    </select>
                </div>

                {{-- place --}}
                <div class="form-control  max-w-xs">
                    <label class="label">
                        <span class="label-text">Place :</span>
                    </label>
                    <input type="text" name="name" placeholder="place name" class="input input-bordered "
                        style="width: 300px;" />
                </div>
                <div class="flex justify-between">
                    <input type="submit" class="btn btn-outline btn-primary btn-sm mt-4" value="Add Place">

                    <button onclick="window.location.href='{{ route('locations') }}'" type="button"
                        class='btn btn-error btn-outline btn-sm mt-4'>Back</button>
                </div>
            </div>
        </form>
    </div>


    {{-- javascript --}}
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#country-dd').on('change', function() {
                var idCountry = this.value;
                $("#city-dd").html('');
                $.ajax({
                    url: "{{ url('api/fetch-cities') }}",
                    type: "POST",
                    data: {
                        coid: idCountry,
                        _token: '{{ csrf_token() }}'
                    },
                    dataType: 'json',
                    success: function(result) {
                        console.log(result)
                        $('#city-dd').html('<option value="">Select City</option>');
                        $.each(result, function(key, value) {
                            $("#city-dd").append('<option value="' + value
                                .id + '">' + value.name + '</option>');
                        });

                    }
                });
            });
        });
    </script>
@endsection
