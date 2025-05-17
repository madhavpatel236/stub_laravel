    <div>
    <form method='post' id='data_input_form' name='data_input_form'>
    @csrf
    
                <lable> lll:</lable>
                <input class= "integer"  , name="lll"/> <br/> <br/>
            
    <button name="data_submit_btn"> Submit </button>
    </form> <br /> <br/>

    <table border=2 >
     <thead id="table_head"></thead>
     <tbody id="table_body"></tbody>
    </table>
    </div>


    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>

    <script>
    $(document).ready(function(){
    
            fetchData();

            $('#data_submit_btn').on('click', function() {
            // e.preventDefault();
            // let formData = $(this).serialize();
            let formData = $('#Name').val();
            alert(formData);

            $.ajax({
                url: '{{ route('LllController.store') }}',
                method: 'POST',
                data: formData,
                success: function(response) {
                    fetchData();
                    $('#data_input_form')[0].reset();
                },
            });
        });

        
    })
    </script>

