<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Filesystem\Filesystem;
use Illuminate\Support\Pluralizer;

class MakeViewCommand extends Command
{

    /**
     * @var string
     */

    protected $signature = 'make:view {name}';

    /**
     * @var string
     */
    protected $description = 'Command description- make a view.';


    /**
     * Create a new command instance.
     * @param Filesystem $files
     */
    public $files;
    public function __construct(FileSystem $files)
    {
        parent::__construct();
        $this->files = $files;
    }

    public function handle()
    {

        // dump(($this->argument('name')));
        $path = $this->getGenetatedControllerPath();
        $this->makeDireactory(dirname($path));
        $contents = $this->getSourceFile();

        if (! $this->files->exists($path)) {
            $this->files->put($path, $contents);
            $this->info("File : {$path} created");
        } else {
            $this->info("file: {$path} already exists");
        }
    }

    /**
     * Return the stub file path
     * @return string
     *
     */
    public function getStubPath()
    {
        return __DIR__ . '/../../../stubs/view.stub';
    }


    /**
     * @return array
     */
    public function getStubVariables()
    {
        // dump($this->argument('name')['table_col_name_input']); exit;
        return [
            'name' => $this->argument('name')['table_col_name_input'],
            'type' => $this->argument('name')['table_col_type'],
        ];
    }

    /**
     * @return bool|mixed|string
     */
    public function getSourceFile()
    {
        // dump($this->getStubVariables()); exit;
        return $this->getStubContents($this->getStubPath(), $this->getStubVariables());
    }

    /**
     * @param $stub
     * @param array $stubVariables
     * @return bool|mixed|string
     */

    public function getStubContents($stub, $stubVariables = [])
    {
        // dump(($this->argument('name')));
        $contents = file_get_contents($stub);
        // dump($stubVariables);
        // dump($this->argument("name")["table_col_name_input"]);

        $val = '';
        for ($i = 0; $i < $this->argument('name')['col_count']; $i++) {
            $val .= '
                <lable> ' . $this->argument("name")["table_col_name_input"][$i] . ':</lable>
                <input class= ' . '"' . $this->argument("name")["table_col_type"][$i] . '"' . ' id=' . '"' .  $this->argument("name")["table_col_name_input"][$i] . '"' . ' ' . 'name=' . '"' . $this->argument("name")["table_col_name_input"][$i] . '"' . '/>
                <span class= ' . '"' . $this->argument("name")["table_col_type"][$i] . "_error" . '"' . ' id=' . '"' .  $this->argument("name")["table_col_name_input"][$i] . "_error" . '"' . ' ' . 'name=' . '"' . $this->argument("name")["table_col_name_input"][$i] . "_error" . '">' . '</span><br/> <br/>
            ';
        }

        // $th = '';
        // for ($i = 0; $i < $this->argument('name')['col_count']; $i++) {
        //     $th .=  '<th>' . $this->argument('name')['table_col_name_input'][$i] . '</th>';
        // }
        // $th .= '<th> Edit </th>'; // for the edit and delete btn
        $thead = '<thead id="table_head">' . '' . '</thead>';
        $tbody = '<tbody id="table_body">' . '' . '</tbody>';

        // $action = "{{route('test.index')}}";
        $action = '{{route(' . "'" . ucfirst($this->argument('name')['table_name'][0]) . 'Controller' . '.store' . "'" .  ')}}';

        $contents = str_replace('$' . 'INPUT_FIELDS' . '$', $val, $contents);
        $contents = str_replace('$' . 'action' . '$', $action, $contents);

        $contents = str_replace('$' . 'type' . '$', $stubVariables['name'][0], $contents);
        $contents = str_replace('$' . 'name' . '$', $stubVariables['type'][0], $contents);
        $contents = str_replace('$' . 'tableHead' . '$', $thead, $contents);
        $contents = str_replace('$' . 'tableBody' . '$', $tbody, $contents);

        // dump($this->argument('name')['table_name']);
        // exit;

        $edit = '';
        for ($i = 0; $i < $this->argument('name')['col_count']; $i++) {
            $col = $this->argument('name')['table_col_name_input'][$i];
            $edit .= "$('#$col').val(data.$col);\n";
        }

        $formData = '';
        for ($i = 0; $i < $this->argument('name')['col_count']; $i++) {
            $col = $this->argument('name')['table_col_name_input'][$i];
            $formData .= "$('#$col').val();\n";
        }

        $Data = "data: {\n    _token: '{{ csrf_token() }}',\n";

        for ($i = 0; $i < $this->argument('name')['col_count']; $i++) {
            $col = $this->argument('name')['table_col_name_input'][$i];
            $Data .= "    $col: $('#$col').val(),\n";
        }

        $Data .= "},";



        $ajax = "
            $(document).ready(function(){
            fetchData();

            $('#data_submit_btn').on('click', function(e) {
            $.ajax({
                url: '{{ route('" . ucfirst($this->argument('name')['table_name'][0]) . 'Controller' . ".store') }}',
                method: 'POST',
                success: function(response) {
                    fetchData();
                    $('#data_input_form')[0].reset();
                },
            });
        })

        $(document).on('click', '.edit-btn', function() {
            let userId = $(this).data('id');
            $('#data-id').val();
            let editteUrl = '{{ route('" . ucfirst($this->argument('name')['table_name'][0]) . 'Controller' .  ".edit', ['" . ucfirst($this->argument('name')['table_name'][0]) . 'Controller' .  "' => 'id']) }}'.replace(
                'id', userId);

            $.ajax({
                url: editteUrl,
                type: 'GET',
                success: function(data) {
                $edit
                $('#edit_id').val(userId);
                    $('#data_update_btn').show();
                    $('#data_submit_btn').hide();
    },
            });
        });


        $(document).on('click', '.delete-btn', function() {
            let userId = $(this).data('id');

            let deleteUrl = '{{ route('" . ucfirst($this->argument('name')['table_name'][0]) . 'Controller' . ".destroy', ['" . ucfirst($this->argument('name')['table_name'][0]) . 'Controller' .  "' => 'id']) }}'.replace(
                'id', userId);

            $.ajax({
                url: deleteUrl,
                type: 'DELETE',
                data: {
                    _token: '{{ csrf_token() }}',
                },
                success: function(response) {
                    fetchData();
                },
            });
        });


        $('#data_update_btn').on('click', function(e) {
            e.preventDefault();
            $formData
            let userId = $('#edit_id').val();

            let updateUrl = '{{ route('" . ucfirst($this->argument('name')['table_name'][0]) . 'Controller' . ".update', ['" . ucfirst($this->argument('name')['table_name'][0]) . 'Controller' . "' => ':id']) }}'.replace(
                ':id', userId);

            $.ajax({
                url: updateUrl,
                type: 'PUT',
                $Data
                success: function(response) {
                    fetchData();
                },

            });
        });
    })


    function fetchData() {
        $.ajax({
            url: '{{ route('" . ucfirst($this->argument('name')['table_name'][0]) . 'Controller' . ".index') }}',
            type: 'GET',
            success: function(res) {
                var data = {!! " . '$' . 'users' . " !!}
                // alert(data);

                if (data.length === 0) {
                    $('#table_head').html('');
                    $('#table_body').html('<tr><td>No data Present in db</td></tr>');
                    return;
                }

                let headers = '<tr>';
                for (let key in data[0]) {
                    headers += '<th>' + key + '</th>';
                }
                headers += '<th>Action</th></tr>';
                $('#table_head').html(headers);

                let rows = '';
                data.forEach(function(row) {
                    rows += '<tr>';
                    for (let key in row) {
                        rows += '<td>' + row[key] + '</td>';
                    }
                    rows += '<td>' +
                            \"<button class='edit-btn' data-id=\" + row.id + \">Edit</button> \" +
                            \"<button class='delete-btn' data-id=\" + row.id + \">Delete</button>\" +
                            \"</td>\";
                        rows += '</tr>';



                });
                $('#table_body').html(rows);
            },

        });
    }
        ;";

        $validation = '';




        dump($this->argument('name'));
        for ($i = 0; $i < $this->argument('name')['col_count']; $i++) {
            $validationLength = ($this->argument('name')['table_col_length'][$i] != null) ? $this->argument('name')['table_col_length'][$i] : 255;
            // dump($validationLength);
            $validation .= "var flag = true;" . "\n";
            $validation .= "
                var " . $this->argument('name')['table_col_name_input'][$i] . " = $('#" . $this->argument('name')['table_col_name_input'][$i] . "').val().trim();"  .
                "" . "\n";

            $validation .= "if(" . $this->argument('name')['table_col_name_input'][$i] . ' == ""' . " || " . $this->argument('name')['table_col_name_input'][$i] . " == " . 'null'  . "){
                $('#" . $this->argument('name')['table_col_name_input'][$i] . "_error" . "').html('" . $this->argument('name')['table_col_name_input'][$i] . " is required!!" . "')
                flag = false;
                }" . "\n";

            $validation .= " if(" . $this->argument('name')['table_col_name_input'][$i] . ".length() >  "  . $validationLength  .  "){
                $('#" . $this->argument('name')['table_col_name_input'][$i] . "_error" . "').html('" . " Max allowed field length is: "  . $validationLength   . "')
            flag = false;
                }" . "\n";

