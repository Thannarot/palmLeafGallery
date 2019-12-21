<?php
//ImportCSV2Array function to convert csv to array
function ImportCSV2Array($filename)
{
    $row = 0;
    $col = 0;

    $handle = @fopen($filename, "r");
    if ($handle)
    {
        while (($row = fgetcsv($handle, 4096)) !== false)
        {
            if (empty($fields))
            {
                $fields = $row;
                continue;
            }

            foreach ($row as $k=>$value)
            {
                $results[$col][$fields[$k]] = $value;
            }
            $col++;
            unset($row);
        }
        if (!feof($handle))
        {
            echo "Error: unexpected fgets() failn";
        }
        fclose($handle);
    }

    return $results;
}
?>
