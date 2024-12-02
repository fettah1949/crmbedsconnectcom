@extends('layouts.app')

@section('content')
<div class="layout-px-spacing">
    <button class="btn btn-outline-success mb-2" data-toggle="modal" data-target="#add_user" target="_blank">Ajouter</button>

    <div class="row layout-top-spacing" id="cancel-row">
    
        <div class="col-xl-12 col-lg-12 col-sm-12  layout-spacing">
            {{-- <table id="style-1" class="table table-hover" style="width:100%"> --}}
                <table class="multi-table table" style="width:100%">  
                    
                <thead>
                    <tr>
                   
                    <th class="text-center" >nom</th>
                        <th>email</th>
                        <th>role</th>
                       
                        <th class="text-center" >Action</th>
                            
                    </tr>
                </thead>
                

                 <tbody>
{{-- {{ $user }} --}}
                    @foreach($user as $row)
                    <tr class='res_tab'>
                        <td class='checkbox-column'>{{ $row->name }}</td>
                        <td class='checkbox-column'>{{ $row->email }}</td>
                        <td class='checkbox-column'>
                        @if($row->role == 1)
                        Admin
                        @else
                        Agent
                        @endif
                        
                        </td>
                        <td class="text-center"> 
                            <div class="dropdown">
                                <a class="dropdown-toggle" role="button" id="dropdownMenuLink2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-more-horizontal"><circle cx="12" cy="12" r="1"></circle><circle cx="19" cy="12" r="1"></circle><circle cx="5" cy="12" r="1"></circle></svg>
                                </a>
                                <div class="dropdown-menu" aria-labelledby="dropdownMenuLink2">
                                    <a class="dropdown-item" data-toggle="modal" data-target="#edit_user-{{ $row->id }}" target="_blank">Edit</a>
                                    <a class="dropdown-item"  data-toggle="modal" data-target="#deleteModalCenter{{ $row->id }}" target="_blank">Delete</a>
                                </div>
                            </div>

                        </td>
                    </tr>
                    @include('pages.users.pop_up.pop_up_Edit_user',['id'=>$row->id,'name'=>$row->name,'email'=>$row->email,'role'=>$row->role])
                    @include('pages.users.pop_up.pop_up_delete_user',['id'=>$row->id,'name'=>$row->name,'email'=>$row->email,'role'=>$row->role])
                  
                    @endforeach
                </tbody>
            </table>
        </div>
        @include('pages.users.pop_up.pop_up_add_user')
    </div>

</div>

<script>
    function disabledfun(id)
    {
        //  alert($('#aa'+id).is(':checked'));
        if ($('#aa'+id).is(':checked')) {
            $('#passwords'+id).removeAttr("disabled");
            $('#passwords'+id).val("");
        } else {
            $('#passwords'+id).attr("disabled", true);
            $('#passwords'+id).val("");
        }
        //  $('#passwords'+id).prop("disabled", false)
        //  document.getElementById('my-input-id').disabled = false;
    }
</script>

@endsection  