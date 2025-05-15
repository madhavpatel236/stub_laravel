<div>
    <form method="POST" action="{{ route('aController.store') }}" name="data_input_form">
        @csrf

        <label> a: </label>
        <input class="integer" name="a" /> <br /><br />

        <label> aa: </label>
        <input class="integer" name="aa" /> <br /><br />

        <label> aaa: </label>
        <input class="integer" name="aaa" /> <br /><br />

        <button type="submit" name="data_submit_btn"> Submit </button>
    </form> <br /><br />

    <table border="2">
        <thead>
            <tr>
                <th>a</th>
                <th>aa</th>
                <th>aaa</th>
                <th> Edit </th>
            </tr>
        </thead>
        <tbody>
            <tr></tr>
        </tbody>
    </table>
</div>
