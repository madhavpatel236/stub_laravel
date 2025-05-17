    <div>
        <form method='post' id='data_input_form' name='data_input_form'>
            @csrf

            <lable> 123:</lable>
            <input class= "integer" id="123" name="123" />
            <span class= "integer_error" id="123_error" name="123_error"></span><br /> <br />

            <input type="hidden" id="edit_id" value="">

            <button type="submit" name="data_submit_btn" id="data_submit_btn">Submit</button>
            <button type="submit" name="data_update_btn" id="data_update_btn" style="display: none">Update</button>

        </form> <br /> <br />

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
                let formData = $('#123').val();
                alert(formData);

                $.ajax({
                    url: "{{ route('Rajastan2Controller.store') }}",
                    method: 'POST',
                    data: formData,
                    success: function(response) {
                        fetchData();
                        $('#data_input_form')[0].reset();
                    },
                });
            })

            $(document).on('click', '.edit-btn', function() {
                let userId = $(this).data('id');
                $('#data-id').val();
                let editteUrl = '{{ route('Rajastan2Controller.edit', ['Rajastan2Controller' => 'id']) }}'
                    .replace(
                        'id', userId);

                $.ajax({
                    url: editteUrl,
                    type: 'GET',
                    success: function(data) {
                        $('#edit_id').val(userId);
                        $('#data_update_btn').show();
                        $('#data_submit_btn').hide();
                    },
                });
            });


            $(document).on('click', '.delete-btn', function() {
                let userId = $(this).data('id');

                let deleteUrl =
                    '{{ route('Rajastan2Controller.destroy', ['Rajastan2Controller' => 'id']) }}'.replace(
                        'id', userId);

                $.ajax({
                    url: deleteUrl,
                    type: 'DELETE',
                    data: {
                        _token: '{{ csrf_token() }}',
                    },
                    success: function(response) {
                        fetchData();
                    },
                });
            });


            $('#data_update_btn').on('click', function() {
                let newName = $('#Name').val();
                let userId = $('#edit_id').val();

                let updateUrl =
                    '{{ route('Rajastan2Controller.update', ['Rajastan2Controller' => ':id']) }}'.replace(
                        ':id', userId);

                $.ajax({
                    url: updateUrl,
                    type: 'PUT',
                    data: {
                        _token: '{{ csrf_token() }}',
                        Name: newName
                    },
                    success: function(response) {
                        fetchData();
                    },

                });
            });
        })


        function fetchData() {
            $.ajax({
                url: '{{ route('Rajastan2Controller.index') }}',
                type: 'GET',
                success: function(res) {
                    var data = {!! $users !!}
                    // alert(data);

                    if (data.length === 0) {
                        $('#table_head').html('');
                        $('#table_body').html('<tr><td>No data Present in db</td></tr>');
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
                            '<button class="edit-btn" data-id=' + row.id +
                            '>Edit</button> ' +
                            '<button class="delete-btn" data-id=' + row.id +
                            '>Delete</button>' +
                            '</td>';
                        rows += '</tr>';






                    });
                    $('#table_body').html(rows);
                },

            });
        };
    </script>

    <script>
        $(document).ready(function() {
            $('#data_input_form').submit(function(e) {
                var flag = true;

                var 123 = $('#123').val().trim();
                if (123 == "" || 123 == null) {
                    $('#123_error').html('123 is required!!')
                    flag = false;
                }
                if (typeof 123 == 'string' == 'integer' && 123. length() > ) {
                    $('#123_error').html(' Max allowed field length is: ')
                    flag = false;
                }
                if (flag != true) {
                    e.preventDefault();
                }
            })

        })
    </script>
