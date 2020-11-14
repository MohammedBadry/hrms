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
                    <li class="breadcrumb-current-item"> {{ trans('main.list_project') }} </li>
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
                                    <span class="panel-title hidden-xs"> {{ trans('main.list_project') }} </span>
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
                                                <th class="text-center">{{ trans('main.project_name') }}</th>
                                                <th class="text-center">{{ trans('main.project_description') }}</th>
                                                <th class="text-center">{{ trans('main.code') }}</th>
                                                <th class="text-center">{{ trans('main.client') }} {{ trans('main.name') }}</th>
                                                <th class="text-center">{{ trans('main.actions') }}</th>
                                            </tr>
                                            </thead>

                                            <tbody>
                                            @foreach($projects as $project)
                                                <tr>
                                                    <td class="text-center">{{$project->id}}</td>
                                                    <td class="text-center">{{ $project->getName()->$currentLocale }}</td>
                                                    <td class="text-center">{{ $project->getDescription()->$currentLocale }}</td>
                                                    <td class="text-center">{{$project->code}}</td>
                                                    <td class="text-center">
                                                        {{ $project['client']->getName()->$currentLocale }}
                                                    </td>
                                                    <td class="text-center">
                                                        <div class="btn-group text-right">
                                                            <button type="button"
                                                                    class="btn btn-success br2 btn-xs fs12 dropdown-toggle"
                                                                    data-toggle="dropdown" aria-expanded="false"> {{ trans('main.action') }}
                                                                <span class="caret ml5"></span>
                                                            </button>
                                                            <ul class="dropdown-menu" role="menu">
                                                                <li>
                                                                    <a href="/edit-project/{{$project->id}}">{{ trans('main.edit') }}</a>
                                                                </li>
                                                                <li>
                                                                    <a href="/delete-project/{{$project->id}}">{{ trans('main.delete') }}</a>
                                                                </li>
                                                            </ul>
                                                        </div>
                                                    </td>
                                                </tr>
                                            @endforeach
                                            <tr>
                                                {!! $projects->render() !!}
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