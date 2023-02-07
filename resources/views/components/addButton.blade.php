@props(['label'])
<div class="row mb-4">
    <div class="col text-center">
        <button class="btn btn-outline-primary m-2 rounded-pill " type="button" data-bs-toggle="modal"
            data-bs-target="#add" aria-expanded="false" aria-controls="add"><i class="fa-solid fa-circle-plus"></i>
            Add {{ $label }}
        </button>
    </div>
    <x-addModal :$label/>
</div>