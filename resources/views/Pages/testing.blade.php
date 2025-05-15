<div>
    <form method='post' action='{{ route('TestingController.store') }}' name='data_input_form'>
        @csrf

        <lable> testing:</lable>
        <input class= "integer" , name="testing" /> <br /> <br />

        <button name="data_submit_btn"> Submit </button>
    </form> <br /> <br />

    <table border=2>
        <thead>
            <tr>
                <th>testing</th>
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
            url: '{{ route('TestingController.index') }}',
            type: "get",
            data: {},
            success: function($res) {
                alert($res);

                // $val = `<tr>
                //     </tr>`
            }
        })
    })
</script>
