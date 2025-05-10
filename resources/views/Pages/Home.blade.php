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
                <td><input /></td>
                <td> <select>
                        <option value="INT"> INT </option>
                        <option value="VARCHAR"> VARCHAR </option>
                        <option value="TEXT"> TEXT </option>
                        <option value="DATE"> DATE </option>
                    </select> </td>
                <td><input /></td>
                <td> <select>
                        <option value="None"> None </option>
                        <option value="As Defined"> As Defined: </option>
                        <option value="Null"> Null </option>
                        <option value="CURRENT_TIMESTAMP"> CURRENT_TIMESTAMP </option>
                    </select> </td>
                <td> <select>
                        <option value=""> </option>
                        <option value="BINARY"> BINARY </option>
                        <option value="UNSIGNED"> UNSIGNED </option>
                        <option value=" UNSIGNED ZEROFILL"> UNSIGNED ZEROFILL </option>
                        <option value="on update CURRENT_TIMESTAMP"> on update CURRENT_TIMESTAMP </option>
                    </select> </td>
                <td><input type="checkbox" /></td>
                <td> <select>
                        <option value=""> -- </option>
                        <option value="PRIMERY"> PRIMERY </option>
                        <option value="UNIQUE"> UNIQUE </option>
                        <option value="INDEX"> INDEX </option>
                        <option value="FULL TEXT"> FULL TEXT </option>
                        <option value="SPATIAL"> SPATIAL </option>
                    </select> </td>
                <td><input type="checkbox" /></td>
                <td><input /></td>
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

                $('.add_field_btn').on('click', function() {
                    $.ajax({
                        url: '',
                        type: 'get',
                        data: {},
                        success: function() {
                            var data = `
                    <tr class="table_body_row" name="table_body_row" id="table_body_row">
                <td><input /></td>
                <td> <select>
                        <option> INT </option>
                        <option> VARCHAR </option>
                        <option> TEXT </option>
                        <option> DATE </option>
                    </select> </td>
                <td><input /></td>
                <td> <select>
                        <option> None </option>
                        <option> As Defined: </option>
                        <option> Null </option>
                        <option> CURRENT_TIMESTAMP </option>
                    </select> </td>
                <td> <select>
                        <option> </option>
                        <option> BINARY </option>
                        <option> UNSIGNED </option>
                        <option> UNSIGNED ZEROFILL </option>
                        <option> on update CURRENT_TIMESTAMP </option>
                    </select> </td>
                <td><input type="checkbox" /></td>
                <td> <select>
                        <option> -- </option>
                        <option> PRIMERY </option>
                        <option> UNIQUE </option>
                        <option> INDEX </option>
                        <option> FULL TEXT </option>
                        <option> SPATIAL </option>
                    </select> </td>
                <td><input type="checkbox" /></td>
                <td><input /></td>
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
                // })
</script>
