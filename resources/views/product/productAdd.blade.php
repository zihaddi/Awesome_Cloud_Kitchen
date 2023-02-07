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

                        @if ($talue['name'])
                            <input name='name' type="text" class="input input-bordered " style="width: 300px;"
                                id="3" value={{ $talue['name'] }} placeholder="product name">
                        @else
                            <input name='name' type="text" class="input input-bordered " style="width: 300px;"
                                id="3" placeholder="product name">
                        @endif
                    </div>
                    <div class="form-control  max-w-xs">
                        <label class="label">
                            <span class="label-text">Image :</span>
                        </label>
                        @if ($talue['image'])
                            <input name='image' type="text" class="input input-bordered " style="width: 300px;"
                                id="3" value={{ $talue['image'] }} placeholder="image">
                        @else
                            <input name='image' type="text" class="input input-bordered " style="width: 300px;"
                                id="3" placeholder="image">
                        @endif
                    </div>
                    <div class="form-control  max-w-xs">
                        <label class="label">
                            <span class="label-text">Description :</span>
                        </label>
                        {{-- <input type="text" name="description" placeholder="description" class="input input-bordered "
                              style="width: 300px;" /> --}}
                        @if ($talue['description'])
                            <input name='description' type="text" class="textarea textarea-bordered" id="4"
                                value={{ $talue['description'] }} placeholder="description">
                        @else
                            <textarea name='description' type="textarea" class="textarea textarea-bordered" id="4"
                                placeholder="description"></textarea>
                        @endif
                    </div>
                    <div class="form-control  max-w-xs">
                        <label class="label">
                            <span class="label-text">Quantity :</span>
                        </label>
                        @if ($talue['quantity'])
                            <input name='quantity' type="text" class="input input-bordered " style="width: 300px;"
                                id="3" value={{ $talue['quantity'] }} placeholder="quantity">
                        @else
                            <input name='quantity' type="text" class="input input-bordered " style="width: 300px;"
                                id="3" placeholder="quantity">
                        @endif
                    </div>

                   
                </div>
                <div style="margin-left:20px ">

                    <div class=" mb-2 ">
                        <label class="label">
                            <span class="label-text">Category :</span>
                        </label>
                        <select name='caid' class="bg-gray-800" id="inputGroupSelect01">
                            @if ($cname && $caid)
                                <option selected value="{{ $caid }}">{{ $cname }}</option>
                            @else
                                <option style="width: 300px;" selected disabled>Choose Category </option>
                                @if ($category->count())
                                    @foreach ($category as $userr)
                                        <option class="text-white" value="{{ $userr->id }}">{{ $userr->name }}</option>
                                    @endForeach
                                @else
                                    No Record Found
                                @endif
                            @endif
                        </select>
                    </div>
                    <div class=" mb-2 ">
                        <label class="label">
                            <span class="label-text">Vendor :</span>
                        </label>
                        <select name='vid' class="bg-gray-800" id="inputGroupSelect01">
                            @if ($vname && $vid)
                                <option selected value="{{ $vid }}">{{ $vname }}</option>
                            @else
                                <option style="width: 300px;" selected disabled>Choose Vendor </option>
                                @if ($vendors->count())
                                    @foreach ($vendors as $user)
                                        <option class="text-white" value="{{ $user->id }}">{{ $user->name }}
                                        </option>
                                    @endForeach
                                @else
                                    No Record Found
                                @endif
                            @endif
                        </select>
                    </div>
                    <div class=" mb-2 ">
                        <label class="label">
                            <span class="label-text">Ingredient :</span>
                        </label>
                        <select name='id' class="bg-gray-800" id="inputGroupSelect01">

                            <option style="width: 300px;" selected disabled>Choose Ingredient </option>
                            @if ($vendors->count())
                                @foreach ($ingredient as $user)
                                    <option class="text-white" value="{{ $user->id }}">{{ $user->name }}</option>
                                @endForeach
                            @else
                                No Record Found
                            @endif

                        </select>
                    </div>
                    <div>
                        <div class="form-control  max-w-xs">
                            <label class="label">
                                <span class="label-text">Quantity :</span>
                            </label>
                            <input name='iquantity' type="text" class="input input-bordered " style="width: 150px;"
                                id="3" placeholder="quantity">

                        </div>
                        <div class="mt-10">
                            <input type="submit" class='btn btn-outline btn-primary btn-sm mt-2' value="Add Product">
                        </div>
                    </div>
                    <br><br>
                    <div class="flex justify-between">
                        
                    </div>
                </div>
                <div class="ml-5">
                    {{-- last portion  --}}
                    <div>
                        {{-- butoon  --}}
                        <div class="flex justify-between mb-3">
                            <button onclick="window.location.href='{{ route('productCheckout', $talue) }}'"
                                type="button" class='btn btn-primary  btn-sm'>Checkout</button>
                            <button onclick="window.location.href='{{ route('clearCart') }}'" type="button"
                                class='btn btn-warning  btn-sm'>Clear Cart</button>
                                <button onclick="window.location.href='{{ route('products') }}'" type="button"
                            class='btn btn-error btn-outline btn-sm '>Back</button>
                        </div>

                        {{-- table  --}}
                        <div class="overflow-x-auto w-full">
                            <table class="table w-full">
                                <!-- head -->
                                <thead>
                                    <tr>
                                        <th>Image</th>
                                        <th>Name</th>
                                        <th>Quantity</th>
                                        <th>Total</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <!-- row 1 -->

                                    @if ($talue['ingredients'])
                                        @foreach ($talue['ingredients'] as $order)
                                            <tr class="text-center">
                                                <td>
                                                    <div class="flex items-center space-x-3">
                                                        <div class="avatar">
                                                            <div class="mask mask-squircle w-12 h-12">
                                                                <img src={{ $order['image'] }} />
                                                            </div>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td>{{ $order['name'] }} </td>
                                                <td>{{ $order['iquantity'] }} </td>
                                                <td>{{ $order['total'] }} </td>
                                            </tr>
                                        @endforeach
                                    @endif
                                    <tr>
                                      <td></td>
                                      <td></td>
                                      @if ($talue['buyingPrice'])
                                      <td>Buying Price</td>
                                      <td>{{ $talue['buyingPrice'] }}</td>
                                      @endif
                                     </tr>
                                     <tr>
                                      <td></td>
                                      <td></td>
                                      @if ($talue['sellingPrice'])
                                      <td>Selling Price</td>
                                      <td>{{ $talue['sellingPrice'] }}</td>
                                      @endif
                                     </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

            </div>
        </form>
    </div>
@endsection
