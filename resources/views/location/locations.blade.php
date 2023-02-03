@extends('dashboard')
@section('content')

<div class="overflow-x-auto  w-full">
  <div class="flex justify-between mb-4 ">
    <button onclick="window.location.href='{{route('countryAdd')}}'" class="btn btn-outline btn-success btn-sm ml-8">Add Country</button>
    <button onclick="window.location.href='{{route('cityAdd')}}'" class="btn btn-outline btn-success btn-sm mr-40">Add City</button>
    <button onclick="window.location.href='{{route('placeAdd')}}'" class="btn btn-outline btn-success btn-sm ">Add Thana</button>
  {{-- countryTable   --}}
  </div>
      <div class="flex justify-between">
        <div>
          <table class="table table-compact  w-1/4  ml-8">
            <!-- head -->
            <thead>
               <tr>  
                <th>Name</th>
                <th></th>
              </tr>
            </thead>
            <tbody>
              <!-- row 1 -->
              @foreach ($countries as $product)
             
              <tr >    
              <td >
                <div >
                  <div class="font-bold">{{ $product->name }}</div>
                </div>
              </td>
                <th class="w-1/3">
                    <button onclick="window.location.href='{{route('countryEdit',$product->id)}}'" class='btn btn-secondary btn-xs'>=</button></div>
        
                    <button onclick="window.location.href='{{route('countryDelete',$product->id)}}'" class='btn btn-error btn-xs'>x</button></div>
                </th>
              </tr>
          
              @endforeach
         
            
            </tbody>
            
          </table>
          <div class="mt-2 flex justify-center">
            {{ $countries->links('pagination::tailwind') }}
          </div>
        </div>

        <div>
          <table class="table table-compact  mx-5">
            <!-- head -->
            <thead>
               <tr>  
                <th>City Name</th>
                <td>City</td>
                <th></th>
              </tr>
            </thead>
            <tbody>
              <!-- row 1 -->
              @foreach ($cities as $product)
             
              <tr>  
                
                <td>
                  <div>
                    <div class="font-bold">{{ $product->country_name  }}</div>
                  </div>
                </td> 
              <td>
                <div>
                  <div class="font-bold">{{ $product->name }}</div>
                </div>
              </td>
                <th class="w-1/4">
                    <button onclick="window.location.href='{{route('countryEdit',$product->id)}}'" class='btn btn-secondary btn-xs'>=</button></div>
          
                    <button onclick="window.location.href='{{route('countryDelete',$product->id)}}'" class='btn btn-error btn-xs'>x</button></div>
                </th>
              </tr>
          
              @endforeach
          
            
            </tbody>
            
          </table>
          <div class="flex justify-center mt-2">
            {{ $cities->links('pagination::tailwind') }}
          </div>
        </div>
      
        <div>
          <table class="table table-compact   w-1/4 ">
            <!-- head -->
            <thead>
               <tr>  
                <th>City Name</th>
                <td>Thana</td>
                <th></th>
              </tr>
            </thead>
            <tbody>
              <!-- row 1 -->
              @foreach ($places as $product)
             
              <tr>  
                
                <td>
                  <div>
                    <div style="width: 20px" class="font-bold">{{ $product->city_name  }}</div>
                  </div>
                </td> 
              <td style="width: 10px">
                
                  <p  class="font-bold">{{ $product->name }}</p>
                
              </td>
                <th style="width: 20px">
                    <button onclick="window.location.href='{{route('countryEdit',$product->id)}}'" class='btn btn-secondary btn-xs'>=</button></div>
          
                    <button onclick="window.location.href='{{route('countryDelete',$product->id)}}'" class='btn btn-error btn-xs'>x</button></div>
                </th>
              </tr>
          
              @endforeach
          
            
            </tbody>
            
          </table>
          <div class="flex justify-center mt-2">
            {{ $places->links('pagination::tailwind') }}
          </div>
        </div>
      </div>
      <div class="flex justify-center mt-3 mr-20">
       
      </div>
  </div>


  {{-- citiTable --}}
  
 

  

</div>

@endsection