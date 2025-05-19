    <div>
        <form method='post' id='data_input_form' name='data_input_form'>
            @csrf

            <lable> a:</lable>
            <input class= "integer" id="a" name="a" />
            <span class= "integer_error" id="a_error" name="a_error"></span><br /> <br />

            <lable> b:</lable>
            <input class= "string" id="b" name="b" />
            <span class= "string_error" id="b_error" name="b_error"></span><br /> <br />

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
                $.ajax({
                    url: '{{ route('Rcb11Controller.store') }}',
                    method: 'POST',
                    success: function(response) {
                        fetchData();
                        $('#data_input_form')[0].reset();
                    },
                });
            })

            $(document).on('click', '.edit-btn', function() {
                let userId = $(this).data('id');
                $('#data-id').val();
                let editteUrl = '{{ route('Rcb11Controller.edit', ['Rcb11Controller' => 'id']) }}'.replace(
                    'id', userId);

                $.ajax({
                    url: editteUrl,
                    type: 'GET',
                    success: function(data) {
                        $('#a').val(data.a);
                        $('#b').val(data.b);

                        $('#edit_id').val(userId);
                        $('#data_update_btn').show();
                        $('#data_submit_btn').hide();
                    },
                });
            });


            $(document).on('click', '.delete-btn', function() {
                let userId = $(this).data('id');

                let deleteUrl = '{{ route('Rcb11Controller.destroy', ['Rcb11Controller' => 'id']) }}'
                    .replace(
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
                $('#a').val();
                $('#b').val();

                let userId = $('#edit_id').val();

                let updateUrl = '{{ route('Rcb11Controller.update', ['Rcb11Controller' => ':id']) }}'
                    .replace(
                        ':id', userId);

                $.ajax({
                    url: updateUrl,
                    type: 'PUT',
                    data: {
                        _token: '{{ csrf_token() }}',
                        a: $('#a').val(),
                        b: $('#b').val(),
                    },
                    success: function(response) {
                        fetchData();
                    },

                });
            });
        })


        function fetchData() {
            $.ajax({
                url: '{{ route('Rcb11Controller.index') }}',
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
            $('#data_update_btn').click(function(e) {
                var flag = true;

                var a = $('#a').val().trim();
                if (a == "" || a == null) {
                    $('#a_error').html('a is required!!')
                    flag = false;
                } else if (a.length > 255) {
                    $('#a_error').html(' Max allowed field length is: 255')
                    flag = false;
                }
                // else if (!(a.match(/^[0-9]/))) {
                //     $('#a_error').html('Only numbers is allowed ')
                //     flag = false;
                // }

                if (flag != true) {
                    e.preventDefault();
                }
                var flag = true;

                var b = $('#b').val().trim();
                if (b == "" || b == null) {
                    $('#b_error').html('b is required!!')
                    flag = false;
                } else if (b.length > 255) {
                    $('#b_error').html(' Max allowed field length is: 255')
                    flag = false;
                }
                // else if (!(b.match(/^[a-zA-Z]+$/))) {
                //     $('#b_error').html('Only character is allowed ')
                //     flag = false;
                // }
                if (flag != true) {
                    e.preventDefault();
                }
            })

            $('#data_submit_btn').click(function(e) {
                var flag = true;

                var a = $('#a').val().trim();
                if (a == "" || a == null) {
                    $('#a_error').html('a is required!!')
                    flag = false;
                }
                if (a.length > 255) {
                    $('#a_error').html(' Max allowed field length is: 255')
                    flag = false;
                }
                if (!(a.match(/^[0-9]/))) {
                    $('#a_error').html('Only numbers is allowed ')
                    flag = false;
                }
                if (flag != true) {
                    e.preventDefault();
                }
                var flag = true;

                var b = $('#b').val().trim();
                if (b == "" || b == null) {
                    $('#b_error').html('b is required!!')
                    flag = false;
                }
                if (b.length > 255) {
                    $('#b_error').html(' Max allowed field length is: 255')
                    flag = false;
                }
                if (!(b.match(/^[a-zA-Z]+$/))) {
                    $('#b_error').html('Only character is allowed ')
                    flag = false;
                }
                if (flag != true) {
                    e.preventDefault();
                }
            })

        })
    </script>
