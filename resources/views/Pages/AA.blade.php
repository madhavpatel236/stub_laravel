<div>
<form method='post' action='{{route('AAController.store')}}'  name='data_input_form'>
@csrf

                <lable> AA:</lable>
                <input class= "integer"  , name="AA"/> <br/> <br/>
            
<button name="data_submit_btn"> Submit </button>
</form> <br /> <br/>


<table border=2 >
<thead> <tr><th>AA</th><th> Edit </th></tr> </thead>
<tbody> <tr></tr> </tbody>
</table>


</div>
