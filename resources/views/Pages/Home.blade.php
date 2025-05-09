<form action="" method="POST">
    @csrf
    <label for="db_name_input"> Database name: </label>
    <input type="text" name="db_name_input" class="db_name_input" />
    <br /> <br />


    <label for="table_name_input"> Table name: </label>
    <input type="text" name="table_name_input" class="table_name_input" />
    <br /> <br />

    <button name="data_submit_btn"> Submit </button>
</form>
