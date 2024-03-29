<?php

    function totalLeaves($leaveType)
    {
        $result = [
            '1'  => '24',//casual leave
            '2'  => '6',//sick leave
            '3'  => '15',//marriage leave
            '4'  => '10',//bereavement leave
            '6'  => '15',//paternity leave
            '12' => '90',//maternity leave
            '7'  => '0',
            '8'  => '0',
            '9'  => '0',
            '10' => '0',
            '11' => '0',
        ];

        return $result[$leaveType];
    }


    function convertRole($role)
    {
        $data = [
            'Admin'                     => '1',
            'Director'                  => '2',
            'Research Analyst'          => '3',
            'Senior Research Analyst'   => '4',
            'Team Lead'                 => '5',
            'IT Executive'              => '6',
            'HR Manager'                => '7',
            'Associate-Enforcement'     => '8',
            'Enforcement Head'          => '9',
            'Finance Controller'        => '10',
            'Consultant'                => '11',
            'Front desk Executive'      => '12',
            'Software Developer'        => '13',
            'Senior Software Developer' => '14',
            'Accounts Executive'        => '15',
            'Manager'                   => '16'
            //bharo baki
        ];
        if ($role) {
            return $data[$role];
        }

        return $data;
    }


    function convertStatus($emp_status)
    {
        return $emp_status;
        $data = [
            'Present' => 1,
            'Ex'      => 0,
        ];

        return $data[$emp_status];
    }

    function convertStatusBack($emp_status)
    {
        $data = [
            '1' => 'Present',
            '0' => 'Ex',
        ];
        if (!$emp_status) {
            return $data[1];
        }

        return $data[$emp_status];
    }

    function getLeaveType($leave_id)
    {
        $result = \App\Models\LeaveType::where('id', $leave_id)->first();

        return $result->leave_type;
    }

    function covertDateToDay($date)
    {
        $day = strtotime($date);
        $day = date("l", $day);

        return strtoupper($day);
    }

    /*
    function getFormattedDate($date)
    {
        $date = new DateTime($date);
        return date_format($date, 'l jS \\of F Y');
    }*/


    function getFormattedDate($date)
    {
        $date = strtotime($date);

        return date('Y-m-d', $date);
    }

    function getEmployeeDropDown()
    {
        $data = [

            ""           => trans('main.select'),
            'name'       => trans('main.name'),
            'code'       => trans('main.code'),
            'department' => trans('main.department'),
            'email'      => trans('main.email'),
            'number'     => trans('main.number'),
        ];

        return $data;
    }


    function getLeaveColumns()
    {
        $data = [
            ""           => "Select",
            'name'       => trans('main.name'),
            'code'       => trans('main.code'),
            'days'       => trans('main.days'),
            'leave_type' => trans('main.leave_type'),
            'status'      => trans('main.status'),
        ];

        return $data;
    }

    function getAttendanceDropDown()
    {
        $data = [

            ""           => trans('main.select'),
            'name'       => trans('main.name'),
            'code'       => trans('main.code'),
            'date'         => trans('main.date'),
            'day'          => trans('main.day'),
            'hours_worked' => trans('main.hours_worked'),
            'status'      => trans('main.status'),
        ];

        return $data;
    }


    function getHoursWorked($inTime, $outTime)
    {

        $result       = strtotime($outTime) - strtotime($inTime);
        $totalMinutes = abs($result) / 60;

        $minutes = $totalMinutes % '60';
        $hours   = $totalMinutes - $minutes;
        $hours   = $hours / 60;

        return $hours . ':00' . $minutes . ':00';

    }

    function convertAttendanceTo($status)
    {
        $data = [
            'A'   => '0',
            'P'   => '1',
            'MIS' => '2',
            'WO'  => '3',
            'HLF' => '4',
        ];

        return $data[$status];
    }

    function convertAttendanceFrom($status)
    {
        $data = [
            '0' => 'A',
            '1' => 'P',
            '2' => 'MIS',
            '3' => 'WO',
            '4' => 'HLF',
        ];

        return $data[$status];
    }

    function qualification()
    {
        $data = [
            ''                           => trans('main.select'),
            'B.Com'                      => 'B.Com',
            'B.Sc'                       => 'B.Sc',
            'BCA'                        => 'BCA',
            'MCA'                        => 'MCA',
            'BCA+MCA'                    => 'BCA+MCA',
            'BBA'                        => 'BBA',
            'MBA'                        => 'MBA',
            'BBA+MBA'                    => 'BBA+MBA',
            'Engineering(B.Tech)'        => 'Engineering(B.Tech)',
            'Engineering(B.Tech+M.Tech)' => 'Engineering(B.Tech+M.Tech)',
            'Other'                      => 'Other',
        ];

        return $data;
    }

    function getGender($gender)
    {
        $data = [
            '0' => 'Male',
            '1' => 'Female',
        ];

        return $data[$gender];
    }

    function formatDate($date)
    {
        $created_at = $date;
        $today      = \Carbon\Carbon::now();
        $difference = date_diff($created_at, $today);

        if ($difference->days > 1) {
            //{{$job->created_at ? $job->created_at->format('l jS \\of F Y') : ''}}
            return $date->format('l jS \\of F Y H:m:s');
        }

        return $date->diffForHumans();
    }

    function getUserData($userId)
    {
        $user = \App\User::where('id', $userId)->with('employee')->first();

        return $user;
    }