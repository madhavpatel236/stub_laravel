<div>
    <form method='post' action='{{ route('Maan_table10Controller.store') }}' name='data_input_form'>
        @csrf

        <lable> col1:</lable>
        <input class= "integer" , name="col1" /> <br /> <br />

        <button name="data_submit_btn"> Submit </button>
    </form> <br /> <br />

    <table border=2>
        <thead>
            <tr>
                <th>col1</th>
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
            url: "{{ route('Maan_table10Controller.index') }}",
            type: "get",
            data: {},
            success: function($res) {
                alert($res);

                foreach($res as key => value) {
                    alert(value);
                }



                $val = `<tr>

                    </tr>`
            }
        })
    })
</script>
