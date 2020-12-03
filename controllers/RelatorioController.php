<?php

namespace app\controllers;

use app\models\Aluno;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use kartik\mpdf\Pdf;
use TCPDF;
use DateTime;
use FPDF;

/**
 * AlunoController implements the CRUD actions for Aluno model.
 */
class RelatorioController extends Controller {

    public $model;

   

    public function actionReport() {
        // get your HTML raw content without any layouts or scripts
        $content = $this->renderPartial('_reportView');

        // setup kartik\mpdf\Pdf component
        $pdf = new Pdf([
            // set to use core fonts only
            'mode' => Pdf::MODE_CORE,
            // A4 paper format
            'format' => Pdf::FORMAT_A4,
            // portrait orientation
            'orientation' => Pdf::ORIENT_PORTRAIT,
            // stream to browser inline
            'destination' => Pdf::DEST_BROWSER,
            // your html content input
            'content' => $content,
            // format content from your own css file if needed or use the
            // enhanced bootstrap css built by Krajee for mPDF formatting 
            'cssFile' => '@vendor/kartik-v/yii2-mpdf/assets/kv-mpdf-bootstrap.min.css',
            // any css to be embedded if required
            'cssInline' => '.kv-heading-1{font-size:18px}',
            // set mPDF properties on the fly
            'options' => ['title' => 'Krajee Report Title'],
            // call mPDF methods on the fly
            'methods' => [
                'SetHeader' => ['Moises teste'],
                'SetFooter' => ['{PAGENO}'],
            ]
        ]);

        // return the pdf output as per the destination setting
        return $pdf->render();
    }

    public function actionView($id) {
        return $this->render('view', [
                    'model' => $this->findModel($id),
        ]);
    }

    /* public function actionTeste(){

      return $this->render('teste', [
      'model' => $this,
      ]);
      } */
    
    public function actionIndex($id){
       return $this->render('relatorioalunoindividual', [
      'model' => $this, 'id' => $id,
      ]);
    }

    public function actionRelatorioalunoindividual($id = 3) {
        $aluno = Aluno::findOne($id);
        if ($aluno === null) {
            throw new NotFoundHttpException;
        }

        $pdf = new MYPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

// set document information
        $pdf->SetCreator(PDF_CREATOR);
        $pdf->SetAuthor($aluno->nm_aluno);
        $pdf->SetTitle('Dados do Aluno');
        $pdf->SetSubject('academia harmonia');
        $pdf->SetKeywords('harmonia, PDF, aluno, dados');

// set default header data
        $pdf->SetHeaderData(PDF_HEADER_LOGO, 40);

// set header and footer fonts
        $pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
        $pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));

// set default monospaced font
        $pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);

// set margins
//$pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
        $pdf->SetMargins(20, 40, 20);
        $pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
        $pdf->SetFooterMargin(PDF_MARGIN_FOOTER);

// set auto page breaks
        $pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);

// set image scale factor
        $pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);

// set some language-dependent strings (optional)
// ---------------------------------------------------------
// set font
        $pdf->SetFont('helvetica', '', 14);
// add a page
        $pdf->AddPage();

        if ($aluno->fl_paciente === '1') {
            $usuario = 'Paciente';
        } else {
            $usuario = 'Aluno';
        }
        $pdf->Write(0, 'Informações do ' . $usuario, '', 0, 'C', true, 0, false, false, 0);

        $pdf->Ln(5);

        $pdf->SetFont('times', '', 9);

//$pdf->SetCellPadding(0);
//$pdf->SetLineWidth(2);
// set color for background
        $pdf->SetFillColor(255, 255, 200);

        $nome = 'Nome : ' . $aluno->nm_aluno;
        $dataNascimento = 'Data de Nascimento: ' . $aluno->dt_nascimento;
        //calculo de idade
        $dtNasc = $aluno->dt_nascimento;
        $date = new DateTime($dtNasc);
        $interval = $date->diff(new DateTime(date('Y-m-d')));
        $x = $interval->format('%m');

        if ($x === '1') {
            $mes = $interval->format('%Y anos e %m mês');
        } else if ($x === '0') {
            $mes = $interval->format('%Y anos');
        } else {
            $mes = $interval->format('%Y anos e %m meses');
        }

        $idade = 'Idade: ' . $mes;
        $sexo = 'Sexo: ' . $aluno->ds_sexo;
        $cpf = 'CPF: ' . $aluno->ds_cpf;
        $identidade = 'Identidade: ' . $aluno->ds_identidade;
        $responsavel = 'Responsável: ' . $aluno->ds_responsaveis;

