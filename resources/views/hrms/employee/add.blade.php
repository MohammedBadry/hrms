@extends('hrms.layouts.base')

@section('content')
    <!-- START CONTENT -->
    <div class="content forms-wizard">


        <!-- -------------- Topbar -------------- -->
        <header id="topbar" class="alt">
            @if(\Route::getFacadeRoot()->current()->uri() == $currentLocale.'/edit-emp/{id}')

                <div class="topbar-left">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-icon">
                            <a href="/dashboard">
                                <span class="fa fa-home"></span>
                            </a>
                        </li>
                        {{-- <li class="breadcrumb-active">
                             <a href="#"> Edit Details</a>
                         </li>--}}
                        <li class="breadcrumb-link">
                            <a href="/dashboard"> {{ trans('main.employees') }} </a>
                        </li>
                        <li class="breadcrumb-current-item"> {{ trans('main.edit') .' '. trans('main.details') .' '.trans('main.of') }} {{$emps->name}} </li>
                    </ol>
                </div>

            @else

                <div class="topbar-left">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-icon">
                            <a href="/dashboard">
                                <span class="fa fa-home"></span>
                            </a>
                        </li>
                        <li class="breadcrumb-active">
                            <a href="/dashboard">{{ trans('main.dashboard') }}</a>
                        </li>
                        <li class="breadcrumb-link">
                            <a href="/add-employee"> {{ trans('main.employees') }} </a>
                        </li>
                        <li class="breadcrumb-current-item"> {{ trans('main.add') .' '. trans('main.details') }} </li>
                    </ol>
                </div>

            @endif
        </header>
        <!-- -------------- /Topbar -------------- -->

        <!-- -------------- Content -------------- -->
        <section id="content" class="animated fadeIn">

            <div class="mw1000 center-block">
                @if(session('message'))
                    {{session('message')}}
                @endif
                @if(Session::has('flash_message'))
                    <div class="alert alert-success">
                        {{ session::get('flash_message') }}
                    </div>
                    @endif

                            <!-- -------------- Wizard -------------- -->
                    <!-- -------------- Spec Form -------------- -->
                    <div class="allcp-form">

                        <form method="post" action="/" id="custom-form-wizard">
                            <div class="wizard steps-bg steps-left">

                                <!-- -------------- step 1 -------------- -->
                                <h4 class="wizard-section-title">
                                    <i class="fa fa-user pr5"></i> {{ trans('main.personal_details') }}</h4>
                                <section class="wizard-section">
                                    <div class="section">
                                        <label for="photo-upload"><h6 class="mb20 mt40"> {{ trans('main.photo') }} </h6></label>
                                        <label class="field prepend-icon append-button file">
                                            <span class="button">{{ trans('main.choose_file') }}</span>
                                            @if(\Route::getFacadeRoot()->current()->uri() == $currentLocale.'/edit-emp/{id}')
                                                <input type="hidden" value="edit-emp/{{$emps->id}}" id="url">

                                                <input type="file" class="gui-file" name="photo" id="photo_upload"
                                                       value="@if($emps && $emps->photo){{$emps->photo}}@endif"
                                                       onChange="document.getElementById('uploader1').value = this.value;">
                                                <input type="text" class="gui-input" id="uploader1"
                                                       placeholder="{{ trans('main.choose_file') }}">
                                                <label class="field-icon">
                                                    <i class="fa fa-cloud-upload"></i>
                                                </label>
                                            @else
                                                <input type="hidden" value="add-employee" id="url">
                                                <input type="file" class="gui-file" name="photo" id="photo_upload"
                                                       onChange="document.getElementById('uploader1').value = this.value;">
                                                <input type="text" class="gui-input" id="uploader1"
                                                       placeholder="{{ trans('main.choose_file') }}">
                                                <label class="field-icon">
                                                    <i class="fa fa-cloud-upload"></i>
                                                </label>
                                            @endif
                                        </label>
                                    </div>

                                    <!-- -------------- /section -------------- -->

                                    <div class="section">
                                        <label for="input002"><h6 class="mb20 mt40">{{ trans('main.code') }}</h6></label>
                                        <label for="input002" class="field prepend-icon">
                                            @if(\Route::getFacadeRoot()->current()->uri() == $currentLocale.'/edit-emp/{id}')
                                                <input type="text" name="emp_code" id="emp_code" class="gui-input"
                                                       value="@if($emps && $emps->employee->code){{$emps->employee->code}}@endif" required>
                                                <label for="input002" class="field-icon">
                                                    <i class="fa fa-barcode"></i>
                                                </label>
                                            @else
                                                <input type="text" name="emp_code" id="emp_code" class="gui-input"
                                                       placeholder="{{ trans('main.code') }}..." required>
                                                <label for="input002" class="field-icon">
                                                    <i class="fa fa-barcode"></i>
                                                </label>
                                            @endif
                                        </label>
                                    </div>


                                    <div class="section">
                                        <label for="input002"><h6 class="mb20 mt40">{{ trans('main.name_en') }} </h6></label>
                                        <label for="input002" class="field prepend-icon">
                                            @if(\Route::getFacadeRoot()->current()->uri() == $currentLocale.'/edit-emp/{id}')
                                                <input type="text" name="emp_name_en" id="emp_name_en" class="gui-input"
                                                       value="@if($emps && $emps->employee->getName()->en){{$emps->employee->getName()->en}}@endif" required>
                                                <label for="input002" class="field-icon">
                                                    <i class="fa fa-user"></i>
                                                </label>
                                            @else
                                                <input type="text" name="emp_name" id="emp_name" class="gui-input"
                                                       placeholder="{{ trans('main.name') }}..." required>
                                                <label for="input002" class="field-icon">
                                                    <i class="fa fa-user"></i>
                                                </label>
                                            @endif
                                        </label>
                                    </div>


                                    <div class="section">
                                        <label for="input002"><h6 class="mb20 mt40">{{ trans('main.name_ar') }} </h6></label>
                                        <label for="input002" class="field prepend-icon">
                                            @if(\Route::getFacadeRoot()->current()->uri() == $currentLocale.'/edit-emp/{id}')
                                                <input type="text" name="emp_name_ar" id="emp_name_ar" class="gui-input"
                                                       value="@if($emps && $emps->employee->getName()->ar){{$emps->employee->getName()->ar}}@endif" required>
                                                <label for="input002" class="field-icon">
                                                    <i class="fa fa-user"></i>
                                                </label>
                                            @else
                                                <input type="text" name="emp_name" id="emp_name" class="gui-input"
                                                       placeholder="{{ trans('main.name') }}..." required>
                                                <label for="input002" class="field-icon">
                                                    <i class="fa fa-user"></i>
                                                </label>
                                            @endif
                                        </label>
                                    </div>


                                    <div class="section">
                                        <label for="input002"><h6 class="mb20 mt40">{{ trans('main.status') }} </h6></label>
                                        <div class="option-group field">
                                            @if(\Route::getFacadeRoot()->current()->uri() == $currentLocale.'/edit-emp/{id}')
                                                <label class="field option mb5">
                                                    <input type="radio" name="emp_status" id="emp_status" value="1"
                                                       @if(isset($emps))@if($emps->employee->status == '1') checked @endif @endif>
                                                    <span class="radio"></span>{{ trans('main.present') }}
                                                </label>
                                                <label class="field option mb5">
                                                    <input type="radio" name="emp_status" id="emp_status" value="0"
                                                       @if(isset($emps))@if($emps->employee->status == '0') checked @endif @endif>
                                                    <span class="radio"></span>{{ trans('main.ex') }}
                                                </label>
                                            @else
                                                <label class="field option mb5">
                                                    <input type="radio" name="emp_status" id="emp_status" value="1">
                                                    <span class="radio"></span>{{ trans('main.present') }}
                                                </label>
                                                <label class="field option mb5">
                                                    <input type="radio" name="emp_status" id="emp_status" value="0" checked>
                                                    <span class="radio"></span>{{ trans('main.ex') }}
                                                </label>
                                            @endif
                                        </div>
                                    </div>

                                        <div class="section">
                                            <label for="input002"><h6 class="mb20 mt40"> {{ trans('main.role') }} </h6></label>
                                            @if(\Route::getFacadeRoot()->current()->uri() == $currentLocale.'/edit-emp/{id}')
                                                <select class="select2-single form-control" name="role" id="role" readonly required>
                                                    <option value="">{{ trans('main.select') }} {{ trans('main.role') }}</option>
                                                    @foreach($roles as $role)
                                                        @if($emps->role->role->id == $role->id)
                                                            <option value="{{$role->id}}" selected>{{$role->name}}</option>
                                                        @endif
                                                        <option value="{{$role->id}}">{{$role->name}}</option>
                                                    @endforeach
                                                </select>
                                                @else
                                                <select class="select2-single form-control" name="role" id="role">
                                                    <option value="">{{ trans('main.select') }} {{ trans('main.role') }}</option>
                                                    @foreach($roles as $role)
                                                        <option value="{{$role->id}}">{{$role->name}}</option>
                                                    @endforeach
                                                </select>
                                            @endif
                                        </div>

                                    <div class="section">
                                        <label for="input002"><h6 class="mb20 mt40"> {{ trans('main.gender') }} </h6></label>
                                        <div class="option-group field">
                                            <label class="field option mb5">
                                                <input type="radio" value="0" name="gender" id="gender"
                                                       @if(isset($emps))@if($emps->employee->gender == '0')checked @endif @endif>
                                                <span class="radio"></span>{{ trans('main.male') }}</label>
                                            <label class="field option mb5">
                                                <input type="radio" value="1" name="gender" id="gender"
                                                       @if(isset($emps))@if($emps->employee->gender == '1')checked @endif @endif>
                                                <span class="radio"></span>{{ trans('main.female') }}</label>
                                        </div>
                                    </div>


                                    <div class="section">
                                        <label for="datepicker1" class="field prepend-icon mb5"><h6 class="mb20 mt40">
                                            {{ trans('main.birth_date') }} </h6></label>

                                        <div class="field prepend-icon">
                                            @if(\Route::getFacadeRoot()->current()->uri() == $currentLocale.'/edit-emp/{id}')
                                                <input type="text" id="datepicker1" class="gui-input fs13" name="dob"
                                                       value="@if($emps && $emps->employee->date_of_birth){{$emps->employee->date_of_birth}}@endif" required>
                                                <label class="field-icon">
                                                    <i class="fa fa-calendar"></i>
                                                </label>
                                            @else
                                                <input type="text" id="datepicker1" class="gui-input fs13" name="dob" required>
                                                <label class="field-icon">
                                                    <i class="fa fa-calendar"></i>
                                                </label>
                                            @endif
                                        </div>
                                    </div>


                                    <div class="section">
                                        <label for="datepicker4" class="field prepend-icon mb5"><h6 class="mb20 mt40">
                                            {{ trans('main.join_date') }} </h6></label>

                                        <div class="field prepend-icon">
                                            @if(\Route::getFacadeRoot()->current()->uri() == $currentLocale.'/edit-emp/{id}')
                                                <input type="text" id="datepicker4" class="gui-input fs13" name="doj"
                                                       value="@if($emps && $emps->employee->date_of_joining){{$emps->employee->date_of_joining}}@endif" required>
                                                <label class="field-icon">
                                                    <i class="fa fa-calendar"></i>
                                                </label>
                                            @else
                                                <input type="text" id="datepicker4" class="gui-input fs13" name="doj" required>
                                                <label class="field-icon">
                                                    <i class="fa fa-calendar"></i>
                                                </label>
                                            @endif
                                        </div>
                                    </div>


                                    <div class="section">
                                        <label for="input002"><h6 class="mb20 mt40"> {{ trans('main.mobile_number') }} </h6></label>
                                        <label for="input002" class="field prepend-icon">
                                            @if(\Route::getFacadeRoot()->current()->uri() == $currentLocale.'/edit-emp/{id}')
                                                <input type="number" name="mob_number" id="mobile_phone"
                                                       class="gui-input phone-group" maxlength="10" minlength="10" required
                                                       value="@if($emps && $emps->employee->number){{$emps->employee->number}}@endif">
                                                <label for="input002" class="field-icon">
                                                    <i class="fa fa-mobile-phone"></i>
                                                </label>
                                            @else
                                                <input type="number" name="mob_number" id="mobile_phone"
                                                       class="gui-input phone-group" maxlength="10" minlength="10" required
                                                       placeholder="{{ trans('main.mobile_number') }}...">
                                                <label for="input002" class="field-icon">
                                                    <i class="fa fa-mobile-phone"></i>
                                                </label>
                                            @endif
                                        </label>
                                    </div>

                                    <div class="section">
                                        <label for="input002"><h6 class="mb20 mt40"> {{ trans('main.qualification') }} </h6></label>
                                        <label for="input002" class="field prepend-icon">
                                            @if(\Route::getFacadeRoot()->current()->uri() == $currentLocale.'/edit-emp/{id}')

                                                {!! Form::select('qualification_list', qualification(),$emps->employee->qualification, ['class' => 'select2-single form-control qualification_select', 'id' => 'qualification']) !!}
                                                <input type="text" id="qualification" class="gui-input form-control hidden qualification_text" placeholder="{{ trans('main.qualification') }}" value="{{$emps->employee->qualification}}"/>

                                            @else
                                               {!! Form::select('qualification_list', qualification(),'', ['class' => 'select2-single form-control qualification_select', 'id' => 'qualification']) !!}
                                               <input type="text" id="qualification" class="gui-input form-control hidden qualification_text" placeholder="{{ trans('main.other_qualification') }}"/>
                                            @endif
                                            </label>
                                    </div>


                                    <div class="section">
                                        <label for="input002"><h6 class="mb20 mt40"> {{ trans('main.emergency_number') }} </h6></label>
                                        <label for="input002" class="field prepend-icon">
                                            @if(\Route::getFacadeRoot()->current()->uri() == $currentLocale.'/edit-emp/{id}')
                                                <input type="number" name="emer_number" id="emergency_number"
                                                       class="gui-input phone-group" maxlength="10" minlength="10"
                                                       value="@if($emps && $emps->employee->emergency_number){{$emps->employee->emergency_number}}@endif">
                                                <label for="input002" class="field-icon">
                                                    <i class="fa fa-mobile-phone"></i>
                                                </label>
                                            @else
                                                <input type="number" name="emer_number" id="emergency_number"
                                                       class="gui-input phone-group" maxlength="10" minlength="10"
                                                       placeholder="{{ trans('main.emergency_number') }}">
                                                <label for="input002" class="field-icon">
                                                    <i class="fa fa-mobile-phone"></i>
                                                </label>
                                            @endif
                                        </label>
                                    </div>

                                    <div class="section">
                                        <label for="input002"><h6 class="mb20 mt40"> {{ trans('main.father_name') }} </h6></label>
                                        <label for="input002" class="field prepend-icon">
                                            @if(\Route::getFacadeRoot()->current()->uri() == $currentLocale.'/edit-emp/{id}')
                                                <input type="text" name="father_name" id="father_name" class="gui-input"
                                                       value="@if($emps && $emps->employee->father_name){{$emps->employee->father_name}}@endif">

                                            @else
                                                <input type="text" placeholder="{{ trans('main.father_name') }}"
                                                       name="father_name" id="father_name" class="gui-input">

                                            @endif
                                        </label>
                                    </div>


                                    <div class="section">
                                        <label for="input002"><h6 class="mb20 mt40"> {{ trans('main.current_address') }} </h6></label>
                                        <label for="input002" class="field prepend-icon">
                                            @if(\Route::getFacadeRoot()->current()->uri() == $currentLocale.'/edit-emp/{id}')
                                                <input type="text" name="address" id="address" class="gui-input"
                                                       value="@if($emps && $emps->employee->current_address){{$emps->employee->current_address}}@endif">
                                                <label for="input002" class="field-icon">
                                                    <i class="fa fa-map-marker"></i>
                                                </label>
                                            @else
                                                <input type="text" placeholder="{{ trans('main.current_address') }}..." name="address"
                                                       id="address" class="gui-input">
                                                <label for="input002" class="field-icon">
                                                    <i class="fa fa-map-marker"></i>
                                                </label>
                                            @endif
                                        </label>
                                    </div>


                                    <div class="section">
                                        <label for="input002"><h6 class="mb20 mt40"> {{ trans('main.permanent_address') }} </h6></label>
                                        <label for="input002" class="field prepend-icon">
                                            @if(\Route::getFacadeRoot()->current()->uri() == $currentLocale.'/edit-emp/{id}')
                                                <input type="text" name="permanent_address" id="permanent_address"
                                                       class="gui-input"
                                                       value="@if($emps && $emps->employee->permanent_address){{$emps->employee->permanent_address}}@endif">
                                                <label for="input002" class="field-icon">
                                                    <i class="fa fa-location-arrow"></i>
                                                </label>
                                            @else
                                                <input type="text" placeholder="{{ trans('main.permanent_address') }}..."
                                                       name="permanent_address" id="permanent_address"
                                                       class="gui-input">
                                                <label for="input002" class="field-icon">
                                                    <i class="fa fa-location-arrow"></i>
                                                </label>
                                            @endif
                                        </label>
                                    </div>
                                    <!-- -------------- /section -------------- -->
                                </section>

                                <!-- -------------- step 2 -------------- -->
                                <h4 class="wizard-section-title">
                                    <i class="fa fa-user-secret pr5"></i> {{ trans('main.employment_details') }}</h4>
                                <section class="wizard-section">
                                    <!-- -------------- /section -------------- -->
                                    <div class="section">
                                        <label for="input002"><h6 class="mb20 mt40"> {{ trans('main.joining_formalities') }} </h6></label>

                                        <div class="option-group field">
                                            <label class="field option mb5">
                                                <input type="radio" value="1" name="formalities"
                                                       id="formalities"
                                                       @if(isset($emps))@if($emps->employee->formalities == '1')checked @endif @endif>
                                                <span class="radio"></span>{{ trans('main.completed') }}</label>
                                            <label class="field option mb5">
                                                <input type="radio" value="0" name="formalities" id="formalities"
                                                       @if(isset($emps))@if($emps->employee->formalities == '0')checked @endif @endif>
                                                <span class="radio"></span>{{ trans('main.pending') }}</label>
                                        </div>
                                    </div>

                                    <div class="section">
                                        <label for="input002"><h6 class="mb20 mt40"> {{ trans('main.offer_acceptance') }} </h6></label>

                                        <div class="option-group field">
                                            <label class="field option mb5">
                                                <input type="radio" value="1" name="offer_acceptance"
                                                       id="offer_acceptance"
                                                       @if(isset($emps))@if($emps->employee->offer_acceptance == '1')checked @endif @endif>
                                                <span class="radio"></span>{{ trans('main.completed') }}</label>
                                            <label class="field option mb5">
                                                <input type="radio" value="0" name="offer_acceptance"
                                                       id="offer_acceptance"
                                                       @if(isset($emps))@if($emps->employee->offer_acceptance == '0')checked @endif @endif>
                                                <span class="radio"></span>{{ trans('main.pending') }}</label>
                                        </div>
                                    </div>


                                    <div class="section">
                                        <label for="input002"><h6 class="mb20 mt40"> {{ trans('main.probation_period') }} </h6></label>

                                                @if(\Route::getFacadeRoot()->current()->uri() == $currentLocale.'/edit-emp/{id}')
                                            <select class="select2-single form-control probation_select" name="prob_period" id="probation_period" >
                                                <option value="">{{ trans('main.select') }} {{ trans('main.probation_period') }}</option>
                                                    @if($emps->employee->probation_period == '0')
                                                        <option value="0" selected>0 {{ trans('main.days') }}</option>
                                                        <option value="90">90 {{ trans('main.days') }}</option>
                                                        <option value="180">180 {{ trans('main.days') }}</option>
                                                        <option value="Other">{{ trans('main.other') }}</option>
                                                    @elseif($emps->employee->probation_period == '90')
                                                        <option value="0">0 {{ trans('main.days') }}</option>
                                                        <option value="90" selected>90 {{ trans('main.days') }}</option>
                                                        <option value="180">180 {{ trans('main.days') }}</option>
                                                        <option value="Other">{{ trans('main.other') }}</option>
                                                    @elseif($emps->employee->probation_period == '180')
                                                        <option value="0">0 {{ trans('main.days') }}</option>
                                                        <option value="90">90 {{ trans('main.days') }}</option>
                                                        <option value="180" selected>180 {{ trans('main.days') }}</option>
                                                        <option value="Other">{{ trans('main.other') }}</option>
                                                     @else
                                                        <option value="0">0 {{ trans('main.days') }}</option>
                                                        <option value="90">90 {{ trans('main.days') }}</option>
                                                        <option value="180">180 {{ trans('main.days') }}</option>
                                                        <option value="Other" selected>{{ trans('main.other') }}</option>

                                                    @endif
                                            </select>
                                                    <input type="text" class="form-control probation_text hidden" id="probation_text" value={{$emps->employee->probation_period}}>
                                                @else
                                                    <select class="select2-single form-control probation_select" name="prob_period" id="probation_period" >
                                                    <option value="">{{ trans('main.select') }} {{ trans('main.probation_period') }}</option>
                                                    <option value="0">0 {{ trans('main.days') }}</option>
                                                    <option value="90">90 {{ trans('main.days') }}</option>
                                                    <option value="180">180 {{ trans('main.days') }}</option>
                                                    <option value="Other">{{ trans('main.other') }}</option>
                                                    </select>
                                            <input type="text" class="form-control probation_text hidden" id="probation_text">
                                                @endif


                                    </div>



                                    <div class="section">
                                        <label for="datepicker5" class="field prepend-icon mb5"><h6 class="mb20 mt40">
                                            {{ trans('main.confirmation_date') }} </h6></label>

                                        <div class="field prepend-icon">
                                            @if(\Route::getFacadeRoot()->current()->uri() == $currentLocale.'/edit-emp/{id}')
                                                <input type="text" id="datepicker5" class="gui-input fs13" name="doc"
                                                       value="@if($emps && $emps->employee->date_of_confirmation){{$emps->employee->date_of_confirmation}}@endif"/>
                                                <label class="field-icon">
                                                    <i class="fa fa-calendar"></i>
                                                </label>
                                            @else
                                                <input type="text" id="datepicker5" class="gui-input fs13" name="doc"/>
                                                <label class="field-icon">
                                                    <i class="fa fa-calendar"></i>
                                                </label>
                                            @endif
                                        </div>
                                    </div>


                                    <div class="section">
                                        <label for="input002"><h6 class="mb20 mt40"> {{ trans('main.department') }} </h6></label>
                                            <select class="select2-single form-control" name="department" id="department">
                                                <option value="">{{ trans('main.select') }} </option>
                                                @if(\Route::getFacadeRoot()->current()->uri() == $currentLocale.'/edit-emp/{id}')
                                                    @if($emps->employee->department == 'Marketplace')
                                                        <option value="Marketplace" selected>{{ trans('main.marketplace') }}</option>
                                                        <option value="Social Media">{{ trans('main.social_media') }}</option>
                                                        <option value="IT">{{ trans('main.it') }}</option>
                                                    @elseif($emps->employee->department == 'Social Media')
                                                        <option value="Marketplace">{{ trans('main.marketplace') }}</option>
                                                        <option value="Social Media" selected>{{ trans('main.social_media') }}</option>
                                                        <option value="IT">{{ trans('main.it') }}</option>
                                                    @else
                                                        <option value="Marketplace">{{ trans('main.marketplace') }}</option>
                                                        <option value="Social Media">{{ trans('main.social_media') }}</option>
                                                        <option value="IT" selected>{{ trans('main.it') }}</option>
                                                    @endif
                                                @else
                                                    <option value="Marketplace">{{ trans('main.marketplace') }}</option>
                                                    <option value="Social Media">{{ trans('main.social_media') }}</option>
                                                    <option value="IT">{{ trans('main.it') }}</option>
                                                @endif
                                            </select>
                                    </div>


                                    <div class="section">
                                        <label for="input002"><h6 class="mb20 mt40"> {{ trans('main.salary_on_confirmation') }} </h6>
                                        </label>
                                        <label for="input002" class="field prepend-icon">
                                            @if(\Route::getFacadeRoot()->current()->uri() == $currentLocale.'/edit-emp/{id}')
                                                <input type="text" name="salary" id="salary" class="gui-input"
                                                       value="@if($emps && $emps->employee->salary){{$emps->employee->salary}}@endif" readonly>
                                                <label for="input002" class="field-icon">
                                                    <i class="fa fa-inr"></i>
                                                </label>
                                            @else
                                                <input type="text" placeholder="e.g 12000" name="salary"
                                                       id="salary" class="gui-input">
                                                <label for="input002" class="field-icon">
                                                    <i class="fa fa-inr"></i>
                                                </label>
                                            @endif
                                        </label>
                                    </div>
                                    <!-- -------------- /section -------------- -->


                                </section>

                                <!-- -------------- step 3 -------------- -->
                                <h4 class="wizard-section-title">
                                    <i class="fa fa-file-text pr5"></i> {{ trans('main.banking_details') }}</h4>
                                <section class="wizard-section">


                                    <!-- -------------- /section -------------- -->


                                    <div class="section">
                                        <label for="input002"><h6 class="mb20 mt40"> {{ trans('main.bank_account_number') }} </h6></label>
                                        <label for="input002" class="field prepend-icon">
                                            @if(\Route::getFacadeRoot()->current()->uri() == $currentLocale.'/edit-emp/{id}')
                                                <input type="text" name="account_number" id="bank_account_number"
                                                       class="gui-input"
                                                       value="@if($emps && $emps->employee->account_number){{$emps->employee->account_number}}@endif">
                                                <label for="input002" class="field-icon">
                                                    <i class="fa fa-list"></i>
                                                </label>
                                            @else
                                                <input type="text" placeholder="{{ trans('main.bank_account_number') }}"
                                                       name="account_number" id="bank_account_number" class="gui-input">
                                                <label for="input002" class="field-icon">
                                                    <i class="fa fa-list"></i>
                                                </label>
                                            @endif
                                        </label>
                                    </div>


                                    <div class="section">
                                        <label for="input002"><h6 class="mb20 mt40"> {{ trans('main.bank_name') }} </h6></label>
                                        <label for="input002" class="field prepend-icon">
                                            @if(\Route::getFacadeRoot()->current()->uri() == $currentLocale.'/edit-emp/{id}')
                                                <input type="text" name="bank_name" id="bank_name" class="gui-input"
                                                       value="@if($emps && $emps->employee->bank_name){{$emps->employee->bank_name}}@endif">
                                                <label for="input002" class="field-icon">
                                                    <i class="fa fa-columns"></i>
                                                </label>
                                            @else
                                                <input type="text" placeholder="{{ trans('main.bank_name') }}..." name="bank_name"
                                                       id="bank_name" class="gui-input">
                                                <label for="input002" class="field-icon">
                                                    <i class="fa fa-columns"></i>
                                                </label>
                                            @endif
                                        </label>
                                    </div>


                                    <div class="section">
                                        <label for="input002"><h6 class="mb20 mt40"> {{ trans('main.iban_number') }} </h6></label>
                                        <label for="input002" class="field prepend-icon">
                                            @if(\Route::getFacadeRoot()->current()->uri() == $currentLocale.'/edit-emp/{id}')
                                                <input type="text" name="ifsc_code" id="ifsc_code" class="gui-input"
                                                       value="@if($emps && $emps->employee->ifsc_code){{$emps->employee->ifsc_code}}@endif">
                                                <label for="input002" class="field-icon">
                                                    <i class="fa fa-font"></i>
                                                </label>
                                            @else
                                                <input type="text" placeholder="{{ trans('main.iban_number') }}..." name="ifsc_code"
                                                       id="ifsc_code" class="gui-input">
                                                <label for="input002" class="field-icon">
                                                    <i class="fa fa-font"></i>
                                                </label>
                                            @endif
                                        </label>
                                    </div>
                                    <!-- -------------- /section -------------- -->

                                </section>


                                <h4 class="wizard-section-title">
                                    <i class="fa fa-file-text pr5"></i> {{ trans('main.iban_number') }} </h4>
                                <section class="wizard-section">


                                    <div class="section">
                                        <label for="datepicker6" class="field prepend-icon mb5"><h6 class="mb20 mt40">
                                            {{ trans('main.resignation_date') }} </h6></label>

                                        <div class="field prepend-icon">
                                            @if(\Route::getFacadeRoot()->current()->uri() == $currentLocale.'/edit-emp/{id}')
                                                <input type="text" id="datepicker6" class="gui-input fs13" name="dor"
                                                       value="@if($emps && $emps->employee->date_of_resignation){{$emps->employee->date_of_resignation}}@endif"/>
                                                <label class="field-icon">
                                                    <i class="fa fa-calendar"></i>
                                                </label>
                                            @else
                                                <input type="text" id="datepicker6" class="gui-input fs13" name="dor"/>
                                                <label class="field-icon">
                                                    <i class="fa fa-calendar"></i>
                                                </label>
                                            @endif
                                        </div>
                                    </div>


                                    <div class="section">
                                        <label for="input002"><h6 class="mb20 mt40"> {{ trans('main.notice_period') }} </h6></label>
                                            <select class="select2-single form-control" name="notice_period" id="notice_period">
                                                <option value="">{{ trans('main.select') }}</option>
                                                @if(\Route::getFacadeRoot()->current()->uri() == $currentLocale.'/edit-emp/{id}')
                                                    @if($emps->employee->notice_period == '1')
                                                        <option value="1" selected>1 {{ trans('main.month') }}</option>
                                                        <option value="2">2 {{ trans('main.months') }}</option>
                                                    @else
                                                        <option value="1">1 {{ trans('main.month') }}</option>
                                                        <option value="2" selected>2 {{ trans('main.months') }}</option>
                                                    @endif
                                                @else
                                                    <option value="1">1 {{ trans('main.month') }}</option>
                                                    <option value="2">2 {{ trans('main.months') }}</option>
                                                @endif
                                            </select>
                                    </div>


                                    <div class="section">
                                        <label for="datepicker7" class="field prepend-icon mb5"><h6 class="mb20 mt40">
                                            {{ trans('main.last_working_days') }} </h6></label>

                                        <div class="field prepend-icon">
                                            @if(\Route::getFacadeRoot()->current()->uri() == $currentLocale.'/edit-emp/{id}')
                                                <input type="text" id="datepicker7" class="gui-input fs13"
                                                       name="last_working_day"
                                                       value="@if($emps && $emps->employee->last_working_day){{$emps->employee->last_working_day}} @endif"/>
                                                <label class="field-icon">
                                                    <i class="fa fa-calendar"></i>
                                                </label>
                                            @else
                                                <input type="text" id="datepicker7" class="gui-input fs13"
                                                       name="last_working_day"/>
                                                <label class="field-icon">
                                                    <i class="fa fa-calendar"></i>
                                                </label>
                                            @endif
                                        </div>
                                    </div>


                                    <div class="section">
                                        <label for="input002"><h6 class="mb20 mt40"> {{ trans('main.full_and_final') }} </h6></label>

                                        <div class="option-group field">
                                            <label class="field option mb5">
                                                <input type="hidden" value="{!! csrf_token() !!}" id="token">
                                                <input type="radio" value="1" name="full_final" id="full_final"
                                                       @if(isset($emps))@if($emps->employee->full_final == '1')checked @endif @endif>
                                                <span class="radio"></span>{{ trans('main.yes') }}</label>
                                            <label class="field option mb5">
                                                <input type="radio" value="0" name="full_final" id="full_final"
                                                       @if(isset($emps))@if($emps->employee->full_final == '0')checked @endif @endif>
                                                <span class="radio"></span>{{ trans('main.no') }}</label>
                                        </div>
                                    </div>
                                </section>
                            </div>
                            <!-- -------------- /Wizard -------------- -->

                        </form>
                        <!-- -------------- /Form -------------- -->

                    </div>
                    <!-- -------------- /Spec Form -------------- -->

            </div>

        </section>
        <!-- -------------- /Content -------------- -->

</div>
@endsection

