@extends('layouts.master')

@section('content')

<section class="content container-fluid">
    <div class="row">
        <div class="col-lg-3 col-xs-6">
            <!-- small box -->
            <div class="small-box bg-aqua">
                <div class="inner">
                    <h3>150</h3>

                    <p>New Orders</p>
                </div>
                <div class="icon">
                    <i class="fa fa-shopping-cart"></i>
                </div>
                <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
            </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
            <!-- small box -->
            <div class="small-box bg-green">
                <div class="inner">
                    <h3>134</h3>

                    <p>Bounce Rate</p>
                </div>
                <div class="icon">
                    <i class="fa fa-user"></i>
                </div>
                <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
            </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
            <!-- small box -->
            <div class="small-box bg-yellow">
                <div class="inner">
                    <h3>44</h3>

                    <p>User Registrations</p>
                </div>
                <div class="icon">
                    <i class="fa fa-gear"></i>
                </div>
                <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
            </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
            <!-- small box -->
            <div class="small-box bg-red">
                <div class="inner">
                    <h3>65</h3>

                    <p>Unique Visitors</p>
                </div>
                <div class="icon">
                    <i class="fa fa-gears"></i>
                </div>
                <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
            </div>
        </div>
        <!-- ./col -->
    </div>

    <!-- 欢迎信息 -->
    <h5 class="text-center">欢迎来到 希朗科技 Point Of Sale，选择下面的常见任务开始吧！</h5>

    <!-- 快捷功能按钮 -->
    <div class="row">

        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
            <div class="list-group">
                <a class="list-group-item" href="https://demo.phppointofsale.com/index.php/sales">
                    <div class="inner">
                        <i class="fa fa-shopping-cart"></i>
                        开始新的销售
                    </div>
                </a>
            </div>
        </div>


        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
            <div class="list-group">
                <a class="list-group-item" href="">
                    <i class="icon ti-cloud-down"></i> 开始新接收</a>
            </div>
        </div>


        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
            <div class="list-group">
                <a class="list-group-item" href="">
                    <i class="fa fa-clock-o"></i> 今天的报告</a>
            </div>
        </div>

        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
            <div class="list-group">
                <a class="list-group-item" href="">
                    <i class="fa fa-clock-o"></i> 今日详细销售报告</a>
            </div>
        </div>

    </div>

    <div class="row">

        <section class="col-lg-12 connectedSortable ui-sortable">
            <!-- Custom tabs (Charts with tabs)-->
            <div class="nav-tabs-custom" style="cursor: move;">
                <!-- Tabs within a box -->
                <ul class="nav nav-tabs pull-right ui-sortable-handle">
                    <li class=""><a href="#revenue-chart" data-toggle="tab" aria-expanded="false">Area</a></li>
                    <li class="active"><a href="#sales-chart" data-toggle="tab" aria-expanded="true">Donut</a></li>
                    <li class="pull-left header"><i class="fa fa-inbox"></i> Sales</li>
                </ul>
                <div class="tab-content no-padding">
                    <!-- Morris chart - Sales -->
                    <div class="chart tab-pane" id="revenue-chart" style="position: relative; height: 300px; -webkit-tap-highlight-color: rgba(0, 0, 0, 0);"><svg height="300" version="1.1" width="535.828" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" style="overflow: hidden; position: relative;"><desc style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);">Created with Raphaël 2.2.0</desc><defs style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></defs><text x="51.65625" y="258.5" text-anchor="end" font-family="sans-serif" font-size="12px" stroke="none" fill="#888888" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0); text-anchor: end; font-family: sans-serif; font-size: 12px; font-weight: normal;" font-weight="normal"><tspan dy="4.25" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);">0</tspan></text><path fill="none" stroke="#aaaaaa" d="M64.15625,258.5H510.828" stroke-width="0.5" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></path><text x="51.65625" y="200.125" text-anchor="end" font-family="sans-serif" font-size="12px" stroke="none" fill="#888888" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0); text-anchor: end; font-family: sans-serif; font-size: 12px; font-weight: normal;" font-weight="normal"><tspan dy="4.25" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);">7,500</tspan></text><path fill="none" stroke="#aaaaaa" d="M64.15625,200.125H510.828" stroke-width="0.5" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></path><text x="51.65625" y="141.75" text-anchor="end" font-family="sans-serif" font-size="12px" stroke="none" fill="#888888" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0); text-anchor: end; font-family: sans-serif; font-size: 12px; font-weight: normal;" font-weight="normal"><tspan dy="4.25" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);">15,000</tspan></text><path fill="none" stroke="#aaaaaa" d="M64.15625,141.75H510.828" stroke-width="0.5" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></path><text x="51.65625" y="83.375" text-anchor="end" font-family="sans-serif" font-size="12px" stroke="none" fill="#888888" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0); text-anchor: end; font-family: sans-serif; font-size: 12px; font-weight: normal;" font-weight="normal"><tspan dy="4.25" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);">22,500</tspan></text><path fill="none" stroke="#aaaaaa" d="M64.15625,83.375H510.828" stroke-width="0.5" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></path><text x="51.65625" y="25" text-anchor="end" font-family="sans-serif" font-size="12px" stroke="none" fill="#888888" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0); text-anchor: end; font-family: sans-serif; font-size: 12px; font-weight: normal;" font-weight="normal"><tspan dy="4.25" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);">30,000</tspan></text><path fill="none" stroke="#aaaaaa" d="M64.15625,25H510.828" stroke-width="0.5" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></path><text x="428.874859963548" y="271" text-anchor="middle" font-family="sans-serif" font-size="12px" stroke="none" fill="#888888" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0); text-anchor: middle; font-family: sans-serif; font-size: 12px; font-weight: normal;" font-weight="normal" transform="matrix(1,0,0,1,0,8.25)"><tspan dy="4.25" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);">2013</tspan></text><text x="230.23347417982987" y="271" text-anchor="middle" font-family="sans-serif" font-size="12px" stroke="none" fill="#888888" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0); text-anchor: middle; font-family: sans-serif; font-size: 12px; font-weight: normal;" font-weight="normal" transform="matrix(1,0,0,1,0,8.25)"><tspan dy="4.25" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);">2012</tspan></text><path fill="#74a5c2" stroke="none" d="M64.15625,216.99926666666667C76.6391786148238,217.50518333333332,101.60503584447144,220.52998125,114.08796445929525,219.02293333333333C126.57089307411906,217.51588541666666,151.5367503037667,207.18499371584699,164.0196789185905,204.94288333333333C176.36692352673145,202.725143715847,201.06141274301334,202.97661875,213.4086573511543,201.18353333333334C225.75590195929524,199.3904479166667,250.45039117557712,193.1129928734062,262.7976357837181,190.59820000000002C275.28056439854186,188.0557720400729,300.2464216281895,180.84860208333336,312.7293502430133,180.95465000000002C325.21227885783713,181.06069791666667,350.17813608748475,202.2824719489982,362.6610647023086,191.44658333333334C375.00830931044953,180.72847611566485,399.70279852673144,101.12886933701657,412.0500431348724,94.73866666666666C424.26160373633047,88.41868600368323,448.6847249392466,133.97130673076924,460.8962855407047,140.60585C473.37921415552853,147.38782756410257,498.34507138517614,146.455025,510.828,148.40475L510.828,258.5L64.15625,258.5Z" fill-opacity="1" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0); fill-opacity: 1;"></path><path fill="none" stroke="#3c8dbc" d="M64.15625,216.99926666666667C76.6391786148238,217.50518333333332,101.60503584447144,220.52998125,114.08796445929525,219.02293333333333C126.57089307411906,217.51588541666666,151.5367503037667,207.18499371584699,164.0196789185905,204.94288333333333C176.36692352673145,202.725143715847,201.06141274301334,202.97661875,213.4086573511543,201.18353333333334C225.75590195929524,199.3904479166667,250.45039117557712,193.1129928734062,262.7976357837181,190.59820000000002C275.28056439854186,188.0557720400729,300.2464216281895,180.84860208333336,312.7293502430133,180.95465000000002C325.21227885783713,181.06069791666667,350.17813608748475,202.2824719489982,362.6610647023086,191.44658333333334C375.00830931044953,180.72847611566485,399.70279852673144,101.12886933701657,412.0500431348724,94.73866666666666C424.26160373633047,88.41868600368323,448.6847249392466,133.97130673076924,460.8962855407047,140.60585C473.37921415552853,147.38782756410257,498.34507138517614,146.455025,510.828,148.40475" stroke-width="3" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></path><circle cx="64.15625" cy="216.99926666666667" r="4" fill="#3c8dbc" stroke="#ffffff" stroke-width="1" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></circle><circle cx="114.08796445929525" cy="219.02293333333333" r="4" fill="#3c8dbc" stroke="#ffffff" stroke-width="1" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></circle><circle cx="164.0196789185905" cy="204.94288333333333" r="4" fill="#3c8dbc" stroke="#ffffff" stroke-width="1" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></circle><circle cx="213.4086573511543" cy="201.18353333333334" r="4" fill="#3c8dbc" stroke="#ffffff" stroke-width="1" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></circle><circle cx="262.7976357837181" cy="190.59820000000002" r="4" fill="#3c8dbc" stroke="#ffffff" stroke-width="1" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></circle><circle cx="312.7293502430133" cy="180.95465000000002" r="4" fill="#3c8dbc" stroke="#ffffff" stroke-width="1" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></circle><circle cx="362.6610647023086" cy="191.44658333333334" r="4" fill="#3c8dbc" stroke="#ffffff" stroke-width="1" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></circle><circle cx="412.0500431348724" cy="94.73866666666666" r="4" fill="#3c8dbc" stroke="#ffffff" stroke-width="1" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></circle><circle cx="460.8962855407047" cy="140.60585" r="4" fill="#3c8dbc" stroke="#ffffff" stroke-width="1" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></circle><circle cx="510.828" cy="148.40475" r="4" fill="#3c8dbc" stroke="#ffffff" stroke-width="1" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></circle><path fill="#eaf3f6" stroke="none" d="M64.15625,237.74963333333335C76.6391786148238,237.5317,101.60503584447144,239.06307083333334,114.08796445929525,236.8779C126.57089307411906,234.69272916666668,151.5367503037667,221.23573925318763,164.0196789185905,220.26826666666668C176.36692352673145,219.31131008652096,201.06141274301334,231.02677916666667,213.4086573511543,229.18018333333333C225.75590195929524,227.3335875,250.45039117557712,207.33684314663023,262.7976357837181,205.4955C275.28056439854186,203.6339223132969,300.2464216281895,212.43239583333335,312.7293502430133,214.3685C325.21227885783713,216.30460416666668,350.17813608748475,230.1826596539162,362.6610647023086,220.98433333333332C375.00830931044953,211.88598882058287,399.70279852673144,146.92145522559855,412.0500431348724,141.1818166666667C424.26160373633047,135.5052510589319,448.6847249392466,168.92937861721614,460.8962855407047,175.3195166666667C473.37921415552853,181.8516577838828,498.34507138517614,188.48307916666667,510.828,192.87093333333334L510.828,258.5L64.15625,258.5Z" fill-opacity="1" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0); fill-opacity: 1;"></path><path fill="none" stroke="#a0d0e0" d="M64.15625,237.74963333333335C76.6391786148238,237.5317,101.60503584447144,239.06307083333334,114.08796445929525,236.8779C126.57089307411906,234.69272916666668,151.5367503037667,221.23573925318763,164.0196789185905,220.26826666666668C176.36692352673145,219.31131008652096,201.06141274301334,231.02677916666667,213.4086573511543,229.18018333333333C225.75590195929524,227.3335875,250.45039117557712,207.33684314663023,262.7976357837181,205.4955C275.28056439854186,203.6339223132969,300.2464216281895,212.43239583333335,312.7293502430133,214.3685C325.21227885783713,216.30460416666668,350.17813608748475,230.1826596539162,362.6610647023086,220.98433333333332C375.00830931044953,211.88598882058287,399.70279852673144,146.92145522559855,412.0500431348724,141.1818166666667C424.26160373633047,135.5052510589319,448.6847249392466,168.92937861721614,460.8962855407047,175.3195166666667C473.37921415552853,181.8516577838828,498.34507138517614,188.48307916666667,510.828,192.87093333333334" stroke-width="3" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></path><circle cx="64.15625" cy="237.74963333333335" r="4" fill="#a0d0e0" stroke="#ffffff" stroke-width="1" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></circle><circle cx="114.08796445929525" cy="236.8779" r="4" fill="#a0d0e0" stroke="#ffffff" stroke-width="1" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></circle><circle cx="164.0196789185905" cy="220.26826666666668" r="4" fill="#a0d0e0" stroke="#ffffff" stroke-width="1" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></circle><circle cx="213.4086573511543" cy="229.18018333333333" r="4" fill="#a0d0e0" stroke="#ffffff" stroke-width="1" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></circle><circle cx="262.7976357837181" cy="205.4955" r="4" fill="#a0d0e0" stroke="#ffffff" stroke-width="1" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></circle><circle cx="312.7293502430133" cy="214.3685" r="4" fill="#a0d0e0" stroke="#ffffff" stroke-width="1" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></circle><circle cx="362.6610647023086" cy="220.98433333333332" r="4" fill="#a0d0e0" stroke="#ffffff" stroke-width="1" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></circle><circle cx="412.0500431348724" cy="141.1818166666667" r="4" fill="#a0d0e0" stroke="#ffffff" stroke-width="1" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></circle><circle cx="460.8962855407047" cy="175.3195166666667" r="4" fill="#a0d0e0" stroke="#ffffff" stroke-width="1" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></circle><circle cx="510.828" cy="192.87093333333334" r="4" fill="#a0d0e0" stroke="#ffffff" stroke-width="1" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></circle></svg><div class="morris-hover morris-default-style" style="left: 365.98px; top: 55px; display: none;"><div class="morris-hover-row-label">2012 Q4</div><div class="morris-hover-point" style="color: #a0d0e0">
                                Item 1:
                                15,073
                            </div><div class="morris-hover-point" style="color: #3c8dbc">
                                Item 2:
                                5,967
                            </div></div></div>
                    <div class="chart tab-pane active" id="sales-chart" style="position: relative; height: 300px;"><svg height="300" version="1.1" width="565.828" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" style="overflow: hidden; position: relative;"><desc style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);">Created with Raphaël 2.2.0</desc><defs style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></defs><path fill="none" stroke="#3c8dbc" d="M282.914,243.33333333333331A93.33333333333333,93.33333333333333,0,0,0,371.14175519497707,180.44625304313007" stroke-width="2" opacity="0" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0); opacity: 0;"></path><path fill="#3c8dbc" stroke="#ffffff" d="M282.914,246.33333333333331A96.33333333333333,96.33333333333333,0,0,0,373.97764732624415,181.4248826052307L410.5291459070204,194.03833029452744A135,135,0,0,1,282.914,285Z" stroke-width="3" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></path><path fill="none" stroke="#f56954" d="M371.14175519497707,180.44625304313007A93.33333333333333,93.33333333333333,0,0,0,199.1988462783141,108.73398312817662" stroke-width="2" opacity="0" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0); opacity: 0;"></path><path fill="#f56954" stroke="#ffffff" d="M373.97764732624415,181.4248826052307A96.33333333333333,96.33333333333333,0,0,0,196.50800205154565,107.40757544301087L161.8260097954186,90.31165416754118A135,135,0,0,1,410.5291459070204,194.03833029452744Z" stroke-width="3" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></path><path fill="none" stroke="#00a65a" d="M199.1988462783141,108.73398312817662A93.33333333333333,93.33333333333333,0,0,0,282.8846784690488,243.333328727518" stroke-width="2" opacity="1" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0); opacity: 1;"></path><path fill="#00a65a" stroke="#ffffff" d="M196.50800205154565,107.40757544301087A96.33333333333333,96.33333333333333,0,0,0,282.8837359912682,246.3333285794739L282.87001770357324,289.999993091277A140,140,0,0,1,157.34126941747115,88.10097469226493Z" stroke-width="3" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></path><text x="282.914" y="140" text-anchor="middle" font-family="&quot;Arial&quot;" font-size="15px" stroke="none" fill="#000000" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0); text-anchor: middle; font-family: Arial; font-size: 15px; font-weight: 800;" font-weight="800" transform="matrix(1.4192,0,0,1.4192,-118.5996,-62.1492)" stroke-width="0.7046130952380952"><tspan dy="5.25" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);">Mail-Order Sales</tspan></text><text x="282.914" y="160" text-anchor="middle" font-family="&quot;Arial&quot;" font-size="14px" stroke="none" fill="#000000" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0); text-anchor: middle; font-family: Arial; font-size: 14px;" transform="matrix(2.0072,0,0,2.0072,-284.9343,-153.3414)" stroke-width="0.4982142857142858"><tspan dy="4.75" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);">20</tspan></text></svg></div>
                </div>
            </div>
            <!-- /.nav-tabs-custom -->




        </section>
    </div>
</section>
@endsection
