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

                <li class="breadcrumb-current-item"> {{ trans('main.add_holiday') }}</li>
            </ol>
        </div>
        <div class="topbar-right">
            <h4><a class="link-unstyled" href="/sample_sheet/Holiday_sample_sheet.xlsx" title="">
                    <i class="fa fa-cloud-download text-purple pr10"></i> {{ trans('main.sample_sheet') }} </a></h4>
        </div>
    </header>
    <!-- -------------- Content -------------- -->
    <section id="content" class="table-layout animated fadeIn">

        <!-- -------------- Column Left -------------- -->
        <aside class="chute chute-left chute290 bg-primary" data-chute-height="match">

            <div class="chute-bin1 stretch1 btn-dimmer mt20">

                <div class="tab-content pn br-n bg-none allcp-form-list">

                    <ul class="nav list-unstyled" role="tablist">

                        <li class="nav-label">{{ trans('main.general') }}</li>
                        <li>
                            <a class="btn btn-primary btn-gradient btn-alt btn-block item-active br-n" href="#login"
                               role="tab"
                               data-toggle="tab"> {{ trans('main.upload_holiday_sheet') }} </a>
                        </li>

                        <li>
                            <a class="btn btn-danger btn-gradient btn-alt btn-block br-n" href="#register"
                               role="tab"
                               data-toggle="tab"> {{ trans('main.see_holiday_sheets') }} </a>
                        </li>
                    </ul>
                </div>
            </div>
        </aside>
        <!-- -------------- /Column Left -------------- -->

        <!-- -------------- Column Center -------------- -->
        <div class="chute chute-center">
            <div class="">

                <div class="tab-content mw900 center-block center-children">


                    <!-- -------------- Upload Form -------------- -->
                    <div class="allcp-form theme-primary tab-pane active mw320" id="login" role="tabpanel">
                        <div class="box box-success">
                        <div class="panel fluid-width">

                            @if(Session::has('flash_message'))
                                <div class="alert alert-success">
                                    {{ Session::get('flash_message') }}
                                </div>
                            @endif

                            {!! Form::open(['class' => 'form-horizontal', 'files' => true]) !!}
                            <div class="panel-body pn mv12">
                                <!-- -------------- /section -------------- -->

                                <div class="section">
                                    <label for="username" class="field prepend-icon"> <h6 > {{ trans('main.description') }} </h6> </label>
                                    <input type="text" class="gui-input" name="description"
                                           placeholder="{{ trans('main.description') }}" required>
                                </div>

                                <div class="section">
                                    <div class="input-group">
                                        <label for="date" class="field prepend-icon "> <h6> {{ trans('main.select_date') }} </h6></label>
                                        <input type="text" id="datepicker1" class="gui-input fs13 select2-single form-control" name="date" required>
                                    </div>
                                </div>

                                <div class="section">
                                    <label for="file1"><h6 > {{ trans('main.upload_file') }} </h6></label>
                                    <label class="field prepend-icon append-button file">
                                        <span class="button">{{ trans('main.choose_file') }}</span>
                                        <input type="file" class="gui-file" name="upload_file" id="file1"
                                               onChange="document.getElementById('uploader1').value = this.value;">
                                        <input type="text" class="gui-input" id="uploader1"
                                               placeholder="{{ trans('main.select') }}" required>
                                    </label>
                                </div>

                                <div class="section">
                                    <input type="submit" class="btn btn-bordered btn-info btn-block" value="Submit">
                                </div>

                                <!-- -------------- /section -------------- -->
                            </div>
                            {!! Form::close() !!}
                                    <!-- -------------- /Form -------------- -->
                            </form>
                        </div>
                            </div>
                        <!-- -------------- /Panel -------------- -->
                    </div>
                    <!-- -------------- /Login Form -------------- -->



                    <!-- -------------- Registration -------------- -->
                    <div class="allcp-form theme-primary tab-pane mw600" id="register" role="tabpanel">
                        <div class="box box-success">
                        <div class="panel">
                            <div class="panel-heading">
                                    <span class="panel-title">
                                        {{ trans('main.uploaded_files') }}
                                    </span>
                            </div>

                            <!-- -------------- /Panel Heading -------------- -->
                            <div class="panel-body table-responsive">
                                <div class="form-horizontal">
                                    <table class="table table-bordered table-hover">
                                        <thead>
                                        <tr class="bg-light">
                                            <th class="text-center">{{ trans('main.id') }}</th>
                                            <th class="text-center">{{ trans('main.name') }}</th>
                                            <th class="text-center">{{ trans('main.description') }}</th>
                                            <th class="text-center">{{ trans('main.date') }}</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <?php $i =0;?>
                                        @foreach($filenames as $holiday)
                                            <td class="text-center">{{$i+=1}}</td>
                                            <td class="text-center">{{$holiday->name}}</td>
                                            <td class="text-center">{{$holiday->description}}</td>
                                            <td class="text-center">{{$holiday->date}}</td>
                                        </tbody>
                                        @endforeach
                                    </table>
                                </div>
                            </div>
                            </div>
                        </div>
                        <!-- -------------- /Panel -------------- -->
                    </div>
                    <!-- -------------- /Registration -------------- -->

                </div>

            </div>
        </div>
        <!-- -------------- /Column Center -------------- -->

    </section>
    <!-- -------------- /Content -------------- -->
</div>

@endsection