@extends('dashboard')
@section('content')

<div class="overflow-x-auto ml-10 ">
  <div class="flex justify-between mb-4">
    <button onclick="window.location.href='{{route('userAdd')}}'" class="btn btn-outline btn-success btn-sm ">Add User</button>
  </div>
  <table class="table table-compact w-full">
    <!-- head -->
    <thead>
      <tr>  
        <th>Image</th>
        <th>Name</th>
        <th>Phone</th>
        <th>Email</th>
        <th>Role</th>
        <th>Operations</th>
      </tr>
    </thead>
    <tbody>
      <!-- row 1 -->
      @foreach ($users as $user)
     
      <tr>
        <td>
          <div class="flex items-center space-x-3">
            <div class="avatar">
              <div class="mask mask-squircle w-12 h-12">
                <img src={{asset('user_images/'.$user->image)}} />
                {{-- {!! (substr($user->image, 0 , 4) === 'http')? 
                '<img src={{$user->image}} />':
                "<img src={{asset('user_images/'.$user->image)}} />"
                !!} --}}
              </div>
            </div>
          </div>
        </td>
        <td>
          <div>
            <div class="font-bold">{{ $user->name}}</div>
          </div>
        </td>  
      <td>
        <div>
          <div class="font-bold">{{ $user->phone }}</div>
        </div>
      </td>
      <td>
        <div>
          <div class="font-bold">{{ $user->email }}</div>
        </div>
      </td>
      {!! ($user->role == '0')? 
          '<td><p class=" w-50 badge badge-secondary">Admin</p></td>':
          (($user->role == '1')?
          '<td><p class=" w-50 badge badge-primary">Customer</p></td>':
          (($user->role == '2')?
          '<td><p class=" w-50 badge badge-success">Delivery Man</p></td>':
          '<td><p class=" w-50 badge badge-warning">Vendor</p></td>'))
          !!}
 
     
        <th>
       
          {{-- <button class="btn btn-ghost btn-xs"></button> --}}
          
           {{-- <label onclick="func1()"    class="btn">
            {{ $product->id }}</label>              --}}
            {{-- <label onclick="Swal.fire({title: 'See Details',type: 'info',html:
                '<h2><b>Category Name</b>: {{ $product->name }}</h2>' +
                '<img  src={{ $product->image }}>'+'<br>'+
                '<p><b>Description</b> : {{ $product->description }} </p>'})"    
             class="btn btn-info btn-xs">
              Details</label>   --}}
            {{-- <button onclick="window.location.href='{{route('categoryEdit',$product->id)}}'" class='btn btn-secondary btn-xs'>Edit</button></div>

            <button onclick="window.location.href='{{route('categoryDelete',$product->id)}}'" class='btn btn-error btn-xs'>Delete</button></div> --}}
        </th>
      </tr>
  
      @endforeach
 
    
    </tbody>
    
  </table>
</div>

@endsection