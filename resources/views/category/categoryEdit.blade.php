<!DOCTYPE html>
<html lang="en">

<head>
    @extends('dashboard')
    @section('content')
        <div class="flex justify-center bg-dark">
            <form action="categoriesEdit" method="post">
                @csrf
                <input name='id' type="hidden" class="form-control" value='{{ $category->id }}'>
                {{-- addding portion --}}
                {{-- parent --}}
                <div class="flex justify-between">
                    {{-- child1 --}}
                    <div>
                        <div class="form-control  max-w-xs mt-4">

                            <img style="height: 50%; width:90%" src={{ $category->image }} alt="">
                        </div>
                    </div>
                    {{-- child2 --}}
                    <div>
                        <div class="form-control  max-w-xs">
                            <label class="label">
                                <span class="label-text">Change Image :</span>
                            </label>
                            {{-- <img style="width:90%" src={{ $product->image }} alt=""> --}}
                            <input type="text" name="image" placeholder="image" class="input input-bordered "
                                value='{{ $category->image }}' style="width: 300px;" />
                        </div>
                        <div class="form-control  max-w-xs">
                            <label class="label">
                                <span class="label-text">Category name :</span>
                            </label>
                            <input type="text" name="name" placeholder="product name" class="input input-bordered "
                                value='{{ $category->name }}' style="width: 300px;" />
                        </div>
                        <div class="form-control  max-w-xs">
                            <label class="label">
                                <span class="label-text">Description :</span>
                            </label>
                            <input type="text" name="description" placeholder="description" class="input input-bordered "
                                value='{{ $category->description }}' style="width: 300px;" />
                        </div>
                        <br><br>
                        <div class="flex justify-between">
                          <input type="submit" class="btn btn-outline btn-primary btn-sm" value="Edit Category">
                        <button onclick="window.location.href='{{route('categories')}}'" type="button" class='btn btn-error btn-outline btn-sm' >Back</button>
                        </div>
                    </div>
                </div>

            </form>
        </div>
    @endsection
