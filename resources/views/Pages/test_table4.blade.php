<div>
<form method='post' action='{{route('user.store')}}'  name='data_input_form'>
@csrf

                <lable> col1:</lable>
                <input class= "integer"  , name="col1"/> <br/> <br/>

<button name="data_submit_btn"> Submit </button>
</form>

</div>
