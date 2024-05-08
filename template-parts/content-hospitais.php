<?php
    $hospitais = file_get_contents( get_template_directory() . '/dados/comparativo-hospitais.json');
    $jsonHospitais = json_decode($hospitais);
    $numPlanos = 6;
?>
<div class="comparativo-estilo">
    <table class="table table-bordered">
        <thead class="comparativo">
        <tr>
            <th class="fixed-width"><h2>OPERADORAS:</h2></th>
            <th  id="pdf_plano1_logo_th"><p id="pdf_plano1_logo"></p></th>
            <th  id="pdf_plano2_logo_th"><p id="pdf_plano2_logo"></p></th>
            <th  id="pdf_plano3_logo_th"><p id="pdf_plano3_logo"></p></th>
            <th  id="pdf_plano4_logo_th"><p id="pdf_plano4_logo"></p></th>
            <th  id="pdf_plano5_logo_th"><p id="pdf_plano5_logo"></p></th>
            <th  id="pdf_plano6_logo_th"><p id="pdf_plano6_logo"></p></th>
        </tr>
        <tr>
            <th ><p>PLANO</p></th>
            <th  id="pdf_plano1_th"><p id="pdf_plano1_nome"></p></th>
            <th  id="pdf_plano2_th"><p id="pdf_plano2_nome"></p></th>
            <th  id="pdf_plano3_th"><p id="pdf_plano3_nome"></p></th>
            <th  id="pdf_plano4_th"><p id="pdf_plano4_nome"></p></th>
            <th  id="pdf_plano5_th"><p id="pdf_plano5_nome"></p></th>
            <th  id="pdf_plano6_th"><p id="pdf_plano6_nome"></p></th>
        </tr>
        </thead>
        <tbody>

        </tbody>
    </table>
</div>