            // dd(($this->argument('name')['table_col_type'][$i]));
            if ($this->argument('name')['table_col_type'][$i] == 'integer') {
                $validation .= "if(" . $this->argument('name')['table_col_name_input'][$i] . " != " . "^[0-9]"  . "){
                    $('#" . $this->argument('name')['table_col_name_input'][$i] . "_error" .  "').html('Only numbers is allowed ')
                    flag = false;
                }"  . "\n";
            }

            if ($this->argument('name')['table_col_type'][$i] == 'string') {
                $validation .= "if(" . $this->argument('name')['table_col_name_input'][$i] . " != " . "^[a-zA-Z]*$"  . "){
                    $('#" . $this->argument('name')['table_col_name_input'][$i] . "_error" .  "').html('Only numbers is allowed ')
                    flag = false;
                }"  . "\n";
            }

            $validation .= "if (flag != true) {
                    e.preventDefault();
                }";
        }
        dump($validation);
        // exit;









        $contents = str_replace('$' . 'ajax' . '$', $ajax, $contents);
        $contents = str_replace('$' . 'validation' . '$', $validation, $contents);
        // dump($contents);
        return $contents;
    }

    /**
     * @return string
     */

    public function getGenetatedControllerPath()
    {
        // dump(base_path('resources/views/Pages/') . $this->getSingularControllerName($this->argument('name')['table_name'][0]) . '.blade.php'); exit;
        return base_path('resources/views/Pages/') . $this->getSingularControllerName($this->argument('name')['table_name'][0]) . '.blade.php';
    }

    /**
     * @param $name
     * @return string
     */
    public function getSingularControllerName($name)
    {
        // return ucwords(Pluralizer::singular($name));
        return $name;
    }


    /**
     * @param  string  $path
     * @return string
     */
    public function makeDireactory($path)
    {
        if (!$this->files->isDirectory($path)) {
            $this->files->makeDirectory($path, 0777, true, true);
        }
        return $path;
    }
}
