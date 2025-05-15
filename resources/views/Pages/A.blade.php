<div>
<form method='post' action='{{route('AController.store')}}'  name='data_input_form'>
@csrf

                <lable> A:</lable>
                <input class= "integer"  , name="A"/> <br/> <br/>
            
<button name="data_submit_btn"> Submit </button>
</form> <br /> <br/>


<table border=2 >
<thead> <tr><th>A</th><th> Edit </th></tr> </thead>
<tbody> <tr></tr> </tbody>
</table>


</div>
