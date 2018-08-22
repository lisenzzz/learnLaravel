<!-- Button trigger modal -->
<button type="button" class="btn btn-default modal-trigger" data-toggle="modal" data-target="#myModal">
    <i class="fa fa-btn fa-plus"></i>
</button>

<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                            aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">新建项目</h4>
            </div>
            <div class="modal-body">
                {!! Form::open(['route'=>'projects.store','method'=>'POST','files'=>'true']) !!}
                <div class="form-group">
                    {!! Form::label('createName','项目名称：',['class'=>'control-label']) !!}
                    {!! Form::text('createName',null,['class'=>'form-control']) !!}
                </div>
                <div class="form-group">
                    {!! Form::label('createThumbnail','项目缩略图：',['class'=>'control-label']) !!}
                    {!! Form::file('createThumbnail') !!}
                </div>
                @if($errors->has('createName')||$errors->has('createThumbnail'))
                    <ul class="alert alert-danger">
                        @foreach($errors->get('createName') as $error)
                            <li>{{$error}}</li>
                        @endforeach
                        @foreach($errors->get('createThumbnail') as $error)
                            <li>{{$error}}</li>
                        @endforeach
                    </ul>
                @endif
            </div>
            <div class="modal-footer">
                    {!! Form::submit('新建项目',['class'=>'btn btn-primary']) !!}
                {!! Form::close() !!}
            </div>
        </div>
    </div>
</div>