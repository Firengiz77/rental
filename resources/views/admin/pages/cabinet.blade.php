@extends('admin.layout.master')
@section('container')

    <!-- Cabinet start -->
    <section id="cabinet">
        <div class="container">
         

            @include('admin.partials.cabinet_menu')

            <div class="cabinet">
                <h3>Ümumi statistika</h3>
                <div class="profile-statistics-block">
                    <div class="profile-statistics">
                        <p class="profile-statistics-title">Şəxsi hesab</p>
                        <div class="profile-statistics-info">
                            <p class="profile-statistics-count">0,00 AZN</p>
                            <button class="button wallet-btn">Artır</button>
                        </div>
                    </div>
                    <div class="profile-statistics">
                        <p class="profile-statistics-title">Ödənişli elan balansı</p>
                        <div class="profile-statistics-info">
                            <p class="profile-statistics-count">0</p>
                            <a href="yeni-elan.html" class="button">Elan Yerləşdir</a>
                        </div>
                    </div>
                    <div class="profile-statistics">
                        <p class="profile-statistics-title">Elanların statistikası</p>   
                        <a href="cabinet-elan.html" class="profile-statistics-link"><span>Saytda</span><span class="profile-statistics-count">0</span></a>
                        <a href="cabinet-elan.html" class="profile-statistics-link"><span>İmtina olunmuş</span><span class="profile-statistics-count">0</span></a>
                        <a href="cabinet-elan.html" class="profile-statistics-link"><span>Müddəti başa çatmış</span><span class="profile-statistics-count">0</span></a>
                    </div>
                </div>
                <h3>Əməliyyat tarixçəsi</h3>
                <ul class="nav nav-tabs">
                    <li data-active="tab-1"><a href="#tab-1" class="active">Bütün əməliyyatlar</a></li>
                    <li data-active="tab-2"><a href="#tab-2">Şəxsi hesab</a></li>
                </ul>
                <div class="tab-content">
                    <div id="tab-1" class="tab-pane">
                        <!-- <p class="tab-pane-empty">Hal hazırda sizin əməliyyatınız yoxdur</p> -->
                        <div class="table">
                            <table>
                                <thead>
                                    <tr>
                                        <th>TARİX</th>
                                        <th>MƏBLƏĞ</th>
                                        <th>ELAN</th>
                                        <th>XİDMƏT</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>02.07.2021, 12:18</td>
                                        <td><img src="assets/images/arrow.png"/> 3,00 AZN</td>
                                        <td><a href="">#5161715</a></td>
                                        <td>İrəli çək 1 dəfə</td>
                                        <td><button class="receipt-btn">Ətraflı</button></td>
                                    </tr>
                                    <tr>
                                        <td>02.07.2021, 12:18</td>
                                        <td><img src="assets/images/premium.png"/> 3,00 AZN</td>
                                        <td><a href="">#5161715</a></td>
                                        <td>Premium et 1 dəfə</td>
                                        <td><button class="receipt-btn">Ətraflı</button></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div id="tab-2" class="tab-pane">
                        <!-- <p class="tab-pane-empty">Hal hazırda sizin əməliyyatınız yoxdur</p> -->
                        <div class="table">
                            <table>
                                <thead>
                                    <tr>
                                        <th>TARİX</th>
                                        <th>MƏBLƏĞ</th>
                                        <th>XİDMƏT</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>02.07.2021, 12:18</td>
                                        <td>3,00 AZN</td>
                                        <td>İrəli çək 1 dəfə</td>
                                    </tr>
                                    <tr>
                                        <td>02.07.2021, 12:18</td>
                                        <td>3,00 AZN</td>
                                        <td>Premium et 1 dəfə</td>
                                    </tr>
                                    <tr>
                                        <td>02.07.2021, 12:18</td>
                                        <td>3,00 AZN</td>
                                        <td>Balansın artırılması</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        
    </section>
    <!-- Cabinet end -->



    
@endsection