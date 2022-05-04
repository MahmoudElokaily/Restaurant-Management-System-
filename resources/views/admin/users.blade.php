<!DOCTYPE html>
<html>
<head>
    <title></title>
</head>
<body>

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

        <div style="position: relative;top: 60px;right: -150px;">
            <table bgcolor="gray" border="3px">
                <tr>
                    <th style="padding: 30px;">Name</th>
                    <th style="padding: 30px;">Email</th>
                    <th style="padding: 30px;">Action</th>
                </tr>
                @if(isset($users) && $users->count() > 0)
                    @foreach($users as $user)
                        <tr align="center">
                            <td>{{$user->name}}</td>
                            <td>{{$user->email}}</td>
                            @if($user->usertype == "0")
                                <td><a href="{{url('deleteUser' , $user->id)}}">Delete</a></td>
                            @else
                                <td>Not Allowed</td>
                            @endif
                        </tr>
                    @endforeach
                @endif

            </table>
        </div>


    </div>


<!-- JS -->
@include('admin.adminScript')

</body>
</html>


</body>
</html>
