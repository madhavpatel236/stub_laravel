<div>
<form method='post' action='{{route('Madhav_tableController.store')}}'  name='data_input_form'>
@csrf

                <lable> patel:</lable>
                <input class= "integer"  , name="patel"/> <br/> <br/>
            
<button name="data_submit_btn"> Submit </button>
</form> <br /> <br/>


<table border=2 >
<thead> <tr><th>patel</th><th> Edit </th></tr> </thead>
<tbody> <tr></tr> </tbody>
</table>


</div>
