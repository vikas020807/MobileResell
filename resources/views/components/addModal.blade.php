@props(['label'])
<div class="modal fade" id="add" tabindex="-1" aria-labelledby="add" aria-hidden="true">
    <div class="modal-dialog modal-lg rounded">
        <div class="modal-content">
            <div class="modal-header bg-light border-1 border-secondary shadow-sm ">
                <h5 class="modal-title" id="exampleModalLabel">Add Details</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <x-dynamicTable  :$label/>

            </div>
        </div>
    </div>
</div>
