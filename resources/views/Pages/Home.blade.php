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
            <tr class="table_body_row0" name="table_body_row0" id="table_body_row0">
                <td> <input type="text" name="table_col_name_input0" class="table_col_name_input0" /></td>
                <td> <select name="table_col_type0" class="table_col_type0" id="table_col_type0">
                        <option value="integer"> INT </option>
                        <option value="string"> VARCHAR </option>
                        <option value="string"> TEXT </option>
                        <option value="binary"> BINARY </option>

                        {{-- <option value="date"> DATE </option> --}}
                    </select> </td>
                <td><input name="table_col_length0" id="table_col_length0" class="table_col_length0" /></td>
                <td> <select name="table_col_defaultVal0" id="table_col_defaultVal0" class="table_col_defaultVal0">
                        <option value=""> None </option>
                        {{-- <option value="As Defined"> As Defined: </option> --}}
                        <option value="->nullable()"> Null </option>
                    </select> </td>
                <td> <select name="table_col_attribute0" id="table_col_attribute0" class="table_col_attribute0">
                        <option value=""> </option>
                        <option value="->unsigned()"> UNSIGNED </option>
                        {{-- <option value=" UNSIGNED ZEROFILL"> UNSIGNED ZEROFILL </option> --}}
                        <option value="->useCurrentOnUpdate()"> on update CURRENT_TIMESTAMP </option>
                    </select> </td>
                <td><input type="checkbox" name="table_col_nullVal0" class="table_col_nullVal0"
                        id="table_col_nullVal0" />
                </td>
                <td> <select name="table_col_index0" id="table_col_index0" class="table_col_index0">
                        <option value=""> -- </option>
                        <option value="->primary()"> PRIMARY </option>
                        <option value="->unique(true)"> UNIQUE </option>
                        <option value="->index()"> INDEX </option>
                        {{-- <option value="fullText()"> FULL TEXT </option> --}}
                        {{-- <option value="SPATIAL"> SPATIAL </option> --}}
                    </select> </td>
                <td><input type="checkbox" name="table_col_AI0" id="table_col_AI0" class="table_col_AI0" /></td>
                <td><input type="text" name="table_col_comment0" class="table_col_comment0"
                        id="table_col_comment0" />
                </td>
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
        var name = [];

        $('.add_field_btn').on('click', function() {
            $.ajax({
                url: '',
                type: 'get',
                data: {},
                success: function() {
                    count += 1;
                    // alert(count);
                    if (count >= 1) {
                        var data = `
                    <tr class="table_body_row${count}" name="table_body_row${count}" id="table_body_row${count}">
                <td> <input type="text" name="table_col_name_input${count}" class="table_col_name_input${count}" /></td>
                <td> <select name="table_col_type${count}" class="table_col_type${count}" id="table_col_type${count}">
                        <option value="integer"> INT </option>
                        <option value="string"> VARCHAR </option>
                        <option value="text"> TEXT </option>
                        // <option value="binary"> BINARY </option>
                    </select> </td>
                <td><input name="table_col_length${count}" id="table_col_length${count}" class="table_col_length${count}" /></td>
                <td> <select name="table_col_defaultVal${count}" id="table_col_defaultVal${count}" class="table_col_defaultVal${count}">
                        <option value=""> None </option>
                        {{-- <option value="As Defined"> As Defined: </option> --}}
                        <option value="->nullable()"> Null </option>
                    </select> </td>
                <td> <select name="table_col_attribute${count}" id="table_col_attribute${count}" class="table_col_attribute${count}">
                        <option value=""> </option>
                        <option value="->unsigned()"> UNSIGNED </option>
                        {{-- <option value=" UNSIGNED ZEROFILL"> UNSIGNED ZEROFILL </option> --}}
                        <option value="->useCurrentOnUpdate()"> on update CURRENT_TIMESTAMP </option>
                    </select> </td>
                <td><input type="checkbox" name="table_col_nullVal${count}" class="table_col_nullVal${count}"
                        id="table_col_nullVal${count}" />
                </td>
                <td> <select name="table_col_index${count}" id="table_col_index${count}" class="table_col_index${count}">
                        <option value=""> -- </option>
                        <option value="->primary()"> PRIMARY </option>
                        <option value="->unique(true)"> UNIQUE </option>
                        <option value="->index()"> INDEX </option>
                        {{-- <option value="fullText()"> FULL TEXT </option> --}}
                        {{-- <option value="SPATIAL"> SPATIAL </option> --}}
                    </select> </td>
                <td><input type="checkbox" name="table_col_AI${count}" id="table_col_AI${count}" class="table_col_AI${count}" /></td>
                <td><input type="text" name="table_col_comment${count}" class="table_col_comment${count}"
                        id="table_col_comment${count}" />
                </td>
            </tr>
               `;
                    }
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
