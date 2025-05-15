<div>
<form method='post' action='{{route('test.index')}}'  name='data_input_form'>
@csrf

                <lable> maadhav:</lable>
                <input class= "integer"  , name="maadhav"/> <br/> <br/>
            
<button name="data_submit_btn"> Submit </button>
</form> <br /> <br/>


<table border=2 >
<thead> <tr><th>maadhav</th><th> Edit </th></tr> </thead>
<tbody> <tr></tr> </tbody>
</table>


</div>
