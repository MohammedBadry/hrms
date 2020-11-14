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
                        <a href=""> {{ trans('main.client') }} </a>
                    </li>
                    <li class="breadcrumb-current-item"> {{ trans('main.add_client') }}</li>
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
                                    <span class="panel-title hidden-xs"> {{ trans('main.add_client') }} </span>
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
                                                <label class="col-md-3 control-label"> {{ trans('main.name_en') }}</label>
                                                <div class="col-md-6">
                                                    <input type="text" name="name_en" id="input002" class="select2-single form-control" placeholder="{{ trans('main.name_en') }}" required>
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label class="col-md-3 control-label"> {{ trans('main.name_ar') }}</label>
                                                <div class="col-md-6">
                                                    <input type="text" name="name_ar" id="input002" class="select2-single form-control" placeholder="{{ trans('main.name_ar') }}" required>
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label class="col-md-3 control-label"> {{ trans('main.address_en') }} </label>
                                                <div class="col-md-6">
                                                    <textarea class="select2-single form-control" rows="3" id="address_en" placeholder="{{ trans('main.address_en') }}" name="address_en"></textarea>
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label class="col-md-3 control-label"> {{ trans('main.address_ar') }}</label>
                                                <div class="col-md-6">
                                                    <textarea class="select2-single form-control" rows="3" id="address_ar" placeholder="{{ trans('main.address_ar') }}" name="address_ar"></textarea>
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label class="col-md-3 control-label"> {{ trans('main.company_en') }}</label>
                                                <div class="col-md-6">
                                                    <input type="text" name="company_en" id="input002" class="select2-single form-control" placeholder="{{ trans('main.company_en') }}">
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label class="col-md-3 control-label"> {{ trans('main.company_ar') }}</label>
                                                <div class="col-md-6">
                                                    <input type="text" name="company_ar" id="input002" class="select2-single form-control" placeholder="{{ trans('main.company_ar') }}">
                                                </div>
                                            </div>

                                            <div class="form-group code-group">
                                                <label class="col-md-3 control-label"> {{ trans('main.code') }} </label>
                                                <div class="col-md-6">
                                                    <input type="text" name="code" id="code" class="select2-single form-control" placeholder="{{ trans('main.code') }}" required>
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label class="col-md-3 control-label"></label>
                                                <div class="col-md-2">

                                                    <input type="submit" class="btn btn-bordered btn-info btn-block" disabled="disabled" value="{{ trans('main.submit') }}">
                                                </div>
                                                <div class="col-md-2"><a href="/add-client">
                                                        <input type="button" class="btn btn-bordered btn-success btn-block" value="{{ trans('main.reset') }}"></a>
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