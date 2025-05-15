<div>
<form method='post' action='{{route('BController.store')}}'  name='data_input_form'>
@csrf

                <lable> B:</lable>
                <input class= "integer"  , name="B"/> <br/> <br/>
            
                <lable> BB:</lable>
                <input class= "integer"  , name="BB"/> <br/> <br/>
            
<button name="data_submit_btn"> Submit </button>
</form> <br /> <br/>


<table border=2 >
<thead> <tr><th>B</th><th>BB</th><th> Edit </th></tr> </thead>
<tbody> <tr></tr> </tbody>
</table>


</div>
