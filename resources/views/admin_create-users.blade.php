@extends('layout')
@section('admin_content')
    <div class="col-md-8">
        <div class="mb-4">
            <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item">
                        <a href="{{route("dashboard")}}">
                            <i class="bi bi-globe2 small me-2"></i> Dashboard
                        </a>
                    </li>
                    <li class="breadcrumb-item">
                        <a href="{{route("admin_users")}}">
                             Users
                        </a>
                    </li>
                    <li class="breadcrumb-item active" aria-current="page">Create User</li>
                </ol>
            </nav>
        </div>
        <div  class="mb-4">
            <div class="header-bar ms-auto">
            </div>
            <br>
            <?php
            $message = Session::get('message');
            if ($message){
                echo '<span class = "text-alert" style="color: red; font-size:18px;">'.$message.'</span>';
                Session::put('message', null);
            }
            ?>
        </div>
    </div>
        <div class="col-md-12 table-responsive" style="padding-left: 20px">

            <div class="panel panel-primary">
                <div class="panel-heading">
                    <h5 style="color: red;"></h5>
                </div>
                <div class="panel-body">
                    <form method="post" action={{route('save_users')}}>
                        {{csrf_field()}}
                        <div class="form-group">
                            <label for="usr">Fullname:</label>
                            <input required="true" type="text" class="form-control" id="usr" name="fullname" value="" style="border-radius: 10px; width: 500px">
                            <input type="text" name="id" value="" hidden="true">
                        </div>
                        <div class="form-group">
                            <label for="usr">Role:</label>
                            <select class="form-control" name="role_id" id="role_id" required="true" style="border-radius: 10px; width: 500px">
                                <option value="">-Choose-</option>
                                @foreach($role as $key => $role_choose)
                                    <option value="{{$role_choose->id}}">{{$role_choose->name}}</option>
                                @endforeach

                            </select>
                        </div>
                        <div class="form-group">
                            <label for="email">Email:</label>
                            <input required="true" type="email" class="form-control" id="email" name="email" value="" style="border-radius: 10px; width: 500px">
                        </div>
                        <div class="form-group">
                            <label for="phone">Phone:</label>
                            <input required="true" type="tel" class="form-control" id="phone" name="phone" value="" style="border-radius: 10px; width: 500px">
                        </div>
                        <div class="form-group">
                            <label for="address">Address:</label>
                            <input required="true" type="text" class="form-control" id="address" name="address" value="" style="border-radius: 10px; width: 500px">
                        </div>
                        <div class="form-group">
                            <label for="pwd">Password:</label>
                            <input type="password" class="form-control" id="pwd" name="password" minlength="6" style="border-radius: 10px; width: 500px">
                        </div>
{{--                        <div class="form-group">--}}
{{--                            <label for="confirmation_pwd">Confirm Password:</label>--}}
{{--                            <input type="password" class="form-control" id="confirmation_pwd" minlength="8" style="border-radius: 10px; width: 500px">--}}
{{--                        </div>--}}
                        <button class="btn btn-success" style="margin-top: 20px; margin-left: 200px">Add</button>
                    </form>
                </div>
            </div>
        </div>

{{--    <script type="text/javascript">--}}
{{--        function validateForm() {--}}
{{--            $pwd = $('#pwd').val();--}}
{{--            $confirmPwd = $('#confirmation_pwd').val();--}}
{{--            if($pwd != $confirmPwd) {--}}
{{--                alert("Password and Confirm Password Field do not match!")--}}
{{--                return false--}}
{{--            }--}}
{{--            return true--}}
{{--        }--}}
{{--    </script>--}}
@endsection
