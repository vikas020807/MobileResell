{{-- @props(['label']) --}}
@php
    if(Request::is('add-ram')) $route = route('specs.ram.edit');
    else if(Request::is('add-rom')) $route = route('specs.rom.edit');
    else if(Request::is('add-brand')) $route = route('specs.brand.edit');
    else if(Request::is('add-colour')) $route = route('specs.colour.edit');
@endphp
<div class="modal fade" id="edit" tabindex="-1" aria-labelledby="edit" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">EDIT NAME</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{ $route }}" method="post" id="editForm" enctype="multipart/form-data">
                    @csrf
                    <input type="text" name="name" id="name"
                        class="rounded p-2 ml-2 btn-light text-dark">
                    <input type="hidden" name="id" class="Id">
                    @if(Request::is('add-brand')||Request::is('add-colour'))
                    <img class="img" src="" alt="" height="40px">
                    <h5 class="mt-4">Change Image</h5>
                    <input type="file" name="logo" id="logo">
                    @endif
                 </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Save changes</a>
            </div>
            </form>
        </div>
    </div>
</div>