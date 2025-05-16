<div>
    <form method='post' id='data_input_form' name='data_input_form'>
        @csrf

        {{-- {{ dd(session()->all()) }}; --}}


        @php
            // dd(csrf_token());
        @endphp


        {{-- @php
        $CSRFToken = csrf_token();
        dump($CSRFToken);
        @endphp --}}

        {{-- <input type="hidden" name="_token" value="{{ csrf_token() }}" /> --}}

        {{-- {{ csrf_field() }} --}}
        <lable> demo:</lable>
        <input class= "integer" id="demo14" name="demo" /> <br /> <br />
        <input type="hidden" name="_token" value="{{ csrf_token() }}" />
        <button name="data_submit_btn"> Submit </button>
    </form> <br /> <br />

    <table border=2>
        <thead id="table_head"></thead>
        <tbody id="table_body"></tbody>
    </table>
</div>


<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
<script>
    $(document).ready(function() {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });


        $.ajax({
            url: "{{ route('Demo14Controller.index') }}",
            type: "get",
            data: {},
            success: function(res) {
                // alert($res.col1);

                let headers = "<tr>";
                for (let key in res[0]) {
                    headers += "<th>" + key + "</th>";
                }

                headers += "<th>Action</th></tr>";
                document.getElementById("table_head").innerHTML = headers;
                let rows = "";

                res.forEach(row => {
                    rows += "<tr>";
                    // alert(row["col1"]);
                    for (let key in row) {
                        rows += "<td>" + row[key] + "</td>";
                        // alert(row["col1"]);
                        // rows += "<td>" + row["col2"] + "</td>";
                    }
                    // rows += "<td><button id = "row[col1]" >Edit</button></td></tr>";
                });
                document.getElementById("table_body").innerHTML = rows;
            }
        })

        $("#data_input_form").on("submit", function(e) {
            e.preventDefault();
            var formData = $('#demo14').val();
            // alert(formData);
            // const value = `; ${document.cookie}`;
            // const parts = value.split('; XSRF-TOKEN=');
            // let token = false;
            // if (parts.length === 2) token = decodeURIComponent(parts.pop().split(';').shift());
            // alert(token);

            $.ajax({
                url: "{{ route('Demo14Controller.store') }}",
                type: "POST",
                data: {
                    // _token: token,
                    formData: formData,
                },
                success: function(res) {
                    alert(res);
                    alert("Data added successfully!");
                },
                error: function(xhr, error, status) {
                    alert(error.message);
                }
            });
        })
    })
</script>
