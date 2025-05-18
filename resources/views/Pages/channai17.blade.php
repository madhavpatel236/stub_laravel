    <div>
        <form method='post' id='data_input_form' name='data_input_form'>
            @csrf

            <lable> csk:</lable>
            <input class= "integer" id="csk" name="csk" />
            <span class= "integer_error" id="csk_error" name="csk_error"></span><br /> <br />

            <lable> csk2:</lable>
            <input class= "string" id="csk2" name="csk2" />
            <span class= "string_error" id="csk2_error" name="csk2_error"></span><br /> <br />

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

            $('#data_submit_btn').on('click', function(e) {
                // e.preventDefault();
                let formData = $('#Name').val();
                alert(formData);

                $.ajax({
                    url: '{{ route('Channai17Controller.store') }}',
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
                let editteUrl = '{{ route('Channai17Controller.edit', ['Channai17Controller' => 'id']) }}'
                    .replace(
                        'id', userId);

                $.ajax({
                    url: editteUrl,
                    type: 'GET',
                    success: function(data) {
                        $('#csk').val(data.csk);
                        $('#csk2').val(data.csk2);

                        $('#edit_id').val(userId);
                        $('#data_update_btn').show();
                        $('#data_submit_btn').hide();
                    },
                });
            });


            $(document).on('click', '.delete-btn', function() {
                let userId = $(this).data('id');

                let deleteUrl =
                    '{{ route('Channai17Controller.destroy', ['Channai17Controller' => 'id']) }}'.replace(
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


            $('#data_update_btn').on('click', function(e) {
                e.preventDefault();
                let csk = $('#csk').val();
                let csk2 = $('#csk2').val();
                let userId = $('#edit_id').val();

                let updateUrl =
                    '{{ route('Channai17Controller.update', ['Channai17Controller' => ':id']) }}'.replace(
                        ':id', userId);

                $.ajax({
                    url: updateUrl,
                    type: 'PATCH',
                    data: {
                        _token: '{{ csrf_token() }}',
                        csk: csk,
                        csk2: csk2,
                    },
                    success: function(response) {
                        fetchData();
                        $('#data_update_btn').hide();
                        $('#data_submit_btn').show();

                    },

                });
            });
        })


        function fetchData() {
            $.ajax({
                url: '{{ route('Channai17Controller.index') }}',
                type: 'GET',
                success: function(res) {
                    var data = {!! $users !!}

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
                            "<button class='edit-btn' data-id=" + row.id + ">Edit</button> " +
                            "<button class='delete-btn' data-id=" + row.id + ">Delete</button>" +
                            "</td>";
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

                var csk = $('#csk').val().trim();
                if (csk == "" || csk == null) {
                    $('#csk_error').html('csk is required!!')
                    flag = false;
                }
                if (csk.length() > 255) {
                    $('#csk_error').html(' Max allowed field length is: 255')
                    flag = false;
                }
                if (csk != ^ [0 - 9]) {
                    $('#csk_error').html('Only numbers is allowed ')
                    flag = false;
                }
                if (flag != true) {
                    e.preventDefault();
                }

                var csk2 = $('#csk2').val().trim();
                if (csk2 == "" || csk2 == null) {
                    $('#csk2_error').html('csk2 is required!!')
                    flag = false;
                }
                if (csk2.length() > 21) {
                    $('#csk2_error').html(' Max allowed field length is: 21')
                    flag = false;
                }
                if (csk2 != ^ [a - zA - Z] * $) {
                    $('#csk2_error').html('Only numbers is allowed ')
                    flag = false;
                }
                if (flag != true) {
                    e.preventDefault();
                }
            })

        })
    </script>
