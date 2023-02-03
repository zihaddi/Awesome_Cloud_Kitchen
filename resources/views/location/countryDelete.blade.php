<!DOCTYPE html>
<html lang="en">

<head>
    @extends('dashboard')
    @section('content')
        <div class="flex justify-center bg-dark">
            <form action="countriesDelete" method="post">
                @csrf
                <input name='id' type="hidden" class="form-control" value='{{ $country->id }}'>
                {{-- addding portion --}}
                {{-- parent --}}
                
                    {{-- child1 --}}
                    
                  <div class="form-control  max-w-xs">
                      <label class="label">
                          <span class="label-text">Country name :</span>
                      </label>
                      <input type="text" name="name" placeholder="product name" class="input input-bordered "
                          value='{{ $country->name }}' style="width: 300px;" />
                  </div>
                  
                  <br><br>
                  <div class="flex justify-between">
                    <input type="submit" class="btn btn-outline btn-primary btn-sm" value="Delete Category">
                  <button onclick="window.location.href='{{route('locations')}}'" type="button" class='btn btn-error btn-outline btn-sm' >Back</button>
                  </div>

            </form>
           
        </div>
        <div class="flex justify-center mt-4">
          <h3>Note : It will delete all cities and places related to country</h3>
        </div>
    @endsection
