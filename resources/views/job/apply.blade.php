
@php
$logo=\App\Models\Utility::get_file('uploads/logo/');
// $setting = App\Models\Utility::settings();
$company_logo = Utility::getValByName('company_logo');



@endphp
<!DOCTYPE html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>{{!empty($companySettings['title_text']) ? $companySettings['title_text']->value : config('app.name', 'ERPGO')}} - {{$job->title}}</title>

    <link rel="icon" href="{{$logo.'/'.(isset($companySettings['company_favicon']) && !empty($companySettings['company_favicon'])?$companySettings['company_favicon']->value:'favicon.png')}}" type="image" sizes="16x16">
    <script src="{{ asset('js/site.core.js') }}"></script>

<html lang="en">
    <link rel="stylesheet" href="{{ asset('libs/@fortawesome/fontawesome-free/css/all.min.css') }}">
    <link rel="stylesheet" href="{{ asset('js/bootstrap-daterangepicker/daterangepicker.css') }}">
    <link rel="stylesheet" href="{{ asset('css/site.css') }}" id="stylesheet">
    <meta name="csrf-token" content="{{ csrf_token() }}">
</head>

<body>
<header class="header header-transparent" id="header-main">

    <nav class="navbar navbar-main navbar-expand-lg navbar-transparent navbar-light bg-white" id="navbar-main">
        <div class="container px-lg-0">
            <a class="navbar-brand mr-lg-5" href="#">
                <img id="image" alt="your image" src="{{$logo.(isset($company_logo) && !empty($company_logo)? $company_logo:'dark_logo.png')}}" width="150px" class="big-logo">
            </a>
            <button class="navbar-toggler pr-0" type="button" data-toggle="collapse" data-target="#navbar-main-collapse" aria-controls="navbar-main-collapse" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbar-main-collapse">

                <ul class="navbar-nav align-items-lg-center ml-lg-auto">
                    <li class="nav-item">
                        <div class="dropdown global-icon" data-toggle="tooltip" data-original-titla="{{__('Choose Language')}}">
                            <a class="nav-link px-0" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" data-offset="0,10">
                                <i class="ti ti-globe-europe"></i>
                                <span class="d-none d-lg-inline-block">{{\Str::upper($currantLang)}}</span>
                            </a>

                            <div class="dropdown-menu  dropdown-menu-right" aria-labelledby="dropdownMenuButton">
                                @foreach($languages as $language)
                                    <a class="dropdown-item @if($language == $currantLang) text-danger @endif" href="{{route('job.apply',[$job->code,$language])}}">{{\Str::upper($language)}}</a>
                                @endforeach
                            </div>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
</header>

