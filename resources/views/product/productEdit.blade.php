<!DOCTYPE html>
<html lang="en">

<head>
    @extends('dashboard')
    @section('content')
        <div class="flex justify-center bg-dark">
            <form action="productsEdit" method="post">
                @csrf
                
                <div class="flex justify-between">
                  <input name='id' type="hidden" class="form-control"   value='{{ $product->id }}' >
                    {{-- addding portion --}}
                    <div class="mr-3 mt-5">
                      <div class="form-control   max-w-xs">
                        
                        <img style="width:200px;height:200px" class="mt-5" src={{ $product->image }} alt="">
                        {{-- <input type="text" name="image" placeholder="image" class="input input-bordered "
                            value='{{ $product->image }}' style="width: 300px;" /> --}}
                    </div>
                    <div class=" mb-2 ">
                      <div class="form-control  max-w-xs">
                          <label class="label">
                              <span class="label-text">Category :</span>
                          </label>
                          <input type="text" name="unit_price" placeholder="price" class="input input-bordered "
                              value='{{ $category->name }}' style="width: 300px;height: 30px;" disabled/>
                      </div>
                  </div>
                  <div class=" mb-2 ">
                    <div class="form-control  max-w-xs">
                        <label class="label">
                            <span class="label-text">Vendor :</span>
                        </label>
                        <input type="text" name="unit_price" placeholder="price" class="input input-bordered "
                            value='{{ $vendor->name }}' style="width: 300px;height: 30px;" disabled/>
                    </div>
                </div>
                   
                    </div>
                    <div style="margin-left:20px ">
                      <div class="form-control  max-w-xs">
                        <label class="label">
                            <span class="label-text">Change Image :</span>
                        </label>
                        {{-- <img style="width:90%" src={{ $product->image }} alt=""> --}}
                        <input type="text" name="image" placeholder="image" class="input input-bordered "
                            value='{{ $product->image }}' style="width: 300px;height: 30px;" />
                    </div>
                      
                          <div class="form-control  max-w-xs">
                              <label class="label">
                                  <span class="label-text">Product name :</span>
                              </label>
                              <input type="text" name="name" placeholder="product name" class="input input-bordered "
                                  value='{{ $product->name }}' style="width: 300px;height: 30px;" />
                          </div>
                          
                          
                          <div class="form-control  max-w-xs">
                              <label class="label">
                                  <span class="label-text">Quantity :</span>
                              </label>
                              <input type="text" name="quantity" placeholder="quantity" class="input input-bordered "
                                  value='{{ $product->quantity }}' style="width: 300px;height: 30px;" />
                          </div>
  
                          <div class="form-control  max-w-xs">
                              <label class="label">
                                  <span class="label-text">Unit Price :</span>
                              </label>
                              <input type="text" name="unit_price" placeholder="price" class="input input-bordered "
                                  value='{{ $product->unit_price }}' style="width: 300px;height: 30px;" />
                          </div>
                        
                      <br><br>
                    <div class="flex justify-between">
                      <input type="submit" class="btn btn-outline btn-primary btn-sm" value="Edit Product">
                      <button onclick="window.location.href='{{route('products')}}'" type="button" class='btn btn-error btn-outline btn-sm mx-4' >Back</button>
                    </div>
                    </div>
                    <div>
                        <div class="form-control  max-w-xs ml-5">
                            <label class="label">
                                <span class="label-text">Description :</span>
                            </label>
                            {{-- <input type="text" name="description" placeholder="description" class="input input-bordered "
                                value='{{ $product->description }}' style="width: 300px;height: 30px;" /> --}}
                                <textarea name="description"  class="textarea textarea-bordered" placeholder="description">{{ $product->description }}</textarea>   
                        </div>
                    </div>
                    
                </div>

        </div>
        </form>
        </div>
    @endsection
