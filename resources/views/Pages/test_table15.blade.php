<div>
<form method='post' action='{{route('test')}}'  name='data_input_form'>
@csrf

                <lable> col1:</lable>
                <input class= "integer"  , name="col1"/> <br/> <br/>

<button name="data_submit_btn"> Submit </button>
</form> <br /> <br/>


<table border=2 >
<thead> <tr><th>col1</th><th> Edit </th></tr> </thead>
<tbody> <tr></tr> </tbody>
</table>


</div>
