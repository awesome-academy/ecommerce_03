@extends('templates.admin.master')
@section('content')
<div id="page-wrapper">
    <div class="container-fluid m-b-50">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">
                    <i class="fa fa-home"></i> @lang('message.dashboard')
                </h1>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-12">
                @include('errors.error')
            </div>
        </div>

        <div class="row">
            <div class="col-lg-12"><br></div>
            <div class="col-lg-4 col-md-6">
                <div class="panel panel-primary">
                    <div class="panel-heading">
                        <div class="row">
                            <div class="col-xs-3">
                                <i class="fa fa-envelope-o fa-5x"></i>
                            </div>
                            <div class="col-xs-9 text-right">
                                <div class="huge"></div>
                                <div>@lang('message.admin.user')</div>
                            </div>
                        </div>
                    </div>
                    <a href="">
                        <div class="panel-footer">
                            <span class="pull-left">@lang('message.admin.view_detail')</span>
                            <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                            <div class="clearfix"></div>
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
