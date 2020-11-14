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
                        <a href=""> {{ trans('main.clients') }} </a>
                    </li>
                    <li class="breadcrumb-current-item"> {{ trans('main.list_client') }} </li>
                </ol>
            </div>
        </header>


        <!-- -------------- Content -------------- -->
        <section id="content" class="table-layout animated fadeIn">

            <!-- -------------- Column Center -------------- -->
            <div class="chute chute-center">

                <!-- -------------- Products Status Table -------------- -->
                <div class="row">
                    <div class="col-xs-12">
                        <div class="box box-success">
                            <div class="panel">
                                <div class="panel-heading">
                                    <span class="panel-title hidden-xs"> {{ trans('main.list_client') }} </span>
                                </div>
                                <div class="panel-body pn">
                                    @if(Session::has('flash_message'))
                                        <div class="alert alert-success">
                                            {{ Session::get('flash_message') }}
                                        </div>
                                    @endif
                                    {!! Form::open(['class' => 'form-horizontal']) !!}
                                    <div class="table-responsive">
                                        <table class="table allcp-form theme-warning tc-checkbox-1 fs13">
                                            <thead>
                                            <tr class="bg-light">
                                                <th class="text-center">{{ trans('main.id') }}</th>
                                                <th class="text-center">{{ trans('main.name') }}</th>
                                                <th class="text-center">{{ trans('main.address') }}</th>
                                                <th class="text-center">{{ trans('main.company') }}</th>
                                                <th class="text-center">{{ trans('main.code') }}</th>
                                                <th class="text-center">{{ trans('main.actions') }}</th>
                                            </tr>
                                            </thead>

                                            <tbody>
                                            @foreach($clients as $client)
                                                <tr>
                                                    <td class="text-center">{{$client->id}}</td>
                                                    <td class="text-center">
                                                        {{ $client->getName()->$currentLocale }}
                                                    </td>
                                                    <td class="text-center">
                                                        {{ $client->getAddress()->$currentLocale }}
                                                    </td>
                                                    <td class="text-center">
                                                        {{ $client->getCompany()->$currentLocale }}
                                                    </td>
                                                    <td class="text-center">{{$client->code}}</td>
                                                    <td class="text-center">
                                                        <div class="btn-group text-right">
                                                            <button type="button"
                                                                    class="btn btn-success br2 btn-xs fs12 dropdown-toggle"
                                                                    data-toggle="dropdown" aria-expanded="false"> {{ trans('main.action') }}
                                                                <span class="caret ml5"></span>
                                                            </button>
                                                            <ul class="dropdown-menu" role="menu">
                                                                <li>
                                                                    <a href="/edit-client/{{$client->id}}">{{ trans('main.edit') }}</a>
                                                                </li>
                                                                <li>
                                                                    <a href="/delete-list/{{$client->id}}">{{ trans('main.delete') }}</a>
                                                                </li>
                                                            </ul>
                                                        </div>
                                                    </td>
                                                </tr>
                                            @endforeach
                                            <tr>
                                                {!! $clients->render() !!}
                                            </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                    {!! Form::close() !!}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

    </div>
@endsection