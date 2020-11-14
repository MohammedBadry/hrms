@extends('hrms.layouts.base')

@section('content')
        <!-- START CONTENT -->
<div class="content">

    <header id="topbar" class="alt">
        <div class="topbar-left">
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
                    <a href=""> {{ trans('main.teams') }} </a>
                </li>
                <li class="breadcrumb-current-item"> {{ trans('main.add_team') }} </li>
            </ol>
        </div>
    </header>
    <!-- -------------- Content -------------- -->
    <section id="content" class="table-layout animated fadeIn">
                    <!-- -------------- Column Center -------------- -->
            <div class="chute-affix" data-spy="affix" data-offset-top="200">
                <div class="row">
                    <div class="col-xs-12">
                        <div class="box box-success">
                        <div class="panel">
                            <div class="panel-heading">
                                <span class="panel-title hidden-xs"> {{ trans('main.add_team') }} </span>
                            </div>

                            <div class="panel-body pn">
                                <div class="table-responsive">
                                    <div class="panel-body p25 pb10">

                                        @if(Session::has('flash_message'))
                                            <div class="alert alert-success">
                                                {{ Session::get('flash_message') }}
                                            </div>
                                        @endif
                                        {{--<form class="form-horizontal" role="form">--}}
                                            {!! Form::open(['class' => 'form-horizontal']) !!}
                                            <div class="form-group">
                                                <label class="col-md-3 control-label"> {{ trans('main.team_name') }} </label>
                                                <div class="col-md-6">
                                                    <input type="text" placeholder="{{ trans('main.team_name') }}..." name="team_name"
                                                           id="input002" class="select2-single form-control" required>
                                                </div>
                                            </div>


                                            <div class="form-group">
                                                <label class="col-md-3 control-label"> {{ trans('main.select') }} {{ trans('main.team_manager') }}</label>
                                                <div class="col-md-6">
                                                    <select class="selectpicker form-control" data-done-button="true"
                                                             name="manager_id" required>
                                                        <option value="" selected>{{ trans('main.select') }}</option>
                                                        @foreach($managers as $manager)
                                                            <option value="{{$manager->id}}">{{$manager->name}}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label class="col-md-3 control-label"> {{ trans('main.select') }} {{ trans('main.team_leader') }}</label>
                                                <div class="col-md-6">
                                                    <select class="selectpicker form-control" data-done-button="true" name="leader_id" required>
                                                        <option value="" selected>{{ trans('main.select') }}</option>
                                                        @foreach($leaders as $leader)
                                                            <option value="{{$leader->id}}">{{$leader->name}}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label for="multiselect2" class="col-md-3 control-label"> {{ trans('main.select') }} {{ trans('main.team_members') }} </label>
                                                <div class="col-md-6">
                                                    <select id="done" class="selectpicker form-control" multiple data-done-button="true"
                                                      name="member_id[]" required>
                                                      <option value="" selected>{{ trans('main.select') }}</option>
                                                      @foreach($emps as $emp)
                                                            <option value="{{$emp->id}}">{{$emp->name}}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>


                                            <div class="form-group">
                                                <label class="col-md-3 control-label"></label>
                                                <div class="col-md-2">
                                                        <input type="submit" class="btn btn-bordered btn-info btn-block" value="{{ trans('main.submit') }}">
                                                </div>
                                                <div class="col-md-2"><a href="/add-team" >
                                                        <input type="button" class="btn btn-bordered btn-success btn-block" value="{{ trans('main.reset') }}"></a></div>
                                            </div>
                                        {!! Form::close() !!}
                                        {{--</form>--}}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
         </div>
    </section>

</div>
    @push('styles')
        <link rel="stylesheet" type="text/css" href="/assets/allcp/forms/css/bootstrap-select.css">
    @endpush
@endsection
