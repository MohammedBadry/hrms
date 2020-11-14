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
                        <a href=""> {{ trans('main.expenses') }} </a>
                    </li>
                    <li class="breadcrumb-current-item"> {{ trans('main.expense_listings') }} </li>
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
                                <span class="panel-title hidden-xs"> {{ trans('main.expense_listings') }} </span>
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
                                            <th class="text-center">{{ trans('main.employee') }}</th>
                                            <th class="text-center">{{ trans('main.item_bought') }}</th>
                                            <th class="text-center">{{ trans('main.item_bought_from') }}</th>
                                            <th class="text-center">{{ trans('main.purchase_date') }}</th>
                                            <th class="text-center">{{ trans('main.amount') }}</th>
                                            <th class="text-center">{{ trans('main.actions') }}</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <?php $i =0;?>
                                        @foreach($expenses as $expense)
                                            <tr>
                                                <td class="text-center">{{$i+=1}}</td>
                                                <td class="text-center">{{$expense->employee->name}}</td>
                                                <td class="text-center">{{$expense->item}}</td>
                                                <td class="text-center">{{$expense->purchase_from}}</td>
                                                <td class="text-center">{{getFormattedDate($expense->date_of_purchase)}}</td>
                                                <td class="text-center">{{$expense->amount}}</td>
                                                <td class="text-center">
                                                    <div class="btn-group text-right">
                                                        <button type="button"
                                                                class="btn btn-success br2 btn-xs fs12 dropdown-toggle"
                                                                data-toggle="dropdown" aria-expanded="false"> {{ trans('main.action') }}
                                                            <span class="caret ml5"></span>
                                                        </button>
                                                        <ul class="dropdown-menu" role="menu">
                                                            <li>
                                                                <a href="/edit-expense/{{$expense->id}}">{{ trans('main.edit') }}</a>
                                                            </li>
                                                            <li>
                                                                <a href="/delete-expense/{{$expense->id}}">{{ trans('main.delete') }}</a>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </td>
                                            </tr>
                                        @endforeach
                                        <tr>
                                            {!! $expenses->render() !!}
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