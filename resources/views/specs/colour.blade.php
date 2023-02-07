<x-layout>
   
    <div class="container-fluid">
        <x-addButton label='COLOUR' />
        <div class="row">
            <div class="card-body">
                <x-table :data="$data" :caption="$caption = 'List of Colours'" label="colour" />
                {{-- {!! $data->links() !!} --}}
            </div>
        </div>
        <x-editModal />

    </div>
    <script type="text/javascript">
        var i = 0;
        $("#dynamic-ar").click(function() {
            ++i;
            $("#dynamicAddRemove").append('<tr><td><input type="text" name="brand_name[' + i +
                '][name]" placeholder="Enter Brand name" class="form-control" /></td><td><input type=file name ="logo[' +
                i +
                ']" id=""></td><td><button type="button " class="btn btn-outline-danger remove-input-field ">Remove</button></td></tr>'
            );
        });
        $(document).on('click', '.remove-input-field', function() {
            $(this).parents('tr').remove();
        });
    </script>

    <script>
        $(document).ready(function() {

            $('#listTable').on('click', '#editRam', function() {
                var id = $(this).attr('data-id');

                if (id > 0) {
                    // AJAX request
                    var url = "{{ route('colour.show', [':id']) }}";
                    url = url.replace(':id', id);

                    $.ajax({
                        url: url,
                        dataType: 'json',
                        success: function(response) {
                            $('#name').val(response.name);
                            $('.Id').val(response.id);
                            $('.img').attr("src", response.logo);
                            $('#edit').modal('show');
                        }
                    });
                }
            });

        });
    </script>

</x-layout>
