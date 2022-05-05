<x-app-layout>

</x-app-layout>


<!DOCTYPE html>
<html lang="en">
<head>
    <base href="/public">

    @include('admin.adminCss')
</head>
<body>



<div class="container-scroller">

    <!-- Navbar -->
    @include('admin.navbar')

    <form action="{{route('admin.update' , $food->id)}}" method="post" enctype="multipart/form-data">
        @csrf

        <div>
            <label for="title">Title</label>
            <input style="color: blue;" type="text" id="title" name="title" value="{{$food->title}}" required>
        </div>

        <div>
            <label for="price">Price</label>
            <input style="color: blue;"type="number" id="price" name="price" value="{{$food->price}}" required>
        </div>

        <div>
            <label for="oldImage">Old image</label>
            <img id="oldImage" height="200" width="200" src="/foodimage/{{$food->image}}">
        </div>

        <div>
            <label for="image">New Image</label>
            <input style="color: blue;" type="file" id="image" name="image" value="{{$food->image}}" required>
        </div>

        <div>
            <label for="des">Description</label>
            <input style="color: blue;"type="text" id="des" name="description" value="{{$food->description}}" required>
        </div>

        <div>
            <input style="color: black;" type="submit" value="Save">
        </div>

    </form>

</div>

<!-- JS -->
@include('admin.adminScript')

</body>
</html>
