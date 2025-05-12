<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>

<form action="{{ route('Home.store') }}" method="POST">
    @csrf
    <label for="db_name_input"> Database name: </label>
    <input type="text" name="db_name_input" class="db_name_input" />
    <br /> <br />


    <label for="table_name_input"> Table name: </label>
    <input type="text" name="table_name_input" class="table_name_input" />
    <br /> <br />


    <table>
        <thead>
            <th> Name</th>
            <th> Type</th>
            <th> Length</th>
            <th>Default</th>
            <th>Attributes</th>
            <th> Null </th>
            <th> Index</th>
            <th> A.I. </th>
            <th> Comments </th>
        </thead>
        <tbody class="table_body" name="table_body" id="table_body">
            <tr class="table_body_row" name="table_body_row" id="table_body_row">
                <td> <input type="text" name="table_col_name_input" class="table_col_name_input" /></td>
                <td> <select name="table_col_type_input" class="table_col_type_input" id="table_col_type_input">
                        <option value="INT"> INT </option>
                        <option value="VARCHAR"> VARCHAR </option>
                        <option value="TEXT"> TEXT </option>
                        <option value="DATE"> DATE </option>
                    </select> </td>
                <td><input name="table_col_type" id="table_col_type" class="table_col_type" /></td>
                <td> <select name="table_col_defaultVal" id="table_col_defaultVal" class="table_col_defaultVal">
                        <option value="None"> None </option>
                        <option value="As Defined"> As Defined: </option>
                        <option value="Null"> Null </option>
                        <option value="CURRENT_TIMESTAMP"> CURRENT_TIMESTAMP </option>
                    </select> </td>
                <td> <select name="table_col_attribute" id="table_col_attribute" class="table_col_attribute">
                        <option value=""> </option>
                        <option value="BINARY"> BINARY </option>
                        <option value="UNSIGNED"> UNSIGNED </option>
                        <option value=" UNSIGNED ZEROFILL"> UNSIGNED ZEROFILL </option>
                        <option value="on update CURRENT_TIMESTAMP"> on update CURRENT_TIMESTAMP </option>
                    </select> </td>
                <td><input type="checkbox" name="table_col_nullVal" class="table_col_nullVal" id="table_col_nullVal" />
                </td>
                <td> <select name="table_col_index" id="table_col_index" class="table_col_index">
                        <option value=""> -- </option>
                        <option value="PRIMERY"> PRIMERY </option>
                        <option value="UNIQUE"> UNIQUE </option>
                        <option value="INDEX"> INDEX </option>
                        <option value="FULL TEXT"> FULL TEXT </option>
                        <option value="SPATIAL"> SPATIAL </option>
                    </select> </td>
                <td><input type="checkbox" name="table_col_AI" id="table_col_AI" class="table_col_AI" /></td>
                <td><input type="text" name="table_col_comment" class="table_col_AI" id="table_col_AI" /></td>
            </tr>
        </tbody>
    </table><br />
    <span class="add_field_btn" id="add_field_btn" name="add_field_btn"
        style="cursor: pointer; padding: 1px; margin: 10px;  border: 2px solid black   "> ADD </span>
    {{-- <button> Add </button> --}}
    <button name="data_submit_btn" class="data_submit_btn" id="data_submit_btn"> Submit </button>
</form>


<script>
    $(document).ready(function() {


        var count = 0;

        $('.add_field_btn').on('click', function() {
            $.ajax({
                url: '',
                type: 'get',
                data: {},
                success: function() {
                    var data = `
                    <tr class="table_body_row" name="table_body_row" id="table_body_row">
                <td> <input type="text" name="table_col_name_input" class="table_col_name_input" /></td>
                <td> <select name="table_col_type_input" class="table_col_type_input" id="table_col_type_input">
                        <option value="INT"> INT </option>
                        <option value="VARCHAR"> VARCHAR </option>
                        <option value="TEXT"> TEXT </option>
                        <option value="DATE"> DATE </option>
                    </select> </td>
                <td><input name="table_col_type" id="table_col_type" class="table_col_type" /></td>
                <td> <select name="table_col_defaultVal" id="table_col_defaultVal" class="table_col_defaultVal">
                        <option value="None"> None </option>
                        <option value="As Defined"> As Defined: </option>
                        <option value="Null"> Null </option>
                        <option value="CURRENT_TIMESTAMP"> CURRENT_TIMESTAMP </option>
                    </select> </td>
                <td> <select name="table_col_attribute" id="table_col_attribute" class="table_col_attribute">
                        <option value=""> </option>
                        <option value="BINARY"> BINARY </option>
                        <option value="UNSIGNED"> UNSIGNED </option>
                        <option value=" UNSIGNED ZEROFILL"> UNSIGNED ZEROFILL </option>
                        <option value="on update CURRENT_TIMESTAMP"> on update CURRENT_TIMESTAMP </option>
                    </select> </td>
                <td><input type="checkbox" name="table_col_nullVal" class="table_col_nullVal" id="table_col_nullVal" />
                </td>
                <td> <select name="table_col_index" id="table_col_index" class="table_col_index">
                        <option value=""> -- </option>
                        <option value="PRIMERY"> PRIMERY </option>
                        <option value="UNIQUE"> UNIQUE </option>
                        <option value="INDEX"> INDEX </option>
                        <option value="FULL TEXT"> FULL TEXT </option>
                        <option value="SPATIAL"> SPATIAL </option>
                    </select> </td>
                <td><input type="checkbox" name="table_col_AI" id="table_col_AI" class="table_col_AI" /></td>
                <td><input type="text" name="table_col_comment" class="table_col_AI" id="table_col_AI" /></td>
            </tr>
               `;
                    $('.table_body').append(data);
                }
            })
        })

        //     $('.data_submit_btn').on('click', function() {
        //         $.ajax({
        //             url: '<?php echo route('Home.store'); ?>',
        //             type: 'post',
        //             data: {
        //                 action: 'store'
        //             },
        //             success: function() {
        //                 alert('sfv');
        //             }
        //         })
        //     })
    })
</script>
