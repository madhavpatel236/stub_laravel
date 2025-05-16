    <div>
    <form method='post' action='{{route('Test_tableController.store')}}' name='data_input_form'>
    @csrf
    
                <lable> name:</lable>
                <input class= "string"  , name="name"/> <br/> <br/>
            
                <lable> age:</lable>
                <input class= "integer"  , name="age"/> <br/> <br/>
            
    <button name="data_submit_btn"> Submit </button>
    </form> <br /> <br/>

    <table border=2 >
    <thead> <tr><th>name</th><th>age</th><th> Edit </th></tr> </thead>
    <tbody> <tr></tr> </tbody>
    </table>
    </div>


    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>

    <script>
    $(document).ready(function(){
     $.ajax({
                url: "{{route('Test_tableController.index')}}",
                type: "get",
                data: {},
                success: function($res) {

                // alert($res.col1);

                let rows = "";
            res.forEach(row => {
            rows += "<tr>";
            for (let key in row) {
                rows += "<td>" + row[key] + "</td>";
            }
            rows += "<td><button>Edit</button></td></tr>";
        });
        document.getElementById("table_body").innerHTML = rows;

    }}
    ) 
    })
    </script>