// print some rows just as example
        // Multicell test
        $pdf->MultiCell(164, 7, $nome, 1, 'L', 0, 0, '', '', true);
        $pdf->Ln(7);
        $pdf->MultiCell(82, 7, $dataNascimento, 1, 'L', 0, 0, '', '', true);
        $pdf->MultiCell(82, 7, $idade, 1, 'L', 0, 0, '', '', true);
        $pdf->Ln(7);
        $pdf->MultiCell(82, 7, $cpf, 1, 'L', 0, 0, '', '', true);
        $pdf->MultiCell(82, 7, $identidade, 1, 'L', 0, 0, '', '', true);
        $pdf->Ln(7);
        $pdf->MultiCell(164, 7, $responsavel, 1, 'L', 0, 0, '', '', true);

        $pdf->Ln(15);

        $pdf->SetFont('helvetica', '', 14);
        
        $pdf->Write(0, 'Contato', '', 0, 'C', true, 0, false, false, 0);
        $pdf->Ln(5);

        $pdf->SetFont('times', '', 9);

        $endereco = 'Endereço: ' . $aluno->ds_endereco;
        $cidade = 'Cidade: ' . $aluno->ds_cidade;
        $estado = 'Estado: ' . $aluno->ds_estado;
        $cep = 'Cep: ' . $aluno->ds_cep;
        $telefone = 'Telefone: ' . $aluno->ds_telefone1;
        $zap = 'WhastsApp: ' . $aluno->ds_whatsapp;


        $pdf->MultiCell(164, 7, $endereco, 1, 'L', 0, 0, '', '', true);
        $pdf->Ln(7);
        $pdf->MultiCell(70, 7, $cidade, 1, 'L', 0, 0, '', '', true);
        $pdf->MultiCell(44, 7, $estado, 1, 'L', 0, 0, '', '', true);
        $pdf->MultiCell(50, 7, $cep, 1, 'L', 0, 0, '', '', true);
        $pdf->Ln(7);
        $pdf->MultiCell(82, 7, $telefone, 1, 'L', 0, 0, '', '', true);
        $pdf->MultiCell(82, 7, $zap, 1, 'L', 0, 0, '', '', true);
        $pdf->Ln(7);

        //   $pdf->MultiRow('Row ' . ($i + 1), $idade . "\n");
// reset pointer to the last page
        $pdf->lastPage();

// ---------------------------------------------------------
//Close and output PDF document
        $pdf->Output('example_020.pdf', 'I');

//============================================================+
// END OF FILE
//============================================================+
    }


public function actionRelatorioalunoavaliacao($id = 3) {
      

   // chart.getImageURI();// passar o retorno dessa funcao para um hidden ou algo do tipo
// usando fdpf para gerar o pdf com a imagem
$pic = $string_js_base64;
        
$pdf = new FPDF();
$pdf->AddPage();
$pdf->SetFont('Arial','B',16);
$pdf->Cell(40,10,'Hello Image!');
$pdf->Image($pic, 10, 30, $tamanho, $largura, 'png');
$pdf->Output('tmp/doc.pdf');
    
    
    
    }

}


class MYPDF extends TCPDF {

    public function MultiRow($left, $right) {
        // MultiCell($w, $h, $txt, $border=0, $align='J', $fill=0, $ln=1, $x='', $y='', $reseth=true, $stretch=0)

        $page_start = $this->getPage();
        $y_start = $this->GetY();

        // write the left cell
        $this->MultiCell(40, 0, $left, 1, 'R', 1, 2, '', '', true, 0);

        $page_end_1 = $this->getPage();
        $y_end_1 = $this->GetY();

        $this->setPage($page_start);

        // write the right cell
        $this->MultiCell(0, 0, $right, 1, 'J', 0, 1, $this->GetX(), $y_start, true, 0);

        $page_end_2 = $this->getPage();
        $y_end_2 = $this->GetY();

        // set the new row position by case
        if (max($page_end_1, $page_end_2) == $page_start) {
            $ynew = max($y_end_1, $y_end_2);
        } elseif ($page_end_1 == $page_end_2) {
            $ynew = max($y_end_1, $y_end_2);
        } elseif ($page_end_1 > $page_end_2) {
            $ynew = $y_end_1;
        } else {
            $ynew = $y_end_2;
        }

        $this->setPage(max($page_end_1, $page_end_2));
        $this->SetXY($this->GetX(), $ynew);
    }

}
