<div>
<form method='post' action='{{route('user.store')}}'  name='data_input_form'>
@csrf

                <lable> name:</lable>
                <input class= "string"  , name="name"/> <br/> <br/>
            
<button name="data_submit_btn"> Submit </button>
</form> <br /> <br/>


<table border=2 >
<thead> <tr><th>name</th><th> Edit </th></tr> </thead>
<tbody> <tr></tr> </tbody>
</table>


</div>
