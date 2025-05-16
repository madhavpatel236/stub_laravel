    <div>
        <form method='post' id='data_input_form' action='{{ route('Demo14Controller.store') }}' name='data_input_form'>
            @csrf

            <lable> demo:</lable>
            <input class= "integer" id="demo14" name="demo" /> <br /> <br />

            <button name="data_submit_btn"> Submit </button>
        </form> <br /> <br />

        <table border=2>
            <thead id="table_head"></thead>
            <tbody id="table_body"></tbody>
        </table>
    </div>


    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <meta name="csrf-token" content="{{ csrf_token() }}">
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

                $.ajax({
                    url: "{{ route('Demo14Controller.store') }}",
                    type: "POST",
                    data: {
                        formData: formData,
                    },
                    success: function(res) {
                        alert(res);
                        alert("Data added successfully!");
                        $("#data_input_form")[0].reset();
                        // location.reload();
                    },
                });
            })
        })
    </script>
