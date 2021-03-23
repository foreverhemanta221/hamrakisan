<!-- dashboard cards -->
<div class="db-body">
    <h1>Account Settings</h1>
    <div id="acc-preview" class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="db-table-wrapper">
                    <button id="edit-acc-btn" class="btn btn-light float-right mb-2 "> <i class="far fa-edit mr-2"></i> Edit</button>
                    <table id="acc-table" class="table table-responsive-sm dashboard-table table-hover">
                        <thead></thead>
                        <tbody>
                        <tr>
                            <th>Profile Picture</th>
                            <td><img src="{{$userdetail->user_image}}" alt=""></td>
                        </tr>
                        <tr>
                            <th>Name</th>
                            <td>{{$userdetail->name}}</td>
                        </tr>
                        <tr>
                            <th>Email</th>
                            <td>{{$userdetail->email}}</td>
                        </tr>
                        <tr>
                            <th>Phone</th>
                            <td>{{$userdetail->phone_no}}</td>
                        </tr>
                        <tr>
                            <th>Address</th>
                            <td>{{check_province($userdetail->province) }} {{', '.check_district($userdetail->district)}} {{', '.$userdetail->city}}</td>
                        </tr>
                        <tr>
                            <th>Specific Address</th>
                            <td>{{$userdetail->specific_address}}</td>
                        </tr>
                        <tr>
                            <th>Joined on</th>
                            <td>{{$userdetail->created_at}}</td>
                        </tr>
                        </tbody>
                    </table>


                </div>
            </div>
        </div>
    </div>

    <div id="acc-edit" class="container">
        <div class="row">
            <div class="col-md-12">
                <form action="{{URL::to('myaccount')}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="form-card">
                        <h5> <span><i class="fas fa-user"></i></span> Update Account</h5>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="">Change Profile Picture</label>
                                    <input id="upload-foto-input" type="file" name="image" class="custom-file-input" onchange="handleFiles(this.files)" accept="image/*">

                                    <div class="upload-decor" id="up-img-decor">
                                        <img src="{{URL::asset('frontend/img/icons/img_up.png')}}" alt="">
                                        <p>We prefer square shaped image</p>
                                        <a href="#" class="btn btn-primary">Browse</a>
                                    </div>


                                    <ul id="upload-img-rack">

                                    </ul>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="acc_name">Name </label>
                                    <input type="text" name="name" class="form-control" id="acc_name" placeholder="" value="{{$userdetail->name}}" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="acc_name">Phone Number </label>
                                    <input type="text" name="phone" class="form-control" id="phone" placeholder="" value="{{$userdetail->phone_no}}" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="">Province</label>
                                    <select class="custom-select province_dropdown" id="inputGroupSelect01" name="province" required>
                                        @foreach(getProvince() as $key=>$value)
                                            <option value="{{$key}}"  {{$userdetail->province==$value ? 'selected' : ''}} >{{$value}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="acc_district">District</label>
                                    <select class="custom-select district_dropdown" id="inputGroupSelect02" name="district" required>
                                        @if($userdetail->province!=null)

                                            @foreach(checkProvinceDistrict($userdetail->province) as $key=>$value)
                                                {{--  {{$userdetail->district.' & '.$value}}  --}}
                                                <option value="{{$value}}" {{$userdetail->district==$value ? 'selected': ''}} se>{{$key}}</option>
                                            @endforeach
                                        @else
                                            @foreach(getDistrict() as $key=>$value)
                                                <option class="cde" value="{{$value}}">{{$value}}</option>
                                            @endforeach
                                        @endif
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="acc_city">City</label>
                                    <input type="text" class="form-control" name="city" id="acc_city" placeholder="" required value="{{$userdetail->city}}">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="acc_specificad">Specific Address</label>
                                    <input type="text" class="form-control" id="acc_specificad" placeholder="" name="specific_address" value="{{$userdetail->specific_address}}" required>
                                </div>
                            </div>
                        </div>
                        <a href="" class="btn btn-light">Cancel</a>
                        <button type="submit" class="btn btn-primary">Update Profile</button>
                    </div>
                </form>

            </div>
        </div>
    </div>
</div>
