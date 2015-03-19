<?php

namespace rmd\export;

use \PHPExcel;
use \PHPExcel_IOFactory;
use \PHPExcel_Settings;
use \PHPExcel_Style_Fill;
use \PHPExcel_Writer_IWriter;
use \PHPExcel_Worksheet;
use \PHPExcel_Writer_Excel2007;
 

 
 
 
 
class MultyExportButton extends \yii\base\Widget
{
public $message;

    public function init()
    {
        parent::init();
        if ($this->message === null) {
            $this->message = 'Hello World';
        }
    }



    public function run()
    {
        return $this->makeExcel();
		///return $this->render("index");
		
    }
	
	public function makeExcel(){
				 // Create new PHPExcel object
				//echo date('H:i:s') . " Create new PHPExcel object\n";
				$objPHPExcel = new PHPExcel();

				// Set properties
				//echo date('H:i:s') . " Set properties\n";
				$objPHPExcel->getProperties()->setCreator("Maarten Balliauw");
				$objPHPExcel->getProperties()->setLastModifiedBy("Maarten Balliauw");
				$objPHPExcel->getProperties()->setTitle("Office 2007 XLSX Test Document");
				$objPHPExcel->getProperties()->setSubject("Office 2007 XLSX Test Document");
				$objPHPExcel->getProperties()->setDescription("Test document for Office 2007 XLSX, generated using PHP classes.");


				// Add some data
				//echo date('H:i:s') . " Add some data\n";
				$objPHPExcel->setActiveSheetIndex(0);
				$objPHPExcel->getActiveSheet()->SetCellValue('A1', 'Hello');
				$objPHPExcel->getActiveSheet()->SetCellValue('B2', 'world!');
				$objPHPExcel->getActiveSheet()->SetCellValue('C1', 'Hello');
				$objPHPExcel->getActiveSheet()->SetCellValue('D2', 'world!');

				// Rename sheet
				//echo date('H:i:s') . " Rename sheet\n";
				$objPHPExcel->getActiveSheet()->setTitle('Simple');

						
				// Save Excel 2007 file
				//echo date('H:i:s') . " Write to Excel2007 format\n";
				//$objWriter = new PHPExcel_Writer_Excel2007($objPHPExcel);
				//$objWriter->save(str_replace('.php', '.xlsx', __FILE__));

				// Echo done
				//echo date('H:i:s') . " Done writing file.\r\n";
				header("Pragma: public");
				header("Expires: 0");
				header("Cache-Control: must-revalidate, post-check=0, pre-check=0");
				header("Content-Type: application/force-download");
				header("Content-Type: application/octet-stream");
				header("Content-Type: application/download");;
				header("Content-Disposition: attachment;filename=$filename.xls");
				header("Content-Transfer-Encoding: binary ");
				$objWriter = new PHPExcel_Writer_Excel2007($objPHPExcel); 
				$objWriter->setOffice2003Compatibility(true);
				$objWriter->save('php://output');
	}
	
	
	
}
