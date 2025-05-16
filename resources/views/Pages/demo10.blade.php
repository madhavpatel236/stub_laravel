    <div>
        <form method='post' id="data_input_form" action='{{ route('Demo10Controller.store') }}' name='data_input_form'>
            @csrf

            <lable> demo:</lable>
            <input class= "integer" , name="demo" /> <br /> <br />

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
            $.ajax({
                url: "{{ route('Demo10Controller.index') }}",
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
                        // rows += "<td><button id = " + row[id] +">Edit</button></td></tr>";
                    });
                    document.getElementById("table_body").innerHTML = rows;
                }
            })

            $("#data_input_form").on("submit", function(e) {
                e.preventDefault();

                let formData = $(this);
                alert(response()->json(formData));


                $.ajax({
                    url: '{{ route('Test1234Controller.store') }}',
                    type: "POST",
                    data: formData,
                    success: function(res) {
                        alert("Data added successfully!");
                        // location.reload();
                    }
                });
            });
        })
    </script>
