<!DOCTYPE html>
<html lang="en">

    @extends('dashboard')
    @section('content')
        <div class="flex justify-center bg-dark">
            <form action="ingredientsAdd" method="post">
              @csrf
              
                      {{-- addding portion --}}
                      <div class="mr-3">
                        <div class="form-control  max-w-xs">
                          <label class="label">
                              <span class="label-text">Ingredient name :</span>
                          </label>
                          <input type="text" name="name" placeholder="Ingredient name" class="input input-bordered "
                              style="width: 300px;" />
                      </div>
                      <div class="form-control  max-w-xs">
                          <label class="label">
                              <span class="label-text">Image :</span>
                          </label>
                          <input type="text" name="image" placeholder="image" class="input input-bordered "
                              style="width: 300px;" />
                      </div>
                      <div class="form-control  max-w-xs">
                          <label class="label">
                              <span class="label-text">Quantity :</span>
                          </label>
                          <input type="text" name="quantity" placeholder="quantity" class="input input-bordered "
                              style="width: 300px;" />
                      </div>
                    
                      <div class="form-control  max-w-xs">
                        <label class="label">
                            <span class="label-text">Unit Price :</span>
                        </label>
                        <input type="text" name="price" placeholder="unit price" class="input input-bordered "
                            style="width: 300px;" />
                    </div>
                    <div class=" mb-2 ">
                      <label class="label">
                        <span class="label-text">Category :</span>
                    </label>
                      <select name='cid' class="bg-gray-800" id="inputGroupSelect01">
                          <option style="width: 300px;" selected disabled>Choose Category </option>
                            @if ($icategories->count())
                              @foreach ($icategories as $userr)
                               <option  class="text-white" value="{{ $userr->id }}">{{ $userr->name }}</option>
                             @endForeach
                            @else
                               No Record Found
                           @endif     
                      </select>
                  </div>
                     <div class="flex justify-between">
                        <input type="submit" class="btn btn-outline btn-primary btn-sm mt-4" value="Add Ingredient">
  
                        <button onclick="window.location.href='{{route('ingredients')}}'" type="button" class='btn btn-error btn-outline btn-sm mt-4' >Back</button>
                     </div>
                     
                    
                </div>
            </form>
        </div>
    @endsection