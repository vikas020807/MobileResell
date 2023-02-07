<x-layout>
  
    <div class="container-fluid">
        <x-addButton label='RAM' />
       
        <div class="row">
            <div class="card-body">
                <x-table :$data :caption="$caption='List of RAMs'" label="ram" />
                {{-- {!! $data->links() !!} --}}
            </div>
        </div>
        <x-editModal />

    </div>
    <script type="text/javascript">
        var i = 0;
        $("#dynamic-ar").click(function() {
            ++i;
            $("#dynamicAddRemove").append('<tr><td><input type="text" name="ram_name[' + i +
                '][name]" placeholder="Enter RAM model" class="form-control" /></td><td><button type="button" class="btn btn-outline-danger remove-input-field">Remove</button></td></tr>'
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
                    var url = "{{ route('ram.show', [':id']) }}";
                    url = url.replace(':id', id);

                    $.ajax({
                        url: url,
                        dataType: 'json',
                        success: function(response) {
                            $('#name').val(response.name);
                            $('.Id').val(response.id);
                            $('#edit').modal('show');
                        }
                    });
                }
            });

        });
    </script>
   
</x-layout>