<div class="main-content">
    <!-- Spotlight -->
    <section class="slice " data-offset-top="#header-main">
        <div class="container pt-6">
            <div class="row row-grid justify-content-center">
                <div class="col-lg-8 text-center">

                {{-- <div class="col-lg-10"> --}}
                    <h2 class="h1 mb-4">{{$job->title}}</h2>
                    <p class="lead lh-180 text-muted">
                        @foreach(explode(',',$job->skill) as $skill)
                            <span class="badge bg-primary p-2 px-3 rounded"> {{$skill}}</span>
                        @endforeach
                    </p>
                    <p class="lead lh-180"><i class="fa fa-map-marker-alt"></i> {{!empty($job->branches)?$job->branches->name:''}} </p>

                {{-- </div> --}}
                </div>
            </div>
        </div>
    </section>

    <section class="slice slice-lg ">
        <div class="container">
            <div class="mb-5 text-center">
                <h3 class=" mt-4">{{__('Apply for this job')}}</h3>
            </div>
            <div class="row justify-content-center">
                <div class="col-lg-8">
                    {{Form::open(array('route'=>array('job.apply.data',$job->code),'method'=>'post', 'enctype' => "multipart/form-data"))}}
                    <div class="row">
                        <div class="form-group col-md-6">
                            {{Form::label('name',__('Name'),['class'=>'form-label'])}}
                            {{Form::text('name',null,array('class'=>'form-control name','required'=>'required'))}}
                        </div>
                        <div class="form-group col-md-6">
                            {{Form::label('email',__('Email'),['class'=>'form-label'])}}
                            {{Form::text('email',null,array('class'=>'form-control','required'=>'required'))}}
                        </div>
                        <div class="form-group col-md-6">
                            {{Form::label('phone',__('Phone'),['class'=>'form-label'])}}
                            {{Form::text('phone',null,array('class'=>'form-control','required'=>'required'))}}
                        </div>
                        @if(!empty($job->applicant) && in_array('dob',explode(',',$job->applicant)))
                            <div class="form-group col-md-6 ">
                                {!! Form::label('dob', __('Date of Birth'),['class'=>'form-label']) !!}
                                {!! Form::text('dob', old('dob'), ['class' => 'form-control datepicker','required'=>'required']) !!}
                            </div>
                        @endif
                        @if(!empty($job->applicant) && in_array('gender',explode(',',$job->applicant)))
                            <div class="form-group col-md-6 ">
                                {!! Form::label('gender', __('Gender'),['class'=>'form-label']) !!}
                                <div class="d-flex radio-check">
                                    <div class="custom-control custom-radio custom-control-inline">
                                        <input type="radio" id="g_male" value="Male" name="gender" class="custom-control-input" >
                                        <label class="custom-control-label" for="g_male">{{__('Male')}}</label>
                                    </div>
                                    <div class="custom-control custom-radio custom-control-inline">
                                        <input type="radio" id="g_female" value="Female" name="gender" class="custom-control-input">
                                        <label class="custom-control-label" for="g_female">{{__('Female')}}</label>
                                    </div>
                                </div>
                            </div>
                        @endif

                        @if(!empty($job->applicant) && in_array('address',explode(',',$job->applicant)))
                        <div class="form-group col-md-12 ">
                            {{ Form::label('address', __('Address'), ['class' => 'form-label']) }}
                            {{ Form::textarea('address', null, ['class' => 'form-control' ,'placeholder'=>'Enter address','rows'=>'3']) }}
                        </div>
                        <div class="form-group col-md-6 address">
                            {{Form::label('city',__('City'),['class'=>'form-label'])}}
                            {{Form::text('city',null,array('class'=>'form-control','required'=>'required'))}}
                        </div>
                        <div class="form-group col-md-6 address">
                            {{Form::label('state',__('State'),['class'=>'form-label'])}}
                            {{Form::text('state',null,array('class'=>'form-control','required'=>'required'))}}
                        </div>
                        <div class="form-group col-md-6 address ">
                            {{Form::label('country',__('Country'),['class'=>'form-label'])}}
                            {{Form::text('country',null,array('class'=>'form-control','required'=>'required'))}}
                        </div>
                        <div class="form-group col-md-6 address">
                            {{ Form::label('zip_code', __('Zip Code'), ['class' => 'form-label']) }}
                            {{ Form::text('zip_code', null, ['class' => 'form-control' ,'placeholder'=>'Enter zip code']) }}
                        </div>
                        @endif
                        @if(!empty($job->visibility) && in_array('profile',explode(',',$job->visibility)))
                        <div class="form-group col-md-6">
                            {{Form::label('profile',__('Profile'),['class'=>'form-label'])}}
                            <div class="choose-file form-group">
                                <label for="profile" class="form-label">
                                    {{-- <div>{{__('Choose file here')}}</div> --}}
                                    <input type="file" class="form-control" name="profile" id="profile" data-filename="profile_create"  onchange="document.getElementById('blah').src = window.URL.createObjectURL(this.files[0])">

                                    <img id="blah"  src="" width="100"  />
                                </label>
                                <p class="profile_create"></p>
                            </div>
                        </div>
                        @endif

                        @if(!empty($job->visibility) && in_array('resume',explode(',',$job->visibility)))
                        <div class="form-group col-md-6  ">
                            {{Form::label('resume',__('CV / Resume'),['class'=>'form-label'])}}
                            <div class="choose-file form-group">
                                <label for="resume" class="form-label">
                                    {{-- <div>{{__('Choose file here')}}</div> --}}
                                    <input type="file" class="form-control" name="resume" id="resume" data-filename="resume_create"  onchange="document.getElementById('blah1').src = window.URL.createObjectURL(this.files[0])">

                                    <img id="blah1" width="100"src=""/>
                                </label>
                                <p class="resume_create"></p>
                            </div>
                        </div>
                        @endif
                        @if(!empty($job->visibility) && in_array('letter',explode(',',$job->visibility)))
                            <div class="form-group col-md-12 ">
                                {{Form::label('cover_letter',__('Cover Letter'),['class'=>'form-label'])}}
                                {{Form::textarea('cover_letter',null,array('class'=>'form-control','rows'=>'3'))}}
                            </div>
                        @endif
                        @foreach($questions as $question)
                            <div class="form-group col-md-12  question question_{{$question->id}}">
                                {{Form::label($question->question,$question->question,['class'=>'form-label'])}}
                                <input type="text" class="form-control" name="question[{{$question->question}}]" {{($question->is_required=='yes')?'required':''}}>
                            </div>
                        @endforeach
                        <div class="col-12">
                            <div class="text-center mt-4">
                                <button type="submit" class="btn btn-primary">{{__('Submit your application')}}</button>
                            </div>
                        </div>
                    </div>
                    {{Form::close()}}

                </div>
            </div>
        </div>
    </section>
