@extends('dashboard')
@section('content')
<head>
 
</head>
<div class="overflow-x-auto w-full">
  <div class="flex justify-between mb-4">
    <button onclick="window.location.href='{{route('ingredientCategoryAdd')}}'" class="btn btn-outline btn-success btn-sm ">Add Ingredient Category</button>
  </div>
  
  <table class="table table-compact  w-full">
    <!-- head -->
    <thead>
      <tr>  
      
        <th>Image</th>
        <th>Name</th>
        <th>Description</th>
        <th></th>
      </tr>
    </thead>
    <tbody>
      <!-- row 1 -->
      @foreach ($icategories as $product)
     
      <tr>
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
          <div class="font-bold">{{ $product->description}} </div>
        </div>
      </td>
        <th>
       
          {{-- <button class="btn btn-ghost btn-xs"></button> --}}
          
           {{-- <label onclick="func1()"    class="btn">
            {{ $product->id }}</label>              --}}
            {{-- <button onclick="window.location.href='{{route('productEdit',$product->id)}}'" class='btn btn-secondary btn-xs'>Edit</button></div>

            <button onclick="window.location.href='{{route('productDelete',$product->id)}}'" class='btn btn-error btn-xs'>Delete</button></div> --}}
        </th>
      </tr>
  
      @endforeach
 
    
    </tbody>
   
  </table>
  <br>

  
    {{-- {{ $products->links('pagination::tailwind') }} --}}

</div>

@endsection