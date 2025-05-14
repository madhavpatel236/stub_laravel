<div>
<form method='post' action='{{route('user.store')}}'  name='data_input_form'>
@csrf

                <lable> col1:</lable>
                <input class= "integer"  , name="col1"/> <br/> <br/>
            
                <lable> col2:</lable>
                <input class= "integer"  , name="col2"/> <br/> <br/>
            
<button name="data_submit_btn"> Submit </button>
</form> <br /> <br/>


<table border=2 >
<thead> <tr><th>col1</th><th>col2</th></tr> </thead>
<tbody> $tableBody$ </tbody>
</table>


</div>