</div>

<footer id="footer-main">
    <div class="footer-dark">
        <div class="container">
            <div class="row align-items-center justify-content-md-between py-4 mt-4 delimiter-top">
                <div class="col-md-6">
                    <div class="copyright text-sm font-weight-bold text-center text-md-left">
                        {{!empty($companySettings['footer_text']) ? $companySettings['footer_text']->value : ''}}
                    </div>
                </div>
                <div class="col-md-6">
                    <ul class="nav justify-content-center justify-content-md-end mt-3 mt-md-0">
                        <li class="nav-item">
                            <a class="nav-link" href="#" target="_blank">
                                <i class="fab fa-dribbble"></i>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#" target="_blank">
                                <i class="fab fa-instagram"></i>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#" target="_blank">
                                <i class="fab fa-github"></i>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#" target="_blank">
                                <i class="fab fa-facebook"></i>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</footer>
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.1.0/js/toastr.js"></script>
<script src="{{ asset('js/autosize.min.js') }}"></script>
<script src="{{ asset('js/bootstrap-notify/bootstrap-notify.min.js') }}"></script>
<script src="{{ asset('js/moment.min.js') }}"></script>
<script src="{{ asset('js/bootstrap-daterangepicker/daterangepicker.js') }}"></script>
<script src="{{ asset('js/site.js') }}"></script>
<script src="{{ asset('js/demo.js') }} "></script>

<script>
    function show_toastr(title, message, type) {
        var o, i;
        var icon = '';
        var cls = '';
        if (type == 'success') {
            icon = 'ti ti-check-circle';
            cls = 'success';
        } else {
            icon = 'ti ti-times-circle';
            cls = 'danger';
        }

        $.notify({icon: icon, title: " " + title, message: message, url: ""}, {


            element: "body",
            type: cls,
            allow_dismiss: !0,
            placement: {from: 'top', align: 'right' },
            offset: {x: 10, y: 10},
            width: 348,
            spacing: 5,
            z_index: 10,
            delay: 25,
            timer: 2000,
            url_target: "_blank",
            mouse_over: !1,
            animate: {enter: o, exit: i},
            template: '<div class="alert alert-{0} alert-icon alert-group alert-notify" data-notify="container" role="alert"><div class="alert-group-prepend alert-content"><span class="alert-group-icon"><i data-notify="icon"></i></span></div><div class="alert-content"><strong data-notify="title">{1}</strong><div data-notify="message">{2}</div></div><button type="button" class="close" data-notify="dismiss" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>'
        });
    }
    if ($(".datepicker").length) {
        $('.datepicker').daterangepicker({
            singleDatePicker: true,
            format: 'yyyy-mm-dd',
        });
    }

</script>

@if($message = Session::get('success'))
    <script>
        show_toastr('Success', '{!! $message !!}', 'success');
    </script>
@endif
@if($message = Session::get('error'))
    <script>
        show_toastr('Error', '{!! $message !!}', 'error');
    </script>
@endif
</body>

</html>
