@extends('frontend.layout.layout')
@section('styles')
    <link rel="stylesheet" href="{{URL::asset('frontend/css/owl.carousel.min.css')}}">
    <link rel="stylesheet" href="{{URL::asset('frontend/css/animate.css')}}">
    <link rel="stylesheet" href="{{URL::asset('frontend/css/aos.css')}}">
    <link rel="stylesheet" href="{{URL::asset('frontend/css/venobox.min.css')}}">
@endsection
@section('content')
    <!-- secondary page cover -->
    <div class="secpage-cover">
        <img src="{{URL::asset('frontend/img/loan.jpg')}}" class="img-fluid" alt="">
        <div class="secpage-cover-overlay"></div>
        <div class="secpage-cover-header">
            <h2>Agriculture Loan</h2>
        </div>
    </div>
    <div class="bg-light pt-4 pb-5">
        <div class="container bg-white">
            <div class="row">
                <div class="col">
                    <ul class="nav nav-tabs" id="loanTab" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" id="nonCollatra;-tab" data-toggle="tab" href="#nonCollatral" role="tab" aria-controls="home" aria-selected="true">Non Collatral</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="regular-tab" data-toggle="tab" href="#regular" role="tab" aria-controls="profile" aria-selected="false">Regular</a>
                        </li>
                    </ul>
                    <div class="tab-content" id="loanTabContent">
                        <div class="tab-pane fade show active" id="nonCollatral" role="tabpanel" aria-labelledby="home-tab">
                            <form action="{{URL::to('loanrequestform')}}" method="post">
                                @csrf
                                <input type="hidden" name="loanType" value="Non Collatral">
                                <div class="row">
                                    <div class="col-xl-6">
                                        <div class="form-group">
                                            <label for="">Farm Name</label>
                                            <input type="Text" class="form-control" id="farmName" name="farmName"  placeholder="eg: kantipur Farm"
                                                   onclick="this.placeholder=''"
                                                   onblur="this.placeholder='eg: kantipur Farm'"

                                            >
                                        </div>
                                    </div>
                                    <div class="col-xl-6">
                                        <div class="form-group">
                                            <label for="">Farm type</label>
                                            <div>
                                                <div class="custom-control custom-radio custom-control-inline">
                                                    <input type="radio" id="customRadioInline1" name="farmType" class="custom-control-input" value="new">
                                                    <label class="custom-control-label" for="customRadioInline1" >New</label>
                                                </div>
                                                <div class="custom-control custom-radio custom-control-inline">
                                                    <input type="radio" id="customRadioInline2" name="farmType" class="custom-control-input"  value="running">
                                                    <label class="custom-control-label" for="customRadioInline2">Running</label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-xl-6">
                                        <div class="form-group">
                                            <label for="loanAmt">Loan Amount</label>
                                            <input type="number" class="form-control" id="loanAmt" name="loanAmount"
                                                   placeholder="Loan amt in numbers"
                                                   onclick="this.placeholder=''"
                                                   onblur="this.placeholder='Loan amt in numbers'">
                                        </div>
                                    </div>
                                    <div class="col-xl-6">
                                        <div class="form-group">
                                            <label for="farm-location">Location</label>
                                            <input type="text" class="form-control" id="farm-location" aria-describedby="emailHelp"
                                                   placeholder="eg: Patan Dhoka, Lalitpur" name="location"
                                                   onclick="this.placeholder=''"
                                                   onblur="this.placeholder='eg: Patan Dhoka, Lalitpur'"
                                            >
                                        </div>
                                    </div>
                                </div>
                                <div class="row">

                                    <div class="col-xl-6">
                                        <div class="form-group">
                                            <label for="">Phone</label>
                                            <input type="number" class="form-control" id="exampleInputssword1" name="phone"
                                                   placeholder="eg:98XXXXXXXX"
                                                   onclick="this.placeholder=''"
                                                   onblur="this.placeholder='eg:98XXXXXXXX'">
                                        </div>
                                    </div>
                                    <div class="col-xl-6">
                                        <div class="form-group">
                                            <label for="loanAmt">Email</label>
                                            <input type="email" class="form-control" id="email" name="email"
                                                   placeholder="eg:xyz@gmail.com"
                                                   onclick="this.placeholder=''"
                                                   onblur="this.placeholder='eg:xyz@gmail.com'"
                                            >
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="farm-desc">Description</label>
                                    <textarea class="form-control" id="farm-desc" name="description" aria-describedby="emailHelp" placeholder="eg: Patan Dhoka, Lalitpur">
                                     </textarea>
                                </div>
                                <button type="submit" class="btn btn-success">Apply for Loan</button>
                            </form>
                        </div>
                        <div class="tab-pane fade" id="regular" role="tabpanel" aria-labelledby="profile-tab">
                            <form action="{{URL::to('loanrequestform')}}" method="post">
                                @csrf
                                <input type="hidden" name="loanType" value="Regular">
                                <div class="row">
                                    <div class="col-xl-6">
                                        <div class="form-group">
                                            <label for="">Farm Name</label>
                                            <input type="Text" class="form-control" id="farmName" name="farmName"  placeholder="eg: kantipur Farm"
                                                   onclick="this.placeholder=''"
                                                   onblur="this.placeholder='eg: kantipur Farm'"

                                            >
                                        </div>
                                    </div>
                                    <div class="col-xl-6">
                                        <div class="form-group">
                                            <label for="">Farm type</label>
                                            <div>
                                                <div class="custom-control custom-radio custom-control-inline">
                                                    <input type="radio" id="customRadioInline1" name="farmType" class="custom-control-input" value="new">
                                                    <label class="custom-control-label" for="customRadioInline1" >New</label>
                                                </div>
                                                <div class="custom-control custom-radio custom-control-inline">
                                                    <input type="radio" id="customRadioInline2" name="farmType" class="custom-control-input"  value="running">
                                                    <label class="custom-control-label" for="customRadioInline2">Running</label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-xl-6">
                                        <div class="form-group">
                                            <label for="loanAmt">Loan Amount</label>
                                            <input type="number" class="form-control" id="loanAmt" name="loanAmount"
                                                   placeholder="Loan amt in numbers"
                                                   onclick="this.placeholder=''"
                                                   onblur="this.placeholder='Loan amt in numbers'">
                                        </div>
                                    </div>
                                    <div class="col-xl-6">
                                        <div class="form-group">
                                            <label for="farm-location">Location</label>
                                            <input type="text" class="form-control" id="farm-location" aria-describedby="emailHelp"
                                                   placeholder="eg: Patan Dhoka, Lalitpur" name="location"
                                                   onclick="this.placeholder=''"
                                                   onblur="this.placeholder='eg: Patan Dhoka, Lalitpur'"
                                            >
                                            @error('email')
                                                <span>{{$message}}</span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="row">

                                    <div class="col-xl-6">
                                        <div class="form-group">
                                            <label for="">Phone</label>
                                            <input type="number" class="form-control" id="exampleInputssword1" name="phone"
                                                   placeholder="eg:98XXXXXXXX"
                                                   onclick="this.placeholder=''"
                                                   onblur="this.placeholder='eg:98XXXXXXXX'">
                                        </div>
                                    </div>
                                    <div class="col-xl-6">
                                        <div class="form-group">
                                            <label for="loanAmt">Email</label>
                                            <input type="email" class="form-control" id="email" name="email"
                                                   placeholder="eg:xyz@gmail.com"
                                                   onclick="this.placeholder=''"
                                                   onblur="this.placeholder='eg:xyz@gmail.com'"
                                            >
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="farm-desc">Description</label>
                                    <textarea class="form-control" id="farm-desc" name="description" aria-describedby="emailHelp" placeholder="eg: Patan Dhoka, Lalitpur">
                                     </textarea>
                                </div>
                                <button type="submit" class="btn btn-success">Apply for Loan</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
@section('scripts')
    <script src="{{URL::asset('frontend/js/jquery-3.3.1.min.js')}}"></script>
    <script src="{{URL::asset('frontend/js/popper.js')}}"></script>
    <script src="{{URL::asset('frontend/js/owl.carousel.min.js')}}"></script>
    <script src="{{URL::asset('frontend/js/venobox.min.js')}}"></script>
    <script src="{{URL::asset('frontend/js/all.js')}}"></script>
    <script src="{{URL::asset('frontend/js/aos.js')}}"></script>
    <script src="{{URL::asset('frontend/js/main.js')}}"></script>
@endsection
