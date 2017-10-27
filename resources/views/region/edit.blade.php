@extends('layouts.template')

@section('content')

<h1 class="page-header">Медицинская организация</h1>

<div class="col-md-8 col-md-offset-2">
    <div class="panel panel-default">
        <div class="panel-heading"> {{-- заголовок окна --}}
            Редактирование медицинской организации
            <a href="{{ route('region.index') }}" class="close" data-dismiss="alert" aria-hidden="true">&times;</a> {{-- х закрыть --}}
        </div>

        <div class="panel-body">
            <form class="form-horizontal" role="form" method="POST" action="{{ route('region.update', $viewdata->id) }}">                            {{ csrf_field() }}

                <input type="hidden" name="id" value="{{ $viewdata->id }}">
                <input type="hidden" name="_method" value="put"/>

                @include('region.form')

                <div class="form-group">
                    <div class="col-md-6 col-md-offset-4">
                        <button type="submit" class="btn btn-primary">
                            Редактировать
                        </button>
                    </div>
                </div>

            </form>
        </div>
    </div>
</div>

@endsection