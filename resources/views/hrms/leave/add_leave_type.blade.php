@extends('hrms.layouts.base')

@section('content')
        <!-- START CONTENT -->
<div class="content">

    <header id="topbar" class="alt">
        <div class="topbar-left">
            @if(\Route::getFacadeRoot()->current()->uri() == LaravelLocalization::getCurrentLocale().'/edit-leave-type/{id}')
                <ol class="breadcrumb">
                    <li class="breadcrumb-icon">
                        <a href="/dashboard">
                            <span class="fa fa-home"></span>
                        </a>
                    </li>
                    <li class="breadcrumb-active">
                        <a href="/dashboard"> {{ trans('main.dashboard') }} </a>
                    </li>
                    <li class="breadcrumb-link">
                        <a href=""> {{ trans('main.leaves') }} </a>
                    </li>
                    <li class="breadcrumb-current-item"> {{ trans('main.edit') }} {{$result->leave_type}} {{ trans('main.leave_type') }}</li>
                </ol>
            @else
            <ol class="breadcrumb">
                <li class="breadcrumb-icon">
                    <a href="/dashboard">
                        <span class="fa fa-home"></span>
                    </a>
                </li>
                <li class="breadcrumb-active">
                    <a href="/dashboard"> {{ trans('main.dashboard') }} </a>
                </li>
                <li class="breadcrumb-link">
                    <a href=""> {{ trans('main.leaves') }} </a>
                </li>
                <li class="breadcrumb-current-item"> {{ trans('main.add_leave_type') }} </li>
            </ol>
            @endif
        </div>
    </header>
    <!-- -------------- Content -------------- -->
    <section id="content" class="table-layout animated fadeIn" >
        <!-- -------------- Column Center -------------- -->
        <div class="chute-affix" data-spy="affix" data-offset-top="200">
            <div class="row">
                <div class="col-xs-12">
                    <div class="box box-success">
                    <div class="panel">
                        <div class="panel-heading">
                            @if(\Route::getFacadeRoot()->current()->uri() == LaravelLocalization::getCurrentLocale().'/edit-leave-type/{id}')
                                <span class="panel-title hidden-xs"> {{ trans('main.edit') }} {{ trans('main.leave_type') }} </span>
                                @else
                                <span class="panel-title hidden-xs"> {{ trans('main.add_leave_type') }} </span>
                                @endif
                        </div>

                        <div class="panel-body pn">

                            <div class="table-responsive">
                                <div class="panel-body p25 pb10">

                                    @if(Session::has('flash_message'))
                                        <div class="alert alert-success">
                                            {{Session::get('flash_message')}}
                                        </div>
                                    @endif
                                    {!! Form::open(['class' => 'form-horizontal']) !!}

                                        <div class="form-group">
                                            <label class="col-md-3 control-label"> {{ trans('main.leave_type') }} </label>
                                            <div class="col-md-6">
                                                @if(\Route::getFacadeRoot()->current()->uri() == LaravelLocalization::getCurrentLocale().'/edit-leave-type/{id}')
                                                    <input type="text" name="leave_type" id="input002" class="select2-single form-control" value="@if($result && $result->leave_type){{$result->leave_type}}@endif" required>
                                                @else
                                                    <input type="text" name="leave_type" id="input002" class="select2-single form-control" placeholder="{{ trans('main.leave_type') }}" required>
                                                @endif
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="col-md-3 control-label"> {{ trans('main.description') }} </label>
                                            <div class="col-md-6">
                                                @if(\Route::getFacadeRoot()->current()->uri() == LaravelLocalization::getCurrentLocale().'/edit-leave-type/{id}')
                                                    <textarea class="select2-single form-control" rows="3" id="textarea1" placeholder="{{ trans('main.description') }}" name="description" required>@if($result && $result->description){{$result->description}}@endif</textarea>
                                                @else
                                                    <textarea class="select2-single form-control" rows="3" id="textarea1" placeholder="{{ trans('main.description') }}" name="description" required></textarea>
                                                @endif
                                            </div>
                                        </div>


                                        <div class="form-group">
                                            <label class="col-md-3 control-label"></label>
                                            <div class="col-md-2">

                                                      <input type="submit" class="btn btn-bordered btn-info btn-block" value="{{ trans('main.submit') }}">

                                            </div>
                                            <div class="col-md-2"><a href="/add-leave-type" >
                                                    <input type="button" class="btn btn-bordered btn-success btn-block" value="{{ trans('main.reset') }}"></a></div>
                                        </div>
                                        </div>
                                    {!! Form::close() !!}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </section>

</div>
@endsection