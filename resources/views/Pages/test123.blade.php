<div>
    <form method='post' action='{{ route('Test123Controller.store') }}' name='data_input_form'>
        @csrf

        <lable> qwer:</lable>
        <input class= "integer" , name="qwer" /> <br /> <br />

        <lable> qwertyui:</lable>
        <input class= "integer" , name="qwertyui" /> <br /> <br />

        <button name="data_submit_btn"> Submit </button>
    </form> <br /> <br />

    <table border=2>
        <thead>
            <tr>
                <th>qwer</th>
                <th>qwertyui</th>
                <th> Edit </th>
            </tr>
        </thead>
        <tbody>
            <tr></tr>
        </tbody>
    </table>
</div>


<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>

<script>
    $(document).ready(function() {
                $.ajax({
                        url: "{{ route('Test123Controller.index') }}",
                        type: "get",
                        data: {},
                        success: function($res) {
                            // alert($res[0]['qwer']);
                            alert($res.length);
                            let val = "";

                            $res.forEach($res as data){
                                console.log(data);
                            };

                            // res.forEach(function(row) {
                            //     // alert(row);
                            //     val += "<tr>";
                            //     row.forEach(function(col) {
                            //         val += "<td>" + col + "</td>";
                            //     });
                            //     val += "<td><button>Edit</button></td>";
                            //     val += "</tr>";
                            // });
                            // document.getElementById(\"table_body\").innerHTML = val;
                            }
                        }
                    )
                })
</script>
