<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.12.1/css/jquery.dataTables.css">
</head>
<body>
    <table id="table_id">
        <thead>
            <tr>
                <th>tuitle</th>
                <th>author_fullname</th>
                <th>thumbnail</th>
                <th>selftext</th>
                <th>Fecha</th>
                <th>X</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach($this->model->Listar() as $r): ?>                
            <tr>
                <td><?php echo $r->title; ?></td>
                <td><?php echo $r->author_fullname; ?></td>
                <td><?php echo $r->thumbnail; ?></td>
                <td><?php echo $r->selftext; ?></td>
                <td><?php echo $r->create_date; ?></td>
                <td>
                    <a href="?c=Subreddit&a=Eliminar&idblog=<?php echo $r->id_blog; ?>" >Eliminar</a>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.js"></script>
    <script>
    $(document).ready(function(){
        $(document).ready( function () {
            $('#table_id').DataTable();
        } );
    });  
    </script>
</body>
</html>