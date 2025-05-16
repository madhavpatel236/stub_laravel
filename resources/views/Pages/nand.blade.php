<div>
    <form method='post' action='{{ route('NandController.store') }}' name='data_input_form'>
        @csrf

        <lable> nand:</lable>
        <input class= "integer" , name="nand" /> <br /> <br />

        <button name="data_submit_btn"> Submit </button>
    </form> <br /> <br />

    <table border=2>
        <thead>
            <tr>
                <th>nand</th>
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
        url: "{{ route('NandController.index') }}",
        type: "get",
        data: {},
        success: function($res) {
            alert($res);

            $val = `<tr>

                    </tr>`
        }
    })
    })

</script>
