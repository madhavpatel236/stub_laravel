    <div>
        <form method='post' id='data_input_form' name='data_input_form'>
            @csrf

            <lable> a:</lable>
            <input class= "string" id="a" name="a" /><br /> <br />
            <span class= "string_error" id="a_error" name="a_error"></span><br /> <br />

            <lable> b:</lable>
            <input class= "integer" id="b" name="b" /><br /> <br />
            <span class= "integer_error" id="b_error" name="b_error"></span><br /> <br />

            <lable> c:</lable>
            <input class= "text" id="c" name="c" /><br /> <br />
            <span class= "text_error" id="c_error" name="c_error"></span><br /> <br />

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
                let formData = $('#Name').val();
                alert(formData);

                $.ajax({
                    url: '{{ route('PunjabController.store') }}',
                    method: 'POST',
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
                let editteUrl = '{{ route('PunjabController.edit', ['PunjabController' => 'id']) }}'
                    .replace(
                        'id', userId);

                $.ajax({
                    url: editteUrl,
                    type: 'GET',
                    success: function(data) {
                        $('#edit_id').val(userId);
                        $('#data_update_btn').show();
                        $('#data_submit_btn').hide();
                    }
                })
            });


            $(document).on('click', '.delete-btn', function() {
                let userId = $(this).data('id');

                let deleteUrl = '{{ route('PunjabController.destroy', ['PunjabController' => 'id']) }}'
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

            $('#data_update_btn').on('click', function() {
                let newName = $('#Name').val();
                let userId = $('#edit_id').val();

                let updateUrl = '{{ route('PunjabController.update', ['PunjabController' => ':id']) }}'
                    .replace(
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
        });


        function fetchData() {
            $.ajax({
                url: "{{ route('PunjabController.index') }}",
                type: 'GET',
                success: function(res) {
                    var data = {!! $users !!}
                    alert(data);

                    if (data.length === 0) {
                        $('#table_head').html('');
                        $('#table_body').html('<tr><td > No data Present in db < /td></tr >');
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
                            '<button class=
                        "edit - btn"
                        data - id = '
                        ' + row.id +
                        '"" > Edit < /button> ' +
                        '<button class='
                        delete - btn ' data-id='
                        ' + row.id +
                        '' > Delete < /button>' +
                        '</td>';
                        rows += '</tr>';
                    });
                    $('#table_body').html(rows);

                    rows += '<td>' +
                        '<button class="edit-btn" data-id="' + row.id +'">Edit</button> ' +
                        '<button class="delete-btn" data-id="' + row.id +
                        '">Delete</button>' +
                        '</td>';


                        rows += '<td>' +
                            '<button class=''edit-btn' 'data-id=' + row.id + '>Edit</button> '
                },

            });
        };
    </script>

    <script>
        $(document).ready(function() {
            $('#data_submit_btn').click(function(e) {
                var flag = true;

                var a = $('#a').val().trim();
                if (a == "" || a == null) {
                    $('#a_error').html('a is required!!')
                    flag = false;
                }
                if (typeof a == 'string' == 'string' && a.length() > 12) {
                    $('#a_error').html(' Max allowed field length is: 12')
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
                if (typeof b == 'string' == 'integer' && b.length() > ) {
                    $('#b_error').html(' Max allowed field length is: ')
                    flag = false;
                }
                if (flag != true) {
                    e.preventDefault();
                }
                var flag = true;

                var c = $('#c').val().trim();
                if (c == "" || c == null) {
                    $('#c_error').html('c is required!!')
                    flag = false;
                }
                if (typeof c == 'string' == 'text' && c.length() > ) {
                    $('#c_error').html(' Max allowed field length is: ')
                    flag = false;
                }
                if (flag != true) {
                    e.preventDefault();
                }
            })

            $('#data_update_btn').click(function(e) {
                var flag = true;

                var a = $('#a').val().trim();
                if (a == "" || a == null) {
                    $('#a_error').html('a is required!!')
                    flag = false;
                }
                if (typeof a == 'string' == 'string' && a.length() > 12) {
                    $('#a_error').html(' Max allowed field length is: 12')
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
                if (typeof b == 'string' == 'integer' && b.length() > ) {
                    $('#b_error').html(' Max allowed field length is: ')
                    flag = false;
                }
                if (flag != true) {
                    e.preventDefault();
                }
                var flag = true;

                var c = $('#c').val().trim();
                if (c == "" || c == null) {
                    $('#c_error').html('c is required!!')
                    flag = false;
                }
                if (typeof c == 'string' == 'text' && c.length() > ) {
                    $('#c_error').html(' Max allowed field length is: ')
                    flag = false;
                }
                if (flag != true) {
                    e.preventDefault();
                }

            })

        })
    </script>
