@extends('hrms.layouts.base')

@section('content')
        <!-- START CONTENT -->
<div class="content">

    <input type="hidden" value="{{csrf_token()}}" id="token">

    <!-- -------------- Topbar -------------- -->
    <header id="topbar" class="alt">
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
                    <a href=""> {{ trans('main.home') }} </a>
                </li>
                <li class="breadcrumb-current-item">{{ trans('main.events') }}</li>
            </ol>
        </div>
    </header>
    <!-- -------------- /Topbar -------------- -->

    <!-- -------------- Content -------------- -->
    <section id="content" class="animated fadeIn">
        <div class="box box-success">
        <div class="panel bg-gradient">

            <!-- -------------- Column Center -------------- -->
            <div class="chute chute-center ph45">

                <!-- -------------- Calendar -------------- -->
                {{--<div id="calendar" class="events-calendar"></div>--}}
                <h2 class="text-muted" style="text-align:center"> {{ trans('main.schedule_event') }}
                    <a id="compose-event-btn" href="#calendarManagment" data-effect="mfp-flipInY">
                        <span class="fa fa-plus-square"></span>
                    </a>
                </h2>


                <div id="external-events" class="bg-dotted">
                <div class="mt40">
                    @foreach (array_chunk($events, 3, true) as $results)
                        <table class="table">
                            <tr>
                                @foreach($results as $event)
                                    <td>
                                        <div class='fc-event fc-event-primary' data-event="primary">
                                            <div class="fc-event-icon">
                                                <span class="fa fa-exclamation"></span>
                                            </div>
                                            <div class="fc-event-desc blink" id="blink">
                                                <b>{{ \Carbon\Carbon::createFromTimestamp(strtotime($event->date))->diffForHumans()}} </b> {{$event->name}}
                                            </div>
                                        </div>
                                    </td>
                                @endforeach
                            </tr>
                        </table>
                    @endforeach
                  </div>
            </div>
            </div>
            </div>

        </aside>
        <!-- -------------- /Column Left -------------- -->

</div>
    </section>

    <!-- -------------- /Content -------------- -->
</div>
<!-- -------------- /Body Wrap  -------------- -->

<!-- -------------- Calendar Management Form -------------- -->
<div class="allcp-form theme-primary popup-basic popup-lg mfp-with-anim mfp-hide" id="calendarManagment">
    <div class="panel">
        <div class="panel-heading">
        <span class="panel-title">
          <i class="fa fa-pencil-square-o"></i>{{ trans('main.schedule_event') }}
        </span>
        </div>

        <form method="post" action="/" id="calendarManagmentForm">
            <div class="panel-body p25">
                <div class="section-divider mt10 mb40">
                    <span>{{ trans('main.event_details') }}</span>
                </div>

                <!---------------------- Coordinator -------------------->
                <div class="section row">
                    <div class="col-md-12">
                        <label for="event_name" class="field prepend-icon">
                            <input type="text" class="form-control" id="event_name" placeholder="{{ trans('main.event_title') }}">
                        </label>
                    </div>
                </div>
                <!-- -------------- /Event Name-------------- -->

                <!-- -------------- /section -------------- -->

                <div class="section row">
                    <div class="col-xs-12">
                        <label class="field prepend-icon">
                        <textarea class="gui-textarea" id="event_description"
                                  placeholder="{{ trans('main.event_description') }}"></textarea>
                            <label for="comment" class="field-icon">
                                <i class="fa fa-comments"></i>
                            </label>
                            <span class="input-footer hidden">

                            </span>
                        </label>
                    </div>
                </div>
                <!-- -------------- /section -------------- -->





               <!---------------------- Coordinator -------------------->
                <div class="section row">
                    <div class="col-md-12">
                        <label for="firstname" class="field prepend-icon">
                            <select id="event_cordinater" class="form-control">
                                <option value=""> {{ trans('main.event_coordinator') }} </option>
                                @foreach($coordinators as $coordinator)
                                <option value="{{$coordinator['id']}}">{{$coordinator['name']}}</option>
                                @endforeach
                            </select>
                        </label>
                    </div>
                </div>

                <!-- -------------- /Coordinator -------------- -->

                <!---------------------- Date ------------------->

                <div class="section row">
                    <div class="col-md-12">
                        <div class="input-group date" id="datetimepicker2">
                                            <span class="input-group-addon cursor">
                                                <i class="fa fa-calendar"></i>
                                            </span>
                            <input type="text" class="form-control" id="date_time">
                        </div>
                    </div>
                    </div>

                <!--------------------- /Date ------------------->

                <!-- -------------- /section -------------- -->

                <div class="section row">
                    <div class="col-md-12">
                        <label for="firstname" class="field prepend-icon">
                            <select id="event_attendees" class="form-control" multiple>
                                <option value="">{{ trans('main.event_attendees') }}</option>
                                @foreach($users as $user)
                                <option value="{{$user->id}}">{{$user->name}}</option>
                                    @endforeach
                            </select>
                        </label>
                    </div>
                </div>
                <!-- -------------- /section -------------- -->

               {{-- <div class="section row">
                    <div class="col-xs-12">
                        <label class="field prepend-icon">
                        <textarea class="gui-textarea" id="event_description"
                                  placeholder="Event Description"></textarea>
                            <label for="comment" class="field-icon">
                                <i class="fa fa-comments"></i>
                            </label>
                            <span class="input-footer hidden">
                            <strong>Hint:</strong>Don't be negative or off topic! just be awesome...</span>
                        </label>
                    </div>
                </div>--}}
                <!-- -------------- /section -------------- -->

                <!----------- progress bar ---------->

                {{--<div class="section row hidden" id="status-section">
                    Working
                <div class="progress mt10 mbn">
                    <div class="progress-bar progress-bar-primary progress-bar-striped active mnw100"
                         role="progressbar"
                         aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"
                         style="width: 32%">
                        <span class="sr-only">40% Complete (success)</span>
                    </div>
                </div>
                </div>--}}

                <div class="section row hidden" id="message-section">
                    <div class="alert alert-info light alert-dismissable" id="alert-demo-1">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                        {{ trans('main.event_created_successfully') }}
                    </div>
                </div>


                <!----------- /progress bar ---------->

            </div>
            <div class="panel-footer text-right">
                <button type="button" id="create-event" class="button btn-primary">{{ trans('main.schedule_event') }}</button>
            </div>
        </form>
    </div>
</div>

<!-- -------------- Content -------------- -->
</div>
@endsection