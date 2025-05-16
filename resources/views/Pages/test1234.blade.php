    <div>
        <form method='post' id="data_input_form" action='{{ route('Test1234Controller.store') }}' name='data_input_form'>
            @csrf

            <lable> col1:</lable>
            <input class= "integer" , name="col1" /> <br /> <br />

            <lable> col2:</lable>
            <input class= "integer" , name="col2" /> <br /> <br />

            <button name="data_submit_btn"> Submit </button>
        </form> <br /> <br />

        <table border=2>
            <thead id="table_head">
                {{-- <tr>
                    <th>col1</th>
                    <th>col2</th>
                    <th> Edit </th>
                </tr> --}}
            </thead>
            <tbody id="table_body">
                <tr></tr>
            </tbody>
        </table>
    </div>


    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>

    <script>
        $(document).ready(function() {
            $.ajax({
                url: "{{ route('Test1234Controller.index') }}",
                type: "get",
                data: {},
                success: function(res) {
                    let headers = "<tr>";
                    for (let key in res[0]) {
                        headers += "<th>" + key + "</th>";
                    }

                    headers += "<th>Action</th></tr>";
                    document.getElementById("table_head").innerHTML = headers;

                    let rows = "";
                    res.forEach(row => {
                        rows += "<tr>";
                        // alert(row['col1']);
                        for (let key in row) {
                            rows += "<td>" + row[key] + "</td>";
                            // alert(row['col1']);
                            // rows += "<td>" + row['col2'] + "</td>";
                        }
                        rows += "<td><button>Edit</button></td></tr>";
                    });
                    // alert(rows);
                    document.getElementById("table_body").innerHTML = rows;

                }
            })


            


        })
    </script>
