@extends('layouts.master')
@section('content')
    <div class="row">
        <div class="col-md-2"></div>
        <div class="col-md-8">
            <h1 class="text-center mt-3 text-uppercase">{{$facilitie->name}}</h1>
            <p>{{$facilitie->description}}</p>
            <h2 class="text-secundary">Horario</h2>
            <p>{{$facilitie->timetable}}</p>
            <h2 class="text-secundary">Precios</h2>
            <span>*Los descuentos solo se aplican a los abonados y no son acumulables</span>
            <div class="table-responsive mb-5 table-bordered">
                <table class="table mb-0">
                    <thead class="thead-light">
                    <tr>
                        <th scope="col">Abonados</th>
                        <th scope="col">No Abonados</th>
                        <th scope="col">Familia Numerosa</th>
                        <th scope="col">Familia Numerosa Especial</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <td>{{$facilitie->sub_price}}€</td>
                        <td>{{$facilitie->normal_price}}€</td>
                        <td>{{$facilitie->sub_price - ($facilitie->sub_price * 0.15)}}€</td>
                        <td>{{$facilitie->sub_price - ($facilitie->sub_price * 0.25)}}€</td>
                    </tr>
                    </tbody>
                </table>
            </div>
        </div>
        <div class="col-md-2"></div>
    </div>
@endsection
