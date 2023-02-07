@extends('dashboard')
@section('content')

<div class="overflow-x-auto w-full">
  <div class="flex justify-between mb-4">
    <button onclick="window.location.href='{{route('productAdd')}}'" class="btn btn-outline btn-success btn-sm ">Add Cooking Item</button>
  </div>
  
  <table class="table table-compact  w-full">
    <!-- head -->
    <thead>
      <tr>  
        <th>CATEGORY</th>
        <th>Image</th>
        <th>Name</th>
        <th>Quantity</th>
        <th>BUYING PRICE</th>
        <th>SELLING PRICE</th>
        <th>VENDOR</th>
        <th></th>
      </tr>
    </thead>
    <tbody>
      <!-- row 1 -->
      @foreach ($products as $product)
     
      <tr>
     
        
        <td>
          <div>
            <div class="font-bold">{{ $product->category_name}}</div>
          </div>
        </td>
        <td>
          <div class="flex items-center space-x-3">
            <div class="avatar">
              <div class="mask mask-squircle w-12 h-12">
                <img src={{ $product->image }} />
              </div>
            </div>
          </div>
        </td>
          
      <td>
        <div>
          <div class="font-bold">{{ $product->name }}</div>
        </div>
      </td>
      <td>
        <div>
          <div class="font-bold">{{ $product->quantity}} items</div>
        </div>
      </td>
      <td>
        <div>
          <div class="font-bold">{{ $product->buyingPrice}} BDT</div>
        </div>
      </td>
      <td>
        <div>
          <div class="font-bold">{{ $product->sellingPrice}} BDT</div>
        </div>
      </td>
      <td>
        <div>
          <div class="font-bold">{{ $product->vendor_name}}</div>
        </div>
      </td>
        <th>
       
          {{-- <button class="btn btn-ghost btn-xs"></button> --}}
          
           {{-- <label onclick="func1()"    class="btn">
            {{ $product->id }}</label>              --}}
            {{-- <label onclick="Swal.fire({title: '{{ $product->name }}',type: 'info',html:
                '<h2><b>Category</b>: {{$product->category_name}}</h2>' +
                '<p><b>Quantity</b> : {{ $product->quantity }} items</p>' +
                '<p><b>Price</b> : {{ $product->unit_price }} Taka</p>'+'<br>'+
                '<img  src={{ $product->image }}>'+'<br>'+
                '<h1><b>Vendor</b> : {{ $product->vendor_name }} </h1>'+
                '<p><b>Description</b> : {{ $product->description }} </p>'})"    
             class="btn btn-info btn-xs">
              Details</label>   --}}
              <button onclick="window.location.href='{{route('productDetails',$product->id)}}'" class='btn btn-info btn-xs'>Details</button></div>
            <button onclick="window.location.href='{{route('productEdit',$product->id)}}'" class='btn btn-secondary btn-xs'>Edit</button></div>

            <button onclick="window.location.href='{{route('productDelete',$product->id)}}'" class='btn btn-error btn-xs'>Delete</button></div>
        </th>
      </tr>
  
      @endforeach
 
    
    </tbody>
   
  </table>
  <br>

  
    {{ $products->links('pagination::tailwind') }}

</div>

@endsection