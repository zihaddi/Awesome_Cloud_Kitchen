<!DOCTYPE html>
<html lang="en">

    @extends('dashboard')
    @section('content')
        <div class="flex justify-center bg-dark">
            <form action="productsAdd" method="post">
              @csrf
                <div class="flex justify-between">
                      {{-- addding portion --}}
                      <div class="mr-3">
                        <div class="form-control  max-w-xs">
                          <label class="label">
                              <span class="label-text">Product name :</span>
                          </label>
                          <input type="text" name="name" placeholder="product name" class="input input-bordered "
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
                              <span class="label-text">Description :</span>
                          </label>
                          <input type="text" name="description" placeholder="description" class="input input-bordered "
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
                          <input type="text" name="unit_price" placeholder="price" class="input input-bordered "
                              style="width: 300px;" />
                      </div>
                      </div>
                      <div style="margin-left:20px ">
                       
                    <div class=" mb-2 ">
                      <label class="label">
                        <span class="label-text">Category :</span>
                    </label>
                      <select name='caid' class="bg-gray-800" id="inputGroupSelect01">
                          <option style="width: 300px;" selected disabled>Choose Category </option>
                            @if ($category->count())
                              @foreach ($category as $userr)
                               <option  class="text-white" value="{{ $userr->id }}">{{ $userr->name }}</option>
                             @endForeach
                            @else
                               No Record Found
                           @endif     
                      </select>
                  </div>
                  <div class=" mb-2 ">
                    <label class="label">
                      <span class="label-text">Vendor :</span>
                  </label>
                    <select name='vid' class="bg-gray-800" id="inputGroupSelect01">
                        <option style="width: 300px;" selected disabled>Choose Vendor </option>
                          @if ($vendors->count())
                            @foreach ($vendors as $user)
                             <option  class="text-white" value="{{ $user->id }}">{{ $user->name }}</option>
                           @endForeach
                          @else
                             No Record Found
                         @endif     
                    </select>
                </div>
               <br><br>
               <input type="submit" class="btn btn-outline btn-primary btn-sm" value="Add Product">
                      </div>
                    
                </div>
            </form>
        </div>
    @endsection
