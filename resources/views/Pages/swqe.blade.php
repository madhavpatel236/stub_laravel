    <div>
    <form method='post' id='data_input_form' name='data_input_form'>
    @csrf
    
                <lable> a:</lable>
                <input class= "string" id="a" name="a"/><br/> <br/>
                <input class= "string_error" id="a_error" name="a_error"/><br/> <br/>
            
                <lable> aw:</lable>
                <input class= "integer" id="aw" name="aw"/><br/> <br/>
                <input class= "integer_error" id="aw_error" name="aw_error"/><br/> <br/>
            
                <lable> awer:</lable>
                <input class= "text" id="awer" name="awer"/><br/> <br/>
                <input class= "text_error" id="awer_error" name="awer_error"/><br/> <br/>
            
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

            $('#data_submit_btn').on('click', function() {
            let formData = $('#Name').val();
            alert(formData);

            $.ajax({
                url: '{{ route('SwqeController.store') }}',
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
            let editteUrl = '{{ route('SwqeController.edit', ['SwqeController' => 'id']) }}'.replace(
                'id', userId);

            $.ajax({
                url: editteUrl,
                type: 'GET',
                success: function(data) {
                    $('#edit_id').val(userId);
                    $('#data_update_btn').show();
                    $('#data_submit_btn').hide();
    )},
            });
        });


        $(document).on('click', '.delete-btn', function() {
            let userId = $(this).data('id');

            let deleteUrl = '{{ route('SwqeController.destroy', ['SwqeController' => 'id']) }}'.replace(
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

            let updateUrl = '{{ route('SwqeController.update', ['SwqeController' => ':id']) }}'.replace(
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
            url: '{{ route('SwqeController.index') }}',
            type: 'GET',
            success: function(res) {
                var data = {!! $users !!}
                // alert(data);

                if (data.length === 0) {
                    $('#table_head').html('');
                    $('#table_body').html('<tr><td'>No data Present in db</td></tr>);
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
                        '<button class='edit-btn' data-id='' + row.id +
                        ''>Edit</button> ' +
                        '<button class='delete-btn' data-id='' + row.id +
                        ''>Delete</button>' +
                        '</td>';
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
    $('#data_submit_btn').on('click'){

                var a = $('#a').val().trim();
if(a == "" || a == null){
                $('#a_error').val('a is required!!')
                }
 if(typeof a == 'string' == 'string' && a.length() > 21){
                $('#a_error').val(' Max allowed field length is: 21')
            }
                var aw = $('#aw').val().trim();
if(aw == "" || aw == null){
                $('#aw_error').val('aw is required!!')
                }
 if(typeof aw == 'string' == 'integer' && aw.length() > ){
                $('#aw_error').val(' Max allowed field length is: ')
            }
                var awer = $('#awer').val().trim();
if(awer == "" || awer == null){
                $('#awer_error').val('awer is required!!')
                }
 if(typeof awer == 'string' == 'text' && awer.length() > ){
                $('#awer_error').val(' Max allowed field length is: ')
            }
    }

    $('#data_update_btn').on('click'){

                var a = $('#a').val().trim();
if(a == "" || a == null){
                $('#a_error').val('a is required!!')
                }
 if(typeof a == 'string' == 'string' && a.length() > 21){
                $('#a_error').val(' Max allowed field length is: 21')
            }
                var aw = $('#aw').val().trim();
if(aw == "" || aw == null){
                $('#aw_error').val('aw is required!!')
                }
 if(typeof aw == 'string' == 'integer' && aw.length() > ){
                $('#aw_error').val(' Max allowed field length is: ')
            }
                var awer = $('#awer').val().trim();
if(awer == "" || awer == null){
                $('#awer_error').val('awer is required!!')
                }
 if(typeof awer == 'string' == 'text' && awer.length() > ){
                $('#awer_error').val(' Max allowed field length is: ')
            }
    }
})
</script>
