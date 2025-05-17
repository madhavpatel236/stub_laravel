<div>
    <form method='post' id='data_input_form' name='data_input_form'>
        @csrf

        <lable> Q:</lable>
        <input class= "integer" id="Q"name="Q" /><br /> <br />

        <input type="hidden" id="edit_id" value="">

        <button type="submit" name="data_submit_btn" id="data_submit_btn">Submit</button>
        <button type="submit" name="data_update_btn" id="data_update_btn" style="display: none">Update</button>

    </form>

    <table border=2>
        <thead id="table_head"></thead>
        <tbody id="table_body"></tbody>
    </table>
</div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>


<script>
    $(document).ready(function() {
        fetchData();

        $('#data_submit_btn').on('click', function() {
            // e.preventDefault();
            // let formData = $(this).serialize();
            let formData = $('#Name').val();
            // alert(formData);

            $.ajax({
                url: "{{ route('QQQQQController.store') }}",
                method: "POST",
                data: formData,
                success: function(response) {
                    fetchData();
                    $('#data_input_form')[0].reset();
                },
            });
        });

        $(document).on('click', '.edit-btn', function() {
            let userId = $(this).data('id');
            $('#data-id').val();
            let editteUrl = "{{ route('QQQQQController.edit', ['QQQQQController' => 'id']) }}".replace(
                'id', userId);

            $.ajax({
                url: editteUrl,
                type: "GET",
                success: function(data) {
                    alert(data.Q);
                    $("#Q").val(data.Q);
                    $('#edit_id').val(userId);
                    // $('#data_input_form').append(
                    //     '<input type="hidden" name="user_id" value="' + data.id + '">');
                    $('#data_update_btn').show();
                    $('#data_submit_btn').hide();
                },
            });
        });

        $(document).on('click', '.delete-btn', function() {
            let userId = $(this).data('id');
            // alert(userId);

            let deleteUrl = "{{ route('QQQQQController.destroy', ['QQQQQController' => 'id']) }}"
                .replace(
                    'id', userId);

            $.ajax({
                url: deleteUrl,
                type: "DELETE",
                data: {
                    _token: "{{ csrf_token() }}",
                },
                success: function(response) {
                    fetchData();
                },
            });
        });

        $('#data_update_btn').on('click', function() {
            // let userId = $(this).data('id');
            let newName = $('#Name').val();
            let userId = $('#edit_id').val();
            // alert(userId);

            let updateUrl = "{{ route('QQQQQController.update', ['QQQQQController' => ':id']) }}"
                .replace(
                    ':id', userId);

            $.ajax({
                url: updateUrl,
                type: "PUT",
                data: {
                    _token: "{{ csrf_token() }}",
                    Name: newName
                },
                success: function(response) {
                    fetchData();
                },

            });
        });
    });

    function fetchData() {
        $.ajax({
            url: "{{ route('QQQQQController.index') }}",
            type: "GET",
            success: function(res) {
                var data = {!! $users !!}
                // alert(data);

                if (data.length === 0) {
                    $('#table_head').html('');
                    $('#table_body').html('<tr><td">No data Present in db</td></tr>');
                    return;
                }

                let headers = '<tr>';
                for (let key in data[0]) {
                    headers += '<th>' + key + '</th>';
                }
                headers += '<th>Action</th></tr>';
                $('#table_head').html(headers);

                let rows = '';
                data.forEach(function(row) {
                    rows += '<tr>';
                    for (let key in row) {
                        rows += '<td>' + row[key] + '</td>';
                    }
                    rows += '<td>' +
                        '<button class="edit-btn" data-id="' + row.id +
                        '">Edit</button> ' +
                        '<button class="delete-btn" data-id="' + row.id +
                        '">Delete</button>' +
                        '</td>';
                    rows += '</tr>';
                });
                $('#table_body').html(rows);
            },

        });
    }
</script>
