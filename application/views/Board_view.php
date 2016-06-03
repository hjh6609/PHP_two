<!Doctype html>
<html>
<head>
    <title></title>
</head>
<body>
    <table border="1">
        <tr>
            <td>No</td>
            <td>Name</td>
            <td>Title</td>
            <td>content</td>
        </tr>
            <?php
                foreach($Data as $entry){
                    //var_dump($test);
            ?>
         <tr>
                <td><?=$entry->inx?></td>
                <td><?=$entry->title?></td>
                <td><?=$entry->name?></td>
                <td><?=$entry->content?></td>
            <?
                }
            ?>
        </tr>
        <tr>
            <td align="center" colspan="4">
                <button onclick="javascript:Send();">저장</button>
            </td>
        </tr>
    </table>
</body>
</html>
