@extends('templates.watch.master')
@section('content')
    <div class="bread-crumb bgwhite flex-w p-l-52 p-r-15 p-t-30 p-l-15-sm">
    </div>

    <div class="container bgwhite p-t-35 p-b-80">
        <div class="flex-w flex-sb">
            <div class="w-size13 p-t-30 respon5">
                <div class="wrap-slick3 flex-sb flex-w">
                    <div class="wrap-slick3-dots"></div>

                    <div class="slick3">
                        <div class="item-slick3" data-thumb="{{ asset("images/products/$product->picture") }}">
                            <div class="wrap-pic-w">
                                {{ Html::image(asset("images/products/$product->picture")) }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="w-size14 p-t-30 respon5">
                <h4 class="product-detail-name m-text16 p-b-13">
                    {{ $product->name }}
                </h4>

                <span class="m-text17">
                    <i class="fa fa-money"> {{ number_format($product->price) }} {{ config('custom.vnd') }} </i>
                </span>

                <p class="s-text8 p-t-10">
                    {!! $product->preview !!}
                </p>

                <div class="p-t-33 p-b-60">
                    <div class="flex-r-m flex-w p-t-10">
                        <div class="w-size16 flex-m flex-w">
                            <div class="btn-addcart-product-detail size9 trans-0-4 m-t-10 m-b-10">
                                {{ Form::button(trans('message.add_to_cart'), ['class' => 'flex-c-m sizefull bg1 bo-rad-23 hov1 s-text1 trans-0-4', 'onclick' => Auth::check() ? 'addcart('.$product->id.')' : '']) }}
                                {{ Form::hidden('name', route('cart.create'), array('id' => $product->id)) }}
                                {{ Form::hidden('change', route('cart.change'), array('id' => 'changecart-'.$product->id)) }}
                            </div>
                        </div>
                    </div>
                </div>

                <div class="wrap-dropdown-content bo6 p-t-15 p-b-14 active-dropdown-content">
                    <h5 class="js-toggle-dropdown-content flex-sb-m cs-pointer m-text19 color0-hov trans-0-4">
                        @lang('message.description')
                        <i class="down-mark fs-12 color1 fa fa-minus dis-none" aria-hidden="true"></i>
                        <i class="up-mark fs-12 color1 fa fa-plus" aria-hidden="true"></i>
                    </h5>

                    <div class="dropdown-content dis-none p-t-15 p-b-23">
                        <p class="s-text8">
                            {!! $product->description !!}
                        </p>
                    </div>
                </div>

                <div class="wrap-dropdown-content bo7 p-t-15 p-b-14">
                    <h5 class="js-toggle-dropdown-content flex-sb-m cs-pointer m-text19 color0-hov trans-0-4">
                        @lang('message.add_information')
                        <i class="down-mark fs-12 color1 fa fa-minus dis-none" aria-hidden="true"></i>
                        <i class="up-mark fs-12 color1 fa fa-plus" aria-hidden="true"></i>
                    </h5>

                    <div class="dropdown-content dis-none p-t-15 p-b-23">
                        <p class="s-text8">

                        </p>
                    </div>
                </div>

                <div class="wrap-dropdown-content bo7 p-t-15 p-b-14">
                    <h5 class="js-toggle-dropdown-content flex-sb-m cs-pointer m-text19 color0-hov trans-0-4">
                        @lang('message.review')
                        <i class="down-mark fs-12 color1 fa fa-minus dis-none" aria-hidden="true"></i>
                        <i class="up-mark fs-12 color1 fa fa-plus" aria-hidden="true"></i>
                    </h5>

                    <div class="dropdown-content dis-none p-t-15 p-b-23">
                        <p class="s-text8">

                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <section class="relateproduct bgwhite p-t-45 p-b-138">
        <div class="container">

        </div>
    </section>
@endsection
