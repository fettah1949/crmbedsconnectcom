@php
    $category_name = 'production';
    $page_name = 'hotel_list';
    $has_scrollspy = 0;
    $scrollspy_offset = '';
@endphp
@extends('layouts.app')
@section('content')

<br>
<hr>
   <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left text-center">
                <h2 class="text-primary">Hotel List</h2>
            </div>
            <hr>
            <div class="pull-right">
                <div class="row">
                            <div class="col-md-6">
                                <a class="btn btn-outline-primary btn-rounded mb-2" href="{{ route('hotellist.create') }}"> New Hotel</a>
                             </div>
                             <div class="col-md-6">
                                <form method="post" action="{{ route('import') }}" enctype="multipart/form-data">
                                    @csrf
                                    <div class="form-group">
                                        <label for="file">Fichier d'import</label>
                                        <input type="file" name="csv_file" id="csv_file" class="form-control-file btn btn-outline-primary btn-rounded mb-2">
                                        <button type="submit" class="btn btn-success">Importer CSV</button>
                                    </div>
                                    
                                </form>
                                 <a href="{{ route('export') }}" class="btn btn-primary">Exporter CSV</a>
                            </div>
                </div>
            </div>
            <br>
        </div>
    </div>
@if (session('status') == 'success')
    <div class="alert alert-success">
    {{ session() ->get('status') }}
    </div>
@endif

@if (session('status') == 'error')
    <div class="alert alert-danger">
        {{ session('errors')->first() }}
    </div>
@endif
<div class="table-responsive">
    <table class="table table-bordered table-striped mb-4" id="hotels-table">
        {{-- <input type="text" id="myInput" onkeyup="myFunction()" placeholder="Search for names.."> --}}
        <thead>
        <tr>
            <th>.</th>
            <th>Hotel Code</th>
            <th>bdc_id</th>
            <th>Giata ID</th>
            <th>Provider id</th>
            <th>Hotel Name</th>
            <th>Country </th>
            <th>Provider</th>
            <th>Action</th>
            <th></th>
        </tr>
    </thead>
    <tbody>
        @foreach($hotels as $value)
        <tr>
            <td>-</td>
            <td>{{ $value->Hotel_Code }}</td>
            <td>{{ $value->bdc_id }}</td>
            <td>{{ $value->Giata_id }}</td>
            <td>{{ $value->provider_id }}</td>
            <td>{{ $value->Hotel_Name }}</td>
            <td>{{ $value->Country }}</td>
            <td>{{ $value->provider }}</td>
            
            <td>

                    <a class="btn btn-outline-primary mb-2" href="{{ route('hotellist.edit',$value["id"]) }}">
                        <svg xmlns='http://www.w3.org/2000/svg' width='30' height='30' viewBox='0 0 24 24' fill='none' stroke='currentColor' stroke-width='2' stroke-linecap='round' stroke-linejoin='round' class='feather feather-edit-2 p-1 br-6 mb-1'>
                            <path d='M17 3a2.828 2.828 0 1 1 4 4L7.5 20.5 2 22l1.5-5.5L17 3z'></path></svg>
                    </a>
                </td>
                <td>
                    <a class="btn btn-outline-primary mb-2" href="{{ route('hotellist.show',$value["Hotel_Code"]) }}">Rooms</a>              
                </td>
        </tr>
        @endforeach
    </tbody>
</table>
</div>

      
@endsection

  