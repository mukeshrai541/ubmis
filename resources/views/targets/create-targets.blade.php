@extends('layouts.layouts')
@section('title', 'Target | Create')
@section('content')
    <section class="content-header">
        <small class="md-txt">Welcome @if(Auth::user()->hasRole('admin') == '1')Administrator @else {{ Auth::user()->first_name.' '.Auth::user()->last_name }} @endif, <a href="https://www.google.com/maps/place/3720+Emerald+St,+Torrance,+CA+90503/@33.8403836,-118.3543828,17z/data=!4m18!1m15!4m14!1m6!1m2!1s0x80c2b4d407f58b11:0xdedca55964c89054!2s3720+Emerald+St,+Torrance,+CA+90503!2m2!1d-118.3520761!2d33.8403792!1m6!1m2!1s0x80c2b4d407f58b11:0xdedca55964c89054!2s3720+Emerald+St,+Torrance,+CA+90503!2m2!1d-118.3520761!2d33.8403792!3m1!1s0x80c2b4d407f58b11:0xdedca55964c89054" target="_blank"><i class="fa fa-map-marker rad-txt-danger"></i> Nepal</a></small>
        <ol class="breadcrumb">
            <li><a href="{{route('home')}}"><i class="fa fa-dashboard"></i>Home</a></li>
            <li class="{{route('users-targets.index')}}">Target Lists</li>
            <li class="active">Target Create</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        @include('message.flash-message')
        <div class="row">
            <div class="col-xs-12 col-md-12">
                <div class="box box-success">
                    <div class="box-header with-border">
                        <h3 class="box-title">{{ trans('Target Create') }}</h3>
                        <div class="box-tools pull-right">
                            {{--@include('user.partials.user-header-buttons')--}}
                            <a href="{{route('users-targets.index')}}" class="label label-primary">List All Target</a>

                        </div><!--box-tools pull-right-->
                    </div><!-- /.box-header -->
                    <div class="box-body">
                        <form role="form" id="target-form" method="POST" action="{{route('users-targets.store')}}">
                            {{csrf_field()}}
                            <div class="box-body">
                                <div class="form-group {{ $errors->has('user_id') ? ' has-error' : '' }} ">
                                    <label for="User">Set Target To</label>
                                    <select name="user_id" id="user_id" class="form-control">
                                        <option value="">-- select user --</option>
                                        @forelse($users as $user)
                                            <option value="{{$user->id}}" {{ ( old('user_id') == $user->id ? "selected" : '') }}>{{$user->first_name.' '.$user->last_name}}</option>
                                        @empty
                                        @endforelse
                                    </select>
                                    @if ($errors->has('user_id'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('user_id') }}</strong>
                                    </span>
                                    @endif
                                </div>
                                <div class="form-group {{ $errors->has('target_id') ? ' has-error' : '' }}">
                                    <label for="target_id">Set Target To</label>
                                    <select name="target_id" id="target_id" class="form-control">
                                        <option value="">-- select Target --</option>
                                        @forelse($targets as $target)
                                            <option value="{{ $target->id }}" {{ ( old('target_id') == $target->id ? "selected" : '') }}>{{ $target->name }}</option>
                                        @empty
                                        @endforelse
                                    </select>

                                    @if ($errors->has('target_id'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('target_id') }}</strong>
                                    </span>
                                    @endif
                                </div>
                                <div class="form-group {{ $errors->has('total_target') ? ' has-error' : '' }}">
                                    <label for="target total">Target Total</label>
                                    <input type="text" name="total_target" id="total_target" class="form-control" placeholder="e.g. 100" value="{{ old('total_target') }}">

                                    @if ($errors->has('total_target'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('total_target') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>
                            <!-- /.box-body -->

                            <div class="box-footer">
                                <button type="submit" class="btn btn-primary">Save</button>
                            </div>
                        </form>
                    </div><!-- /.box-body -->
                </div><!--box-->
            </div>
        </div>
    </section>
@endsection