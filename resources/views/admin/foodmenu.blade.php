<x-app-layout>

</x-app-layout>


<!DOCTYPE html>
<html lang="en">
<head>
    @include('admin.adminCss')
</head>
<body>



<div class="container-scroller">

    <!-- Navbar -->
    @include('admin.navbar')


    <div style="position: relative; top: 60px; right: -150px;">
        <form action="{{route('admin.uploadfood')}}" method="post" enctype="multipart/form-data">
            @csrf

            <div>
                <label for="title">Title</label>
                <input style="color: blue;" type="text" id="title" name="title" placeholder="Write title" required>
            </div>

            <div>
                <label for="price">Price</label>
                <input style="color: blue;"type="number" id="price" name="price" placeholder="Enter price" required>
            </div>

            <div>
                <label for="image">Image</label>
                <input style="color: blue;"type="file" id="image" name="image" placeholder="Choose photo" required>
            </div>

            <div>
                <label for="des">Description</label>
                <input style="color: blue;"type="text" id="des" name="description" placeholder="description" required>
            </div>

            <div>
                <input style="color: black;" type="submit" value="Save">
            </div>

        </form>

        <div>
            <table bgcolor="black">
                <tr>
                    <th style="padding: 30px;">Food Name</th>
                    <th style="padding: 30px;">Price</th>
                    <th style="padding: 30px;">Description</th>
                    <th style="padding: 30px;">Image</th>
                    <th style="padding: 30px;">Action</th>
                    <th style="padding: 30px;">Action2</th>
                </tr>
                @if(isset($foods) && $foods->count() > 0)
                    @foreach($foods as $food)
                        <tr align="center">
                            <td>{{$food->title}}</td>
                            <td>{{$food->price}}</td>
                            <td>{{$food->description}}</td>
                            <td><img style="height: 200px;width: 200px;" src="/foodimage/{{$food->image}}" alt="food image"></td>
                            <td><a href="{{route('admin.deleteFood' , $food->id)}}">Delete</a></td>
                            <td><a href="{{route('admin.updateFood' , $food->id)}}">Update</a></td>
                        </tr>
                    @endforeach
                @endif
            </table>
        </div>

    </div>
</div>


<!-- JS -->
@include('admin.adminScript')

</body>
</html>
