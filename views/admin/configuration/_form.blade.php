@include('system::partials.validation')

{{ Form::open(['route' => 'admin.configuration.update', 'method'=>'put', 'class'=>'form-horizontal']) }}

    @foreach($sections as $section)
        <div class="box">
            <div class="box-header">
                <h3 class="box-title">{{{ $section->getTitle() }}}</h3>
                <div class="box-tools pull-right">
                    <button class="btn btn-default btn-sm" data-widget="collapse" data-toggle="tooltip" title="" data-original-title="Collapse"><i class="fa fa-minus"></i></button>
                </div>
            </div>
            <div class="box-body">
                @foreach($section->getItems() as $item)
                    <div class="form-group">
                        {{ Form::label($item->getName(), $item->getTitle(), ['class'=>'col-sm-2 control-label']) }}
                        <div class="col-sm-10">
                            {{ Form::text('Configuration['.$item->getName().']', $item->getValue(), array('class' => 'form-control')) }}
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    @endforeach

    {{ Form::submit('Salvar', array('class' => 'btn btn-primary')) }}
{{ Form::close() }}
