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
                        <a href=""> {{ trans('main.holidays') }} </a>
                    </li>
                    <li class="breadcrumb-current-item"> {{ trans('main.dashboard') }} </li>
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
                                <span class="panel-title hidden-xs"> {{ trans('main.holiday_listings') }} </span>
                            </div>
                            <div class="panel-body pn">
                                @if(Session::has('flash_message'))
                                    <div class="alert alert-success">
                                        {{ Session::get('flash_message') }}
                                    </div>
                                @endif
                                {!! Form::open(['class' => 'form-horizontal']) !!}
                                <div class="table-responsive">
                                    @if(count($holidays))
                                    <table class="table allcp-form theme-warning tc-checkbox-1 fs13">
                                        <thead>
                                        <tr class="bg-light">
                                            <th class="text-center">{{ trans('main.id') }}</th>
                                            <th class="text-center">{{ trans('main.occasion') }}</th>
                                            <th class="text-center">{{ trans('main.date_from') }}</th>
                                            <th class="text-center">{{ trans('main.date_to') }}</th>
                                            <th class="text-center">{{ trans('main.actions') }}</th>
                                        </tr>
                                        </thead>

                                        <tbody>
                                        <?php $i =0;?>
                                        @foreach($holidays as $holiday)
                                            <tr>
                                                <td class="text-center">{{$i+=1}}</td>
                                                <td class="text-center">{{$holiday->occasion}}</td>
                                                <td class="text-center">{{getFormattedDate($holiday->date_from)}}</td>
                                                <td class="text-center">{{getFormattedDate($holiday->date_to)}}</td>
                                                <td class="text-center">
                                                    <div class="btn-group text-right">
                                                        <button type="button"
                                                                class="btn btn-success br2 btn-xs fs12 dropdown-toggle"
                                                                data-toggle="dropdown" aria-expanded="false"> {{ trans('main.action') }}
                                                            <span class="caret ml5"></span>
                                                        </button>
                                                        <ul class="dropdown-menu" role="menu">
                                                            <li>
                                                                <a href="/edit-holiday/{{$holiday->id}}">{{ trans('main.edit') }}</a>
                                                            </li>
                                                            <li>
                                                                <a href="/delete-holiday/{{$holiday->id}}">{{ trans('main.delete') }}</a>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </td>
                                            </tr>
                                        @endforeach
                                        <tr>
                                            {!! $holidays->render() !!}
                                        </tr>
                                        </tbody>
                                    </table>
                                        @else
                                        <div class="text-center">
                                            <h2>{{ trans('main.no_data_to_show') }}</h2>
                                        </div>
                                    @endif
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