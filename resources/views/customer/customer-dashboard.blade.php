@extends('customer.master')

@section('content')
    <div class="body flex-grow-1">
        <div class="container-lg px-4">
            <div class="row g-4 mb-4">
                <!-- /.col-->
                <div class="col-sm-6 col-xl-3">
                    <a href="{{url('customer/orders/all')}}" style="text-decoration: none">
                        <div class="card text-white bg-primary">
                        <div class="card-body pb-0 d-flex justify-content-between align-items-start">
                            <div>
                                <div class="fs-4 fw-semibold">{{$allOrders}}</div>
                                <div>Total Orders</div>
                            </div>
                        </div>
                        <div class="c-chart-wrapper mt-3 mx-3" style="height:70px;">
                            <canvas class="chart" id="card-chart4" height="70"></canvas>
                        </div>
                    </div>
                    </a>
                </div>

                <div class="col-sm-6 col-xl-3">
                    <a href="{{url('customer/orders/pending')}}" style="text-decoration: none">
                        <div class="card text-white bg-danger">
                        <div class="card-body pb-0 d-flex justify-content-between align-items-start">
                            <div>
                                <div class="fs-4 fw-semibold">{{$pendingOrders}}</div>
                                <div>Pending Orders</div>
                            </div>
                        </div>
                        <div class="c-chart-wrapper mt-3 mx-3" style="height:70px;">
                            <canvas class="chart" id="card-chart4" height="70"></canvas>
                        </div>
                    </div>
                    </a>
                </div>

                <div class="col-sm-6 col-xl-3">
                    <a href="{{url('customer/orders/confirmed')}}" style="text-decoration: none">
                        <div class="card text-white bg-info">
                        <div class="card-body pb-0 d-flex justify-content-between align-items-start">
                            <div>
                                <div class="fs-4 fw-semibold">{{$confirmedOrders}}</div>
                                <div>Confirmed Orders</div>
                            </div>
                        </div>
                        <div class="c-chart-wrapper mt-3 mx-3" style="height:70px;">
                            <canvas class="chart" id="card-chart4" height="70"></canvas>
                        </div>
                    </div>
                    </a>
                </div>

                <div class="col-sm-6 col-xl-3">
                    <a href="{{url('customer/orders/delivered')}}" style="text-decoration: none">
                        <div class="card text-white bg-success">
                        <div class="card-body pb-0 d-flex justify-content-between align-items-start">
                            <div>
                                <div class="fs-4 fw-semibold">{{$deliveredOrders}}</div>
                                <div>Delivered Orders</div>
                            </div>
                        </div>
                        <div class="c-chart-wrapper mt-3 mx-3" style="height:70px;">
                            <canvas class="chart" id="card-chart4" height="70"></canvas>
                        </div>
                    </div>
                    </a>
                </div>

                <div class="col-sm-6 col-xl-3">
                    <a href="{{url('customer/orders/returned')}}" style="text-decoration: none">
                        <div class="card text-white bg-warning">
                        <div class="card-body pb-0 d-flex justify-content-between align-items-start">
                            <div>
                                <div class="fs-4 fw-semibold">{{$returnedOrders}}</div>
                                <div>Returned Orders</div>
                            </div>
                        </div>
                        <div class="c-chart-wrapper mt-3 mx-3" style="height:70px;">
                            <canvas class="chart" id="card-chart4" height="70"></canvas>
                        </div>
                    </div>
                    </a>
                </div>

                <div class="col-sm-6 col-xl-3">
                    <a href="{{url('customer/orders/cancelled')}}" style="text-decoration: none">
                        <div class="card text-white bg-danger">
                        <div class="card-body pb-0 d-flex justify-content-between align-items-start">
                            <div>
                                <div class="fs-4 fw-semibold">{{$cancelledOrders}}</div>
                                <div>Cancelled Orders</div>
                            </div>
                        </div>
                        <div class="c-chart-wrapper mt-3 mx-3" style="height:70px;">
                            <canvas class="chart" id="card-chart4" height="70"></canvas>
                        </div>
                    </div>
                    </a>
                </div>
                <!-- /.col-->
            </div>
            <!-- /.row-->

        </div>
    </div>
@endsection
