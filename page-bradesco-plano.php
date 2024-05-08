<?php

header('Content-Type: application/json');

$cooparticipacao = $_POST['cooparticipacao'];
$tipo_contratacao = $_POST['tipo_contratacao'];
$tipo_plano = $_POST['tipo_plano'];
$tabela_regiao = $_POST['tabela_regiao'];
$qtd_vidas  = $_POST['qtd_vidas'];

if($qtd_vidas >= 3 && $qtd_vidas <= 29)
{
    $tabela = "3 a 29 Vidas (1 ou + titulares)";
}
if($qtd_vidas >= 4 && $qtd_vidas <= 29)
{
    $tabela = "4 a 29 Vidas (2 ou + titulares)";
}
if($qtd_vidas >= 30 && $qtd_vidas <= 99)
{
    $tabela = "30 a 99 Vidas (2 ou + titulares)";
}
if($qtd_vidas >= 100 && $qtd_vidas <= 199)
{
    $tabela = "100 a 199 Vidas (2 ou + titulares)";
}

$con = mysqli_connect("localhost", "planod28_wp193", "S(51[m9OpV", "planod28_wp193");
$query = "SELECT * FROM wp7d_dados WHERE localidades = '$tabela_regiao' AND tabela = '$tabela' AND coparticipacao = '$cooparticipacao' AND remissao = 'Com remissao' AND categoria = '$tipo_contratacao' AND descricaoDoPlano = '$tipo_plano'";
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