<meta name="csrf-token" content="{{ csrf_token() }}">

<div>
    <form method='post' action='{{ route('Test_table2Controller.store') }}' name='data_input_form'>
        @csrf

        <lable> name:</lable>
        <input class= "string" , name="name" /> <br /> <br />

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
{{-- url: "{{ route('Test_table2Controller.index') }}", --}}
<script>
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $(document).ready(function() {
        $.ajax({
            url: "{{ route('Test_table2Controller.index') }}",
            type: "get",
            data: {},
            success: function(res) {
                alert(res);
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
                    }
                    rows += "<td><button>Edit</button></td></tr>";
                });
                document.getElementById("table_body").innerHTML = rows;

            }
        })

        // $("#data_input_form").on("submit", function(e) {
        //     e.preventDefault();

        //     let formData = $(this).serialize();
        //     // formxData.append("_token", "{{ csrf_token() }}");
        //     alert(formData);

        //     $.ajax({
        //         url: '{{ route('Test1234Controller.store') }}',
        //         type: "POST",
        //         data: formData,
        //         success: function(res) {
        //             alert("Data added successfully!");
        //             $("#data_input_form")[0].reset();
        //             // location.reload();
        //         },
        //     });
        // });


    })
</script>
