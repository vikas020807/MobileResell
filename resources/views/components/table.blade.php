@props(['data', 'caption', 'label'])
<table class="table table-bordered table-hover data-table shadow pt-1" id="listTable">
    <caption>{{ $caption }} </caption>
    <thead >
        <tr class="table-light">
            <th>No.</th>
            <th>Name</th>
            @if ($label == 'colour' || $label == 'brand')
                <th>Logo/Icon</th>
            @endif
            <th>Added</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody class="">
        @if (count($data) > 0)
            @php
            ($i = 1);
            if(Request::is('add-brand')) $colName = 'logo';
            else if(Request::is('add-colour')) $colName = 'icon';
            @endphp
            @foreach ($data as $row)
                <tr class="table-secondary">
                    <td>{{ $i++ }}</td>
                    <td>{{ $row->name }}</td>
                    @if ($label == 'colour' || $label == 'brand')
                        <td><img src="{{ asset('images/' . $row->$colName) }}" alt="" class="" height="40px"
                                srcset=""></td>
                    @endif
                    <td>{{ $row->created_at->diffForHumans() }}</td>
                    <td class="">
                        <div class="row p-1">
                            <button id="editRam" data-id='{{ $row->id }}'
                                class="btn btn-outline-primary rounded btn-sm w-50 p-0"><i
                                    class="fa-regular fa-pen-to-square"></i>
                            </button>
                            <a href="{{ route($label . '.delete', [base64_encode(urlencode($row->id))]) }}"
                                class="btn btn-outline-danger rounded btn-sm w-50 p-0" type="button"
                                onclick="return confirm('Are you sure you want to delete ?')">
                                <i class="fa-solid fa-trash"></i>
                            </a>
                        </div>
                    </td>
                </tr>
            @endforeach
        @else
            <tr>
                <td colspan="4" class="text-center">No Data Found</td>
            </tr>
        @endif
    </tbody>
</table>
