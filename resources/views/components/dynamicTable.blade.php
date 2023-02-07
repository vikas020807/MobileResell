@props(['label'])
@php
if(Request::is('add-brand')) $route = route('specs.brand.store');
else if(Request::is('add-ram')) $route = route('specs.ram.store');
else if(Request::is('add-rom')) $route = route('specs.rom.store');
else if(Request::is('add-colour')) $route = route('specs.colour.store');
@endphp

<div class="row " id="add_details">
    <div class="card">
        {{-- <div class="card-header">{{ /*Add Details*/ }}</div> --}}
        <div class="card-body">
            <form class="" action="{{($route)}}" method="POST" enctype="multipart/form-data">
                @csrf
                <table class="table table-bordered" id="dynamicAddRemove">
                    <tr>
                        <th>Name</th>
                        @if ($label=='COLOUR'||$label=='BRAND')
                            <th>Logo/Icon</th>
                        @endif
                        <th>Action</th>
                    </tr>
                    <tr>
                        <td><input type="text" name="{{strtolower($label)}}_name[0][name]" placeholder="Enter {{strtolower($label)}} name"
                                class="form-control" />
                        </td>
                        @if ($label=='COLOUR'||$label=='BRAND')
                            <td>
                                <input type="file" name="logo[0]">
                            </td>
                        @endif
                        <td><button type="button" name="add" id="dynamic-ar"
                                class="btn btn-outline-primary">Add More</button></td>
                    </tr>
                </table>
                <div class="text-center"><button type="submit" class="btn btn-outline-success mx-auto">SAVE</button></div>
            </form>
        </div>
    </div>
</div>