@extends('admin.layout.master')

@section('container')
    

<section id="cabinet">
    <div class="container">


        @include('admin.partials.cabinet_menu')


        <div class="cabinet-elan">
            <ul class="nav nav-tabs">
                <li data-active="tab-1"><a href="#tab-1" class="active">Saytda - 1</a></li>
                <li data-active="tab-2"><a href="#tab-2">Müddəti başa çatmış - 0</a></li>
                <li data-active="tab-3"><a href="#tab-3">Gözləmədə - 0</a></li>
                <li data-active="tab-4"><a href="#tab-4">İmtina olunmuş - 0</a></li>
            </ul>
            <div class="tab-content">
                <div id="tab-1" class="tab-pane">
                    <div class="card-block">
                        <!-- <p class="tab-pane-empty">Bu bölmədə elan yoxdur</p> -->
                        <div class="product-card">
                            <a href="" class="card-link"></a>
                            <div class="card-header">
                                <div class="card-img">
                                    <img src="{{ asset('/site/assets/images/img.jpg') }}"/>
                                </div>
                                <span class="card-label">Rent a car</span>
                            </div>
                            <div class="card-body">
                                <div class="card-price">63000 AZN</div>
                                <div class="card-name">Geely Tugella</div>
                                <div class="card-attributes">
                                    <span>2022</span> ,
                                    <span> 2.0 L</span>
                                </div>
                                <div class="card-date"><span>Bakı</span>, <span>17.01.2023 11:17</span></div>
                            </div>
                        </div>
                    </div>
                </div>
                <div id="tab-2" class="tab-pane">
                    <div class="card-block">
                        <p class="tab-pane-empty">Bu bölmədə elan yoxdur</p>
                        <!-- <div class="product-card">
                            <a href="" class="card-link"></a>
                            <div class="card-header">
                                <div class="card-img">
                                    <img src="assets/images/img.jpg"/>
                                </div>
                                <span class="card-label">Rent a car</span>
                            </div>
                            <div class="card-body">
                                <div class="card-price">63000 AZN</div>
                                <div class="card-name">Geely Tugella</div>
                                <div class="card-attributes">
                                    <span>2022</span> ,
                                    <span> 2.0 L</span>
                                </div>
                                <div class="card-date"><span>Bakı</span>, <span>17.01.2023 11:17</span></div>
                            </div>
                        </div> -->
                    </div>
                </div>
                <div id="tab-3" class="tab-pane">
                    <div class="card-block">
                        <p class="tab-pane-empty">Bu bölmədə elan yoxdur</p>
                        <!-- <div class="product-card">
                            <a href="" class="card-link"></a>
                            <div class="card-header">
                                <div class="card-img">
                                    <img src="assets/images/img.jpg"/>
                                </div>
                                <span class="card-label">Rent a car</span>
                            </div>
                            <div class="card-body">
                                <div class="card-price">63000 AZN</div>
                                <div class="card-name">Geely Tugella</div>
                                <div class="card-attributes">
                                    <span>2022</span> ,
                                    <span> 2.0 L</span>
                                </div>
                                <div class="card-date"><span>Bakı</span>, <span>17.01.2023 11:17</span></div>
                            </div>
                        </div> -->
                    </div>
                </div>
                <div id="tab-4" class="tab-pane">
                    <div class="card-block">
                        <p class="tab-pane-empty">Bu bölmədə elan yoxdur</p>
                        <!-- <div class="product-card">
                            <a href="" class="card-link"></a>
                            <div class="card-header">
                                <div class="card-img">
                                    <img src="assets/images/img.jpg"/>
                                </div>
                                <span class="card-label">Rent a car</span>
                            </div>
                            <div class="card-body">
                                <div class="card-price">63000 AZN</div>
                                <div class="card-name">Geely Tugella</div>
                                <div class="card-attributes">
                                    <span>2022</span> ,
                                    <span> 2.0 L</span>
                                </div>
                                <div class="card-date"><span>Bakı</span>, <span>17.01.2023 11:17</span></div>
                            </div>
                        </div> -->
                    </div>
                </div>
            </div>
        </div>
    </div>

    
</section>



@endsection