@extends('templates.watch.master')
@section('content')
    <section class="bgwhite p-t-66 p-b-60">
        <div class="container">
            <div class="row">
                <div class="col-md-4 p-b-30">

                </div>
                <div class="col-md-8 p-b-30">
                    {!! Form::open(['method' => 'post', 'class' => 'leave-comment']) !!}
                        <h4 class="m-text26 p-b-36 p-t-15">
                            @lang('message.your_infor')
                        </h4>
                        {!! Form::label('name', trans('message.name'), ['class' => 'col-form-label text-md-right']) !!}
                        <div class="bo4 of-hidden size15 m-b-20">
                            {!! Form::text('name', $customer->name, ['required', 'class' => 'sizefull s-text7 p-l-22 p-r-22']) !!}
                        </div>

                        {!! Form::label('email', trans('message.email_address'), ['class' => 'col-form-label text-md-right']) !!}
                        <div class="bo4 of-hidden size15 m-b-20">
                            {!! Form::text('email', $customer->email, ['required', 'class' => 'sizefull s-text7 p-l-22 p-r-22']) !!}
                        </div>

                        <div class="w-size25">
                            {{ Form::submit(trans('message.confirm'), ['class' => 'flex-c-m size2 bg1 bo-rad-23 hov1 m-text3 trans-0-4']) }}
                        </div>
                </div>
                <div class="clear"></div>
                {!! Form::close() !!}

            </div>
        </div>
    </section>
@endsection
