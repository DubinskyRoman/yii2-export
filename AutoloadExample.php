<?php

namespace rmd\export;


use \PHPExcel;
use \PHPExcel_IOFactory;
use \PHPExcel_Settings;
use \PHPExcel_Style_Fill;
use \PHPExcel_Writer_IWriter;
use \PHPExcel_Worksheet;
use \PHPExcel_Writer_Excel2007;
 

 
 
 
 
class AutoloadExample extends \yii\base\Widget
{
public $exportType;

    public function init()
    {
        parent::init();
        if ($this->exportType === null) {
            $this->exportType = '';
        }
    }



    public function run()
    {
		if($this->exportType=="xlsx"){
       	  $this->makeExcel(true);
		}
		else if($this->exportType=="xls"){
       	  $this->makeExcel(false);
		}
		else if($this->exportType=="html"){
       	  $this->makeHtml();
		  }		
		else {
			return  $this->render("index");
		}
     }
	
	public function makeHtml(){
		  header("Content-Type: text/html");
		  header('Content-Disposition: attachment; filename="file.html"');
	      while (ob_get_level() > 1) {
                ob_end_clean();
            }
            echo "1";
      
          \Yii::$app->end();
	}
	
	public function makeExcel($isxlsx){
				$objPHPExcel = new PHPExcel();
				$objPHPExcel->getProperties()->setCreator("Maarten Balliauw");
				$objPHPExcel->getProperties()->setLastModifiedBy("Maarten Balliauw");
				$objPHPExcel->getProperties()->setTitle("Office 2007 XLSX Test Document");
				$objPHPExcel->getProperties()->setSubject("Office 2007 XLSX Test Document");
				$objPHPExcel->getProperties()->setDescription("Test document for Office 2007 XLSX, generated using PHP classes.");
  			    $objPHPExcel->setActiveSheetIndex(0);
				$objPHPExcel->getActiveSheet()->SetCellValue('A1', 'Hello');
				$objPHPExcel->getActiveSheet()->SetCellValue('B2', 'world!');
				$objPHPExcel->getActiveSheet()->SetCellValue('C1', 'Hello');
				$objPHPExcel->getActiveSheet()->SetCellValue('D2', 'world!');
			    $objPHPExcel->getActiveSheet()->setTitle('Simple');
                ///header("Pragma: public");
				// header("Expires: 0");
				// header("Cache-Control: must-revalidate, post-check=0, pre-check=0");
				// header("Content-Type: application/force-download");
				// header("Content-Type: application/octet-stream");
				// header("Content-Type: application/download");;
				// $filename = "test";
				//  header("Content-Disposition: attachment;filename=".$filename.".xls");
				// header("Content-Transfer-Encoding: binary ");
				
						 if($isxlsx){
							 $objWriter = new PHPExcel_Writer_Excel2007($objPHPExcel); 
							 //$objWriter->setOffice2003Compatibility(true);
							 header("Content-Type: application/octet-stream");
							 header('Content-Disposition: attachment; filename="file.xlsx"');
						 }
						 else
						 {
							$objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel5');
							header('Content-type: application/vnd.ms-excel');
							header('Content-Disposition: attachment; filename="file.xls"');
						 }

		    while (ob_get_level() > 1) {
                ob_end_clean();
            }
            
           $objWriter->save('php://output');
            \Yii::$app->end();
	}
	
	
	
}
