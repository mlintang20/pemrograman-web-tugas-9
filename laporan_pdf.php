<?php

    require("phpfpdf/fpdf.php");

    include "connect.php";

    $pdf = new FPDF("l", "mm", "A4");

    $pdf->AddPage();
    $pdf->SetMargins(17, 20, 17);
    $pdf->Cell(260, 7, "", 0, 1, "C");
    $pdf->SetFont("Times", "B", 28);
    $pdf->Cell(260, 7, "Daftar Siswa", 0, 1, "C");
    $pdf->Cell(260, 7, "", 0, 1, "C");
    $pdf->Cell(260, 7, "", 0, 1, "C");

    $pdf->SetFont("Times", "B", 14);
    $pdf->Cell(35, 10, "Foto", 1, 0, "C");
    $pdf->Cell(40, 10, "NIS", 1, 0, "C");
    $pdf->Cell(55, 10, "Nama", 1, 0, "C");
    $pdf->Cell(40, 10, "Jenis Kelamin", 1, 0, "C");
    $pdf->Cell(40, 10, "Telepon", 1, 0, "C"); 
    $pdf->Cell(50, 10, "Alamat", 1, 1, "C"); 

    $pdf->SetFont("Times", "", 14);

    $query = "SELECT * FROM siswa";
    $sql = $pdo->prepare($query);
    $sql->execute();

    while ($row = $sql->fetch()){
        $image = $row["foto"];
        $pdf->Cell(35, 30, $pdf->Image("images/".$image, $pdf->GetX() + 2.5, $pdf->GetY(), 30, 30), 1, 0, "C", false);
        $pdf->Cell(40, 30, $row["nis"], 1, 0, "C");
        $pdf->Cell(55, 30, $row["nama"], 1, 0, "C");
        $pdf->Cell(40, 30, $row["jenis_kelamin"], 1, 0, "C");
        $pdf->Cell(40, 30, $row["telp"], 1, 0, "C"); 
        $pdf->Cell(50, 30, $row["alamat"], 1, 1, "C"); 
    }

    $pdf->Output();
?>