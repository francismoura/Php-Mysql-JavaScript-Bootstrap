<?php

class Table
{

    public $output = "";

    public function refreshTable($fields)
    {

        $this->output = "
                 <table id = \"user_data\" class= \"table table-bordered table-striped\">
                    <thead>
                        <tr>
                            <th width=\"1%\"> id </th>
                            <th width = \"15%\"> Nome </th>
                        </tr>
                    </thead>
                    <tbody>
           ";

        if (sizeof($fields) !== 0) {
            foreach ($fields as $field) {
                $this->output .=
                    " <tr>
                            <td>" . $field->id . "</td>
                            <td>" . $field->nome . " </td>
                        </tr>";
            }
        } else {
            $this->output .= "<td colspan = \"4\" align= \"center\"> Data not found </td>";
        }

        $this->output .= "
                </tbody>
            </table>
            ";

        return $this->output;
    }
}