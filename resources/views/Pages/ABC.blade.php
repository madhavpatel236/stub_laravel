<div>
    <form method="post" id="data_input_form" name="data_input_form">
        @csrf

        <label>Name:</label>
        <input type="text" class="integer" name="Name" id="Name" /> <br /><br />
        <span class= "string_error" id="Name_error" name="Name_error"></span><br /> <br />
        <input type="hidden" id="edit_id" value="">
        <button type="submit" name="data_submit_btn" id="data_submit_btn">Submit</button>
        <button type="submit" name="data_update_btn" id="data_update_btn" style="display: none">Update</button>
    </form>


    <table border="2">
        <thead id="table_head"></thead>
        <tbody id="table_body"></tbody>
    </table>
    {{-- {{ $users }} --}}
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
                url: "{{ route('ABCController.store') }}",
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
            let editteUrl = "{{ route('ABCController.edit', ['ABCController' => 'id']) }}".replace(
                'id', userId);

            $.ajax({
                url: editteUrl,
                type: "GET",
                success: function(data) {
                    alert(data.Name);
                    $("input[name='Name']").val(data.Name);
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

            let deleteUrl = "{{ route('ABCController.destroy', ['ABCController' => 'id']) }}".replace(
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

            let updateUrl = "{{ route('ABCController.update', ['ABCController' => ':id']) }}".replace(
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
            url: "{{ route('ABCController.index') }}",
            type: "GET",
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
                        "<button class='edit-btn' data-id=" + row.id +
                        ">Edit</button> " +
                        "<button class='delete-btn' data-id=" + row.id +
                        ">Delete</button>" +
                        "</td>";
                    rows += '</tr>';
                });
                $('#table_body').html(rows);
            },

        });
    }
</script>

<script>
    $(document).ready(function() {
        $('#data_input_form').submit(function(e) {
            var flag = true;

            var Name = $('#Name').val().trim();
            if (Name == "" || Name == null) {
                $('#Name_error').html('Name is required!!')
                flag = false;
            }
            // if (ABCDE != "^[0-9]") {
            //     $('#ABCDE_error').html('Only numbers is allowed ');
            //     flag = false;
            // }
            if (Name.toString().length > 3) {
                $('#Name_error').html(' Max allowed field length is: 3')
                flag = false;
            }
            if (flag != true) {
                e.preventDefault();
            }
        })

    })
</script>
