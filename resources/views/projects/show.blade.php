@extends('layouts.app')

@section('content')
    <div class="container task-tabs">
        <!-- Nav tabs -->
        <ul class="nav nav-tabs" role="tablist">
            <li role="presentation" class="active"><a href="#toDo" aria-controls="profile" role="tab" data-toggle="tab">待完成</a></li>
            <li role="presentation"><a href="#Done" aria-controls="messages" role="tab" data-toggle="tab">已处理</a></li>
        </ul>

        <!-- Tab panes -->
        <div class="tab-content">
            {{--未完成任务列表--}}
            <div role="tabpanel" class="tab-pane active" id="toDo">
                <table class="table table-striped">
                    <thead>
                        <tr>@include('tasks/createForm')</tr>
                    </thead>
                    @foreach($toDo as $task)
                        <tr>
                            <td class="first-cell">{{$task->title}}</td>
                            <td class="icon-cell">@include('tasks/checkForm')</td>
                            <td class="icon-cell">@include('tasks/editForm')</td>
                            <td class="icon-cell">@include('tasks/deleteForm')</td>
                        </tr>
                    @endforeach
                </table>
            </div>
            {{--已处理任务列表--}}
            <div role="tabpanel" class="tab-pane" id="Done">
                <table class="table table-striped">
                    @foreach($Done as $task)
                        <tr>
                            <td>{{$task->title}}</td>

                        </tr>
                    @endforeach
                </table>
            </div>
        </div>

    </div>
@endsection