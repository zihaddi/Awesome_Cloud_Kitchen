@extends('dashboard')
@section('content')

<div class="overflow-x-auto ml-20 w-full">
  <div class="flex justify-between mb-4">
    <button onclick="window.location.href='{{route('categoryAdd')}}'" class="btn btn-outline btn-success btn-sm ">Add Category</button>
  </div>
  <table class="table table-compact  w-full">
    <!-- head -->
    <thead>
      <tr>  
        <th>Id</th>
        <th>Image</th>
        <th>Name</th>
        <th>Operations</th>
        <th></th>
      </tr>
    </thead>
    <tbody>
      <!-- row 1 -->
      @foreach ($products as $product)
     
      <tr>

        <td>
          <div>
            <div class="font-bold">{{ $product->id}}</div>
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
 
     
        <th>
       
          {{-- <button class="btn btn-ghost btn-xs"></button> --}}
          
           {{-- <label onclick="func1()"    class="btn">
            {{ $product->id }}</label>              --}}
            <label onclick="Swal.fire({title: 'See Details',type: 'info',html:
                '<h2><b>Category Name</b>: {{ $product->name }}</h2>' +
                '<img  src={{ $product->image }}>'+'<br>'+
                '<p><b>Description</b> : {{ $product->description }} </p>'})"    
             class="btn btn-info btn-xs">
              Details</label>  
            <button onclick="window.location.href='{{route('categoryEdit',$product->id)}}'" class='btn btn-secondary btn-xs'>Edit</button></div>

            <button onclick="window.location.href='{{route('categoryDelete',$product->id)}}'" class='btn btn-error btn-xs'>Delete</button></div>
        </th>
      </tr>
  
      @endforeach
 
    
    </tbody>
    
  </table>
</div>

@endsection