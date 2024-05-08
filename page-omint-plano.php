<?php

header('Content-Type: application/json');

$cooparticipacao = $_POST['cooparticipacao'];
$titulares = $_POST['qnt_titulares'];
$tipo_contratacao = $_POST['tipo_contratacao'];
$qnt_planos = $_POST['qnt_planos'];
$tipo_plano = $_POST['tipo_plano'];
$tabela_regiao = $_POST['tabela_regiao'];
$qtd_vidas  = $_POST['qtd_vidas'];

if($qtd_vidas >= 1 && $qtd_vidas <= 29 && $titulares == 1)
{
    $tabela = "01 a 29 vidas (1 titular)";
}
if($qtd_vidas >= 4 && $qtd_vidas <= 29 && $titulares >= 2)
{
    $tabela = "04 a 29 vidas (2 ou + titulares)";
}

$con = mysqli_connect("localhost", "planod28_wp193", "S(51[m9OpV", "planod28_wp193");
$query = "SELECT * FROM wp7d_dados_omint WHERE coparticipacao = '$cooparticipacao' AND tabela = '$tabela' AND  titulares = '$titulares' AND categoria = 'COMPULSÓRIO' AND descricao_do_plano = '$tipo_plano'";
$dados = mysqli_query($con, $query);

foreach($dados as $dado){
    $values = [];
    $values[0] = $dado['zero_dezoito_anos'];
    $values[1] = $dado['dezenove_vinte_e_tres_anos'];
    $values[2] = $dado['vinte_e_quatro_vinte_e_oito_anos'];
    $values[3] = $dado['vinte_e_nove_trinta_e_tres_anos'];
    $values[4] = $dado['trinta_e_quatro_trinta_e_oito_anos'];
    $values[5] = $dado['trinta_e_nove_quarenta_e_tres_anos'];
    $values[6] = $dado['quarenta_e_quatro_quarenta_e_oito_anos'];
    $values[7] = $dado['quarenta_e_nove_cinquenta_e_tres_anos'];
    $values[8] = $dado['cinquenta_e_quatro_cinquenta_e_oito_anos'];
    $values[9] = $dado['cinquenta_e_nove_ou_mais_anos'];
}

echo json_encode($values);