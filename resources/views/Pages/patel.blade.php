<div>
<form method='post' action='{{route('PatelController.store')}}' name='data_input_form'>
@csrf

                <lable> q:</lable>
                <input class= "integer"  , name="q"/> <br/> <br/>
            
<button name="data_submit_btn"> Submit </button>
</form> <br /> <br/>

<table border=2 >
<thead> <tr><th>q</th><th> Edit </th></tr> </thead>
<tbody> <tr></tr> </tbody>
</table>
</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>

<script>
$(document).ready(function(){
$ajax$
})
</script>
