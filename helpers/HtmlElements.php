<?php

class HtmlElements {

    function getTableScripts() {
        $start = "<script src='/assets/js/lib/data-table/";
        $end = "'></script>\n";

        $scripts = $start."datatables.min.js".$end;
        $scripts .= $start."dataTables.bootstrap.min.js".$end;
        $scripts .= $start."dataTables.buttons.min.js".$end;
        $scripts .= $start."buttons.bootstrap.min.js".$end;
        $scripts .= $start."jszip.min.js".$end;
        $scripts .= $start."pdfmake.min.js".$end;
        $scripts .= $start."vfs_fonts.js".$end;
        $scripts .= $start."buttons.html5.min.js".$end;
        $scripts .= $start."buttons.print.min.js".$end;
        $scripts .= $start."buttons.colVis.min.js".$end;
        $scripts .= $start."datatables-init.js".$end;

        $scripts .= "<script type='text/javascript'>\n";
        $scripts .= "    $(document).ready(function() {\n";
        $scripts .= "        $('#bootstrap-data-table-export').DataTable();\n";
        $scripts .= "    });\n";
        $scripts .= "</script>\n";

        return $scripts;
    }

    function getTableStyles() {
        $styles = "<link rel='stylesheet' href='/assets/css/lib/datatable/dataTables.bootstrap.min.css'>";

        return $styles;
    }

    function getSelectScripts() {
        $scripts = "<script src='/assets/js/lib/chosen/chosen.jquery.min.js'></script>\n";

        $scripts .= "<script type='text/javascript'>\n
                jQuery(document).ready(function() {\n
                    jQuery(\".standardSelect\").chosen({\n
                        disable_search_threshold: 10,\n
                        no_results_text: \"Oops, nothing found!\",\n
                        width: \"100%\"\n
                    });\n
                });\n";
        $scripts .= "</script>\n";

        return $scripts;
    }

    function getSelectStyles() {
        $styles = "<link rel='stylesheet' href='/assets/css/lib/chosen/chosen.min.css'>";

        return $styles;
    }

    function getAhorroScripts() {
        $scripts = "<script src='/assets/js/ahorro.js'></script>\n";

        return $scripts;
    }

}

?>
