    <div>
    <form method='post' id='data_input_form' name='data_input_form'>
    @csrf
    
                <lable> name:</lable>
                <input class= "string" id="name" name="name"/>
                <span class= "string_error" id="name_error" name="name_error"></span><br/> <br/>
            
            <input type="hidden" id="edit_id" value="">

        <button type="submit" name="data_submit_btn" id="data_submit_btn">Submit</button>
                <button type="submit" name="data_update_btn" id="data_update_btn" style="display: none">Update</button>

    </form> <br /> <br/>

    <table border=2 >
     <thead id="table_head"></thead>
     <tbody id="table_body"></tbody>
    </table>
    </div>


    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>

    <script>
    
            $(document).ready(function(){
            fetchData();

            $('#data_submit_btn').on('click', function(e) {
            $.ajax({
                url: '{{ route('Channai45Controller.store') }}',
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
            let editteUrl = '{{ route('Channai45Controller.edit', ['Channai45Controller' => 'id']) }}'.replace(
                'id', userId);

            $.ajax({
                url: editteUrl,
                type: 'GET',
                success: function(data) {
                $('#name').val(data.name);

                $('#edit_id').val(userId);
                    $('#data_update_btn').show();
                    $('#data_submit_btn').hide();
    },
            });
        });


        $(document).on('click', '.delete-btn', function() {
            let userId = $(this).data('id');

            let deleteUrl = '{{ route('Channai45Controller.destroy', ['Channai45Controller' => 'id']) }}'.replace(
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
            $('#name').val();

            let userId = $('#edit_id').val();

            let updateUrl = '{{ route('Channai45Controller.update', ['Channai45Controller' => ':id']) }}'.replace(
                ':id', userId);

            $.ajax({
                url: updateUrl,
                type: 'PUT',
                data: {
    _token: '{{ csrf_token() }}',
    name: $('#name').val(),
},
                success: function(response) {
                    fetchData();
                },

            });
        });
    })


    function fetchData() {
        $.ajax({
            url: '{{ route('Channai45Controller.index') }}',
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
    }
        ;
    </script>

<script>
$(document).ready(function(){
    $('#data_update_btn').click(function(e){
var flag = true;

                var name = $('#name').val().trim();
if(name == "" || name == null){
                $('#name_error').html('name is required!!')
                flag = false;
                }
 if(name.length >  2){
                $('#name_error').html(' Max allowed field length is: 2')
            flag = false;
                }
if (flag != true) {
                    e.preventDefault();
                }
    })

    $('#data_submit_btn').click(function(e){
var flag = true;

                var name = $('#name').val().trim();
if(name == "" || name == null){
                $('#name_error').html('name is required!!')
                flag = false;
                }
 if(name.length >  2){
                $('#name_error').html(' Max allowed field length is: 2')
            flag = false;
                }
if (flag != true) {
                    e.preventDefault();
                }
    })

})
</script>
