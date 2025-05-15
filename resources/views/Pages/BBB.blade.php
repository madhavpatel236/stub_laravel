<div>
    <form method='post' action='{{ route('BBBController.store') }}' name='data_input_form'>
        @csrf

        <lable> BBB:</lable>
        <input class= "integer" , name="BBB" /> <br /> <br />

        <button name="data_submit_btn"> Submit </button>
    </form> <br /> <br />

    <table border=2>
        <thead>
            <tr>
                <th>BBB</th>
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
            url: '{{ route('BBBController.index') }}',
            type: 'get',
            data: {},
            success: function($res) {
                alert($res);
                $val = `<tr>

                    </tr>`
            }
        })
    })
</script>
