<div>
<form method='post' action='{{route('TestController.store')}}' name='data_input_form'>
@csrf

                <lable> wert:</lable>
                <input class= "integer"  , name="wert"/> <br/> <br/>
            
<button name="data_submit_btn"> Submit </button>
</form> <br /> <br/>

<table border=2 >
<thead> <tr><th>wert</th><th> Edit </th></tr> </thead>
<tbody> <tr></tr> </tbody>
</table>
</div>
