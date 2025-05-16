    <div>
        <form method='post' id='data_input_form' name='data_input_form'>
            @csrf
            <lable> qwe:</lable>
            <input class= "integer" , name="qwe" /> <br /> <br />

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
                // url: "{{ route('Testing1Controller.index') }}",
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
        })
    </script>
