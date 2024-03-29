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
                        <a href=""> {{ trans('main.projects') }} </a>
                    </li>
                    <li class="breadcrumb-current-item"> {{ trans('main.add_project') }} </li>
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
                                    <span class="panel-title hidden-xs"> {{ trans('main.add_project') }} </span>
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
                                                <label class="col-md-3 control-label"> {{ trans('main.project_name_en') }} </label>
                                                <div class="col-md-6">
                                                    <input type="text" name="name_en" id="input002"
                                                           class="select2-single form-control" placeholder="{{ trans('main.project_name_en') }}"
                                                           required>
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label class="col-md-3 control-label"> {{ trans('main.project_name_ar') }} </label>
                                                <div class="col-md-6">
                                                    <input type="text" name="name_ar" id="input002"
                                                           class="select2-single form-control" placeholder="{{ trans('main.project_name_ar') }}"
                                                           required>
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label class="col-md-3 control-label"> {{ trans('main.project_description_en') }} </label>
                                                <div class="col-md-6">
                                                    <textarea class="form-control" name="description_en"></textarea>
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label class="col-md-3 control-label"> {{ trans('main.project_description_ar') }} </label>
                                                <div class="col-md-6">
                                                    <textarea class="form-control" name="description_ar"></textarea>
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label class="col-md-3 control-label"> {{ trans('main.code') }} </label>
                                                <div class="col-md-6">
                                                    <input type="text" name="code" id="input002"
                                                            class="select2-single form-control" placeholder="{{ trans('main.code') }}"
                                                            required>
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label class="col-md-3 control-label"> {{ trans('main.client') }} </label>
                                                <div class="col-md-6">
                                                    <select class="selectpicker form-control" data-done-button="true"
                                                            name="client_id" required>
                                                        <option value="" selected>{{ trans('main.select') }}</option>
                                                        @foreach($model->clients as $client)
                                                            <option value="{{$client->id}}">{{ $client->getName()->$currentLocale }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label class="col-md-3 control-label"></label>
                                                <div class="col-md-2">

                                                    <input type="submit" class="btn btn-bordered btn-info btn-block"
                                                           value="{{ trans('main.submit') }}">
                                                </div>
                                                <div class="col-md-2"><a href="/add-project">
                                                        <input type="button"
                                                               class="btn btn-bordered btn-success btn-block"
                                                               value="{{ trans('main.reset') }}"></a>
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
            </div>
        </section>

    </div>
@endsection