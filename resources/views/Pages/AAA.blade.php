<div>
<form method='post' action='{{route('AAAController.store')}}' name='data_input_form'>
@csrf

                <lable> AAA:</lable>
                <input class= "integer"  , name="AAA"/> <br/> <br/>
            
<button name="data_submit_btn"> Submit </button>
</form> <br /> <br/>

<table border=2 >
<thead> <tr><th>AAA</th><th> Edit </th></tr> </thead>
<tbody> <tr></tr> </tbody>
</table>
</div>
