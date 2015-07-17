<?php
/**
 * Created by PhpStorm.
 * User: Avner
 * Date: 17/07/2015
 * Time: 18:08
 */

try
{
    $conexao = new \PDO("mysql:host=localhost;dbname=bd_site_simples", "admin", "kmy878");
} catch (\PDOException $e) {
    die("Erro código: ".$e->getCode().": ".$e->getMessage());
}
$id = "1";
$sql    = "SELECT * FROM tbpaginas WHERE id_pagina = :id";
$stmt   = $conexao->prepare($sql);
$stmt->bindValue("id", $id);
$stmt->execute();
$res    = $stmt->fetchAll(PDO::FETCH_ASSOC);

print_r($res);