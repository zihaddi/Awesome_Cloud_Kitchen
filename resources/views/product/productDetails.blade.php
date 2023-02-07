<!DOCTYPE html>
<html lang="en">

    @extends('dashboard')
    @section('content')
     <div class="flex ">
      <div class="card w-92 mt-2 glass">
        <figure><img style="height:250px; width:600px" src={{ $product['image'] }} alt="image!"/></figure>
        <div class="card-body">
          <h2 class="card-title">{{ $product['name'] }}</h2>
          <h4>Quantity : {{ $product['quantity'] }}</h4>
          {{-- <h4>Buying Price : {{ $product['buyingPrice'] }}</h4>
          <h4>Selling Price : {{ $product['sellingPrice'] }}</h4> --}}
          <p>Description : {{ $product['description']  }}</p>  
        </div>
      </div>
      

      {{-- <div class="hero min-h-screen bg-base-200">
        <div class="hero-content flex-col lg:flex-row">
          <img src={{ $product['image'] }} class="max-w-sm rounded-lg shadow-2xl" />
          <div>
            <h2 class="card-title">{{ $product['name'] }}</h2>
          <h4>Quantity : {{ $product['quantity'] }}</h4>
          
          <p>Description : {{ $product['description']  }}</p> 
          </div>
        </div>
      </div> --}}

      <div class="overflow-x-auto w-full ml-4">
        <h2>Ingredients List </h2>
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

               
                    @foreach ($ingredients as $order)
                        <tr >
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
                            <td>{{ $order['quantity'] }} </td>
                            <td>{{ $order['price'] }} </td>
                        </tr>
                    @endforeach
                
                <tr>
                  <td></td>
                  <td></td>
                  @if ($product['buyingPrice'])
                  <td>Buying Price</td>
                  <td>{{ $product['buyingPrice'] }}</td>
                  @endif
                 </tr>
                 <tr>
                  <td></td>
                  <td></td>
                  @if ($product['sellingPrice'])
                  <td>Selling Price</td>
                  <td>{{ $product['sellingPrice'] }}</td>
                  @endif
                 </tr>
            </tbody>
        </table>
    </div>
     </div>
     <div class="flex justify-center mt-3">
      <button onclick="window.location.href='{{ route('products') }}'" type="button"
                            class='btn btn-error btn-outline btn-sm '>Back</button>
     </div>

    @endsection