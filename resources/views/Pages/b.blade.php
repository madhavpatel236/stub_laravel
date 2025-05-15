<div>
<form method="POST" action="{{ route('BController.store') }}"  name='data_input_form'>
@csrf

                <lable> b:</lable>
                <input class= "integer"  , name="b"/> <br/> <br/>

<button name="data_submit_btn"> Submit </button>
</form> <br /> <br/>


<table border=2 >
<thead> <tr><th>b</th><th> Edit </th></tr> </thead>
<tbody> <tr></tr> </tbody>
</table>


</div>

{{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script> --}}

<script>
// $(document).ready(function(){
// $ajax$
// })
</script>
